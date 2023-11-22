<?php

require 'classes/User.php';
require 'inc/db.php';

$mess = [];

if ( isset( $_POST["name"], $_POST["first_name"], $_POST["login"], $_POST["email"], $_POST["password"],  ) ) {
    if ( !empty( $_POST["name"] ) && preg_match('/^[a-zA-Z]*$/', $_POST["name"] ) ) {
        $name = htmlspecialchars($_POST["name"]);
    } else {
        array_push($mess, "Le nom entré n'est pas valide");
    };


    if ( !empty( $_POST["first_name"] ) && preg_match('/^[a-zA-Z]*$/', $_POST["first_name"] ) ) {
        $first_name = htmlspecialchars($_POST["first_name"]);
    } else {
        array_push($mess, "Le prénom entré n'est pas valide");
    };


    if ( !empty( $_POST["email"] ) && !empty( $_POST["login"] ) ) {
        $email = htmlspecialchars($_POST["email"]);
        $login = htmlspecialchars($_POST["login"]);
        $verify = $pdo->prepare('SELECT * FROM user WHERE email = :email OR login = :login');
        $verify->execute([
            'email' => $email,
            'login' => $login
        ]);
        if ( $verify->rowCount() > 0 ) {
            array_push($mess, "Le login ou l'email existe déjà");
        }
    };


    if ( !empty( $_POST["password"] ) && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $_POST["password"]) ) {
        $password = hash("sha512", $_POST["password"]);
    } else {
        array_push($mess, "Le mot de passe doit contenir 8 caractères, une majuscule et un chiffre");
    };

    if (empty($mess)) {
        $user = new User(null, $_POST["name"], $_POST["first_name"], $_POST["login"], $_POST["email"], $_POST["password"] );
        $query = $pdo->prepare('INSERT INTO user (name, first_name, login, email, password) VALUES (:name, :first_name, :login, :email, :password)');
        $query->execute([
            'name' => $user->name,
            'first_name' => $user->first_name,
            'login' => $user->login,
            'email' => $user->email,
            'password' => hash("sha512", $user->password),
        ]);
        header('Location: confirm_register.php');
    }
};

?>


<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <?php if ( !empty( $mess ) ) : ?>
    <div class="alert alert-danger" role="alert">
        <ul>
    <?php foreach ( $mess as $message ) : ?>
            <li><?= $message ?></li>
    <?php endforeach ?>
        </ul>
    </div>
    <?php endif ?>

    <h2 class="text-center">Inscription</h2>

    <form action="" method="POST">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prénom</label>
            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom d'utilisateur</label>
            <input type="text" name="login" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <button class="btn btn-success" type="submit">S'inscrire</button>

    </form>

</main>
<!-- ------- -->
<?php require 'partials/footer.php' ?>