<?php
include 'conn.php';
if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {

    $taillemax = 2097152;
    $extensionValides = array('jpg', 'jpeg', 'gif', 'png');
    if ($_FILES['avatar']['size'] <= $taillemax) {

        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValides)) {
                   $path = $_FILES['avatar']['tmp_name'];
                   $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                $getPicture = $dbh->prepare('SELECT * FROM profile WHERE id_user = :id');
                $getPicture ->execute(array(
                    'id' => $_SESSION['id']
                ));
                 $pic = $getPicture -> fetchAll();
                $_SESSION['picture'];
                if ($getPicture -> rowCount() == 0){
                    $id = $_SESSION['id'];
                    $insertprofil = $dbh->prepare("INSERT INTO profile(id_user,picture_url) VALUES(:id,:url)");
                    $insertprofil->execute(array(
                        'id' =>$id,
                        'url' => $base64
                    ));
                }else{
                    $pictureprofil = $dbh->prepare('UPDATE profile SET picture_url = :url WHERE id_user = :id');
                    $pictureprofil->execute(array(
                        'url' => $base64,
                        'id' => $_SESSION['id']
                    ));

                }
            $_SESSION['picture'] = $base64;

            header('location ../html/profile.php');


        } else {
            header('Location: ../html/profile.php?photo');
        }
    } else {
        header('Location: ../html/profile.php?pas photo');
    }

}
if(isset($_FILES['background']) AND !empty($_FILES['background']['name'])) {


    $extensionValides = array('jpg', 'jpeg', 'gif', 'png');

    $extensionUpload = strtolower(substr(strrchr($_FILES['background']['name'], '.'), 1));
    if (in_array($extensionUpload, $extensionValides)) {
        $path = $_FILES['background']['tmp_name'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $getPicture = $dbh->prepare('SELECT * FROM profile WHERE id_user = :id');
        $getPicture->execute(array(
            'id' => $_SESSION['id']
        ));
        $pic = $getPicture->fetchAll();
        $_SESSION['picture_background'];
        if ($getPicture->rowCount() == 0) {
            $id = $_SESSION['id'];
            $insertprofil = $dbh->prepare("INSERT INTO profile(id_user,background_url) VALUES(:id,:url)");
            $insertprofil->execute(array(
                'id' => $id,
                'url' => $base64
            ));
        } else {
            $pictureprofil = $dbh->prepare('UPDATE profile SET background_url = :url WHERE id_user = :id');
            $pictureprofil->execute(array(
                'url' => $base64,
                'id' => $_SESSION['id']
            ));

        }
        $_SESSION['picture_background'] = $base64;

        header('location ../html/profile.php');


    } else {
        header('Location: ../html/profile.php?photo');
    }


}
if (!empty($_POST['bio'])){
    $verifexist = $dbh ->prepare('SELECT * FROM profile WHERE id_user = :id');
    $verifexist ->execute(array(
        'id' => $_SESSION['id']
    ));
    $bio = htmlspecialchars($_POST['bio']);
    $getbio = $verifexist ->fetchAll();
    if ($verifexist -> rowCount() == 0){
        $createProfile = $dbh ->prepare('INSERT INTO profile(id_user,bio) VALUES(:id,:bio)');
        $createProfile ->execute(array(
            'id' =>$_SESSION['id'],
            'bio' => $bio
        ));
        $_SESSION['bio'] = $getbio[0]['bio'];
    }else{
        $updteProfile = $dbh ->prepare('UPDATE profile SET bio = :bio WHERE id_user = :id ');
        $updteProfile -> execute(array(
            'bio' => $bio,
            'id' => $_SESSION['id']
        ));
        $_SESSION['bio'] = $getbio[0]['bio'];
    }
}

if (!empty($_POST['loca'])){
    $veriflocaexist = $dbh ->prepare('SELECT * FROM profile WHERE id_user = :id');
    $veriflocaexist ->execute(array(
        'id' => $_SESSION['id']
    ));
    $loca = htmlspecialchars($_POST['loca']);
    $getloca = $veriflocaexist ->fetchAll();
    if ($veriflocaexist -> rowCount() == 0){
        $createProfileloca = $dbh ->prepare('INSERT INTO profile(id_user,location) VALUES(:id,:loca)');
        $createProfileloca ->execute(array(
            'id' =>$_SESSION['id'],
            'loca' => $loca
        ));
        $_SESSION['loca'] = $getloca[0]['location'];
    }else{
        $updteProfile = $dbh ->prepare('UPDATE profile SET location = :loca WHERE id_user = :id ');
        $updteProfile -> execute(array(
            'loca' => $loca,
            'id' => $_SESSION['id']
        ));
        $_SESSION['loca'] = $getloca[0]['location'];
    }
}



