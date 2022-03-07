<?php

include '../php/conn.php';

$id_user = $_SESSION['id'];
$post = $_POST['search'];
$keyword = $post;

if (($post) !== NULL && (!empty($post))) {
    $getSearch = $dbh->prepare("SELECT * FROM users WHERE firstname like '%$keyword%' OR lastname like '%$keyword%' order by users.id DESC");
    $getSearch->execute();
    $search = $getSearch->fetchAll();
    foreach ($search as $arr) {
        echo $arr['firstname'];
        echo $arr['lastname'];
    }
} else {
    header('Location: ../html/index.php');
}

