<?php 	include_once ('includes/connexiondb.inc');
		include_once('template/frontend.php');
        include_once ('includes/fonctions.inc');
        include_once "includes/classes.php";
        include_once "includes/front_classes.php";      

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="comsas">
    <meta name="author" content="Comsas">

    <title>COMSAS </title>

    <!--Google Fonts-->


    <!--CSS-->
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
<title>
    Comsas
</title>

<body>
	<?php  //print_fb_script(); ?>

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

    <div class="container-fluid">
        <section class="section-histoire">
            <div class="row text-center">
                <h1>Notre histoire </h1>
                <p class="">
                    The comsas is there to help you with any of your problems in the following
                    <br> Domains at cheap and affortable prices.!
                </p>
            </div>
            
        </section>

        <section class="section-vision">
            <div class="row text-center">
                    <h1>Notre vision</h1>
                    <p class="comp-tell">
                        Projets en cours de développement
                    </p>
            </div>
            
        </section>


        <section class="container-fluid section-equipe">
            <div class="row text-center">
                <h1>Notre équipe</h1>
                <p class="comp-tell">
                    Tous les tic et tac de la filiere info
                </p>
                 <div  class="col-lg-3" style="border:1px solid #666;border-radius:2%;margin-left:5%;padding-top:1%;">
                <div style="margin-left:3%;margin-top:5%;margin-bottom:5%;">
                    <img src="img/deptinfo.png" class="img-responsive" style="height:150px;width:170px;" />
                </div>
                <div class="col-sm-12">
                   <p>NOM et prenom</p>
                   <p>Poste</p>
                   <p>Mail</p>
                   <p>Contact</p>

                </div>
            </div>
             <div  class="col-lg-3" style="border:1px solid #666;border-radius:2%;margin-left:5%;padding-top:1%;">
                <div style="margin-left:3%;margin-top:5%;margin-bottom:5%;">
                    <img src="img/deptinfo.png" class="img-responsive" style="height:150px;width:170px;" />
                </div>
                <div class="col-sm-12">
                   <p>NOM et prenom</p>
                   <p>Poste</p>
                   <p>Mail</p>
                   <p>Contact</p>

                </div>
            </div>
             <div  class="col-lg-3" style="border:1px solid #666;border-radius:2%;margin-left:5%;padding-top:1%;">
                <div style="margin-left:3%;margin-top:5%;margin-bottom:5%;">
                    <img src="img/deptinfo.png" class="img-responsive" style="height:150px;width:170px;" />
                </div>
                <div class="col-sm-12">
                   <p>NOM et prenom</p>
                   <p>Poste</p>
                   <p>Mail</p>
                   <p>Contact</p>

                </div>
            </div>
            </div>
        </section>

    <footer class="footer">
        <div class="row black lighten-1 white-text">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="center red-text darken-3-text 16">Contacts</h5>
                        <p>E-mail: <a href="comsas@gmail.com">comsas@gmail.com</a></p>
                        <p>Tel: 693 138 363 / 695 660 689</p>
                        <p>Telegram: <a href="https://t.me/joinchat/Cq1P1EOj1KQLkbOxIIAAPA">COMSAS PUBLIC</a></p>
                        <p>Facebook: <a href="https://www.facebook.com/groups/159019330791993/">COMSAS</a></p>
                    </div>
                    <div class="divider"></div>
                    <div class="col-sm-12">Copyright COMSAS 2017</div>

                </div>
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
