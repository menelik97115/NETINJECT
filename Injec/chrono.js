function timingBox( sec, min, hour )
{
	this.secondes = sec;
	this.minutes = min;
	this.heures = hour;
}

function chrono(temps,tagid)
{
		var timeBox = new timingBox( 0, 0, 0);
		//Si un temps est passer en parametre (en seconde) on converti pour les minutes et heures
			timeBox.secondes=temps;
		
			if (timeBox.secondes > 60) 
			{
				timeBox.minutes = Math.floor(timeBox.secondes / 60);
				timeBox.secondes = timeBox.secondes - timeBox.minutes * 60;
			}
			if (timeBox.minutes > 60) 
			{
				timeBox.heures = Math.floor(timeBox.minutes / 60);
				timeBox.minutes = Math.floor(timeBox.minutes - timeBox.heures * 60);
			}
		
		//Reajustage des valaures pour l'affichage
		if (timeBox.heures < 10) rheures = '0'+timeBox.heures; else rheures = timeBox.heures;
		if (timeBox.minutes < 10) rminutes = '0'+timeBox.minutes; else rminutes = timeBox.minutes;
		if (timeBox.secondes < 10) rsecondes = '0'+timeBox.secondes; else rsecondes = timeBox.secondes;

		temps = temps - 1;	
		//Affichage selon l'id
		document.getElementById(tagid).innerHTML = " "+rheures + ":" + rminutes + ":" + rsecondes;
		
		//Reactualisation du chrono si different de 0.
		if ( temps > 0)
		{
			setTimeout("chrono("+temps+", '"+tagid+"')", 1000);
		}
		else
		{			
			parent.location.replace('cycle.php');
		}		
}