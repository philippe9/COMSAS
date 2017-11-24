<?php

session_start();

include_once 'includes/utils.php';
include_once "includes/classes.php";
include_once "includes/secu.php";
include_once 'includes/front_classes.php';

Connexion::verify_connected("login.php");

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    if(isset($_POST["mode"]) && $_POST["mode"]=="add")
    {
        $mode = "add";

        $champs = array('titre', 'resume','corps');

        $res = Utilitaires::validateur_post($champs);
        $erreur = $res[0];
        $raison = $res[1];

        if(!$erreur)
        {
            $donnees = $_POST;
            $donnees["posteur"] = $_SESSION["user_id"];
            $art = Article::creer($donnees);

            if($art)
                $mode = "list";
            else
                die();
        }
        else
        {
            $donnees = $_POST;
            $donnees["error"] = $raison;
            $titre = "Ajouter un article - COMSAS";
        }

    }
    else
        unset($mode);
}
elseif($_SERVER["REQUEST_METHOD"] === "GET")
{
    if(isset($_GET["mode"]) && $_GET["mode"]=="add")
    {
        $mode = "add";
        $donnees = array();
        $titre = "Ajouter un article - COMSAS";
    }
    elseif(isset($_GET["mode"]) && $_GET["mode"]=="view")
    {
        $mode = "view";
        $res = Utilitaires::validateur_get(array("id"));
        $erreur = $res[0];
        $raison = $res[1];

        if(!$erreur)
        {
            $art = AffichArticle::get($_GET);
            if($art)
            {
                $titre = "$art->titre - COMSAS";
            }
            else
                unset($mode);
        }
        else
            unset($mode);
        
    }
    else
    {
        unset($mode);
    }    
}

if(!isset($mode))
{
    $mode = "list";
    $donnees = array();
    $titre = "Liste des articles - COMSAS";
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="comsas">
    <meta name="author" content="Comsas">

    <title><?php echo $titre ?></title>

    <!--Google Fonts-->


    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/templatemo_style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/slide.css">
        <script src="js/calendar.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse no-margin">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="/">COMSAS</a>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="propos.php">A propos</a></li>
                <li><a href="/signup.php">Inscription</a></li>
                <li><a href="/login.php">Connexion</a></li>
                <li><a href="/partner.php">Partenaires</a></li>
                <li><a href="/article.php">Articles</a></li>
                <li><a href="/project.php">Projets</a></li>
                <li><a href="/cours.php">Cours</a></li>
            </ul>
        </div>
    </nav>
   <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12">
                <img src="img/logo1.jpg" class="img-responsive" />
            </div>
        </div>
    </div>
    <main class="container">
        <div class="row center">
            <?php
                if($mode == "add")
                {
                    AffichCours::creer($donnees);
                }
                elseif($mode == "view")
                {
                    $art->afficher();
                }
                elseif($mode == "list")
                {
                    AffichArticle::lister($donnees);
                }


            ?>
            
        </div>
    </main>


    <?php /*
    if(isset($one_page)){
        echo '<section class="section-projet">';
        echo '<div class="row">';
        echo '    <h2>lire aussi</h2>';
        echo '    <p class="comp-tell">';
        echo '    </p>';
        echo '</div>';
        echo '<div class="row">';
        lister_articles(0,3);
        echo '</div>';

        echo '</section>';
    }*/
    ?>

  <footer class="footer">
        <div class="row">
           
            <div class="col-sm-6">
                
                  
                        <h5 class="center red-text darken-3-text 16">Contacts</h5>
                        <p>E-mail: <a href="comsas@gmail.com">comsas@gmail.com</a></p>
                        <p>Tel: 693 138 363 / 695 660 689</p>
                        <p>Telegram: <a href="https://t.me/joinchat/Cq1P1EOj1KQLkbOxIIAAPA">COMSAS PUBLIC</a></p>
                        <p>Facebook: <a href="https://www.facebook.com/groups/159019330791993/">COMSAS</a></p>
                    
                    <div class="divider"></div>
                    <div class="col-sm-12">Copyright COMSAS 2017</div>

               
            </div>
                       
            <div class="col-sm-6">
                <h5 class="center red-text darken-3-text">Calendrier</h5>
                <p>&nbsp</p>
<div id="show_calendar">&nbsp;</div>
<div id="current_month">&nbsp;</div>
            </div>
           
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>

    <?php if($mode=="add" || $mode=="mod"){
        echo "<script src='js/tinymce.min.js'></script>";
        echo "<script src='js/tiny.js'></script>";
    }
    ?>
    
   
</body>

</html>
