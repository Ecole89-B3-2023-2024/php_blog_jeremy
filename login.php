<?php

require 'inc/db.php';
require 'partials/header.php';

if ( isset( $_POST["email"], $_POST["password"] ) ) {
   if ( !empty( $_POST["email"] ) && !empty( $_POST["password"] ) ) {
        $email = htmlspecialchars($_POST["email"]);
        $password = hash('sha512', $_POST["password"]);

        $find_user = $pdo->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
        $find_user->execute([
            'email' => $email,
            'password' => $password,
        ]);

        if ( $find_user->rowCount() > 0 ) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['login'] = $find_user->fetch()['login'];
            $_SESSION['id'] = $find_user->fetch()['id'];
            header('Location:index.php');
        } else {
            $mess = <<<HTML
            <div class="alert alert-danger" role="alert">
                L'email ou le mot de passe est invalide
            </div>
HTML;
        }

   } else {
    $mess = <<<HTML
    <div class="alert alert-danger" role="alert">
        Veuillez remplir tous les champs
    </div>
HTML;
   }
}

?>


<!-- Content -->
<main>
    <?php if ( isset( $mess ) ) : ?>
    <?= $mess ?>
    <?php endif ?>
    <form action="" method="POST">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <button class="btn btn-success" type="submit">Se connecter</button>

    </form>

</main>
<!-- ------- -->
<?php require 'partials/footer.php' ?>