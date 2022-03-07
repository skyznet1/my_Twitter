<?php
include 'conn.php';
$getMess = $dbh->prepare('SELECT *, firstname FROM direct_messages inner join users on users.id = direct_messages.id_sender WHERE id_receiver= :id AND id_sender= :id_sender OR id_receiver = :id_re AND id_sender = :id_se');
$getMess->execute(array(
    'id_sender' => $_GET['id'],
    'id' => $_SESSION['id'],
    'id_re' => $_GET['id'],
    'id_se' => $_SESSION['id']
));

$mes = $getMess->fetchAll();

foreach ($mes as $arr) {

    if ($arr['id_receiver'] == $_SESSION['id']) {
        echo '<div class="d-flex align-item-center">';
        echo '<img src="../images/favicon.png" width="32px" height="32px" alt="profile" class="rounded-circle me-2 marg-top-auto">';
        echo '<span class="d-block sender p-2 mt-2 marg-right-auto">' . $arr['message'] . '</span>';
        echo '</div>';
    } else if ($arr['id_sender'] == $_SESSION['id']) {
        echo '<span class="d-block receiver p-2 mt-2 marg-left-auto">' . $arr["message"] . '</span>';
    }
}