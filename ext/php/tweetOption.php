<?php
require 'conn.php';
if (isset($_POST['likes'])) {
    $id = $_POST['id_tweet'];
    $getTweet = $dbh->prepare("SELECT * FROM tweet WHERE id= :id");
    $getTweet->execute(array(
        'id' => $id
    ));
    if ($getTweet->rowCount() > 0) {
        $oldLike = $getTweet->fetchAll();
        $getLike = $dbh->prepare('SELECT * FROM user_history WHERE id_user = :id AND id_liked_tweet = :id_tw');
        $getLike->execute(array(
            'id' => $_SESSION['id'],
            'id_tw' => $id
        ));
        $getLiked = $getLike->fetchAll();
        if ($getLike->rowCount() == 0) {
            $addLIke = $dbh->prepare('INSERT INTO user_history(id_user,id_liked_tweet,liked) VALUES(:id_us,:id_tweet,:liked) ');
            $addLIke->execute(array(
                'id_tweet' => $id,
                'id_us' => $_SESSION['id'],
                'liked' => 1
            ));
            $likedTweet = $dbh->prepare('UPDATE tweet SET likes = :likes WHERE id= :id_tw');
            $likedTweet->execute(array(
                'likes' => $oldLike[0]['likes'] + 1,
                'id_tw' => $id
            ));
            header('location: ../html/index.php');
            exit();
        } else {
            if ($getLiked[0]['liked'] == 1) {
                $likedTweet = $dbh->prepare('UPDATE user_history SET liked = :id WHERE id_liked_tweet= :id_tw');
                $likedTweet->execute(array(
                    'id' => 0,
                    'id_tw' => $id
                ));

                $likedTweet = $dbh->prepare('UPDATE tweet SET likes = :likes WHERE id= :id_tw');
                $likedTweet->execute(array(
                    'likes' => $oldLike[0]['likes'] - 1,
                    'id_tw' => $id
                ));
                header('location: ../html/index.php');
                exit();
            } else {
                $likedTweet = $dbh->prepare('UPDATE user_history SET liked = :id WHERE id_liked_tweet= :id_tw');
                $likedTweet->execute(array(
                    'id' => 1,
                    'id_tw' => $id
                ));
                $likedTweet = $dbh->prepare('UPDATE tweet SET likes = :likes WHERE id= :id_tw');
                $likedTweet->execute(array(
                    'likes' => $oldLike[0]['likes'] + 1,
                    'id_tw' => $id
                ));
            }

            header('location: ../html/index.php');
            exit();
        }
    }
}


if (isset($_POST['rt'])) {
    $id = $_POST['id_tweet'];
    $getTweet = $dbh->prepare("SELECT * FROM tweet WHERE id= :id");
    $getTweet->execute(array(
        'id' => $id
    ));
    if ($getTweet->rowCount() > 0) {
        $getInfoTweet = $getTweet->fetchAll();
        $postRetweet = $dbh->prepare('INSERT INTO tweet(message, id_user,its_retweet,retweet_by) VALUES(:msg,:id_user,:rt,:id)');
        $postRetweet->execute(array(
            'msg' => $getInfoTweet[0]['message'],
            'id_user' => $getInfoTweet[0]['id_user'],
            'rt' => 1,
            'id' => $_SESSION['id']
        ));

        header('location: ../html/index.php?success=rt');
        exit();
    }
}


if (isset($_POST['comment'])) {

    $id = $_POST['id_tweet'];
    $getTweet = $dbh->prepare("SELECT * FROM tweet WHERE id= :id");
    $getTweet->execute(array(
        'id' => $id
    ));
    if ($getTweet->rowCount() > 0) {
        $getInfoTweet = $getTweet->fetchAll();

        $comment = $dbh->prepare("SELECT  users.*,message, users.firstname as 'user_firstname', users.lastname as 'user_lastname' from tweet JOIN users WHERE users.id = tweet.id_user AND tweet.id = :comment");
        $comment->execute(array(
            'comment' => $getInfoTweet[0]['id']
        ));

        $id_tweet = $getInfoTweet[0]['id'];
        header('location: ../html/commentaires.php?id=' . $id_tweet);
        exit();
    }
}


