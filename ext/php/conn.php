<?php
session_start();
$dsn = 'mysql:dbname=commondatabase;host=127.0.0.1';
$user = 'root2';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}