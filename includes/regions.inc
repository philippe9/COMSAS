<?php
    include_once 'connexionDb.inc';

function display_header()
{
    /*print '
    <div>
        <img src="img/entete.png" alt="pas dispo" title="entete football"/>
        <p>Le centre de formation qui innove</p>
    </div>
    ';*/
    print '
        <div class="slider">
        <div id="coin-slider"><a href="#"><img src="img/entete.png" alt=""/> <a href="#"><img src="images/slide1.jpg" width="1024" height="250" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="1024" height="300" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="1024" height="250" alt="" /> </a> </div>
      </div>
    ';
}

function display_footer()
{
    echo '
        <div>
            <p>Coder et designé par Matrix Jef</p>
        </div>
    ';
}

function display_menu()
    {
        try{
            $dbh = new PDO(dsn, user, pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch (PDOException $e){
            print "Erreur: ".$e->getMessage()."<br/>";
            die();
        }
        $requete = "SELECT nomSport FROM sports";
        $sth = $dbh->query($requete);
        $resSports = $sth->fetchAll(PDO::FETCH_ASSOC);
        print "
            <ul>
                <li>Accueil</li>";
        foreach ($resSports as $ligne) {
            print "\n\t\t\t\t<li class=\"dropdown\">".$ligne['nomSport']."</li>";
            
            $requete = "SELECT nomCat FROM categories WHERE nomSport='".$ligne['nomSport']."'";
            $sth = $dbh->query($requete);
            $resCat = $sth->fetchAll(PDO::FETCH_ASSOC);
            
            print "<ul class=\"dropdown-content\">";
            foreach ($resCat as $ligneCat) {
                print "\n\t\t\t\t\t<li>".$ligneCat['nomCat']."</li>";
            }
            print "\n</ul>\n";
        }
        print "\n\t\t\t</ul>\n";
        
        $dbh = NULL;
    }
?>