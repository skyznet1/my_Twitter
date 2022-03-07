<?php
include 'conn.php';

$id = $_SESSION['id'];
define('SALT', "vive le projet tweet_academy");

if (isset($_POST['btnTel']) && !empty($_POST['btnTel'])) {
    $phone = htmlspecialchars($_POST['updateTel']);
    $sql = $dbh->prepare("update users SET phone_number = '$phone' WHERE id = '$id'");
    $sql->execute();
    header('Location: ../html/settings.php');
}

if (isset($_POST['btnEmail']) && !empty($_POST['btnEmail'])) {
    $email = htmlspecialchars($_POST['updateEmail']);
    $sql = $dbh->prepare("update users SET email = '$email' WHERE id = '$id'");
    $sql->execute();
    header('Location: ../html/settings.php');
}

if (isset($_POST['updatePassword']) && !empty($_POST['updatePassword'])
    && isset($_POST['updatePasswordConfirm']) && !empty($_POST['updatePasswordConfirm'])) {
    if ($_POST['updatePassword'] === $_POST['updatePasswordConfirm']) {
        $password = htmlspecialchars($_POST['updatePassword']);
        $hashSecure = hash('ripemd160', $password . SALT);
        $sql = $dbh->prepare("update users SET pwd = '$hashSecure' WHERE id = '$id'");
        $sql->execute();
        header('Location: ../html/settings.php');
    } else {
        echo "<script>
        alert('Le Mot de Passe et la Confirmation doivent être identique');
        window.location.href='../html/settings.php';
        </script>";
    }
}



