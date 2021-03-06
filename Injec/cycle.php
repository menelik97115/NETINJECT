<?php 
include("config/global.inc.php");
include("e1_header.php");
include("class/utilisateur.class.php"); // Classe de l'utilisateur
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!-- feuilles de style nécessaire-->

<link rel="stylesheet" href="../css/feuille.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/dot-luv/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="../css/feuille.css">
<link rel="stylesheet" type="text/css" href="dist/semantic.min.css">
 <link rel="stylesheet" type="text/css" href="dist/style.css">
<script type="text/javascript" src="main.js"></script>

<!-- fonction javascript pour la barre de chargement-->
<script>
  $( function() {
    var progressTimer,
      progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" ),
      dialogButtons = [{
        text: "Annuler",
        click: closeDownload
      }],
      dialog = $( "#dialog" ).dialog({
        autoOpen: false,
        closeOnEscape: false,
        resizable: false,
        buttons: dialogButtons,
        open: function() {
          progressTimer = setTimeout( progress, 2000 );
        },
        beforeClose: function() {
          downloadButton.button( "option", {
            disabled: false,
            label: "Generer"
          });
        }
      }),
      downloadButton = $( "#generer" )
        .button()
        .on( "click", function() {
          $( this ).button( "option", {
            disabled: true,
            label: "Downloading..."
          });
          dialog.dialog( "open" );
        });
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( "Progression: " + progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Terminer !" );
        dialog.dialog( "option", "buttons", [{
          text: "Close",
          click: closeDownload
        }]);
        $(".ui-dialog button").last().trigger( "focus" );
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + Math.floor( Math.random() * 3 ) );
 
      if ( val <= 99 ) {
        progressTimer = setTimeout( progress, 50 );
      }
    }
 
    function closeDownload() {
      clearTimeout( progressTimer );
      dialog
        .dialog( "option", "buttons", dialogButtons )
        .dialog( "close" );
      progressbar.progressbar( "value", false );
      progressLabel
        .text( "Starting download..." );
      downloadButton.trigger( "focus" );
    }
	
	function activer(){
		document.form.generer.disabled=false;
	}
	
	function desactiver(){
		document.form.generer.disabled=true;
		
	}
  } );
</script>
</head>
<body>
<?php
$reponseBdd=$bdd->query('SELECT ETAT FROM  donne_etat');
//$reponseBdd=$bdd->query('SELECT etat FROM donne_etat ,agenda WHERE agenda.duree = donne_etat.duree ORDER BY date_nettoyage DESC LIMIT 1'); 

while ($donnees = $reponseBdd->fetch())
{
	$reponse = $donnees['ETAT'];
	

}
error_reporting(E_ALL);
// on teste la déclaration de nos variables
if (!isset($_POST['duree1']) AND !isset($_POST['periode1'])AND !isset($_POST['temps1'])){
?>
	<div class="ui centered grid">
		<div class="fourteen wide column">
			<div class="">
				<div class="ui breadcrumb">
				  <a class="section">Accueil</a>
				  <i class="right angle icon divider"></i>
				  <div class="active section"><i class="icon home"></i></div>
				</div>
			</div>
		</div>
	</div>
<div class="ui centered grid">
	
<div class="three wide column">
<?php include("e1_menu_produits.php"); // MENU DES PRODUITS ?>
</div>
<div class="eleven wide column">
			<h1 class="ui header">Gestion Des Cycles !</h1>
			<hr/>
			<p>Bienvenue sur NETINJECT ! Profitez ici d'un nettoyage efficace
			et d'une sécurité très importante.Tout le monde trouvera son bonheur sur NETINJECT</p>
			<hr/>
			<div class="ui centered grid">
			<div class="fifteen wide column">
			<h3 class="ui header">Durée</h3>
<form name = "cycle" method="post" action="cycle.php">
  <div class="input">
	<label for=""><span></span></label>
	<input type="text" name="duree" class="range min-0 max-5" />
	<input type='hidden' id='duree1' name='duree1' value=''> 
</div>

<hr/>

<h3 class="ui header">Periode</h3>
<div class="input">
	<label for=""><span></span></label>
	<input type="text" name="periode" class="range min-0 max-5">
	<input type='hidden' id='periode1' name='periode1' value=''> 


</div>
<hr/>
<h3 class="ui header">Temps à l'etat haut</h3>
<div class="input">
	<label for=""><span></span></label>
	<input type="text" name="temps" class="range min-0 max-5">
	<input type='hidden' id='temps1' name='temps1' value=''>
	
	
</div>
<hr/>
<div class="input">
<!--<button id="generer" class="ui-button ui-corner-all ui-widget">Generer</button> --> 
<div id="dialog" title="Generation du Cycle">
  <div class="progress-label">Starting...</div>
  <div id="progressbar"></div>
</div>
<?php
if($reponse=="Start"){
?>
<button id="generer"class ="ui fluid large teal submit button" disabled style="display: inline; background-color:#2185d0; width:120px">Generer</button>
<button id="annuler"class ="ui fluid large teal submit button"  style="display: inline; background-color:#fbbd08; width:120px">Annuler</button>
<?php
}
elseif($reponse=="Stop" OR NULL){
?>
<button id="generer"class ="ui fluid large teal submit button" style="background-color:#2185d0; width:120px">Generer</button>
<?php
}
?>
</div>

</div>
</div>
</div>
</form>
</body>

<?php
}
elseif (!empty($_POST['duree1']) AND !empty($_POST['periode1'])AND !empty($_POST['temps1'])){
	if($_POST['duree1'] OR $_POST['periode1'] OR $_POST['temps1'] != 0){
	// on affiche nos résultats
	$duree= $_POST['duree1'];
	$periode= $_POST['periode1'];
	$temps = $_POST['temps1'];
	echo "Votre duree est ".$duree." Et votre periode est de ".$periode;
	// utilisation des cookie pour reucperer la durée
setcookie($duree);
/*serveur*/
$adresse = '192.168.13.52';
$port = 15555;

//donnés à envoyer
$start ="Start"." P".$periode." D".$duree." T".$temps." Fin";

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

 
/*lecture réponse
$reception = '';
while($buff = socket_read($socket, 2000)){
   $reception.=$buff;
}
echo $reception;
lecture réponse*/
 
socket_close($socket);
?>

</html>
<?php	
	}
}	
elseif (isset($_POST['annuler'])){
$adresse = '127.0.0.1';
$port = 25003;

//donnés à envoyer
$stop ="Stop";

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
if(($int = socket_write($socket, $stop."\n", strlen($start))) === false){
        die('FATAL ERROR: socket_write() failed, '.$int.' characters written');
}

 
/*lecture réponse
$reception = '';
while($buff = socket_read($socket, 2000)){
   $reception.=$buff;
}
echo $reception;
lecture réponse*/
 
socket_close($socket);
}
else {
 echo "erreur";

}
