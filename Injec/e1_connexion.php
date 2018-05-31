<?php
session_start();
/* Système de connexion à la BDD
Utilisation d'un objet PDO  */

$bdd = new PDO('mysql:host=localhost;dbname=injecteur_bdd;charset=utf8', 'root','');
include("class/utilisateur.class.php"); // Classe de l'utilisateur

if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['captcha']) && isset($_SESSION['captcha']))
{
  $utilisateur = connexion_utilisateur($_POST['pseudo'], $_POST['mdp'], $_POST['captcha'], $_SESSION['captcha']['code']);
  if(!empty($utilisateur))
  {
    if($utilisateur == 'FALSE') // L'utilisateur n'existe pas
    {
        $erreur = 'Mauvaise combinaison pseudo/mdp';
    }
    elseif($utilisateur == 'CAPTCHA') // Le captcha n'est pas bon
    {
        $erreur = 'Le captcha est erroné';
    }
    else
    {
      $_SESSION['utilisateur'] = $utilisateur;
      header('location:cycle.php');
      break;
    }
  }
}
/* === CAPTCHA ==== */
include("config/captcha.php");
$_SESSION['captcha'] = captcha();
/* == FIN CAPTCHA = */
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login | Injecteurs</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="dist/style.css">
</head>
<body>
  <div class="ui top fixed menu"> 
    <div class="navbar-brand" href="#"><img src="images/logo1.png" style="height:6em"></div>
    <div class="right menu"> <!-- partie droite -->
    
    <a class="ui item"><i class="help icon"></i>Support</a>
    </div>    
  </div>
   <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image_logo {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>

  <div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="images/mini_logo_4.png" class="image_logo image">
      <div class="content" style="color:#19c0ea">
        Connexion à votre compte
      </div>
    </h2>
    <form method="POST" action="#" class="ui large form">
      <div class="ui stacked segment">
<?php
if(isset($erreur)) // Si une erreur existe
{ echo '<div class="ui message"><div class="header">Erreur</div><p>'.$erreur.'</p></div>'; }
?>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="pseudo" placeholder="Pseudonyme">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="mdp" placeholder="Mot de passe">
          </div>
        </div>
        <div class="field">
        <?php echo '<img src="config/captcha.php' . $_SESSION['captcha']['image_src'] . '" class="ui bordered fluid image" alt="CAPTCHA" />'; ?>
          <div class="ui left icon input">
            <i class="protect icon"></i>
            <input type="text" name="captcha" placeholder="Captcha">
          </div>
        </div>
        <input type="submit" class="ui fluid large teal submit button" style="background-color:#19c0ea" value="CONNEXION"/>
      </div>

      <div class="ui error message"></div>

    </form>

    
