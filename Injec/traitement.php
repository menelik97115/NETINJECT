<html>
<head>
<title>traitement du cycle </title>
</head>
<body>
<?
// on teste la d�claration de nos variables
echo " hello";
var_dump($_REQUEST);
if (isset($_POST['duree1']) {
	// on affiche nos r�sultats
	echo 'Votre duree '.$_POST['duree1'];
}
else echo 'aucune donn�e transmise' ;
?>
</body>