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
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/templatemo_style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="css/slide.css">

    <meta property="og:title" content="COMSAS"/>
    <meta property="og:description" content="Computer Science Association"/>
    <meta property="og:image" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/img/affiche1-mod.jpg' ?>"/>



</head>
<!-- <style>
@font-face {
font-family: 'Segoe UI';
font-style: normal;
font-weight: normal;
src: local('Segoe UI'), url('segoeui.woff') format('woff');
}

</style> -->
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

   
<div class="row" style="margin-top:0px;">
    <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#templatemo-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#templatemo-carousel" data-slide-to="1"></li>
            <li data-target="#templatemo-carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img max="560" class="img-responsive" src="img/logo1.jpg">
                <div class="container">
                    <div class="carousel-caption carousel-text">
                        <h1>Bienvenue chez vous</h1>
                        <p>Entrez ici</p>
                        <p> <a class="btn btn-lg btn-danger" href="/login.php" >Se connecte</a></p>
                    </div>
                </div>
            </div>

            <div class="item">
                <img class="img-responsive" src="img/logo2.jpg">
                <div class="container">
                    <div class="carousel-caption carousel-text">
                        <div class="col-sm-6 col-md-6">
                            <h1>Nous sommes le futur de l'informatique</h1>
                            <p>Demain nous appartient</p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <h1>Suivez nous dans nos aventure</h1>
                            <p>Un etudiant une histoire</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive" src="img/affiche1-mod.jpg">
                <div class="container">
                    <div class="carousel-caption carousel-text">
                        <h1>Nous partageons notre histoire avec vous</h1>
                        <p>Ecrivez l'histoire avec nous</p>
                        <p><a class="btn btn-lg btn-danger" role="button" href="/login.php">En savoir plus</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#templatemo-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#templatemo-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
          


 
    <div class="container">
        <section class="section-competance">
            <div class="row text-center">
                <h1>Solution provider in </h1>
                <p class="">
                    The comsas is there to help you with any of your problems in the following
                    <br> Domains at cheap and affortable prices.!
                </p>
            </div>
            <div class="row js--wp-1 slideanim">
                <div class="col-sm-4 box">
                    <i class="fa fa-wrench fa-5x "></i>
                    <h3>Software Dev</h3>
                    <p>Developpement de logiciels de Bureau
                            <br> Windows et Linux
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="fa fa-wifi fa-5x"></i>
                    <h3>Networking</h3>
                    <p>Installation et configuration de Réseaux Locaux
                            <br> Simulation des Réseaux
                            <br>Creation des outils réseaux.
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="fa fa-mobile fa-5x"></i>
                    <h3>Mobile Dev</h3>
                    <p>Developpement des applications mobiles
                            <br> Mise à jour de vos applications mobiles
                    </p>
                </div>
            </div>
            <div class="row js--wp-1 slideanim">
                <div class="col-sm-4 box">
                    <i class="fa fa-paint-brush fa-5x"></i>
                    <h3>Design</h3>
                    <p>Montage graphique
                            <br> Montage vidéo
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="fa fa-wordpress fa-5x"></i>
                    <h3>Web dev</h3>
                    <p>Dévéloppement de sites WEB
                            <br> Dévéloppement d'applications WEB
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="fa fa-cog fa-5x"></i>
                    <h3>Maintenance</h3>
                    <p>Maintenance logicielle des Laptops et Desktops
                            <br> Maintenance logicielle des appareils multimédias
                            <br>Conseils d'utilisation.
                    </p>
                </div>
            </div>
        </section>

        <section class="section-projet">
            <div class="row text-center">
                    <h1>Projets</h1>
                    <p class="comp-tell">
                        Projets en cours de développement
                    </p>
            </div>
            <div class="row slideanim">
                <div class="col-sm-3 col-sm-offset-1 panel" style="height:350px;">
                    <div class="article">
                        <h3>Site WEB du COMSAS</h3>
                        <img src="img/comsas.jpg" alt="No image" class="img-responsive acceuil-projet" style="height:250px;">
                        
                        <hr>
                        <div class="projet-pro">
                            <p>
                                Developpement du site WEB du COMSAS qui doit etre la vitrine
                                        des étudiants en filière INFO de l'UY1 vers l'exterieur.
                                <br>
                                <a href="#" class="btn btn-view red darken-3"> Read more</a>
                            </p>
                        </div>

                    </div>


                </div>
                <div class="col-sm-3 col-sm-offset-1 panel" style="height:350px;">
                    <div class="article">
                        <h4>Site WEB du Département</h4>                        
                        <img src="img/deptinfo.png" alt="No image" class="img-responsive acceuil-projet" style="height:250px;">
                        
                        <hr>
                        <div class="projet-pro">
                            <p>
                                Developper un site WEB complet pour le département
                                        informatique.
                                <br>
                                <a href="#" class="btn btn-view red darken-3"> Read more</a>
                            </p>
                        </div>

                    </div>


                </div>
                <div class="col-sm-3 col-sm-offset-1 panel" style="height:350px;">
                    <div class="article ">
                        <h3>Chat On PC</h3>
                        <img src="img/computer.jpg" alt="No image" class="img-responsive acceuil-projet" style="height:250px;">
                        
                        <hr>
                        <div class="projet-pro">
                            <p>
                                Envoyer et recevoir des SMS à travers vos telephones, vos clés
                                        internet et vos modems.
                                <br>
                                <a href="#" class="btn btn-view red darken-3"> Read more</a>
                            </p>
                        </div>

                    </div>


                </div>
            </div>

        </section>


        <section class="section-article ">
            <div class="row text-center">
                <h1>Actualité au campus</h1>
                <p class="comp-tell">
                    Tous les tic et tac de la filiere info
                </p>

            </div>
            <div class="row js--wp-3 slideanim">
                <?php AffichArticle::lister(array()); ?>
            </div>
        </section>





        <section class="contact">
            <div class="row text-center">
                <h1>Contactez nous</h1>
            </div>
            <div class="row slideanim">
                <form method="post" action="#" class="contact-form">

                    <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3 " for="nom" style="text-align: right;">Nom 
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nom" required class="form-control col-md-3 col-xs-2" placeholder="Your Name" name="nom">
                    </div>
                </div>
                  <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="nom">Email 
                        </label>
                    <div class="row col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="mail" required class="form-control col-md-3 col-xs-2" placeholder="Your Email" name="mail">
                    </div>
                </div>
                  <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="nom">Message
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="message" rows="5" cols="10" class="form-control col-md-3 col-xs-2" value="" name="message"></textarea>
                    </div>
                </div>
                    
                    <div class="row form-group">
                        <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                            <button class="btn btn-info">Send it !!</button>
                    </div>
                    </div>
                </form>
            </div>
        </section>
    </div>


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
</body>

 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
        <script src="js/calendar.js"></script>
</html>
