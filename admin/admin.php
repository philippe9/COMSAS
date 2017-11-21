<?php    
    include_once ('fonctions.inc');
    include_once ('../includes/connexionDb.inc');
    
    session_start();
    
    if(isset($_SESSION['connecte']))
    {
        if($_SESSION['connecte']==TRUE){
            $affiche_connexion = FALSE;
            $affiche_accueil = TRUE;
            $username_user = $_SESSION['username'];
            $nom_user = $_SESSION['nom'];
        }
        else{
            $affiche_connexion = TRUE;
        }
    }
    else{
        $_SESSION['connecte'] = FALSE;
        $affiche_connexion = TRUE;
    }
    
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $res = authentifier($username, $password);
        if(isset($res['result']) && $res['result']==TRUE){
            $_SESSION['connecte'] = TRUE;
            $affiche_connexion = FALSE;
            $affiche_accueil = TRUE;
            $username_user = $res['username'];
            $id_user = $res['id_admin'];
            $nom_user = $res['nom'];
            $_SESSION['username'] = $username_user;
            $_SESSION['nom'] = $nom_user;
            $_SESSION['user_id'] = $id_user;
        }
        else{
            $tentative_connexion = TRUE;
        }        
    }
?>

<!DOCTYPE html>
<head>
    <title>Administration - SportAcademy</title>
    <link rel="stylesheet" href="../css/admin.css"
</head>
<body>    
    <?php
    afficher_entete();
      if($affiche_connexion){
          if (isset($tentative_connexion)){
              afficher_formulaire_connexion($tentative_connexion);
          }
          else{
            afficher_formulaire_connexion(FALSE);
          }
      }
      else{
          afficher_navigation(0);
          echo "\t\t<div id=\"principale\">\n";
          if(isset($_GET['mode']))
          {
                $mode = $_GET['mode'];
                afficher_contenu($mode);
          }
          elseif(isset($_POST['mode']))
          {
              $mode = $_POST['mode'];
              enregistrer_contenu($mode);
          }
          else{
              afficher_contenu(0);
          }
          echo "\t\t</div>";
      }
    ?>
    
</body>