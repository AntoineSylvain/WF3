$(function(){


	$('form').on('submit',function(ev)
	{

		ev.preventDefault();

		var formValue = $(this).serialize()		

		$.ajax({

			url: "reponse2.php",
			data : formValue,
			
			success: function(reponseServeur){
				$('#erreur').hide()
				var liParent = $('<li>')
				liParent.prependTo('#commentaires')
				liParent.html(reponseServeur)	
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