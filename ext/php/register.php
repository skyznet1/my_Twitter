<?php
include 'conn.php';
define('SALT', "vive le projet tweet_academy");
if (isset($_POST['register'])) {
    if (isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['firstname']) && !empty($_POST['firstname'])
        && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['cpassword']) && !empty($_POST['cpassword'])) {

        $lastname = htmlspecialchars($_POST['username']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpassword'];
        $birthdate = $_POST['birthdate'];
        $hashSecure = hash('ripemd160', $password . SALT);

        //Date et date de naissance
        $birthDate = implode("/", $birthdate);
        $time = strtotime($birthDate);
        $dateStr = date('Y-m-d', $time);

        $jour = $_POST['birthdate'][0];
        $mois = $_POST['birthdate'][1];
        $annee = $_POST['birthdate'][2];
        $date = explode('/', date('d/m/Y'));
        

        // verif email
        $stmt = $dbh->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute(array(
            'email' => $email
        ));
        /////

        $age = $date[2] - $annee;
        if ($age >= 13) {
            if (($password == $confirmPassword)) {
                if ($stmt->rowCount() == 0) {
                    $sql = $dbh->prepare("INSERT INTO users (firstname, lastname, birthdate,  pwd, email) VALUES ('$firstname', '$lastname', '$dateStr', '$hashSecure', '$email')");
                    $sql->execute();
                    header('Location: ../html/login.html');
                } else {
                    echo "<script>
        alert('Email existe déjà zebi');
        window.location.href='../html/login.html';
        </script>";
                }
            } else {
                echo "<script>
        alert('Mot de passe et mot de passe de confirmation doivent être identique');
        window.location.href='../html/login.html';
        </script>";
            }
        } else {
            echo "<script>
        alert('Trop jeune déso');
        window.location.href='https://www.youtube.com/watch?v=0xid8ji3bwU';
        </script>";
        }
    }


}

