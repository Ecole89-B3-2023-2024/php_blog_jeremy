<?php

$dsn = "mysql:dbname=moinet_php_blog;host=localhost;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn,$username, $password);
} catch (Exception $error) {
    $message = $error->getMessage();
}