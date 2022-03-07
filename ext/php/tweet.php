<?php
include 'conn.php';
$tweet = $_POST['tweet-msg'];
$userId = $_SESSION['id'];
$base64 =NULL;

if (!empty($tweet)) {
    if (strlen($tweet) <= 140) {
        if (!empty($_FILES['avatar']['name'])){
            $path = $_FILES['avatar']['tmp_name'];
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        $impTweet = $dbh->prepare("INSERT INTO tweet(message, id_user,url_picture) VALUES ('$tweet','$userId','$base64')");
        $impTweet->execute();
        echo '../html/index.php?succes=tweet_post';
    } else {
        echo '../html/index.php?error=bad_caractere';
    }
}






