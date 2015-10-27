function chargementPage(param)
{
		$.ajax({

			url: param,
			dataType: 'JSON',					
			success: function(reponseServeur){
				
				$('#titre').text(reponseServeur.titre)
				$('#article').text(reponseServeur.article)
				$('#auteur').text(reponseServeur.auteur)
				$('#date').text(reponseServeur.date)
				$('body').css({'background-image': 'url('+reponseServeur.bckground+')',
								'background-repeat': 'no-repeat',
								'background-size': 'cover'})
				$('article').css({'color':reponseServeur.couleur})
						 
						
			},
		})

}




$(function(){


	$('.lien').click(function(ev)
	{
		

		ev.preventDefault();

		var $LIEN = $(this).attr('href')


		chargementPage($LIEN);
		
			
	})

	chargementPage('pageDefaut.php');

	
})