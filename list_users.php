<?php

require 'inc/db.php';

$query = $pdo->query('SELECT * FROM user');

$users = $query->fetchAll(PDO::FETCH_OBJ);

?>


<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">login</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr>
        <th scope="row"><?= $user->login ?></th>
        <td>
            <a href="/php_blog_jeremy/user_unique.php?id=<?= $user->id ?>">
                <button class="btn btn-warning">Voir</button>
            </a>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</main>
<!-- ------- -->
<?php require 'partials/footer.php' ?>