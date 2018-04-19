<?php
function connexion_utilisateur($pseudo, $mdp, $captcha, $sessionCaptcha)
{
	global $bdd; // Objet PDO - Base de donnée

	if($captcha == $sessionCaptcha)
	{
		$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = pseudo AND mdp = mdp');
		$req->execute(array(
				'pseudo'=> $pseudo,
				'mdp' => $mdp));

		// la fonction rowCount renvoie le nombre de ligne 
		$utilisateur_existe = $req->rowCount();

		if($utilisateur_existe == 1) // L'utilisateur existe
		{
			$donnees = $req->fetch();
			// Mise à jour du timestamp de dernière connexion
			$req = $bdd->prepare('UPDATE utilisateurs SET date_connexion = :date WHERE ID = id');
			$req->execute(array('date'=> time(),
								'id'=> $donnees['ID']));
		}
		else
		{
			$donnees = 'FALSE';
		}
	}
	else
	{
		$donnees = 'CAPTCHA';
	}
	return $donnees;
}

