<?php

require 'inc/db.php';

$query = $pdo->prepare('SELECT * FROM user WHERE id = :id');
$query->execute([
    'id' => $_GET["id"],
]);

$user = $query->fetch(PDO::FETCH_OBJ);

?>


<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom d'utilisateur</th>
        <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row"><?= $user->name ?></th>
        <td><?= $user->first_name ?></td>
        <td><?= $user->login ?></td>
        <td><?= $user->email ?></td>
        </tr>
    </tbody>
    </table>

    <a href="/php_blog_jeremy/list_users.php">
        <button class="btn btn-success">Revenir à la liste des utilisateurs</button>
    </a>
</main>
<!-- ------- -->
<?php require 'partials/footer.php' ?>