<?php

session_start();

include_once 'includes/utils.php';
include_once "includes/classes.php";
include_once "includes/secu.php";
include_once 'includes/front_classes.php';

Connexion::verify_not_connected("");
      

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $champs = array('username', 'password','email');

    $res = Utilitaires::validateur_post($champs);
    $erreur = $res[0];
    $raison = $res[1];

    //print_r($res);
    //die();

    if(!$erreur)
    {
        $donnees = array('username' => $_POST["username"], "password"=>$_POST["password"], "email"=>$_POST["email"], "type"=>1);
        $user = Utilisateur::creer($donnees);
        if($user)
        {
            $mode = "success";
        }
        else
        {
            $mode = "signup";
            $donnees = $_POST;
        }
    }
    else{
        $mode = "signup";
        $donnees = $_POST;
        $donnees["error"] = $raison;
    }
}
elseif($_SERVER["REQUEST_METHOD"] === "GET")
{
    $mode = "signup";
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
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/templatemo_style.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
   
    <meta property="og:title" content="COMSAS"/>
    <meta property="og:description" content="Computer Science Association"/>
    <meta property="og:image" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/img/affiche1-mod.jpg' ?>"/>
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
    
    <main>
    <div >
        <div class="row center">
            <?php
                if($mode == "signup")
                {
                    AffichUtilisateur::creer($donnees);
                }
                elseif ($mode == "success")
                {
                    AffichUtilisateur::succes();
                }

            ?>
        </div>
        
    </div>
    </main>

   
    <footer class="navbar-fixed-bottom">
        <div class="row ">
           
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>              