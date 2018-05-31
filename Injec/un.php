<!DOCTYPE html>
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
        text: "Cancel Download",
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
            label: "Start Generation"
          });
        }
      }),
      downloadButton = $( "#downloadButton" )
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
  } );
</script>
</head>
<body>
<?php

error_reporting(E_ALL);
// on teste la déclaration de nos variables
if (!isset($_POST['duree1']) AND !isset($_POST['periode1'])AND !isset($_POST['temps1'])){
?>

<form name = "cycle" method="post" action="cycle.php">
  <div class="input">
	<label for="">Durée <span></span></label>
	<input type="text" name="duree" class="range min-0 max-5" />
	<input type='hidden' id='duree1' name='duree1' value=''> 

</div>
<div class="input">
	<label for="">periode <span></span></label>
	<input type="text" name="periode" class="range min-0 max-5">
	<input type='hidden' id='periode1' name='periode1' value=''> 

</div>

<div class="input">
	<label for="">temps a l'etat haut du signal <span></span></label>
	<input type="text" name="temps" class="range min-0 max-5">
	<input type='hidden' id='temps1' name='temps1' value=''> 
</div>

<div class="input">
<!--<button id="generer" class="ui-button ui-corner-all ui-widget">Generer</button> --> 
<div id="dialog" title="Generation du Cycle">
  <div class="progress-label">Starting...</div>
  <div id="progressbar"></div>
</div>
<button id="downloadButton"class ="ui fluid large teal submit button" style="background-color:#19c0ea; width:120px">Start Generation</button>


</div>
</body>
<script> 
 $(document).ready(function(){
	$('#generer').click(function(){
		$('form').hide(2000,function(){ 
		
			});
	});
});
</script>
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
</body>
</html>
<?php	
	}
}	
else {
 echo "erreur";

}
