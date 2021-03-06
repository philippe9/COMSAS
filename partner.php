<?php

session_start();

include_once 'includes/utils.php';
include_once "includes/classes.php";
include_once "includes/secu.php";
include_once 'includes/front_classes.php';
      

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    if(isset($_POST["mode"]) && $_POST["mode"]=="add")
    {
        $mode = "add";

        $champs = array('nom', 'annee','raison', 'role', 'logo');

        $res = Utilitaires::validateur_post($champs);
        $erreur = $res[0];
        $raison = $res[1];

        if(!$erreur)
        {
            $donnees = $_POST;
            $donnees["createur"] = $_SESSION["user_id"];
            $part = Partenaire::creer($donnees);
        }
        else
        {
            $donnees = $_POST;
            $donnees["error"] = $raison;
        }

    }
    else{
        $mode = "list";
    }
}
elseif($_SERVER["REQUEST_METHOD"] === "GET")
{
    if(isset($_GET["mode"]) && $_GET["mode"]=="add")
    {
        $mode = "add";
        $donnees = array();
    }
    else
    {
        $mode = "list";
        $donnees = array();
    }    
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="comsas">
    <meta name="author" content="Comsas">

    <title>Partenaires - COMSAS</title>
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/templatemo_style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/slide.css">
    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta property="og:description" content="Computer Science Association"/>
    <meta property="og:image" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/img/affiche1-mod.jpg' ?>"/>
</head>

<body>
   <nav class="navbar navbar-inverse no-margin">
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
        
    </nav>

    <div class="carousel carousel-slider">
        <img src="img/logo1.jpg" class="img-responsive"/>
    </div>
    
    <main>
    <div class="container">
        <div class="row center">
            <?php
                if($mode =="add")
                {
                    AffichPartenaire::creer($donnees);   
                }
                elseif ($mode == "list") {
                    AffichPartenaire::lister($donnees);
                }


            ?>
        </div>
        
    </div>
    </main>

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
            </div>
           
        </div>
    </footer>

    <script type="text/javascript">
        $(document).ready(function() {
                $('select').material_select();
            });

        $(document).ready(function(){
          $('.carousel').carousel();
        });
    </script>
</body>

</html>              