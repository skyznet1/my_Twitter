<?php

include "conn.php";
$pageno = $_POST['pageno'];

$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;

$getFollowed = $dbh->prepare("SELECT * FROM user_follow INNER JOIN users u WHERE id_followed = :id_user AND u.id = user_follow.id_follower LIMIT $offset, $no_of_records_per_page");
$getFollowed->execute(array(
    'id_user' => $_SESSION['id']
));
$follow = $getFollowed->fetchAll();
$i=0;
foreach ($follow as $arr) {
    $getFollow = $dbh->prepare('SELECT * FROM user_follow WHERE id_follower = :id_user ');
    $getFollow ->execute(array(
        'id_user' => $_SESSION['id']
    ));
    $verif = $getFollow ->fetchAll();
    echo '<div class="tendancesContent p-3 d-flex align-item-center">';
    echo '<div class="d-flex align-item-center text-start">';
    echo '<img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png">';
    echo '<div class="d-flex flex-column justify-content-center">';
    echo ' <span class="tendancesReasons">' . $arr['firstname'] . '</span>';
    echo '<span class="tendancesText">@' . $arr['lastname'] . '</span>';
    echo '<span class="tendancesText">Mettre la biographie ici</span>';
    echo '</div>';
    echo '</div>';
    if ($verif[$i]['id_follower'] == $arr['id_followed']){
        echo '<button class="btn ms-3 marg-left-auto btn-unfollow">Abonné</button>';
    }else{
        echo '<button class="btn followSugest ms-3 marg-left-auto">Suivre</button>';
    }
    echo '</div>';
    $i++;
}

