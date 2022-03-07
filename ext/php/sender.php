<?php
include 'conn.php';


$getMess = $dbh->prepare('SELECT id_sender,id_receiver,firstname,lastname,u.id as "id_user" FROM direct_messages INNER JOIN users u WHERE u.id = direct_messages.id_sender AND direct_messages.id_receiver = :id GROUP BY id_sender');
$getMess->execute(array(
    'id' => $_SESSION['id']
));
$mes = $getMess->fetchAll();
foreach ($mes as $arr) {
    echo '<li class="p-3 active d-flex justify-content-between align-item-center userSelection" id="id_mess">';
    echo '<form action="../html/messagerie.php?id=' . $arr['id_user'] . '" method="post">';
    echo '<div class="d-flex flex-row">';
    echo '<input type="hidden" id="' . $arr['id_sender'] . '" name="' . $arr['id_sender'] . '">';
    echo '<img src="../images/favicon.png" width="52px" alt="profile" class="rounded-circle"><a href="#" name="post" class="ms-2">' . $arr['firstname'];
    echo '<span class="ms-2 descriptionText">@' . $arr['lastname'] . '</span>';
    echo '<span class="ms-2"> 5mins</span><br>';
    echo '<span class="descriptionText">Message reçu</span>';
    echo '<input type="submit" name="post_msg" value="VOIR" onclick="reloadPage()">';
    echo '</a>';
    echo '</div>';
    echo '</form>';
    echo '</li>';
}
?>
<script>
    function reloadPage() {

    }
</script>
