<?php
include 'conn.php';
define('SALT', "vive le projet tweet_academy");
$email = htmlspecialchars($_POST['email']);
$password = $_POST['pwd'];
if (!empty($email) and !empty($password)) {
    $checkEmail = $dbh->prepare('SELECT * FROM users WHERE email = :email');
    $checkEmail->execute(array(
        'email' => $email
    ));
    if ($checkEmail->rowCount() > 0) {
        $passHash = hash('ripemd160', $password . SALT);
        $allInfoUser = $checkEmail->fetchAll();
        if ($passHash == $allInfoUser[0]['pwd']) {
            $getPicture = $dbh->prepare('SELECT * FROM profile WHERE id_user = :id');
            $getPicture->execute(array(
                'id' => $allInfoUser[0]['id']
            ));
            $pic = $getPicture->fetchAll();
            $_SESSION['id'] = $allInfoUser[0]['id'];
            $_SESSION['firstname'] = $allInfoUser[0]['firstname'];
            $_SESSION['lastname'] = $allInfoUser[0]['lastname'];
            $_SESSION['email'] = $allInfoUser[0]['email'];
            $_SESSION['date'] = $allInfoUser[0]['registered_date'];
            $_SESSION['birthdate'] = $allInfoUser[0]['birthdate'];
            $_SESSION['password'] = $allInfoUser[0]['pwd'];
            $_SESSION['phone'] = $allInfoUser[0]['phone_number'];
            $_SESSION['logged'] = true;
            $date = $_SESSION['birthdate'];
            $_SESSION['age'] = 2022 - $date[0];
            if ($pic != NULL) {
                $_SESSION['picture'] = $pic[0]['picture_url'];
                $_SESSION['picture_background'] = $pic[0]['background_url'];
                $_SESSION['bio'] = $pic[0]['bio'];
                $_SESSION['location'] = $pic[0]['location'];
            } else {
                $_SESSION['picture'] = NULL;
                $_SESSION['picture_background'] = NULL;
                $_SESSION['bio'] = NULL;
                $_SESSION['location'] = NULL;
            }





            echo '../html/index.php';
        } else {
            echo '../html/login.html?error=bad_arguments';
        }
    } else {
        echo '../html/login.html?error=bad_arguments';
    }
} else {
    echo '../html/login.html?error=bad_arguments';
}
