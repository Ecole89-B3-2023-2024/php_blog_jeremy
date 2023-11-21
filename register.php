<?php

require 'classes/User.php';
require 'inc/db.php';

if ( isset( $_POST["name"], $_POST["first_name"], $_POST["login"], $_POST["email"], $_POST["password"],  ) ) {
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


?>


<?php require 'partials/header.php' ?>
<!-- Content -->
<main>

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
    
