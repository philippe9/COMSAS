<?php

include_once("../includes/connexionDb.inc");

define('AJOUTARTICLE', 1);
define('AFFICHERARTICLE', 2);
define('AJOUTEVENEMENT', 5);
define('AFFICHEREVENEMENT', 6);
define('AJOUTPROJET', 3);

$tab_ajouts['Article'] = array('Ajouter article'=>AJOUTARTICLE, 'Lister articles'=>AFFICHERARTICLE);
$tab_ajouts['Projet'] = array('Ajouter projet'=>AJOUTPROJET, 'Lister projets'=>4);
$tab_ajouts['Evenement'] = array('Ajouter evenement'=>AJOUTEVENEMENT, 'Lister evenements'=>AFFICHEREVENEMENT);

function tester_entree($champs)
{
    $erreur = FALSE;
    $raison = array();
    foreach($champs as $champ){
        if (isset($_POST[$champ]) && !empty($_POST[$champ]))
            ;
        else {
            $erreur = TRUE;
            $raison[] = "Champ $champ manguant";
        }
    }
    
    return array($erreur, $raison);
}

function upload_image($sub_path)
{
    if (isset($_FILES['media'])){
        if ($_FILES['media']['error'] <= 0) {
            $media = $_FILES['media']['name'];
            $erreur = FALSE;
        } else {
            $erreur = TRUE;
            $raison[] = "Photo manguante";
        }
    }
    else{
        $erreur = TRUE;
        $raison[] = 'Choisissez un media';
    }

    if ($erreur)
        return array($erreur, $raison);

    $ListeExtension = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
    $ListeExtensionIE = array('jpg' => 'image/pjpg', 'jpeg' => 'image/pjpeg');

    $ext_presume = explode('.', $media);
    $ext_presume = strtolower($ext_presume[count($ext_presume) - 1]);
    if ($ext_presume == 'jpg' || $ext_presume == 'jpeg' || $ext_presume == 'pjpg' || $ext_presume == 'pjpeg' || $ext_presume == 'gif' || $ext_presume == 'png') {
        $media = $_FILES['media']['tmp_name'];
        $taille_photo = getimagesize($media);
        if ($taille_photo['mime'] == $ListeExtension[$ext_presume] || $taille_photo['mime'] == $ListeExtensionIE[$ext_presume]) {
            if ($ext_presume == "jpg" || $ext_presume == "jpeg")
                $ImageChoisie = imagecreatefromjpeg($media);
            elseif ($ext_presume == "png")
                $ImageChoisie = imagecreatefromjpeg($media);
            else {
                $erreur = TRUE;
                $raison[] = "Veuillez choisir un PNG ou un JPEG comme photo";
                return array($erreur, $raison);
            }
            $TailleImageChoisie = getimagesize($media);
            $NouvelleLargeur = 220;
            $Reduction = ( ($NouvelleLargeur * 100) / $TailleImageChoisie[0] );
            $NouvelleHauteur = ( ($TailleImageChoisie[1] * $Reduction) / 100 );
            $NouvelleImage = imagecreatetruecolor($NouvelleLargeur, $NouvelleHauteur) or die("Erreur");
            imagecopyresampled($NouvelleImage, $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0], $TailleImageChoisie[1]);
            imagedestroy($ImageChoisie);
            $NomImageExploitable = time();
            $chemin_image = '../img/'.$sub_path.'/' . $NomImageExploitable . '.' . $ext_presume;
            if ($ext_presume == "jpg" || $ext_presume == "jpeg")
                imagejpeg($NouvelleImage, $chemin_image, 100);
            elseif ($ext_presume == "png")
                imagepng($NouvelleImage, $chemin_image, 100);
            
            $erreur = FALSE;
            return array($erreur, $chemin_image);
        }
    }
    else {
        $erreur = TRUE;
        $raison[] = "Veuillez choisir une image";
        return array($erreur, $raison);
    }
}

function afficher_formulaire_connexion($error) {
    echo '
        <div id="connexion">';
    if ($error) {
        echo "<p>Combinaison nom d'utilisateur/mot de passe invalide<p>";
    }
    echo '
            <form name="conn_formulaire" action="admin.php" method="POST">
                <label>Utilisateur</label><input type="text" name="username" value="" size="30" /><br/>
                <label>Mot de passe</label><input type="password" name="password" value="" size="30" /><br/>
                <input type="submit" value="Connecter" name="connecter" />
                <input type="reset" value="Reinitialiser" name="reini" />
            </form>
        </div>
    ';
}

function authentifier($username, $password) {
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        print_r($e);
        die();
    }

    $requete = "SELECT id_admin, username, nom from administrateurs WHERE (username=:username)
             AND (password=:password)";
    $stmt = $dbh->prepare($requete);
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $ligne = $stmt->fetch();
    if (isset($ligne['username'])) {
        $ligne['result'] = TRUE;
    } else {
        $ligne['result'] = FALSE;
    }
    return $ligne;
}

function afficher_entete() {
    echo '
        <header><h1>COMSAS - Administration</h1><img src="../img/logo/comsas.jpg" alt="logo"/></header>
        ';
}

function afficher_ajout_evenement($erreur, $raison)
{
    $page_cour = $_SERVER['PHP_SELF'];
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    
    if ($erreur) {
        echo "<p>\n";
        foreach ($raison as $value) {
            echo "$value<br/>\n";
        }
        echo "</p>\n";
    }
    
    echo "\t\t<form name=\"form_ajout_equipe\" method=\"POST\" action=\"$page_cour\">\n";
    echo "\t\t\t<input type=\"hidden\" name=\"mode\" value=\"5\"/><br/>\n";
    echo "\t\t\t<label>Titre</label><input type=\"text\" size=\"30\" name=\"titre\"/><br/>\n";
    echo "\t\t\t<label>Description</label><textarea name=\"description\"> </textarea><br/>\n";
    echo "\t\t\t<label>Date de debut</label><input type=\"date\" name=\"date-debut\" /><br/>\n";
    echo "\t\t\t<label>Heure de debut</label><input type=\"time\" name=\"heure-debut\" /><br/>\n";
    echo "\t\t\t<label>Date de fin</label><input type=\"date\" name=\"date-fin\" /><br/>\n";
    echo "\t\t\t<label>Heure de fin</label><input type=\"time\" name=\"heure-fin\" /><br/>\n";
    echo "\t\t\t<label>Media</label><input type=\"file\" name=\"media\"/><br/>\n";
    echo "\t\t\t<input type=\"submit\" value=\"Enregistrer\" name=\"submit\"/>\n";
    echo "\t\t\t<input type=\"reset\" value=\"Reinitialiser\" name=\"reini\"/>\n";
    echo "\t\t</form>\n";
}

function lister_evenements($page)
{
    $page_cour = $_SERVER['PHP_SELF'];
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    
    $page = $page*10;
    //$page = $dbh->quote($page);
    
    $requete = "SELECT titre,description,date_creation,date_debut,date_fin,createur FROM evenements LIMIT $page,10";
    try{
        $sth = $dbh->query($requete);
    }catch(PDOException $e)
    {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    $res_events = $sth->fetchAll();
    
    foreach ($res_events as $event){
        $titre = $event['titre'];
        $description = $event['description'];
        $date_creation = $event['date_creation'];
        $date_debut = $event['date_debut'];
        $date_fin = $event['date_fin'];
        $id_user = $event['createur'];
        $requete = "SELECT nom FROM administrateurs where id_admin=$id_user";
        $sth = $dbh->query($requete);
        $res_events = $sth->fetch();
        $nom_admin = $res_events['nom'];
        
        
        echo "<div class=\"liste-events\"><h3>$titre</h3>";
        echo "<p>Description: $description</p>";
        echo "<p>Date creation:$date_creation, Date de debut:$date_debut, Date de fin:$date_fin, Par:$nom_admin</p>";
        echo "</div>";
    }
    
}

function afficher_ajout_article($erreur, $raison)
{
    $page_cour = $_SERVER['PHP_SELF'];
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    
    if ($erreur) {
        echo "<p>\n";
        foreach ($raison as $value) {
            echo "$value<br/>\n";
        }
        echo "</p>\n";
    }
    
    echo "\t\t<form class=\"form-ajout\" name=\"form_ajout_equipe\" method=\"POST\" enctype=\"multipart/form-data\" action=\"$page_cour\">\n";
    echo "\t\t\t<input type=\"hidden\" name=\"mode\" value=\"1\"/><br/>\n";
    echo "\t\t\t<label>Titre</label><input type=\"text\" size=\"30\" name=\"titre\"/><br/>\n";
    echo "\t\t\t<label>Description</label><textarea name=\"description\"> </textarea><br/>\n";
    echo "\t\t\t<label>Media</label><input type=\"file\" name=\"media\"/><br/>\n";
    echo "\t\t\t<input type=\"submit\" value=\"Enregistrer\" name=\"submit\"/>\n";
    echo "\t\t\t<input type=\"reset\" value=\"Reinitialiser\" name=\"reini\"/>\n";
    echo "\t\t</form>\n";
}

function lister_articles($page)
{
    $page_cour = $_SERVER['PHP_SELF'];
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    
    $page = $page*10;
    //$page = $dbh->quote($page);
    
    $requete = "SELECT titre,description,date_creation,createur FROM articles LIMIT $page,10";
    try{
        $sth = $dbh->query($requete);
    }catch(PDOException $e)
    {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    $res_events = $sth->fetchAll();
    
    foreach ($res_events as $event){
        $titre = $event['titre'];
        $description = $event['description'];
        $date_creation = $event['date_creation'];
        $id_user = $event['createur'];
        $requete = "SELECT nom FROM administrateurs where id_admin=$id_user";
        $sth = $dbh->query($requete);
        $res_events = $sth->fetch();
        $nom_admin = $res_events['nom'];
        
        
        echo "<div class=\"liste-events list-articles\"><h3>$titre</h3>";
        echo "<p>Description: $description</p>";
        echo "<p>Date creation:$date_creation, Par:$nom_admin</p>";
        echo "</div>";
    }
    
}



function enregistrer_evenement()
{
    $champs = array('titre','description','date-debut','date-fin', 'heure-debut', 'heure-fin');
    $res = tester_entree($champs);
    $erreur = $res[0];
    $raison = $res[1];
    
    print_r($_POST);
    
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_debut = $_POST['date-debut'].' '.$_POST['heure-debut'].':00';
    $date_fin = $_POST['date-fin'].' '.$_POST['heure-fin'].':00';
    print_r($date_fin);
    
    if ($erreur)
        return afficher_ajout_evenement($erreur, $raison);
    
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    
    $id_user = $_SESSION['user_id'];
    
    $requete = "INSERT INTO evenements (titre,description,date_creation,date_debut,date_fin,createur,media) VALUES(:titre,:description,NOW(),:date_debut,:date_fin,:createur,:media)";
    try{
        $stmt = $dbh->prepare($requete);
        $stmt->execute(array(':titre' => $titre, ':description' => $description,'date_debut'=>$date_debut,'date_fin'=>$date_fin,'createur'=>$id_user,'media'=>'/img/test.png'));
    }
    catch(Exception $e){
        trigger_error('erreur ' . $e->getMessage() . "\n", E_USER_ERROR);
    }
    
    echo "<p class=\"reussite\">Felicitations vous avez bien enregistré un nouvel evenement</p>\n";
}

function enregistrer_article()
{
    $champs = array('titre','description');
    $res = tester_entree($champs);
    $erreur = $res[0];
    $raison = $res[1];
    
    print_r($_POST);
    print_r($_FILES);
    
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $res = upload_image('articles');
    if($res[0]==FALSE)
        $media = $res[1];
    else{
        $erreur = $res[0];
        $raison = $res[1];
    }
    
    if ($erreur)
        return afficher_ajout_article($erreur, $raison);
    
    try {
        $dbh = new PDO(dsn, user, pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    
    $id_user = $_SESSION['user_id'];
    
    $requete = "INSERT INTO articles (titre,description,date_creation,createur,media) VALUES(:titre,:description,NOW(),:createur,:media)";
    try{
        $stmt = $dbh->prepare($requete);
        $stmt->execute(array(':titre' => $titre, ':description' => $description,'createur'=>$id_user,'media'=>$media));
    }
    catch(Exception $e){
        trigger_error('erreur ' . $e->getMessage() . "\n", E_USER_ERROR);
    }
    
    echo "<p class=\"reussite\">Felicitations vous avez bien enregistré un nouvel article</p>\n";
}

function afficher_navigation($active) {
    global $tab_ajouts;
    $page_cour = $_SERVER['PHP_SELF'];
    echo "
        <nav><ul>
            <li><a href=\"$page_cour\">Accueil</a></li>\n";
    foreach ($tab_ajouts as $key => $value) {
        echo "\t\t\t<li>$key";
            echo "<ul>\n";
            foreach ($value as $in_key => $in_value) {
                echo "\t\t\t\t<li><a href=\"$page_cour?mode=$in_value\">$in_key</a></li>\n";
            }
            echo "\t\t\t</ul>";
        echo "</li>\n";
    }
    echo "\t\t</ul></nav>\n\n";
}

function afficher_contenu($mode) {
    if ($mode == AJOUTARTICLE) {
        afficher_ajout_article(FALSE, NULL);
    }
    elseif ($mode==AFFICHERARTICLE) {
        lister_articles(FALSE, NULL);
    }
    elseif ($mode==AJOUTEVENEMENT) {
        afficher_ajout_evenement(FALSE, NULL);
    }
    elseif ($mode==AFFICHEREVENEMENT) {
        lister_evenements(FALSE, NULL);
    }
    else {
        $username_user = $_SESSION['username'];
        $nom_user = $_SESSION['nom'];
        echo "<p>Bienvenue sur votre page d'administration $nom_user</p>\n";
    }
}

function enregistrer_contenu($mode) {
    if ($mode == AJOUTARTICLE) {
        enregistrer_article();
    }
    elseif($mode==AJOUTEVENEMENT)
    {
        enregistrer_evenement();
    }    
}