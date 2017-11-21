<?php

include_once "utils.php";
include_once "classes.php";

/**
* classe de connexion
*/
class Connexion
{

	static function authenticate($donnees)
	{
		$user = Utilisateur::get($donnees);

		if(!$user)
			return NULL;

		$_SESSION['user_id'] = $user->id;
		$_SESSION['username'] = $user->username;
		$_SESSION['connected'] = TRUE;
		return $user;
	}

	static function deconnect()
	{
		if(isset($_SESSION['user_id']))
			unset($_SESSION['user_id']);

		if(isset($_SESSION['username']))
			unset($_SESSION['username']);

		if(isset($_SESSION['connected']))
			unset($_SESSION['connected']);		

		session_destroy();
	}

	static function verify_not_connected($page)
	{
		if(isset($_SESSION["connected"]) && $_SESSION["connected"]==TRUE)
		{
			$host = $_SERVER["HTTP_HOST"];
			header("Location: http://$host/$page");
		}
	}

	static function verify_connected($page)
	{
		if(!isset($_SESSION["connected"]) || $_SESSION["connected"]!=TRUE)
		{
			$host = $_SERVER["HTTP_HOST"];
			header("Location: http://$host/$page");
		}
	}
}


?>