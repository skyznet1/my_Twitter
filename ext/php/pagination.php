<?php
include 'conn.php';
$pageno = $_POST['pageno'];

$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;

$sql = $dbh->prepare("SELECT *,tweet.id as 'id_tweet' FROM tweet INNER JOIN users u  WHERE tweet.id_user = u.id  ORDER BY tweet.id DESC LIMIT $offset, $no_of_records_per_page");
$sql->execute();
$tweet = $sql->fetchAll();
$selectSpe = $dbh->prepare('SELECT message FROM tweet ');
$selectSpe->execute();
$allSpe = $selectSpe->fetchAll();
$getLike = $dbh->prepare('SELECT liked FROM user_history WHERE id_user = :id');
$getLike->execute(array(
    'id' => $_SESSION['id']
));
$like = $getLike->fetchAll();
$bite = '';
$reg = '/(?:^|\W)@(\w+)(?!\w)/';
$reg2 = '/(?:^|\W)#(\w+)(?!\w)/';


foreach ($tweet as $arr) {
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
    $i = 0;
//regarde pour mettreles redirection sur la page de profile du @
    $regex = preg_match($reg, $arr['message'], $matche);
    if ($regex == 1) {
        $a = '<a style="color: blue;" href="../html/profile_user.php?" >' . $matche[0] . '</a>';
        $arr['message'] = preg_replace($reg, $a, $arr['message']);
    }
    //regarde pour mettre les hastag dans la bdd a get dans index index.php psq j'ai retire le js que tu avait mi dans pagination psq ca bloquer le nombre tweet a 10 a l'infini
    $regex2 = preg_match($reg2, $arr['message'], $mat);
    if ($regex2 == 1) {
        $a = '<a style="color: blue;" >' . $mat[0] . '</a>';
        $arr['message'] = preg_replace($reg2, $a, $arr['message']);
    }

    echo '<form action="../php/tweetOption.php" method="post" id="tweet">';
    echo '<div class="cardTweet" id="cardTweet">';
    if ($arr['its_retweet'] == 1) {
        echo '<span class="d-flex align-items-center tweetUsernameId ms-5"><i class="fas fa-retweet me-2 ms-2"> ' . $user[0]['firstname'] . ' </i>a retweeté</span>';
    }
    echo '<div class="text-align-unset d-flex mt-2">';

    echo '<div class="text-start ms-3 d-inline-block">';
    if ($img == NULL) {
        echo '<img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png" width="64px">';
    } else {
        echo '<img class="rounded-circle align-text-sub me-1 p-2 avatar" src="' . $img[0]['picture_url'] . '" width="64px">';
    }
    echo ' </div>';
    echo ' <div class="mt-2 text-start">';
    echo '<a href="../html/profile_user.php?id=' . $arr['id'] . '" class="tweetUser">' . $arr['firstname'] . '</a>';
    echo '<span class="tweetUsernameId">@' . $arr['firstname'] . '</span>';
    echo '<span class="tweetDot">.</span>';
    echo '<a href="#" class="tweetTime">5 min</a>';
    echo '<span class="d-block text-start tweetContent">' . $arr['message'] . '</span>';
    if ($arr['url_picture']  != NULL){
        echo '<img src="'.$arr['url_picture'] .'" alt="" id="image" style="max-width: 200px; margin-top: 20px;" >';
    }
    echo '</div>';
    echo '</div>';
    echo ' <input type="hidden" id="id_tweet' . $i . '" name="id_tweet" value="' . $arr['id_tweet'] . '">';
    echo '<div class="d-flex justify-content-between align-item-center footerTweet mt-2 mb-2">';
    echo ' <div class="footerMsg footerLogo">';
    echo ' <button type="submit" class="btn-no-style-msg"  id="comment" name="comment"><i class="far fa-comment"></i></button>';
    echo ' <span class="footerCount">1</span>';
    echo '</div>';
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
    $i++;
}




