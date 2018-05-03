/*appel de la fonction par le symbole $ */
jQuery(function($){



/* selection de tous les input de type range */
$('.range').each(function(){
	var classe = $(this).attr('class');
/* separation des chaines pour les expressions régulieres*/
	var mesures = classe.split(/([a-zA-Z]+)\-([0-9]+)/g);
	var elements = $(this).parent();
	var parametres = [];
	var input =	elements.find('input');
/* creation du slider à partir de la div */
	elements.append('<div class="uirange"></div>');
	
	for (i in mesures){
		i= i*1;
		if(mesures[i]== 'min') {
			parametres.min = mesures[i+1]*1;
			
		}
		if(mesures[i]== 'max') {
			parametres.max = mesures[i+1]*1;
	}
	}
	parametres.slide = function(event, ui){
/* insertion de la valeur dans la balise span */		
		elements.find('label span').empty().append(ui.value);
		input.val(ui.value);
	}
	parametres.value = input.val();
	parametres.range = 'min';
	
	/* recuperation de l'element*/	
	elements.find('.uirange').slider(parametres);
	elements.find('label span').empty().append(input.val());
	document.getElementById("duree1").value = input.val()
	document.getElementById("periode1").value = input.val()
	
	
	
	input.hide();
	});


});