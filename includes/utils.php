<?<?php

/*Ce fichier contient des classes pour des utilites
n'ayant pas de relation avec les classes metier
*/

/**
* classe Utilitaire
*/
class Utilitaires
{

	static function validateur_post($champs)
	{
		$erreur = FALSE;
	    $raison = array();
	    foreach($champs as $champ){
	        if (isset($_POST[$champ]) && !empty($_POST[$champ]))
	            ;
	        else {
	            $erreur = TRUE;
	            $raison[$champ] = "Champ $champ manquant";
	        }
	    }
	    
	    return array($erreur, $raison);
	}

	static function validateur_get($champs)
	{
		$erreur = FALSE;
	    $raison = array();
	    foreach($champs as $champ){
	        if (isset($_GET[$champ]) && !empty($_GET[$champ]))
	            ;
	        else {
	            $erreur = TRUE;
	            $raison[$champ] = "Champ $champ manquant";
	        }
	    }
	    
	    return array($erreur, $raison);
	}

	static function validateur_tab($tab, $champs)
	{
		$erreur = FALSE;
	    $raison = array();
	    foreach($champs as $champ){
	        if (isset($tab[$champ]) && !empty($tab[$champ]))
	            ;
	        else {
	            $erreur = TRUE;
	            $raison[$champ] = "Champ $champ manquant";
	        }
	    }
	    
	    return array($erreur, $raison);
	}

	static function str_random($length)
	{
        //je cree mon petit dictionnaire de lettre que j'utiliserais plus tard
        
        //$alphabet ="0123456789qwertyuiopasdfghjklzxcvbnmWWERTYUIOPASDFGHJKLZXCVBNM";
        $alphabet = "0123456789";
        
        //maintenant on va la repeter 60 fois pour faire le melange puis substr met de recuperer la valeur voulu a utilisé
        return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
	}

	static function upload_image($nom)
	{
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES[$nom]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES[$nom]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES[$nom]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		    return NULL;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES[$nom]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES[$nom]["name"]). " has been uploaded.";
		        return $target_file;
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        return NULL;
		    }
		}
	}

	static function upload_pdf($nom)
	{
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES[$nom]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$uploadOk = 1;
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES[$nom]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "pdf") {
		    echo "Desolé vous pouvez juste uploader un fichier PDF.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		    return NULL;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES[$nom]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES[$nom]["name"]). " has been uploaded.";
		        return $target_file;
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        return NULL;
		    }
		}
	}
	
}

?>