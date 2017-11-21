<?php

session_start();

include_once 'includes/utils.php';
include_once "includes/classes.php";
include_once "includes/secu.php";
include_once 'includes/front_classes.php';

Connexion::verify_not_connected("");


if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $champs = array('username', 'password');

    $res = Utilitaires::validateur_post($champs);
    $erreur = $res[0];
    $raison = $res[1];

    //print_r($res);
    //die();

    if(!$erreur)
    {
        $user = Connexion::authenticate($_POST);
        if($user)
        {
            $mode = "success";
        }
        else
        {
            $mode = "connect";
            $donnees = $_POST;
        }
    }
    else{
        $mode = "connect";
        $donnees = array();
    }
}
elseif($_SERVER["REQUEST_METHOD"] === "GET")
{
    $mode = "connect";
    $donnees = array();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="comsas">
    <meta name="author" content="Comsas">

    <title>COMSAS - Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta property="og:title" content="COMSAS"/>
    <meta property="og:description" content="Computer Science Association"/>
    <meta property="og:image" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/img/affiche1-mod.jpg' ?>"/>
</head>

<body>
    <nav>
        <div class="nav-wrapper black lighten-1">
            <a href="/" class="brand-logo">ComSAs</a>
            <ul class="right hide-on-med-and-down" id="nav-mobile">
                <li class=""><a href="/signup.php">Inscription</a></li>
                <li class="active grey"><a href="/login.php">Connexion</a></li>
                <li><a href="/partner.php">Partenaires</a></li>
                <li><a href="/article.php">Articles</a></li>
                <li><a href="/projet.php">Projets</a></li>
                <li><a href="/cours.php">Cours</a></li>
            </ul>
        </div>
    </nav>

    <main>
    <div class="container">
        <div class="row center">
            <?php 
                if($mode == "connect")
                {
                    AffichConnexion::authenticate($donnees);
                }
                elseif ($mode == "success") {
                    AffichConnexion::succes();
                }


            ?>

        </div>
        
    </div>
    </main>

    <footer>
        <div class="row black lighten-1 white-text">
            <div class="col s6">
                <div class="row">
                    <div class="col s12 align">
                        <h5 class="center red-text darken-3-text 16">Contacts</h5>
                        <p>E-mail: <a href="comsas@gmail.com">comsas@gmail.com</a></p>
                        <p>Tel: 693 138 363 / 695 660 689</p>
                        <p>Telegram: <a href="https://t.me/joinchat/Cq1P1EOj1KQLkbOxIIAAPA">COMSAS PUBLIC</a></p>
                        <p>Facebook: <a href="https://www.facebook.com/groups/159019330791993/">COMSAS</a></p>
                    </div>
                    <div class="divider"></div>
                    <div class="col s12 center footer-copyright">Copyright COMSAS 2017</div>

                </div>
            </div>
            <div class="col s6">
                <h5 class="center red-text darken-3-text">Calendrier</h5>
            </div>
        </div>
    </footer>
</body>

</html>