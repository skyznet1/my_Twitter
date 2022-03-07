<?php
include '../php/conn.php';
if ($_SESSION['logged'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Home tweet</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/dropup.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/favicon.png"/>
        <link rel="stylesheet" href="../css/fontAwesome/css/all.css">
    </head>
    <body>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-2 text-start left-nav" id="left-nav">
            <i class="fab fa-twitter mt-2 fs-2 text-start p-2"></i>
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
                <button class="btn btn-outline-primary tweeter-btn mt-2" id="tweeter-btn">Tweeter</button>
            </div>

            <a id="Deconnexion">
                <div class="nav-elems">
                    <div class="tendancesContent p-3 d-flex align-item-center">
                        <div class="d-flex align-item-center">
                            <img class="rounded-circle align-text-sub me-1 p-2 avatar"
                                 src="<?php if ($_SESSION['picture'] !== NULL) {
                                     echo $_SESSION['picture'];
                                 } else {
                                     echo '../images/favicon.png';
                                 } ?>" width="52px"
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
        <main class="col-lg-4 deletePadingForRow">
            <div class="text-start mt-2 border-bottom">
                <form method="post" id="tweet-form">
                    <span class="fw-bold accueil ms-2">Accueil</span>
                    <div class="mt-3 ms-2">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar"
                             src="<?php if ($_SESSION['picture'] !== NULL) {
                                 echo $_SESSION['picture'];
                             } else {
                                 echo '../images/favicon.png';
                             } ?>" width="64px">
                        <textarea class="w-75" autocomplete="off" maxlength="140" minlength="1"
                                  placeholder="Quoi de neuf ?" name="tweet-msg" id="postTweet"></textarea>
                        <img src="#" alt="" id="image" style="max-width: 200px; margin-top: 20px;">
                    </div>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row ms-5">
                            <input type="file" name="avatar" onchange="previewPicture(this)" placeholder="photo profile"
                                   id="PhotoTweet" class="d-none">
                            <i class="fas fa-photo-video btn-text-area me-2 ms-2" id="openPhotoTweet"></i>
                            <i class="fas fa-ad btn-text-area me-2 ms-2"></i>
                            <i class="fas fa-stream btn-text-area me-2 ms-2"></i>
                            <i class="far fa-smile btn-text-area me-2 ms-2" id="emoji"></i>
                            <i class="far fa-calendar-check btn-text-area me-2 ms-2"></i>
                            <i class="fas fa-map-marker-alt btn-text-area me-2 ms-2"></i>
                        </div>
                        <div class="text-end me-3 mb-3  d-flex justify-content-end">
                            <progress-ring stroke="4" radius="20" progress="0" data-progress=""
                                           id="teste"></progress-ring>
                            <button class="btn tweeter-btn tweeter-btn-alt" name="tweet">Tweeter</button>
                        </div>
                    </div>
                </form>
            </div>


            <form method="post" id="likes">
                <div id="response">
                </div>
            </form>
            <input type="hidden" id="pageno" value="0">
            <img id="loader" src="../images/30.svg">


        </main>

        <div class="col-lg-3">
            <form method="post" id="searchForm">
                <div class="mt-1 inputSearch text-start">
                    <label class="fix-mac">
                        <i class="fas fa-search p-1"></i>
                        <input type="text" class="inputSearchBorder" placeholder="Recherche sur Twitter" name="search">
                        <input type="submit" class="d-none">
                    </label>
            </form>
        </div>


        <div class="mt-3 tendancesBox text-start">
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
                    <span class="d-flex tendancesReasons" id="T1-1">#Amour</span>
                    <span class="tendancesText" id="T1-2">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText" id="T2">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                    <span class="d-flex tendancesReasons" id="T2_1">#Metallica</span>
                    <span class="tendancesText" id="T2_2">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText" id="T3">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                    <span class="d-flex tendancesReasons" id="T3_1">#AC/DC</span>
                    <span class="tendancesText" id="T3_2">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <span class="d-flex seeMore">Voir plus</span>
                </div>
            </div>
        </div>

        <div class="mt-3 tendancesBox text-start">
            <div class="p-3">
                <span class="tendancesHead p-3 mb-3">Suggestions</span>
            </div>
            <div class="tendancesContent p-3 d-flex align-item-center">
                <div class="d-flex align-item-center">
                    <img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png"
                         width="64px">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="tendancesReasons">Corentin Collery</span>
                        <span class="tendancesText">@Corentin_Collery</span>
                    </div>
                </div>
                <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
            </div>
            <div class="tendancesContent p-3 d-flex align-item-center">
                <div class="d-flex align-item-center">
                    <img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png"
                         width="64px">
                    <div class="d-flex flex-column justify-content-center">
                        <span class="tendancesReasons">Corentin Collery</span>
                        <span class="tendancesText">@Corentin_Collery</span>
                    </div>
                </div>
                <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
            </div>
            <div class="tendancesContent p-3 d-flex align-item-center">
                <div class="d-flex align-item-center">
                    <img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png"
                         width="64px">
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

    </body>
    </html>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/darkmode.js"></script>
    <script src="../js/jquery.inview-master/jquery.inview.js"></script>
    <script src="../js/dropup.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/comment.js"></script>
    <script src="../js/vanillaEmojiPicker.js"></script>
    <script>
        new EmojiPicker({
            trigger: [
                {
                    selector: '#emoji',
                    insertInto: ['#postTweet'] // '.selector' can be used without array
                },
            ],
            closeButton: true,
        });
    </script>
    <script type="text/javascript">
        // L'image img#image
        var image = document.getElementById("image");

        // La fonction previewPicture
        var previewPicture = function (e) {

            // e.files contient un objet FileList
            const [picture] = e.files

            // "picture" est un objet File
            if (picture) {
                // On change l'URL de l'image
                image.src = URL.createObjectURL(picture)
            }
        }
    </script>

    <script>
        $("#searchForm").submit(function (e) {
            e.preventDefault(); //empêcher une action par défaut
            let form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
            $.ajax({
                url: '../php/search.php',
                type: 'POST',
                data: form_data
            }).done(function (response) {
                window.location.href = '../html/searchUser.php?' + response
            })
        })
    </script>

    <script>
        $("#tweet-form").submit(function (e) {
            e.preventDefault(); //empêcher une action par défaut
            let form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
            $.ajax({
                type: 'POST',
                url: '../php/tweet.php',
                data: new FormData(this),
                processData: false,
                contentType: false
            }).done(function (response) {
                window.location = response
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('#loader').on('inview', function (event, isInView) {
                if (isInView) {
                    let nextPage = parseInt($('#pageno').val()) + 1;
                    $.ajax({
                        type: 'POST',
                        url: '../php/pagination.php',
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