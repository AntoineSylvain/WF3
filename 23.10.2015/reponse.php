<?php 

	$prenom = htmlentities(strip_tags($_GET['prenom']));
	$nom = htmlentities(strip_tags($_GET['nom']));

	echo 'Bonjour, Comment ça va '.ucfirst($prenom)." ".strtoupper($nom).' ?';

	/*echo 'Bonjour, Comment ça va ?';*/
	
?>