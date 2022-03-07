<?php
include 'conn.php';
if ($_SESSION['logged'] == true) {
    /*$comment = $_POST['tweet-comment'];*/
    $userId = $_SESSION['id'];
    $id = $_GET['id'];

    $pageno = $_POST['pageno'];

    $no_of_records_per_page = 10;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $getComment = $dbh->prepare("SELECT * FROM comment INNER JOIN users on comment.id_user = users.id WHERE comment.id_tweet = :id ORDER BY comment.id DESC LIMIT $offset, $no_of_records_per_page");
    $getComment->execute(array(
        'id' => $_GET['id']
    ));
    $userComment = $getComment->fetchAll();
    foreach ($userComment as $arr) {

        echo '<div class="cardTweet">';
        echo '<div class="text-align-unset d-flex mt-2">';
        echo '<div class="text-start ms-3 d-inline-block">';
        echo '<img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png" width="64px">';
        echo '</div>';
        echo '<div class="mt-2 text-start">';
        echo '<a class="tweetUser"';
        echo 'href="#">' . $arr["firstname"] . ' ' . $arr["lastname"] . '</a>';
        echo '<span class="tweetUsernameId"> ' . '@ . ' . $arr["firstname"] . $arr["lastname"] . '</span>';
        echo '<span class="tweetDot">.</span>';
        echo '<a class="tweetTime" href="#">5 min</a>';
        echo '<span class="d-block text-start tweetContent">' . $arr['message'] . '</span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="d-flex justify-content-between align-item-center footerTweet mt-2 mb-2">';
        echo '<div class="footerMsg footerLogo">';
        echo '<i class="far fa-comment"></i>';
        echo ' <span class="footerCount">1</span>';
        echo '</div>';
        echo '<div class="footerLike footerLogo">';
        echo '<i class="far fa-heart"></i>';
        echo '<span class="footerCount">1</span>';
        echo '</div>';
        echo '<div class="footerRT footerLogo">';
        echo '<i class="fas fa-retweet"></i>';
        echo '<span class="footerCount">1</span>';
        echo '</div>';
        echo '<div class="footerMsg footerLogo">';
        echo '<i class="fas fa-upload"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}