<html>
<head>
<title>traitement du cycle </title>
</head>
<body>
<?php
// on teste la déclaration de nos variables

if (!empty($_POST['duree1']) AND !empty($_POST['periode1'])){
	if($_POST['duree1'] OR $_POST['periode1'] != 0){
	// on affiche nos résultats
	$duree= $_POST['duree1'];
	$periode= $_POST['periode1'];
	echo "Votre duree est ".$duree." Et votre periode est de ".$periode;
	}
}	
else {
header('Location: cycle.php');
}

/*serveur*/
$nom = '192.168.56.1';
$port = '4400';
//donnés à envoyer
$start = $duree.$periode;

/*ouverture socket*/
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if($socket < 0){
        die('FATAL ERROR: socket_create() : " '.socket_strerror($socket).' "');
} else {
    echo "Creation OK.\n";
}
 
if (socket_connect($socket,192.168.56.1,80) < 0){
        die('FATAL ERROR: socket_connect()');
} else {
    echo "Connexion OK.\n";
}
/*/ouverture socket*/
 
/*envoi demande*/
if(($int = socket_write($socket, $start, strlen($start))) === false){
        die('FATAL ERROR: socket_write() failed, '.$int.' characters written');
}

 
/*lecture réponse*/
$reception = '';
while($buff = socket_read($socket, 2000)){
   $reception.=$buff;
}
echo $reception;
/*/lecture réponse*/
 
socket_close($socket);
?>


?>





</body>