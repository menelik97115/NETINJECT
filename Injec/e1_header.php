<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dist/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="dist/style.css">
</head>
<body>
	<div class="ui top fixed menu"> 
	  <div class="item">
		<img src="images/mini_logo.png">
	  </div>
	  <a href="e1_index.php" class="ui item"><i class="home icon"></i>Accueil</a>
	  <div class="navbar-brand" href="#"><img src="images/logo.png" style="height:4em"></div>
	  <div class="right menu"> <!-- partie droite -->
		<div class="ui item">
			<p>Connecté en tant que <a href="#"><?php echo $_SESSION['utilisateur']['pseudo']; ?></p>
		</div>
		<a class="ui item"><i class="comments outline icon"></i>Forums</a>
		<a class="ui item"><i class="help icon"></i>Support</a>
		<a class="ui item"><i class="sign out icon"></i>Deconnexion</a>
	  </div>	  
	</div>	
	<div style="margin-top:3em" class="ui grid">
		<div class="four wide column"></div>
		<div class="eight wide column">
			<form method="GET" action="recherche.php" class="ui fluid action input">
			  <input placeholder="Search..." type="text">
			  <button type="submit" class="ui button">Rechercher</button>
			</form>
		</div>
		<div class="four wide column"></div>
	</div>
	<!-- FIN MENU TOP -->