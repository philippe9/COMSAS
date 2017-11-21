<?php

include_once "utils.php";
include_once "bd.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
* CRUD pour la gestion des classes
*/
interface CRUD
{
    
    static function creer($donnees);

    static function lister($donnees);

    static function modifier($donnees);

    static function supprimer($donnees);

    static function get($donnees);
}


/**
* classe Profil
*/
class Profil implements CRUD
{
    var $id,$prenom,$nom,$niveau;
    
    function __construct($id,$nom,$prenom,$niveau)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->niveau = $niveau;
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("nom","prenom","niveau"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);

        $nom = $donnees["nom"];
        $prenom = $donnees["prenom"];
        $niveau = $donnees["niveau"];

        global $dbh;

        try {            
            $req = $dbh->prepare("INSERT INTO `profil`(`nom`, `prenom`, `niveau`)
                          VALUES (:nom,:prenom,:niveau)");
        
            $req->execute(array("nom"=>$nom, "prenom"=>$prenom, "niveau"=>$niveau));
        } catch (Exception $e) {
            die(print_r($e));
        }
        
        $profil = new Profil(0,$nom,$prenom,$niveau);
        return $profil;
    }

    static function get($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_profil AS id,nom,prenom,niveau FROM profil WHERE id_profil=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $nom = $res["nom"];
                $prenom = $res["prenom"];
                $niveau = $res["niveau"];

                $profil = new Profil($id,$nom,$prenom,$niveau);
                return $profil;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        try {
            $req = $dbh->prepare("SELECT id_profil AS id,nom,prenom,niveau FROM profil");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM profil WHERE id_profil=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }


}

/**
* classe Utilisateur
*/
class Utilisateur implements CRUD
{
    
    var $id,$username, $password, $email, $type, $token;
    var $profil;

    function __construct($id,$username,$password,$email,$type,$token,$profil)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->type = $type;
        $this->token = $token;
        $this->id = $id;
        $this->profil = $profil;
    }
    
    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("username","password","email","type"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);

        $username = $donnees["username"];
        $password = $donnees["password"];
        $email = $donnees["email"];
        $type = $donnees["type"];

        global $dbh;
        	//debutons l'insertion dans la table utilisateur
        $token = Utilitaires::str_random(6);
        $options = array('cost' => 12);
        
        $password = password_hash($password,PASSWORD_BCRYPT,$options);

        try {            
            $req = $dbh->prepare("INSERT INTO `utilisateur`(`username`, `password`, `email`, `type`,`token`)
                          VALUES (:username,:password,:email,:type,:token)");
        
            $req->execute(array("username"=>$username, "password"=>$password, "email"=>$email, "type"=>$type, "token"=>$token));
        } catch (Exception $e) {
            die(print_r($e));
        }
        
        $user = new Utilisateur(0,$username,$password,$email,$type,$token,NULL);
        return $user;
    }
    
    static function authenticate($username=NULL, $email=NULL, $password=NULL){
        
    }
    
    static function get($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("username"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die($raison);
        }
        
        $username = $donnees["username"];

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_utilisateur AS id,username,password,email,type,token FROM utilisateur WHERE username=:username OR email=:email");
        
            $req->execute(array("username"=>$username, "email"=>$username));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $username = $res["username"];
                $password = $res["password"];
                $email = $res["email"];
                $type = $res["type"];
                $token = $res["token"];

                $user = new Utilisateur($id,$username,$password,$email,$type,$token,NULL);
                return $user;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_utilisateur AS id,username,password,email,type,token FROM utilisateur");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM utilisateur WHERE id_utilisateur=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }
    
    function send_confirm(){
        
    }
    
    function verify_token($token){
        
    }
}


/**
* classe Partenaire
*/
class Partenaire implements CRUD
{
    var $id,$nom,$annee,$raison,$role,$logo;
    var $createur;

    function __construct($id,$nom,$annee,$raison,$role,$logo,$createur)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->annee = $annee;
        $this->raison = $raison;
        $this->role = $role;
        $this->createur = $createur;
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("nom","annee","raison","role","createur","logo"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die(print_r($raison));

        $nom = $donnees["nom"];
        $annee = $donnees["annee"];
        $raison = $donnees["raison"];
        $role = $donnees["role"];
        $createur = $donnees["createur"];
        $logo = $donnees["logo"];

        global $dbh;
            //debutons l'insertion dans la table utilisateur

        try {            
            $req = $dbh->prepare("INSERT INTO `partenaire`(`nom`, `annee`, `raison`, `role`, `logo`, `id_utilisateur`)
                          VALUES (:nom,:annee,:raison,:role,:logo,:createur)");
        
            $req->execute(array("nom"=>$nom, "annee"=>$annee, "raison"=>$raison, "role"=>$role, "createur"=>$createur, "logo"=>$logo));
        } catch (Exception $e) {
            die(print_r($e));
        }
        
        $part = new Partenaire(0,$nom,$annee,$raison,$role,$logo,$createur);
        return $part;
    }

    static function get($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_partenaire AS id,nom,annee,raison,role,logo,id_utilisateur as createur FROM partenaire WHERE id_partenaire=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $nom = $res["nom"];
                $annee = $res["annee"];
                $raison = $res["raison"];
                $role = $res["role"];
                $createur = $res["createur"];
                $logo = $res["logo"];

                $part = new Partenaire($id,$nom,$annee,$raison,$role,$logo,$createur);
                return $part;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_utilisateur AS id,nom,annee,raison,role,logo, id_utilisateur as createur FROM partenaire");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM partenaire WHERE id_partenaire=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }    
}


/**
* classe Cours
*/
class Cours implements CRUD
{
    var $id,$nom,$niveau,$professeur,$fichier,$annee;
    var $posteur;

    function __construct($id,$nom,$niveau,$professeur,$fichier,$annee,$posteur)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->fichier = $fichier;
        $this->niveau = $niveau;
        $this->professeur = $professeur;
        $this->posteur = $posteur;
        $this->annee = $annee;
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("nom","niveau","professeur","fichier","posteur","annee"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);

        $nom = $donnees["nom"];
        $niveau = $donnees["niveau"];
        $professeur = $donnees["professeur"];
        $fichier = $donnees["fichier"];
        $posteur = $donnees["posteur"];
        $annee = $donnees["annee"];

        global $dbh;
            //debutons l'insertion dans la table utilisateur

        try {            
            $req = $dbh->prepare("INSERT INTO `cours` (`nom`, `niveau`, `professeur`, `fichier`, `posteur`,`annee`)
                          VALUES (:nom,:,niveau,:professeur,:fichier,:posteur,:annee)");
        
            $req->execute(array("nom"=>$nom, "niveau"=>$niveau, "professeur"=>$professeur, "fichier"=>$fichier, "posteur"=>$posteur, "annee"=>$annee));
        } catch (Exception $e) {
            die(print_r($e));
        }
        
        $cour = new Cours(0,$nom,$niveau,$professeur,$fichier,$posteur);
        return $cour;
    }

    static function get($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_cours AS id,nom,niveau,professeur,fichier,annee,posteur FROM cours WHERE id_cours=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $nom = $res["nom"];
                $niveau = $res["niveau"];
                $professeur = $res["professeur"];
                $fichier = $res["fichier"];
                $posteur = $res["posteur"];
                $annee = $res["annee"];

                $cour = new Cours($id,$nom,$niveau,$professeur,$fichier,$annee,$posteur);
                return $cour;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_cours AS id,nom,niveau,professeur,fichier,annee,posteur FROM cours");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM cours WHERE id_cours=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }
}


/**
* classe Article
*/
class Article implements CRUD
{
    var $id,$titre,$resume,$corps,$date;
    var $posteur;
    
    function __construct($id,$titre,$resume,$corps,$date,$posteur)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->resume = $resume;
        $this->corps = $corps;
        $this->date = $date;
        $this->posteur = $posteur;
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("titre","resume","corps","posteur"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die(print_r($raison));

        $titre = $donnees["titre"];
        $resume = $donnees["resume"];
        $corps = $donnees["corps"];
        $posteur = $donnees["posteur"];


        global $dbh;
            //debutons l'insertion dans la table utilisateur

        try {            
            $req = $dbh->prepare("INSERT INTO `article` (`titre`, `resume`, `corps`, `date`, `id_utilisateur`)
                          VALUES (:titre,:resume,:corps,CURRENT_TIME(),:posteur)");
        
            $req->execute(array("titre"=>$titre, "resume"=>$resume, "corps"=>$corps, "posteur"=>$posteur));
        } catch (Exception $e) {
            die(print_r($e));
        }
        
        $cour = new Article(0,$titre,$resume,$corps,NULL,$posteur);
        return $cour;
    }

    static function get($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die(print_r($raison));
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_article AS id,titre,resume,corps,date,id_utilisateur AS posteur FROM article WHERE id_article=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $titre = $res["titre"];
                $resume = $res["resume"];
                $corps = $res["corps"];
                $date = $res["date"];
                $posteur = $res["posteur"];

                $cour = new Article($id,$titre,$resume,$corps,$date,$posteur);
                return $cour;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_article AS id,titre,resume,corps,date,id_utilisateur AS posteur FROM article");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM cours WHERE id_article=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }
}

/**
* classe Evenement
*/
class Evenement
{
    var $id,$titre,$resume,$debut,$fin;
    var $createur;
    
    function __construct($id,$titre,$resume,$debut,$fin,$createur)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->resume = $resume;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->createur = $createur;        
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("titre","description","debut","fin","createur"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);

        $titre = $donnees["titre"];
        $description = $donnees["description"];
        $debut = $donnees["debut"];
        $fin = $donnees["fin"];
        $createur = $donnees["createur"];

        global $dbh;
            //debutons l'insertion dans la table utilisateur

        try {            
            $req = $dbh->prepare("INSERT INTO `evenement` (`titre`, `description`, `debut`, `fin`, `createur`)
                          VALUES (:titre,:resume,:corps,CURRENT_TIME(),:posteur)");
        
            $req->execute(array("titre"=>$titre, "description"=>$description, "debut"=>$debut, "fin"=>$fin, "createur"=>$createur));
        } catch (Exception $e) {
            die(print_r($e));
        }
        
        $eve = new Evenement(0,$titre,$resume,$debut,$fin,$createur);
        return $eve;
    }

    static function get($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_evenement AS id,titre,description,debut,fin,createur FROM evenement WHERE id_evenement=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $titre = $res["titre"];
                $description = $res["description"];
                $debut = $res["debut"];
                $fin = $res["fin"];
                $createur = $res["createur"];

                $eve = new Evenement($id,$titre,$resume,$debut,$fin,$createur);
                return $eve;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_evenement AS id,titre,description,debut,fin,createur FROM evenement");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM evenement WHERE id_evenement=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }
}


/**
* classe Projet
*/
class Projet implements CRUD
{
    var $id,$nom,$description;
    var $auteur,$membres;
    
    function __construct($id,$nom,$description,$auteur,$membres)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->auteur = $auteur;
        $this->membres = $membres;
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("nom","description","auteur","membres"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);

        $titre = $donnees["titre"];
        $description = $donnees["description"];
        $membres = $donnees["membres"];
        $auteur = $donnees["auteur"];

        global $dbh;
            //debutons l'insertion dans la table utilisateur

        try {
            $dbh->beginTransaction();            
            $req = $dbh->prepare("INSERT INTO `projet` (`nom`, `description`, `auteur`)
                          VALUES (:nom,:description,:auteur)");
        
            $req->execute(array("nom"=>$nom, "description"=>$description, "createur"=>$createur));
            $id = $dbh->lastInsertId();

            $req = $dbh->prepare("INSERT INTO `membre` (`id_projet`, `id_utilisateur`)
                          VALUES (:id,:membre)");

            foreach ($membres as $key => $value) {
                $req->execute(array("id"=>$id, "membre"=>$value));
            }

            $pro = new Projet(0,$nom,$description,$auteur,$membres);
            return $pro;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function get($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_projet AS id,nom,description,auteur FROM projet WHERE id_projet=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();
            if($res)
            {
                $id = $res["id"];
                $nom = $res["nom"];
                $description = $res["description"];
                $auteur = $res["auteur"];

                $req = $dbh->query("SELECT id_utilisateur AS id FROM membre WHERE id_projet=$id");
                $res = $req->fetchAll();
                $membres = [];

                if($res)
                {
                    foreach ($res as $membre) {
                        $membres[] = $membre["id"];
                    }
                }
                else
                {
                    $membres[] = $auteur;
                }

                $pro = new Projet($id,$nom,$description,$auteur,$membres);
                return $pro;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_projet AS id,nom,description,auteur FROM projet");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM membre WHERE id_projet=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }
}


/**
* Filleule
*/
class Filleul implements CRUD
{    
    var $id, $nom, $numero, $parrain;

    function __construct($id, $nom, $numero, $parrain)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->numero = $numero;
        $this->parrain = $parrain;
    }

    static function creer($donnees){
        $res = Utilitaires::validateur_tab($donnees, array("nom","numero"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);

        $nom = $donnees["nom"];
        $numero = $donnees["numero"];

        global $dbh;
            //debutons l'insertion dans la table utilisateur

        try {
            $req = $dbh->prepare("INSERT INTO `filleul` (`nom`,`numero`)
                          VALUES (:nom,:numero)");
        
            $req->execute(array("nom"=>$nom, "numero"=>$numero));
            $id = $dbh->lastInsertId();

            $fil = new Filleul(0,$nom,$numero, 0);
            return $fil;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function get($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
            die($raison);
            
        $id = $donnees["id"];
        if(!is_numeric($id))
            die("Non numerique");

        global $dbh;

        try {            
            $req = $dbh->prepare("SELECT id_filleul AS id,nom,numero FROM filleul WHERE id_projet=:id");
        
            $req->execute(array("id"=>$id));
            $res = $req->fetch();

            if($res)
            {
                $id = $res["id"];
                $nom = $res["nom"];
                $numero = $res["numero"];

                $fil = new Filleul($id,$nom, $numero);
                return $fil;
            }
            else
                return NULL;

        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function lister($donnees)
    {
        global $dbh;

        try {
            $req = $dbh->prepare("SELECT id_filleul AS id,nom,numero,parrain FROM filleul");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    static function modifier($donnees)
    {

    }

    static function supprimer($donnees)
    {
        $res = Utilitaires::validateur_tab($donnees, array("id"));
        $erreur = $res[0];
        $raison = $res[1];
        if($erreur)
        {
            die(print_r($erreur));
        }

        $id = $donnees["id"];

        if(!is_numeric($id))
            die("Non entier");

        global $dbh;

        try {
            $dbh->exec("DELETE FROM filleul WHERE id_filleul=$id");
            return TRUE;
        } catch (Exception $e) {
            die(print_r($e));
        }
    }
}