<?php
include 'conn.php';
$pageno = $_POST['pageno'];

$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;

$sql = $dbh->prepare("SELECT *,tweet.id as 'id_tweet' FROM tweet INNER JOIN users u  WHERE tweet.id_user = :id  AND u.id = :id OR retweet_by = :id AND u.id = :id ORDER BY tweet.id DESC LIMIT $offset, $no_of_records_per_page");
$sql->execute(array(
    'id' => $_GET['id']
));
$tweet = $sql->fetchAll();
$getLike = $dbh->prepare('SELECT liked FROM user_history WHERE id_user = :id');
$getLike -> execute(array(
    'id' => $_GET['id']
));
$like = $getLike -> fetchAll();

foreach ($tweet as $arr ) {
    $getRetweet = $dbh->prepare('SELECT * FROM users WHERE id = :id');
    $getRetweet->execute(array(
        'id' => $arr['retweet_by']
    ));
    $user = $getRetweet->fetchAll();
    $getPicture = $dbh->prepare('SELECT * FROM profile WHERE id_user = :id');
    $getPicture->execute(array(
        'id' => $arr['id_user']
    ));
    $img = $getPicture->fetchAll();

    echo '<form action="../php/tweetOption.php" method="post" id="tweet">';
    echo '<div class="cardTweet">';
    if ($arr['its_retweet'] == 1) {
        echo '<span class="d-flex align-items-center tweetUsernameId ms-5"><i class="fas fa-retweet me-2 ms-2"> ' . $user[0]['firstname'] . ' </i>a retweeté</span>';
    }
    echo '<div class="text-align-unset d-flex mt-2">';

    echo '<div class="text-start ms-3 d-inline-block">';
    if ($img[0]['picture_url']== NULL){
        echo '<img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png" width="64px">';
    }else{
        echo '<img class="rounded-circle align-text-sub me-1 p-2 avatar" src="'.$img[0]['picture_url'].'" width="64px">';
    }    echo ' </div>';
    echo ' <div class="mt-2 text-start">';
    echo '<a href="#" class="tweetUser">' . $arr['firstname'] . '</a>';
    echo '<span class="tweetUsernameId">@' . $arr['firstname'] . '</span>';
    echo '<span class="tweetDot">.</span>';
    echo '<a href="#" class="tweetTime">5 min</a>';
    echo '<span class="d-block text-start tweetContent">' . $arr['message'] . '</span>';
    echo '</div>';
    echo '</div>';
    echo ' <input type="hidden" name="id_tweet" value="' . $arr['id_tweet'] . '">';
    echo '<div class="d-flex justify-content-between align-item-center footerTweet mt-2 mb-2">';
    echo ' <div class="footerMsg footerLogo">';
    echo ' <button type="submit" class="btn-no-style-msg"  id="comment" name="comment"><i class="far fa-comment" name="likes"></i></button>';
    echo ' <span class="footerCount">1</span>';
    echo '   </div>';
    echo ' <div class="footerLike footerLogo">';
    echo ' <button type="submit" class="btn-no-style"  id="likes" name="likes"><i class="far fa-heart"></i></button>';
    echo '<span class="footerCount">' . $arr['likes'] . '</span>';
    echo ' </div>';

    echo '<div class="footerRT footerLogo">';
    echo '   <button type="submit" class="btn-no-style-rt"  id="RT" name="rt"><i class="fas fa-retweet"></i></button>';
    echo '<span class="footerCount">1</span>';
    echo '  </div>';
    echo '<div class="footerMsg footerLogo">';
    echo '<button type="submit" class="btn-no-style-msg"  id="upload" name="upload"><i class="fas fa-upload"></i></button>';
    echo '</div>';
    echo '</div>';

    echo '</div>';
    echo '</form>';

}
