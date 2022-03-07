<?php
include 'conn.php';
$comment = $_POST['tweet-comment'];
$userId = $_SESSION['id'];
$id = $_GET['id'];

if (!empty($comment)) {
    if (strlen($comment) <= 140) {

        $impComment = $dbh->prepare("INSERT INTO comment(message, id_user,id_tweet) VALUES (:comment,:userId,:id_tweet)");
        $impComment->execute(array(
            'comment' => $comment,
            'userId' => $userId,
            'id_tweet' => $id
        ));


        $userComment = $impComment->fetchAll();

        echo '../html/commentaires.php?success=tweet_post&id=' . $id;

    } else {
        echo '../html/commentaires.php?error=bad_caractere';
    }
}
