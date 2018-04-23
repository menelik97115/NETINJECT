<html>
<head>
<title>traitement du cycle </title>
</head>
<body>
<?
// on teste la déclaration de nos variables
echo " hello";
var_dump($_REQUEST);
if (isset($_POST['duree1']) {
	// on affiche nos résultats
	echo 'Votre duree '.$_POST['duree1'];
}
else echo 'aucune donnée transmise' ;
?>
</body>