<html>
<head>
<title>traitement du cycle </title>
<link rel="stylesheet" href="../css/feuille.css">
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript">
function rebour(tps)
{
        if (tps>0)
        {
                var heure = Math.floor(tps/3600);
                if(heure >= 24)
                {
                        var jour = Math.floor(heure/24);
                        var moins = 86400*jour;
                        var heure = heure-(24*jour);
                }
                else
                {
                        var jour = 0;
                        var moins = 0;
                }
                moins = moins+3600*heure;
                var minutes = Math.floor((tps-moins)/60);
                moins = moins + 60*minutes;
                var secondes = tps-moins;
                minutes = ((minutes < 10) ? "0" : "") + minutes;
                secondes = ((secondes < 10) ? "0" : "") + secondes;
                document.getElementById("compteRebour_affiche").innerHTML = 'Temps restant avant la fin du cycle : '+secondes;
                var restant = tps-1;
                setTimeout("rebour("+restant+")", 1000);
        }
        else
        {
                document.getElementById("compteRebour_affiche").innerHTML = 'chargement ...';
        }
}
</script>
</head>
<body>

<?php

error_reporting(E_ALL);
// on teste la déclaration de nos variables

if (!empty($_POST['duree1']) AND !empty($_POST['periode1'])AND !empty($_POST['temps1'])){
	if($_POST['duree1'] OR $_POST['periode1'] OR $_POST['temps1'] != 0){
	// on affiche nos résultats
	$duree= $_POST['duree1'];
	$periode= $_POST['periode1'];
	$temps = $_POST['temps1'];
	echo "Votre duree est ".$duree." Et votre periode est de ".$periode;
	}
}	
else {
header('Location: cycle.php');
}
// utilisation des cookie pour reucperer la durée
setcookie(cookie_duree,$duree);
/*serveur*/
$adresse = '192.168.56.1';
$port = 4400;

//donnés à envoyer
$start ="START"." ".$duree." ".$periode." ".$temps;

/*ouverture socket*/
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socket,SOL_SOCKET,SO_RCVTIMEO,array('sec'=>2,'usec'=>0));
if($socket < 0){
        die('FATAL ERROR: socket_create() : " '.socket_strerror($socket).' "');
} else {
    echo "Creation OK.\n";
}
 
if (socket_connect($socket,$adresse,$port) < 0){
        die('FATAL ERROR: socket_connect()');
} else {
    echo "Connexion OK.\n";
}
/*/ouverture socket*/
 
/*envoi demande*/
if(($int = socket_write($socket, $start."\n", strlen($start))) === false){
        die('FATAL ERROR: socket_write() failed, '.$int.' characters written');
}

 
/*lecture réponse*/
$reception = '';
while($buff = socket_read($socket, 2000)){
   $reception.=$buff;
}
echo $reception;
/*/lecture réponse*/
 
?>
<div id="compteRebour_affiche"></div>
<script type="text/javascript">	
	rebour($duree);</script>
	
<div id="myProgress">
  <div id="myBar"></div>
</div>

<?php
socket_close($socket);
?>
</body>