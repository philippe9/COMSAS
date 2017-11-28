<?php 

include_once 'classes.php';
include_once 'secu.php';

/**
* affiche utilisateur
*/
class AffichConnexion extends Connexion
{

	//authenticate affiche le formulaire
	static function authenticate($donnees)
	{
		if(isset($donnees['username']) && !empty($donnees['username']))
			$username = $donnees['username'];
		else
			$username = NULL;

		echo '<div class="row">
           <div class="col-md-offset-2 col-md-8 col-md-offset-2">
		<form action="login.php" method="POST" class="center">
                <h3 class="red-text darken-3-text text-center">Connexion</h3>

              

                <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="nom">Utilisateur 
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" required class="form-control col-md-3 col-xs-2" placeholder="Your Name" name="username" value="'.$username.'">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="password">Mot de passe 
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="nom" required class="form-control col-md-3 col-xs-2" placeholder="Password" name="password">
                    </div>
                </div>

<div class="row form-group">
                        <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                            <button class="btn btn-info">Connectez vous</button>
                    </div>
                    </div>            </form>
            </div>
            </div>
            ';
	}

	static function succes()
	{
		$host = $_SERVER["HTTP_HOST"];
		echo '<p>Vouz avez été authentifié. Cliquez <a href="http://'.$host.'/">ici</a> pour revenir à l\'accueil</p>';
	}
}


/**
* affiche Utilisateur
*/
class AffichUtilisateur extends Utilisateur
{
	static function creer($donnees)
	{
		if(isset($donnees['username']) && !empty($donnees['username']))
			$username = $donnees['username'];
		else
			$username = NULL;

		if(isset($donnees['email']) && !empty($donnees['email']))
			$email = $donnees['email'];
		else
			$email = NULL;

		if(isset($donnees['error']) && !empty($donnees['error']))
		{
			$raisons_all = "";

			foreach ($donnees["error"] as $raison) {
				$raisons_all .= "$raison. <br/>";
			}
			$error = '<p class="error bold red-text">'.$raisons_all.'</p>';
		}
		else
			$error = NULL;

		echo '
           <div class="row">
           <div class="col-md-offset-2 col-md-8 col-md-offset-2">
		<form action="signup.php" method="POST" class="center">
				<input type="hidden" name="mode" value="add" />
                <h1 class="red-text darken-3-text text-center">Inscription</h1>

                '.$error.'

               <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="nom">Nom 
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nom" required class="form-control col-md-3 col-xs-2" placeholder="Your Name" name="nom" value="'.$username.'">
                    </div>
                </div>
                  <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="nom">Email 
                        </label>
                    <div class="row col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="mail" required class="form-control col-md-3 col-xs-2" placeholder="Your Email" name="mail" value="'.$email.'">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="nom">Password 
                        </label>
                    <div class="row col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="mail" required class="form-control col-md-3 col-xs-2" placeholder="Your pass" name="mail" value="">
                    </div>
                </div>
            

                 <div class="row form-group">
                        <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                            <button class="btn btn-info">Inscrivez vous</button>
                    </div>
                    </div>
            </form>
            </div>
            </div>
            ';
	}

	static function succes()
	{
		$host = $_SERVER["HTTP_HOST"];
		echo '<p>Vouz avez été enregistré. Nous vous avons envoyé un mail contenant un lien. Ouvrez le lien pour activer votre compte</p>';
	}
}


/**
* affichage partenaire
*/
class AffichPartenaire extends Partenaire
{
	
	static function creer($donnees)
	{
		if(isset($donnees['nom']) && !empty($donnees["nom"]))
			$nom = $donnees['nom'];
		else
			$nom = NULL;

		if(isset($donnees['annee']) && !empty($donnees['annee']))
			$annee = $donnees['annee'];
		else
			$annee = NULL;

		if(isset($donnees['raison']) && !empty($donnees['raison']))
			$raison = $donnees['raison'];
		else
			$raison = NULL;

		if(isset($donnees['role']) && !empty($donnees['role']))
			$role = $donnees['role'];
		else
			$role = NULL;

		if(isset($donnees['logo']) && !empty($donnees['logo']))
			$logo = $donnees['logo'];
		else
			$logo = NULL;

		if(isset($donnees['error']) && !empty($donnees['error']))
		{
			$raisons_all = "";

			foreach ($donnees["error"] as $raison) {
				$raisons_all .= "$raison. <br/>";
			}
			$error = '<p class="error bold red-text">'.$raisons_all.'</p>';
		}
		else
			$error = NULL;

		echo '<form action="partner.php" method="POST" class="center" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="add" />
                <h3 class="red-text darken-3-text">Ajouter un partenaire</h3>

                '.$error.'

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="nom" name="nom" value="'.$nom.'" />
                    <label for="nom">Nom</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="annee" name="annee" value="'.$annee.'" />
                    <label for="annee">Annee</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="raison" name="raison" value="'.$raison.'" />
                    <label for="raison">Raison</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="role" name="role" value="'.$role.'" />
                    <label for="role">Role</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="logo" name="logo" value="'.$logo.'" />
                    <label for="logo">Url du logo</label>
                </div>
                </div>             

                <div class="row">
                <button type="submit" name="action" class="btn waves-effect waves-light red darken-3">Ajouter   </button>
                </div>
            </form>';
	}

	static function lister($donnees)
	{
		$parts = parent::lister($donnees);

		$i = 0;

		foreach ($parts as $part) {
			$id = $part["id"];
			$nom = $part["nom"];
			$annee = $part["annee"];
			$raison = $part["raison"];
			$role = $part["role"];
			$logo = $part["logo"];

			if($i==0 || $i==3 || $i==6)
				echo 
			$page = '
						<div class="col-lg-5 col-lg-offset-1 panel">
					<div class="card gray darken-1 black-text">
						<div class="card-image">
							<img src="'.$logo.'" class="img-responsive partenaire-logo">
							<span class="card-title">'.$nom.'</span>
						</div>
						<div class="card-content">
							<span class="card-title bold">'.$raison.'</span>
							<div class="divider"></div>
							<p>'.$annee.'</p>
							<div class="divider"></div>
							<p>'.$role.'</p>
						</div>
					</div>
		        </div>';

			echo $page;
			
			if($i==2 || $i==5 || $i==8){
				echo '
					</div>';
			}

			$i++;			
		}

		if($i==1 || $i==2 || $i==4 || $i==5 || $i==7 || $i==8){
			echo '
					</div>';
		}
	}
}


/**
* affichage Article
*/
class AffichArticle extends Article
{
	
	static function lister($donnees)
	{
		$arts = parent::lister($donnees);

		$i = 0;

		foreach ($arts as $art) {
			$id = $art["id"];
			$titre = $art["titre"];
			$resume = $art["resume"];
			$corps = $art["corps"];
			$date = $art["date"];

			if(strlen($resume) > 255){
				$resume = substr($resume, 0, 255);				
			}
			//else
			//	$resume = str_pad($resume, 200, ' &nbsp;');

			if($i==0 || $i==3 || $i==6)
				echo '	
					<div class="row">';

			$page = '
						<div class="col-sm-3 col-sm-offset-1 panel">
					<div class="card gray darken-1 black-text">
						<div class="card-content">
							<span class="card-title bold"><a class="black-text bold" href="article.php?mode=view&id='.$id.'">'.$titre.'</a></span>
							<div class="divider"></div>
							<p>'.$resume.'</p>
						</div>
						<div class="card-action">
							<a style="margin-bottom:1%;" href="article.php?mode=view&id='.$id.'" class="white-text"><button class="btn btn-danger">Lire</button></a>
						</div>
					</div>
		        </div>';

			echo $page;
			
			if($i==2 || $i==5 || $i==8){
				echo '
					</div>';
			}

			$i++;			
		}

		if($i==1 || $i==2 || $i==4 || $i==5 || $i==7 || $i==8){
			echo '
					</div>';
		}
	}

	static function creer($donnees)
	{
		if(isset($donnees['titre']) && !empty($donnees["titre"]))
			$titre = $donnees['titre'];
		else
			$titre = NULL;

		if(isset($donnees['resume']) && !empty($donnees["resume"]))
			$resume = $donnees['resume'];
		else
			$resume = NULL;

		if(isset($donnees['corps']) && !empty($donnees["corps"]))
			$corps = $donnees['corps'];
		else
			$corps = NULL;

		if(isset($donnees['error']) && !empty($donnees['error']))
		{
			$raisons_all = "";

			foreach ($donnees["error"] as $raison) {
				$raisons_all .= "$raison. <br/>";
			}
			$error = '<p class="error bold red-text">'.$raisons_all.'</p>';
		}
		else
			$error = NULL;
				
		echo '<form action="article.php" method="POST" class="center">
                <input type="hidden" name="mode" value="add" />
                <h3 class="red-text darken-3-text">Ajouter un article</h3>

                '.$error.'

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="titre" name="titre" value="'.$titre.'" />
                    <label for="titre">Titre</label>
                </div>
                </div>

                <div class="input-field">
                    <label for="corps">Contenu</label>
                    <textarea name="corps" id="mytextarea"  class="materialize-textarea">'.$corps.'</textarea>
                </div>

                <div class="input-field">
                    <textarea name="resume" id="resume" class="materialize-textarea">'.$resume.'</textarea>
                    <label for="resume">Resume</label>
                </div>              

                <div class="row">
                <button type="submit" name="action" class="btn waves-effect waves-light red darken-3">Se Connecter</button>
                </div>
            </form>';
	}

	function afficher()
	{
		echo '<article class="">
			<h3 class="center">'.$this->titre.'</h3>
			<div class="row">
				'.$this->corps.'
			</div>
			<div class="row">
				<p>Publié le '.$this->date.'</p>
			</div>
		</article>';
	}

	static function get($donnees)
	{
		$art = parent::get($donnees);
		$f_art = new AffichArticle($art->id, $art->titre, $art->resume, $art->corps, $art->date, $art->posteur);
		return $f_art;
	}
}


/**
* affiche cours
*/
class AffichCours extends Cours
{
	
	static function creer($donnees)
	{
		if(isset($donnees['nom']) && !empty($donnees["nom"]))
			$nom = $donnees['nom'];
		else
			$nom = NULL;

		if(isset($donnees['niveau']) && !empty($donnees['niveau']))
			$niveau = $donnees['niveau'];
		else
			$niveau = NULL;

		if(isset($donnees['professeur']) && !empty($donnees['professeur']))
			$professeur = $donnees['professeur'];
		else
			$professeur = NULL;

		if(isset($donnees['annee']) && !empty($donnees['annee']))
			$annee = $donnees['annee'];
		else
			$annee 	= NULL;

		if(isset($donnees['error']) && !empty($donnees['error']))
		{
			$raisons_all = "";

			foreach ($donnees["error"] as $raison) {
				$raisons_all .= "$raison. <br/>";
			}
			$error = '<p class="error bold red-text">'.$raisons_all.'</p>';
		}
		else
			$error = NULL;

		echo '<form action="cours.php" method="POST" class="center" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="add" />
                <h3 class="red-text darken-3-text">Ajouter un cours ou TD</h3>

                '.$error.'

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="nom" name="nom" value="'.$nom.'" />
                    <label for="nom">Nom</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="annee" name="annee" value="'.$annee.'" />
                    <label for="annee">Annee</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="niveau" name="niveau" value="'.$niveau.'" />
                    <label for="niveau">Niveau</label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s12">                    
                    <input type="text" id="professeur" name="professeur" value="'.$professeur.'" />
                    <label for="professeur">Professeur</label>
                </div>
                </div>

                <div class="file-field input-field">
                    <div class="btn">
                        <span>Fichier</span>
                        <input type="file">
                    </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>             

                <div class="row">
                <button type="submit" name="action" class="btn waves-effect waves-light red darken-3">Ajouter   </button>
                </div>
            </form>';
	}
}


/**
* Affichage Filleule
*/
class AffichFilleul extends Filleul
{
	
	static function creer($donnees)
	{
		if(isset($donnees['nom']) && !empty($donnees["nom"]))
			$nom = $donnees['nom'];
		else
			$nom = NULL;

		if(isset($donnees['numero']) && !empty($donnees['numero']))
			$numero = $donnees['numero'];
		else
			$numero = NULL;

		if(isset($donnees['sexe']) && !empty($donnees['sexe']))
			$sexe = $donnees['sexe'];
		else
			$sexe = NULL;

		if(isset($donnees['error']) && !empty($donnees['error']))
		{
			$raisons_all = "";

			foreach ($donnees["error"] as $raison) {
				$raisons_all .= "$raison. <br/>";
			}
			$error = '<p class="error bold red-text">'.$raisons_all.'</p>';
		}
		else
			$error = NULL;

		echo '<h1>Enregistrement pour le parrainage</h1>

				'.$error.'

                <form action="parrain.php" method="POST">
                	<input type="hidden" name="mode" value="add" />
                	
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrer votre nom" value="'.$nom.'"/>
                    </div>

                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Entrer votre numero" value="'.$numero.'"/>
                    </div>
                    <div class="form-group">
                    <label for="preference">Preference</label>
                     <select class="form-control" id="fonction" name="preference">
                        <option>Developpement web</option>
                        <option>Developpement android</option>
                        <option>Developpement desktop</option>
                        <option>Reseaux</option>
                        <option>Securite</option>
                        <option>Maintenance / Architecture</option>
                        <option>Inconnu</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" class="form-control">
                            <option value="F">
                                Feminin
                            </option>

                            <option value="M">
                                Masculin
                            </option>
                        </select>
                    </div>

                    <button class="btn btn-info" type="submit">S\'enregistrer</button>
                </form>';
	}
}

?>