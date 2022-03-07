<?php
include 'conn.php';



    $id_user = $_POST['id_user'];
    $verifIfIsAlreadyFollow  = $dbh -> prepare('SELECT * FROM user_follow WHERE id_follower = :id AND id_followed = :id_user');
    $verifIfIsAlreadyFollow -> execute(array(
        'id' => $_SESSION['id'],
        'id_user' => $id_user
    ));
    if ($verifIfIsAlreadyFollow -> rowCount() == 0){
        $addToFollow = $dbh -> prepare('INSERT INTO user_follow(id_follower,id_followed) VALUES(:id, :id_user)');
        $addToFollow -> execute(array(
            'id' => $_SESSION['id'],
            'id_user' => $id_user
        ));
        echo '../html/profile_user.php?id='.$id_user;
    }else{
        $addToFollow = $dbh -> prepare('DELETE FROM user_follow WHERE id_follower = :id AND id_followed = :id_user ');
        $addToFollow -> execute(array(
            'id' => $_SESSION['id'],
            'id_user' => $id_user
        ));
        echo '../html/profile_user.php?id='.$id_user;
    }
