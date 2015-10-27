<?php 

	$auteur = htmlentities(strip_tags($_GET['authorName']));
	$com = htmlentities(strip_tags($_GET['commentaire']));

	echo '<span>'.$auteur.'</span><p>'.$com.'</p><time>'.date('\l\e d/m/Y \à H\hi').'</time>';

	
?>