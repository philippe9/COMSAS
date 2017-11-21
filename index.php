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
                <li><a href="/projet.php">Projets</a></li>
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
        <section class="section-competance">
            <div class="row text-center">
                <h1>Solution provider in </h1>
                <p class="">
                    The comsas is there to help you with any of your problems in the following
                    <br> Domains at cheap and affortable prices.!
                </p>
            </div>
            <div class="row js--wp-1">
                <div class="col-sm-4 box">
                    <i class="ion-wrench icon-big"></i>
                    <h3>Software Dev</h3>
                    <p>Developpement de logiciels de Bureau
                            <br> Windows et Linux
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="ion-android-wifi icon-big"></i>
                    <h3>Networking</h3>
                    <p>Installation et configuration de Réseaux Locaux
                            <br> Simulation des Réseaux
                            <br>Creation des outils réseaux.
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="ion-ipad icon-big"></i>
                    <h3>Mobile Dev</h3>
                    <p>Developpement des applications mobiles
                            <br> Mise à jour de vos applications mobiles
                    </p>
                </div>
            </div>
            <div class="row js--wp-1">
                <div class="col-sm-4 box">
                    <i class="ion-paintbrush icon-big"></i>
                    <h3>Design</h3>
                    <p>Montage graphique
                            <br> Montage vidéo
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="ion-social-nodejs icon-big"></i>
                    <h3>Web dev</h3>
                    <p>Dévéloppement de sites WEB
                            <br> Dévéloppement d'applications WEB
                    </p>
                </div>
                <div class="col-sm-4 box">
                    <i class="ion-ios-gear-outline icon-big"></i>
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="article">
                        <h3>Site WEB du COMSAS</h3>
                        <img src="img/comsas.jpg" alt="" class="img-responsive">
                        
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
                <div class="col-sm-4">
                    <div class="article">
                        <h3>Site WEB du Département</h3>                        
                        <img src="img/deptinfo.png" alt="" class="img-responsive">
                        
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
                <div class="col-sm-4">
                    <div class="article ">
                        <h3>Chat On PC</h3>
                        <img src="img/computer.jpg" alt="" class="img-responsive">
                        
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
            <div class="row js--wp-3">
                <?php AffichArticle::lister(array()); ?>
            </div>
        </section>





        <section class="contact">
            <div class="row text-center">
                <h1>contacter nous</h1>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name">Name</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="name" id="name" placeholder="Your name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="email">Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Your email" required>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <label for="message">Drop us a line</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="message" id="" placeholder="Your message goes here "></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Send it!"> </div>
                    </div>
                </form>
            </div>
        </section>
    </div>


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
