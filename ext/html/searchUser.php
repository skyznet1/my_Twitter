<?php
include "../php/conn.php";
if ($_SESSION['logged'] == true) {

    $comment = $dbh->prepare("SELECT * from users WHERE id LIKE :id");
    $comment->execute(array(
        'id' => $_GET['id']
    ));
    $id_tweet = $_GET['id'];

    $userComment = $comment->fetchAll();


    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }
    // Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];
    echo $url;

    $str = preg_split('/[?]/', $url);
    var_dump($str[1]);

    if ($str) ;

    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Home tweet</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">

        <link href="../css/modal.css" rel="stylesheet">

        <link href="../css/modalProfile.css" rel="stylesheet">
        <link href="../css/dropup.css" rel="stylesheet">
        <link href="../images/favicon.png" rel="icon" type="image/png"/>
        <link href="../css/fontAwesome/css/all.css" rel="stylesheet">

    </head>
    <body class=>
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
                                <span class="tendancesText">@<?php /*= $_SESSION['firstname'] . $_SESSION['lastname'] */ ?></span>
                            </div>
                        </div>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                </div>
            </a>
        </div>
        <main class="col-lg-4 deletePadingForRow">
            <div class="text-start mt-2 border-bottom">
                <div class="d-flex">
                    <a href="../html/profile.php" class="fas fa-arrow-left p-3 d-flex arrowHover"></a>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-bold accueil ms-2"><?= $_GET['firstname'] . " " . $_GET['lastname'] ?></span>
                        <span class="accueil ms-2 userTweetPosted">@<?= $_SESSION['firstname'] . $_SESSION['lastname'] ?></span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <a class="tendancesContent w-50 p-2 " href="../html/abonnes.php">
                    <span>Abonnés</span>
                </a>
                <a class="tendancesContent w-50 p-2 activeTabs" href="../html/abonne.php">
                    <span>Abonné</span>
                </a>
            </div>

            <div id="response">
            </div>
            </form>
            <input type="hidden" id="pageno" value="0">
            <img id="loader" src="../images/30.svg">

        </main>
        <div class="col-lg-3" id="right-part">
            <div class="mt-1 inputSearch text-start">
                <label class="fix-mac">
                    <i class="fas fa-search p-1"></i>
                    <input class="inputSearchBorder" placeholder="Recherche sur Twitter" type="text">
                </label>
            </div>
            <div class="mt-3 tendancesBox text-start">
                <div class="p-3">
                    <span class="tendancesHead p-3 mb-3"> Tendances pour vous</span>
                    <i class="fas fa-cog settingsBtn"></i>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText" id="t1">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances"></i>
                    </div>
                    <span class="d-flex tendancesReasons" id="T1-1">#Technologie</span>
                    <span class="tendancesText" id="T1-2">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText" id="T2">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                    <span class="d-flex tendancesReasons" id="T2_1">#Technologie</span>
                    <span class="tendancesText" id="T2_2">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText" id="T3">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                    <span class="d-flex tendancesReasons" id="T3_1">#Technologie</span>
                    <span class="tendancesText" id="T3_2">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <span class="d-flex seeMore">Voir plus</span>
                </div>
            </div>

            <div class="mt-3 tendancesBox text-start">
                <div class="p-3">
                    <span class="tendancesHead p-3 mb-3">Suggestions</span>
                </div>
                <div class="tendancesContent p-3 d-flex align-item-center">
                    <div class="d-flex align-item-center">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="tendancesReasons">Corentin Collery</span>
                            <span class="tendancesText">@Corentin_Collery</span>
                        </div>
                    </div>
                    <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
                </div>
                <div class="tendancesContent p-3 d-flex align-item-center">
                    <div class="d-flex align-item-center">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="tendancesReasons">Corentin Collery</span>
                            <span class="tendancesText">@Corentin_Collery</span>
                        </div>
                    </div>
                    <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
                </div>
                <div class="tendancesContent p-3 d-flex align-item-center">
                    <div class="d-flex align-item-center">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="tendancesReasons">Corentin Collery</span>
                            <span class="tendancesText">@Corentin_Collery</span>
                        </div>
                    </div>
                    <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
                </div>
                <div class="tendancesContent p-3">
                    <span class="d-flex seeMore">Voir plus</span>
                </div>
            </div>
        </div>
    </div>


    <div aria-hidden="true" aria-labelledby="modalEditProfileLabel" class="modal fade" id="modalEditProfile"
         tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="btn-close ms-3" data-bs-dismiss="modal" type="button"></button>
                    <h5 class="modal-title ms-4">Éditer le profil</h5>
                    <button class="btn btn-save" type="button">Enregistrer</button>

                </div>
                <div class="modal-body">
                    <div>
                        <img alt="background" src="../images/wallpaper.jpeg" width="100%">
                        <div class="elemsInImg">
                            <i class="fas fa-camera me-3 p-1 changeImg"></i>
                            <i class="fas fa-times p-1 changeImg"></i>
                        </div>

                        <img alt="background" class="modalProfilePic" src="../images/creeper.webp">
                        <i class="fas fa-camera me-3 p-1 changeProflie"></i>

                        <div class="">
                            <input class="form-control" id="floatingInput" placeholder="name@example.com" type="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="text-center">
                            <textarea id="bio" placeholder="Bio">Bio</textarea>
                        </div>
                        <div class="mt-3">
                            <input class="form-control" id="Localisation" placeholder="Localisation" type="email">
                            <label for="Localisation">Localisation</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script crossorigin="anonymous"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/jquery.inview-master/jquery.inview.js"></script>
    <script src="../js/editprofile.js"></script>
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
    <script>
        $(document).ready(function () {
            $('#loader').on('inview', function (event, isInView) {
                if (isInView) {
                    let nextPage = parseInt($('#pageno').val()) + 1;
                    $.ajax({
                        type: 'POST',
                        url: '../php/follow.php',
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
    </body>
    </html>
    <?php
} else {
    header('location: login.html?error=yournotconnected');
    exit();
}
?>
