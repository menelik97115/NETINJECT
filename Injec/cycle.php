<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/dot-luv/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript" src="main.js"></script>
</head>
<body>
<form name = "cycle" method="post" action="traitement.php">
  <div class="input">
	<label for="">Durée <span></span></label>
	<input type="text" name="duree" class="range min-0 max-5" value="0"/>
	<input type='hidden' id='duree1' name='duree1' value=''> 

</div>
<div class="input">
	<label for="">periode <span></span></label>
	<input type="text" name="periode" class="range min-0 max-5" value="0">
	<input type='hidden' id='periode1' name='periode1' value=''> 

</div>
<div class="input">
<button id="button" class="ui-button ui-corner-all ui-widget">Generer</button> 


</div>

</form>
</body>
</html>