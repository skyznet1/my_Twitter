<?php
include '../php/conn.php';
if ($_SESSION['logged'] == true) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Paramètres</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/dropup.css" rel="stylesheet">
        <link href="../css/settings.css" rel="stylesheet">
        <link href="../css/modal.css" rel="stylesheet">
        <link href="../images/favicon.png" rel="icon" type="image/png"/>
        <link href="../css/fontAwesome/css/all.css" rel="stylesheet">
    </head>
    <body>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-2 text-start left-nav" id="left-nav">
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
                            <a href="#" class="separation"><i class="fas fa-signal me-2"></i> Statistiques</a>
                            <a href="../html/settings.php"><i class="fas fa-cog me-2"></i> Paramètres et confidentialité</a>
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
                        <span class="fw-bold accueil ms-2">Paramètres</span>
                        <ul class="mt-3 p-0">
                            <li class="p-3 active d-flex justify-content-between align-item-center"><a href="#">Votre
                                    compte</a> <i class="fas fa-arrow-right"></i></li>
                            <li class="p-3 d-flex justify-content-between align-item-center"><a href="#">Twitter
                                    blue</a> <i
                                        class="fas fa-arrow-right"></i></li>
                            <li class="p-3 d-flex justify-content-between align-item-center"><a href="#">Sécurité et
                                    accès
                                    au compte</a> <i class="fas fa-arrow-right"></i></li>
                            <li class="p-3 d-flex justify-content-between align-item-center"><a href="#">Confidentialité
                                    et
                                    sécurité</a> <i class="fas fa-arrow-right"></i></li>
                            <li class="p-3 d-flex justify-content-between align-item-center"><a
                                        href="#">Notification</a> <i
                                        class="fas fa-arrow-right"></i></li>
                            <li class="p-3 d-flex justify-content-between align-item-center" id="accessibilite"
                                onclick="showColor()"><a
                                        href="#">Accessibilité,
                                    affichage et langues</a> <i class="fas fa-arrow-right"></i></li>
                            <li class="p-3 d-flex justify-content-between align-item-center"><a href="#">Ressources
                                    supplémentaires</a> <i class="fas fa-arrow-right"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <div class="col-lg-4 deletePadingForRow" id="monCompte">
            <div class="mt-3 text-start">
                <span class="fw-bold accueil ms-2">Votre compte</span>
                <div class="mt-2 text-start ms-2">
                    <span class="pageDescription">Affichez les informations de votre compte, téléchargez une archive de vos données et découvrez les options de désactivation de votre compte.</span>
                </div>
                <ul class="left-part p-0 w-100">
                    <li class="p-3 d-flex justify-content-between align-item-center marg-auto"
                        onclick="showCompteInfo()">
                        <i class="fas fa-user p-2"></i>
                        <a href="#">Informations du compte <span class="d-flex flex-column descriptionText">Affichez les informations de votre compte, comme votre numéro de téléphone et votre adresse email.</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>

                    <li class="p-3 d-flex justify-content-between align-item-center marg-auto"
                        data-bs-target="#modalPassword"
                        data-bs-toggle="modal">
                        <i class="fas fa-key p-2"></i>
                        <a href="#">Changez de mot de passe <span class="d-flex flex-column descriptionText">Changez de mot de passe à tout moment.</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-3 d-flex justify-content-between align-item-center">
                        <i class="fas fa-download p-2"></i>
                        <a href="#">Téléchargez une archive de vos données <span
                                    class="d-flex flex-column descriptionText">Obtenez des informations sur le type de données stockées pour votre compte.</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-3 d-flex justify-content-between align-item-center">
                        <i class="fas fa-users p-2"></i>
                        <a href="#">Equipes TweetDeck <span class="d-flex flex-column descriptionText">Invitez tout le monde à tweeter depuis ce compte en utilisant la fonctionnalité Équipes de TweetDeck.</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class=" d-flex justify-content-between align-item-center" id="deleteUser">
                        <form action="" method="post"
                              class="p-3 d-flex justify-content-between align-item-center w-100">
                            <i class="fas fa-heart-broken p-2"></i>
                            <a href="#"> Désactivez le compte <span class="d-flex flex-column descriptionText">Découvrez comment désactiver votre compte.</span></a>
                            <i class="fas fa-arrow-right marg-left-auto"></i>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-lg-4 deletePadingForRow d-none dropDownDivInfo" id="monCompteInfo">
            <div class="mt-3 text-start">
                <div class="p-2">
                    <a href="../html/settings.php"><i class="fas fa-arrow-left"></i></a>
                    <span class="fw-bold accueil ms-2">Informations du compte</span>
                </div>
                <ul class="left-part p-0 w-100">
                    <li class="p-2 d-flex justify-content-between align-item-center marg-auto">
                        <a href="#">Nom d'utilisateur <span
                                    class="d-flex flex-column descriptionText settingCompteDesc">@<?= $_SESSION['firstname'] . $_SESSION['lastname'] ?></span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>

                    <li class="p-2 d-flex justify-content-between align-item-center marg-auto"
                        data-bs-target="#modalTel" data-bs-toggle="modal">
                        <a href="#">Téléphone <span
                                    class="d-flex flex-column descriptionText settingCompteDesc"><?php if (isset($_SESSION['phone'])) {
                                    echo $_SESSION['phone'];
                                } ?></span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>

                    <li class="p-2 d-flex justify-content-between align-item-center" data-bs-target="#modalEmail"
                        data-bs-toggle="modal">
                        <a href="#">Email <span
                                    class="d-flex flex-column descriptionText settingCompteDesc"><?= $_SESSION['email'] ?></span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center separation">
                        <a href="#">Certifié <span
                                    class="d-flex flex-column descriptionText settingCompteDesc">Non</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center">
                        <a href="#">Tweets protégés <span
                                    class="d-flex flex-column descriptionText settingCompteDesc">Non</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center separation">
                        <a href="#">Création du compte <span
                                    class="d-flex flex-column descriptionText settingCompteDesc"><?= $_SESSION['date'] ?></span><span
                                    class="d-flex flex-column descriptionText">IP (osef)</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center">
                        <a href="#">Pays <span
                                    class="d-flex flex-column descriptionText settingCompteDesc">France</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center">
                        <a href="#">Langues <span class="d-flex flex-column descriptionText settingCompteDesc">Français,anglais</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center">
                        <a href="#">Sexe <span class="d-flex flex-column descriptionText settingCompteDesc">Homme</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center separation">
                        <a href="#">Date de naissance <span
                                    class="d-flex flex-column descriptionText settingCompteDesc"><?= $_SESSION['birthdate'] ?></span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center">
                        <a href="#">Âge <span
                                    class="d-flex flex-column descriptionText settingCompteDesc"></span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>
                    <li class="p-2 d-flex justify-content-between align-item-center">
                        <a href="#">Automatisation <span
                                    class="d-flex flex-column descriptionText settingCompteDesc">Aucune</span></a>
                        <i class="fas fa-arrow-right marg-left-auto"></i>
                    </li>

                </ul>
            </div>

        </div>
        <div class="col-lg-4 deletePadingForRow border-right d-none" id="changeTheme">
            <div class="mt-3 text-start">
                <div class="p-2">
                    <a href="../html/settings.php"><i class="fas fa-arrow-left"></i></a>
                    <span class="fw-bold accueil ms-2">Afficher</span>
                    <div class="mt-2 text-start ms-2">
                        <span class="pageDescription">Gérez la taille de police, la couleur et l'arrière-plan. Ces paramètres affectent tous les comptes Twitter sur ce navigateur.</span>
                    </div>
                </div>
                <ul class="left-part p-0 w-100">
                    <div class="text-align-unset d-flex mt-2 separation mb-2">
                        <div class="text-start ms-3 d-inline-block">
                            <img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png"
                                 width="64px">
                        </div>
                        <div class="mt-2 text-start">
                            <a class="tweetUser" href="#">Twitter</a> @
                            <span class="tweetUsernameId">@Twitter</span>
                            <span class="tweetDot">.</span>
                            <a class="tweetTime" href="#">10 mins</a>
                            <span class="d-block text-start tweetContent">Twitter repose sur de courts messages appelés Tweets, comme celui-ci, qui peuvent comprendre des photos, des vidéos, des liens, du texte, des hashtags et des mentions telles que <a
                                        href="#" class="idPpl">@Twitter</a></span>
                        </div>
                    </div>
                    <span class="p-2 d-flex justify-content-between align-item-center">
                    <span class="fw-bold accueil ms-2">Couleurs</span>
                </span>
                    <span class="p-2 d-flex justify-content-between align-item-center separation">
                    <button class="btn rounded-circle btn-blue"><i class="fas fa-check selectedColor"></i></button>
                    <button class="btn rounded-circle btn-yellow"></button>
                    <button class="btn rounded-circle btn-homo"></button>
                    <button class="btn rounded-circle btn-mauve"></button>
                    <button class="btn rounded-circle btn-orange"></button>
                    <button class="btn rounded-circle btn-green"></button>
                </span>

                    <span class="p-2 d-flex justify-content-between align-item-center">
                    <span class="fw-bold accueil ms-2">Arrière-plan</span>
                </span>
                    <span class="p-2 d-flex justify-content-center align-item-center separation">
                    <button class="btn me-2 btnDefaut" id="whitetheme">Par défaut</button>
                    <button class="btn me-2 btnBlue" id="bluetheme">Bleu foncé</button>
                    <button class="btn btnBlack me-2" id="darktheme">Noir</button>
                </span>

                </ul>
            </div>
        </div>
    </div>


    <!--Modal Compte TELEPHONE-->

    <div class="modal fade" data-bs-backdrop="static" id="modalTel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form id="login" method="post" action="../php/updateUser.php">
                    <div class="modal-header">
                        <h5 aria-labelledby="modal title" class="modal-title text-center col-12">
                            <button aria-label="Close" class="btn-close btn-lg btn-close-white margin-closebtn"
                                    data-bs-dismiss="modal"></button>
                            <i class="fab fa-twitter twitterLogoTopRight d-block mb-3"></i>
                        </h5>
                    </div>
                    <div aria-describedby="content" class="modal-body">
                        <h2>Téléphone</h2>
                        <input id="updateTel" name="updateTel" placeholder="téléphone" type="tel" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" name="btnTel" type="submit" value="success">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Modal Compte EMAIL-->


    <div class="modal fade" data-bs-backdrop="static" id="modalEmail">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form id="login" method="post" action="../php/updateUser.php">
                    <div class="modal-header">
                        <h5 aria-labelledby="modal title" class="modal-title text-center col-12">
                            <button aria-label="Close" class="btn-close btn-lg btn-close-white margin-closebtn"
                                    data-bs-dismiss="modal"></button>
                            <i class="fab fa-twitter twitterLogoTopRight d-block mb-3"></i>
                        </h5>
                    </div>
                    <div aria-describedby="content" class="modal-body">
                        <h2>Email</h2>
                        <input id="updateEmail" name="updateEmail" placeholder="<?= $_SESSION['email'] ?>" type="email"
                               required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" name="btnEmail" type="submit" value="success">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Modal Compte Password-->

    <div class="modal fade" data-bs-backdrop="static" id="modalPassword">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form id="login" method="post" action="../php/updateUser.php">
                    <div class="modal-header">
                        <h5 aria-labelledby="modal title" class="modal-title text-center col-12">
                            <button aria-label="Close" class="btn-close btn-lg btn-close-white margin-closebtn"
                                    data-bs-dismiss="modal"></button>
                            <i class="fab fa-twitter twitterLogoTopRight d-block mb-3"></i>
                        </h5>
                    </div>
                    <div aria-describedby="content" class="modal-body">
                        <h2>Password</h2>
                        <input id="updatePassword" name="updatePassword" placeholder="Password"
                               type="password"
                               required>
                        <input id="updatePasswordConfirm" name="updatePasswordConfirm" placeholder="Confirm password"
                               type="password"
                               required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" name="btnEmail" type="submit" value="success">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>
    </html>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/dropupInfo.js"></script>
    <script src="../js/delete.js"></script>
    <script src="../js/jquery.inview-master/jquery.inview.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/darkmode.js"></script>
    <script crossorigin="anonymous"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $("#deleteUser").click(function (e) {
            let message = prompt('Voulez-vous vraiment supprimer votre compte ? Écrire : SUPPRIMER')

            switch (message) {
                case "SUPPRIMER":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataOUI = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/delete.php',
                        type: 'POST',
                        data: form_dataOUI
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
                case "supprimer":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataOui = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/delete.php',
                        type: 'POST',
                        data: form_dataOui
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
                case "Supprimer":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataoui = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/delete.php',
                        type: 'POST',
                        data: form_dataoui
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
            }


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