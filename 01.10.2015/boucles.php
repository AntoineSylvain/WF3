<h1>Les boucles et Fonction utiles</h1>


<?php 

	/********************************************
	*											*
	*	Script d'apprentissage des boucles		*
	*	et fonctions utiles en PHP 				*
	*											*
	*	le 01/10/2015 							*
	*											*
	********************************************/

	include "../header.php";


	$tNom = array('Bruno','David','Sylvain','Samuel','Remy','Ali','Florian','Jean-Batiste','Nicolas','Naofal','Gregory','Eric','Dominique','Anthony','Christopher','Merill');
	$tNomNote = array('Bruno' => 'non noté','David'=> 14,'Sylvain'=> 15,'Samuel'=> 14,'Remy'=> 15,'Ali'=> 13,'Florian'=> 13,'Jean-Batiste'=> 13,'Nicolas'=> 13,'Naofal'=> 13,'Gregory'=> 13,'Eric'=> 13,'Dominique'=> 13,'Anthony'=> 13,'Christopher'=> 13,'Merill'=> 13);
	$iNombreElement =count($tNom); // Compte le nombre d'element du tableau
	shuffle($tNom);

	echo "<ul>"; // Liste HTML
	for ($i=0; $i < $iNombreElement ; $i++) // Boucle de 0 à 3
	{ 
		echo "<li>".$tNom[$i]."</li>"; // Affichage de l'element d'indice i
	}
	echo "</ul>"; // fin de liste HTML

	echo "<ul>"; // Liste HTML
	foreach ($tNom as $key ) 	 
	{ 
		echo "<li>".$key."</li>"; 
	}
	echo "</ul>"; // fin de liste HTML

	// Tableau associatif (les clés sont nommés et non numerique)
	echo "<table><tr><th>Element</th><th>Valeur</th></tr>"; // Liste HTML
	// parcours du tableau avec affichage des clés et des valeurs
	foreach ($tNomNote as $key => $note ) 	 
	{ 
		echo "<tr><td>".$key."</td><td>".$note."</td></tr>"; 
	}
	echo "</table>"; // fin de liste HTML


	// affichage d'un tableau directement
	echo '<pre>'.print_r($tNom,true).'</pre>';
	// affichage avec types et tailles
	echo '<pre>';
	echo var_dump($tNom);
	echo '</pre>';

	$numerateur = 8;
	$tNombre = array(10,5,0,2,8,6,7,12,65,45,36,88,54,12);
	foreach ($tNombre as $nombre)
	{
		if($nombre == 0) continue;
		echo '<li>'.round($numerateur/$nombre,2).'</li>';
		if($nombre == 45) break;
	}

	$variable = "contenu";

	// vérification de l'existance d'une variable ou d'un élémént de tableau
	if(isset($variable)) echo "variable est définie<br/>";
	if(isset($tNomNote['Sylvain'])) echo "élément nom du tableau définie<br/>";

	// vérification que la variable est définie ou nulle
	if(empty($variable)) echo "La variable est non définie ou nul<br/>";
	else echo "l'element ou la variable est définie ou non nul<br/>";
	if(empty($tNomNote['Sylvain'])) echo "La variable est non définie ou nul<br/>";
	else echo "l'element ou la variable est définie ou non nul<br/>";

	// vérification si chaine de caractére
	if(is_string($variable)) echo 'variable est une chaine de caractére<br/>';
	// vérification si numerique
	else if (is_numeric($variable)) echo 'variable est numerique<br/>';

	//suppression de la variable
	unset($variable);
	if(isset($variable)) echo "variable est définie<br/>";
	else echo "variable est non définie<br/>";
	if(empty($variable)) echo "La variable est non définie ou nul<br/>";
	else echo "l'element ou la variable est définie ou non nul<br/>";

	

	// inclusion du bas de page
	include "../footer.php";




?>