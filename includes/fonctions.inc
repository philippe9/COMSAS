<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

function tester_entree_get($champs)
{
    $erreur = FALSE;
    $raison = array();
    foreach($champs as $champ){
        if (isset($_GET[$champ]) && !empty($_GET[$champ]))
            ;
        else {
            $erreur = TRUE;
            $raison[] = "Champ $champ manguant";
        }
    }
    
    return array($erreur, $raison);
}

//Genere une fonction aleatoire
function str_random($length)
{
        //je cree mon petit dictionnaire de lettre que j'utiliserais plus tard
        
        $alphabet ="0123456789qwertyuiopasdfghjklzxcvbnmWWERTYUIOPASDFGHJKLZXCVBNM";
        
        //maintenant on va la repeter 60 fois pour faire le melange puis substr met de recuperer la valeur voulu a utilisé
        return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
}

//Debuger une variable
function debug($variable)
{
        echo '<pre>'.print_r($variable,true).'<pre>';
}

//Envoyer un mail
function envoyer_mail($dest, $titre, $message)
{
    date_default_timezone_set('Etc/UTC');
    
    require 'PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "comsas.dev@gmail.com";
    $mail->Password = "12comsas21";
    $mail->setFrom('comsas.dev@gmail.com', 'COMSAS Admin');
    $mail->addReplyTo('comsas.dev@gmail.com', 'COMSAS Admin');
    $mail->addAddress($dest, 'Utilisateur');
    
    $mail->Subject = $titre;
    $mail->msgHTML($message);
    
    if(!$mail->send()) {
        return FALSE;
    } else {
        return TRUE;
    }
}

/*creation d'un utilisateur etudiant bon et fonction aussi bien*/
 
    function creer_user_name_etudiant($username,$password,$nom,$prenom,$email,$level){
        global $dd;
        	//debutons l'insertion dans la table utilisateur
        $token = str_random(60);
        $options = array('cost' => 12);
        
        $req = $dd->prepare('SELECT id_user FROM `utilisateurs` WHERE username = :user');
        $req->execute(array('user' => $username));
            
        $user = $req->fetch();
        if($user){
                $error['username'] = "Ce pseudo est deja pris";
                return array(TRUE, $error);
        }
        
        $req = $dd->prepare('SELECT id_user FROM `utilisateurs` WHERE email = :email');
        $req->execute(array('email' => $email));
            
        $user = $req->fetch();
        if($user){
                $error['mail'] = "Ce username est deja utilise pour un autre compte";
                return array(TRUE, $error);
        }
        
        $password = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $req = $dd->prepare("INSERT INTO `utilisateurs`(`username`, `password`, `nom`, `prenom`,email,confirmation_token)
                          VALUES ('$username','$password','$nom','$prenom','$email','$token')");
        
        $req->execute();

        /*$req=$dd->query("SELECT * FROM `utilisateurs` WHERE username ='$username'");
        $reponse = $req->fetch();
        		// mise a jour de la table etudiants pour y mettre l'id_utilisateur
        $var =$reponse['id_user'];*/
        
	$user_id = $dd->lastInsertId();		
			
        // puis la table etudiant 
        $req2 = $dd->prepare("INSERT INTO `etudiants`(Niveau,id_user) VALUES (:niveau,:id)");
        
        $req2 ->execute(array('id' => $user_id,'niveau' => $level));
        
        $path2 = $_SERVER['SERVER_NAME'];
        $link = "http://$path2/confirm.php?id=$user_id&type=etudiant&token=$token";
        $message = "<p>Afin de valider votre compte merci de cliquer sur ce lien <a href=\"$link\" >$link</a><br/>";
        $message .= "Ne repondez pas à ce message</p>";
        $titre = "COMSAS - Confirmation de compte";
        if(envoyer_mail($email, $titre, $message)==FALSE){
            return array(TRUE, array('raison'=>"Le message n'a pas pu etre envoyé"));
        }
        else{
            $good = array('Nom'=>$nom, 'Prenom'=>$prenom);
            return array(0, $good);
        }
        
		     
    }

    // creation des particuliers pour le second formulaire bon dja

    function creer_user_name_particulier($username,$password,$nom,$prenom,$email){
        
        global $dd;
        		
        $token = str_random(60);
        $options = array('cost' => 12);
        
        $req = $dd->prepare('SELECT id_user FROM `utilisateurs` WHERE username = :user');
        $req->execute(array('user' => $_POST['username']));
            
        $user = $req->fetch();
        if($user){
                $error['username'] = "Ce pseudo est deja pris";
                return array(TRUE, $error);
        }
        
        $req = $dd->prepare('SELECT id_user FROM `utilisateurs` WHERE username = :user');
        $req->execute(array('user' => $_POST['email']));
            
        $user = $req->fetch();
        if($user){
                $error['mail'] = "Ce username est deja utilise pour un autre compte";
                return array(TRUE, $error);
        }
        
        $password = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $req = $dd->prepare("INSERT INTO `utilisateurs`(`username`, `password`, `nom`, `prenom`,email,confirmation_token)
                          VALUES ('$username','$password','$nom','$prenom','$email','$token')");
        
        $req->execute();

        /*$req=$dd->query("SELECT * FROM `utilisateurs` WHERE username ='$username'");
        $reponse = $req->fetch();
        		// mise a jour de la table etudiants pour y mettre l'id_utilisateur
        $var =$reponse['id_user'];*/
        
	$user_id = $dd->lastInsertId();		
			
        // puis la table etudiant 
        $req2 = $dd->prepare("INSERT INTO `particuliers`(id_user) VALUES (:id)");
        
        $req2 ->execute(array('id' => $user_id));
        
        $path2 = $_SERVER['SERVER_NAME'];
        $message = "Afin de valider votre compte merci de cliquer sur ce lien http://".$path2."/confirm.php?id=$user_id&type=particulier&token=$token";
        $message .= "\n\nNe repondez pas à ce message";
        $titre = "COMSAS - Confirmation de compte";
        $headers = 'From: admin@comsas.cf' . "\r\n" .'Reply-To: admin@comsas.cf';
        mail($email, $titre, $message,$headers);
        
        $good = array('Nom'=>$nom, 'Prenom'=>$prenom);
        return array(0, $good);
    }


function confirm_account($id, $token, $type)
{
    global $dd;
    if($type=='etudiant'){
        $req = $dd->prepare('SELECT * FROM etudiants WHERE id_etudiant =:id');
    }else{
        $req = $dd->prepare('SELECT * FROM particuliers WHERE id_particulier =:id');
    }
      
    $req->execute(array('id' => $id));
    $id = $req->fetch();
    $var = $id['id_user'];
    
    $req = $dd->prepare('SELECT * FROM utilisateurs WHERE id_user =:id');
    $req->execute(array('id' => $var));
    
    $user = $req->fetch();
     session_start();
     if($user && $user['confirmation_token']==$token){
        
        $req =$dd->prepare('UPDATE utilisateurs SET confirmation_token = NULL
                           ,confirme_at = NOW() WHERE id_user =:id');
        $req->execute(array('id' => $var));
        $raison['raison'] = "Votre compte a ete active avec success. Revenez dans qelques temps pour découvrir les nouvelles fonctionnalités.";
        return array(0, $raison);
     }else{
        $raison['raison'] = "Cette clé n'est pas valide";
        return array(TRUE, $raison);
     }
}

function lister_articles($page, $nbre=10, $nb_ligne=3)
{
    $page_cour = $_SERVER['PHP_SELF'];
    global $dd;
    $home_url = $_SERVER['HTTP_HOST'];
    
    $page = $page*$nbre;
    //$page = $dbh->quote($page);
    
    $requete = "SELECT * FROM `articles` ORDER BY date_creation DESC LIMIT $page,$nbre";
    try{
        $sth = $dd->prepare($requete);
        $sth->execute();
    }catch(PDOException $e)
    {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    $res_events = $sth->fetchAll();
    
    foreach ($res_events as $event){
        $id = $event['id_article'];
        $titre = $event['titre'];
        $description = $event['description'];
        $date_creation = $event['date_creation'];
        $id_user = $event['createur'];
        $resume = $event['resume'];
        $media = $event['media'];
        $requete = "SELECT nom FROM administrateurs where id_admin=$id_user";
        $sth = $dd->query($requete);
        $res_events = $sth->fetch();
        $nom_admin = $res_events['nom'];
        
        
        echo "<div class=\"col s4 \">";
        echo '        <div class="article-desc">';
        echo '            <h5>'.$titre.'</h5>';

        echo '            <div class="article-img">';
        echo '                <img src="'.$media.'" alt="">';
        echo '            </div>';
        echo '            <hr>';
        echo '            <div class="projet-pro">';
        echo '                <p>';
        echo                        $resume;         
        echo '                    <br>';
        echo '                    <a href="'."http://$home_url/article.php?id=$id".'" class="btn btn-view red darken-3"> Read more</a>';
        echo '                </p>';
        echo '            </div>';

        echo '        </div>';
        
        echo '    </div>';


    }
    
}

?>