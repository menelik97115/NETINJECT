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
?>





</body>