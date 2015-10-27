
<h1>Intégrités</h1>

<?php 

	include "../header.php";

	$chaine = "<strong>L'avion</strong> est prêt à décoller.</br></br>";
	$chaine2 = "<script type='text/javascript'>alert('Prêt pour l\'ajout des antislash');</script>";
	$email = "antoine_sylvain@hotmail.com";
	$email2 = "antoine_sylvain@hotmail";
	$url = "http://wf3.fr";
	$url2 = "www.wf3.apolearn.com/";

	echo $chaine;
	echo $chaine2;

	// ajout d'antislash dans la chaine
	echo addslashes($chaine);

	// htmlentities rend le code innoffensif
	echo htmlentities($chaine);
	echo "<hr/>";
	echo htmlentities($chaine2);
	echo "<hr/>";

	// htmlspecialchars : idem
	echo htmlspecialchars($chaine);
	echo "<hr/>";
	echo htmlspecialchars($chaine2);
	echo "<hr/>";

	// strip_tags supprime les balises HTML, JS et PHP
	echo strip_tags($chaine);
	echo "<hr/>";
	echo strip_tags($chaine2);
	echo "<hr/>";

	// validation de donnée
	echo filter_var($email, FILTER_VALIDATE_EMAIL);
	echo "<hr/>";
	echo filter_var($email2, FILTER_VALIDATE_EMAIL);
	echo "<hr/>";
	var_dump(filter_var($url, FILTER_VALIDATE_URL));
	echo "<hr/>";
	var_dump(filter_var($url2, FILTER_VALIDATE_URL));
	echo "<hr/>";


	
	

	include "../footer.php";
?>