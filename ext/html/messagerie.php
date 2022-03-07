<?php
include '../php/conn.php';
if ($_SESSION['logged'] == true) {
    $mes = $dbh->prepare('SELECT id_sender,id_receiver,firstname,lastname,u.id as "id_user" FROM direct_messages INNER JOIN users u WHERE u.id = direct_messages.id_sender AND id_receiver = :id');
    $mes->execute(array(
        'id' => $_SESSION['id']
    ));

foreach ($mes

         as $arr) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Messagerie</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/dropup.css" rel="stylesheet">
        <link href="../css/messages.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/favicon.png"/>
        <link rel="stylesheet" href="../css/fontAwesome/css/all.css">
    </head>
    <body>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-2 text-start  left-nav" id="left-nav">
            <i class="fab fa-twitter mt-2 fs-2 text-start p-2 logo-Twiter"></i>
            <div class="text-start nav-icons-color mt-4 flex-column d-flex width-fit">
                <a class="mb-3 me-2 nav-elems p-2 align-item-center d-flex" href="../html/index.php">
                    <i class="fas fa-home fs-2 text-start me-4"></i>
                    <span class="nav-text">Accueil</span>
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#">
                    <i class="fas fa-hashtag mt-2 fs-2 text-start me-4"></i>
                    <span class="nav-text">Explorer</span>
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#">
                    <i class="fas fa-bell mt-2 fs-2 text-start me-4"></i>
                    <span class="nav-text">Notifications</span>
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="../html/messagerie.php">
                    <i class="fas fa-envelope mt-2 fs-2 text-start me-4"></i>
                    <span class="nav-text">Messages</span>
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#" id="signets">
                    <i class="fas fa-bookmark mt-2 fs-2 text-start me-4"></i>
                    Signets
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#" id="listes">
                    <i class="fas fa-list-alt mt-2 fs-2 text-start me-4"></i>
                    Listes
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="../html/profile.php" id="profil">
                    <i class="fas fa-user mt-2 fs-2 text-start me-4"></i>
                    Profil
                </a>
                <div class="mb-3 me-2 nav-elems p-2" id="plus">
                    <i class="fas fa-ellipsis-h mt-2 fs-2 text-start me-4"></i>
                    <span class="align-text-super" id="dropup">Plus</span>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="#"><i class="fas fa-comment-alt me-2"></i> Sujets</a>
                            <a href="#"><i class="fas fa-bolt me-2"></i> Moments</a>
                            <a href="#"><i class="fas fa-newspaper me-2"></i> Newsletters</a>
                            <a href="#"><i class="fas fa-rocket me-2"></i> Twitter pour les pros</a>
                            <a href="#"><i class="fas fa-share-square me-2"></i> Publicités Twitter</a>
                            <a class="separation" href="#"><i class="fas fa-signal me-2"></i> Statistiques</a>
                            <a href="../html/settings.php"><i class="fas fa-cog me-2"></i> Paramètres et
                                confidentialité</a>
                            <a href="#"><i class="fas fa-question me-2"></i> Centre d'assistance</a>
                            <a href="#"><i class="fas fa-edit me-2"></i> Afficher</a>
                            <a href="#"><i class="fas fa-sort me-2"></i> Raccourcis clavier</a>

                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-primary tweeter-btn mt-2" id="tweetBtn">Tweeter</button>
            </div>
            <a id="Deconnexion">
                <div class="nav-elems">
                    <div class="tendancesContent p-3 d-flex align-item-center">
                        <div class="d-flex align-item-center">
                            <img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png" width="52px"
                                 alt="pic">
                            <div class="d-flex flex-column justify-content-center">
                                <span class="tendancesReasons"><?= $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></span>
                                <span class="tendancesText">@<?= $_SESSION['firstname'] . $_SESSION['lastname'] ?></span>
                            </div>
                        </div>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                </div>
            </a>
        </div>
        <main class="col-lg-3 deletePadingForRow">
            <div class="text-start mt-2">
                <div class="d-flex">
                    <div class="d-flex flex-column w-100">
                        <span class="fw-bold accueil ms-2">Messages</span>
                        <div class="mt-1 inputSearch text-start mt-4">
                            <label class="fix-mac w-100">
                                <i class="fas fa-search p-1"></i>
                                <input type="text" class="inputSearchBorder w-100"
                                       placeholder="Rechercher des personnes et des groupes">
                            </label>
                        </div>
                        <ul class="mt-3 p-0">
                            <input type="hidden" id="id_user" value="<?php if (!empty($_GET)) {
                                echo($_GET['id']);
                            }
                            ?>">
                            <div id="response2">
                            </div>
                            <input type="hidden" id="pageno2" value="0">
                            <img id="loader2" src="">
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <div class="col-lg-4 deletePadingForRow">
            <div class="d-flex ms-3 align-item-center">
                <a href="#">
                    <img src="../images/favicon.png" width="32px" height="32px" alt="profile" class="rounded-circle">
                </a>
                <div class="d-flex flex-column justify-content-center text-start ms-2">
                    <span class="fw-bold"><?= $arr['firstname'] . " " . $arr['lastname'] ?> </span>
                    <span class="descriptionText">@<?= $arr['firstname'] . $arr['lastname'] ?></span>
                </div>
            </div>
            <div class="d-block messageBox">
                <div id="response">
                </div>
                <input type="hidden" id="pageno" value="0">
                <img id="loader" src="">
            </div>
            <div class="mt-1 inputSearch text-start w-100">
                <form id="post_msg">
                    <input type="hidden" id="id_user" value="<?php if (!empty($_GET)) {
                        echo $_GET['id'];
                    } ?>">
                    <label class="fix-mac w-100">
                        <i class="fas fa-search p-1"></i>
                        <input type="text" class="inputSearchBorder" name="msg"
                               placeholder="Démarrer un nouveau message">
                        <i class="fas fa-paper-plane d-flex align-item-center sendMSG"></i>
                    </label>
                </form>
            </div>
        </div>
    </div>
    <?php }
    ?>
    </body>
    </html>

    <script src="../js/dropup.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.inview-master/jquery.inview.js"></script>
    <script>
        $("#post_msg").submit(function (e) {
            let id = document.getElementById('id_user').value
            e.preventDefault(); //empêcher une action par défaut
            let form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
            $.ajax({
                url: '../php/send_private_message.php?id=' + id,
                type: 'POST',
                data: form_data
            }).done(function (response) {
                window.location = response
            });
        });


    </script>
    <script>
        $(document).ready(function () {
            $('#loader2').on('inview', function (event, isInView) {
                if (isInView) {
                    var nextPage = parseInt($('#pageno2').val()) + 1;
                    $.ajax({
                        type: 'POST',
                        url: '../php/sender.php',
                        data: {pageno: nextPage},
                        success: function (data) {
                            if (data !== '') {
                                $('#response2').append(data);
                                $('#pageno2').val(nextPage);
                            } else {
                                $("#loader2").hide();
                            }
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            let id = document.getElementById('id_user').value
            $('#loader').on('inview', function (event, isInView) {
                if (isInView) {
                    let nextPage = parseInt($('#pageno').val()) + 1;
                    $.ajax({
                        type: 'POST',
                        url: '../php/user_mess.php?id=' + id,
                        data: {pageno: nextPage},
                        success: function (data) {
                            if (data !== '') {
                                $('#response').append(data);
                                $('#pageno').val(nextPage);
                            } else {
                                $("#loader").hide();
                            }
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $("#Deconnexion").click(function (e) {
            let message = prompt('Voulez-vous vraiment vous déconnecter ? Écrire : Oui/Non')

            switch (message) {
                case "OUI":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataOUI = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/logout.php',
                        type: 'POST',
                        data: form_dataOUI
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
                case "Oui":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataOui = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/logout.php',
                        type: 'POST',
                        data: form_dataOui
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
                case "oui":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataoui = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/logout.php',
                        type: 'POST',
                        data: form_dataoui
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
            }
        });
    </script>
    <?php
} else {
    header('location: login.html?error=yournotconnected');
    exit();
}
?>