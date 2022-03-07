<?php
include "conn.php";

    $id_receiver = $_GET['id'];
    $id_sender = $_SESSION['id'];
    $sendMSG = $dbh ->prepare('INSERT Into direct_messages(id_sender,id_receiver,message) VALUES (:id_send,:id_rec,:mess)');
    $sendMSG ->execute(array(
        'id_send' => $id_sender,
        'id_rec' => $id_receiver,
        'mess' => $_POST['msg']
    ));
    echo '../html/messagerie.php?id='.$id_receiver;
