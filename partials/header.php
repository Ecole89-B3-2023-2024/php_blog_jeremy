<?php

session_start();
if( isset( $_SESSION['login'] ) ){
    $hello = $_SESSION['login'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Delta-Blog</title>
</head>
<body>
    <header>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-center"><img width="80px" src="./medias/logo.jpg" alt=""> DELTA - BLOG : Articles sur le thème de la science-fiction</span>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#">
                <?php if( isset( $hello) ) : ?>
                    bonjour : <?= $hello ?>
                <?php else : ?>
                    Navigation
                <?php endif ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/php_blog_jeremy/index.php">Accueil</a>
                </li>
                <?php if ( isset( $_SESSION['login'] ) ) : ?>
                <li class="nav-item">
                <a class="nav-link" href="/php_blog_jeremy/logout.php">Deconnexion</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Mon profil</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Articles
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Ecrire</a></li>
                    <li><a class="dropdown-item" href="#">Mes articles</a></li>
                </ul>
                </li>
                <?php else : ?>
                <li class="nav-item">
                <a class="nav-link" href="/php_blog_jeremy/login.php">Connexion</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/php_blog_jeremy/register.php">S'inscrire</a>
                </li>
                <?php endif ?>
                
            </ul>
            </div>
        </div>
    </nav>

    </header>