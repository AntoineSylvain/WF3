$(function(){


	$('form').on('submit',function(ev){

		ev.preventDefault();

		var formValue = $(this).serialize()

		/*var $prenom = $('[name=prenom]').val()
		var $nom = $('[name=nom]').val()*/

		$.ajax({

			// on interroge le serveur sur reponse.php
			url: "reponse.php",
			data : formValue,
			/*data: { 
				prenom: $prenom,
				nom: $nom
					},*/
			// si la reponse est Ok
			success: function(reponseServeur){
				$('#erreur').hide()
				$('#reponse').text(reponseServeur)
				$('#reponse').show()			
				
			},
			// s'il y a une erreur
			error: function(){
				$('#reponse').hide()
				$('#erreur').text('Houston, On as un problème !!!!')
				$('#erreur').show()				
							
			},
			complete:function(){
				// on reinitialise le bouton
				//jBouton.text("Bonjour")
				


			},

		})

	/*$('button').click(function(event){
		// on previent l'utilisateur que le clic est pris en compte
		// en affichant "... en attente d'une réponse ..." sur le boutton
		var jBouton = $(this)
		var idTimeout = setTimeout(function(){
			jBouton.text("... en attente d'une réponse ...")
		},100)

		//event.preventDefault();

		// on envoi une requête au serveur
		$.ajax({

			// on interroge le serveur sur reponse.php
			url: "reponse.php",
			//type: 'GET',
			//data: 'prenom='+ $('[name=prenom]').val(),
			// si la reponse est Ok
			success: function(reponseServer){
				$('#reponse').text(reponseServer)
				$('#erreur').hide()	
				
			},
			// s'il y a une erreur
			error: function(){
				$('#erreur').show()
				$('#erreur').text('Houston, On as un problème !!!!')
							
			},
			complete:function(){
				// on reinitialise le bouton
				jBouton.text("Bonjour")
				clearTimeout(idTimeout)


			},
		})*/

		
	})
})