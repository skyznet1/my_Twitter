<?php
include 'conn.php';

$id = $_SESSION['id'];
$sql = $dbh->prepare("INSERT INTO user_delete SELECT * FROM users WHERE id = '$id'");
$sql->execute();
$drop = $dbh->prepare("DELETE FROM users WHERE id = '$id'");
$drop->execute();

echo 'login.html';