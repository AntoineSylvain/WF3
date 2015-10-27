<?php 

	// protection contre les attaque XSS
	// Ne jamais faire confiance à l'utilisateur


	echo htmlentities(strip_tags($_POST['recherche']));


	
?>