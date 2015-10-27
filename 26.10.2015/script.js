$(function(){


	$('form').on('submit',function(ev)
	{

		ev.preventDefault();

		var formValue = $(this).serialize()		

		$.ajax({

			url: "reponse.php",
			data : formValue,
			
			success: function(reponseServeur){
				$('#erreur').hide()
				var donneeServeur = JSON.parse(reponseServeur)
				 $('<li>')
				 		.append('<span>' + donneeServeur.auteur + '</span>')
				 		.append('<p>' + donneeServeur.commentaire + '</p>')
				 		.append('<time>' + donneeServeur.dateDeParution + '</time>')
				 		.prependTo('#commentaires')
				
				// autre methode : ('<li>'.reponseServeur.'</li>').prependTo('#commentaire')		
				
				
			},
			
			error: function(){
				$('#erreur').text('Houston, On as un problème !!!!')
				$('#erreur').show()									
							
			},
			complete:function(){
				
			}
				


		})
	})

})