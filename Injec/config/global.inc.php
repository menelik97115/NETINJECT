<?php
// Démarrage de la session
session_start();

// Vérification si l'utilisateur est bien connecté
if(empty($_SESSION['utilisateur']) OR !isset($_SESSION['utilisateur']))
{
	header('location:e1_connexion.php');

	break;
}

/* Système de connexion à la BDD
Utilisation d'un objet PDO  */
$bdd = new PDO('mysql:host=localhost;dbname=injecteur_bdd;charset=utf8', 'root', '');
