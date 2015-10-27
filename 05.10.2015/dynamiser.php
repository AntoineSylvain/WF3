<h1>Dynamiser un site HTML</h1>



<?php 

	get_include_path();
	include "header.php";
	include "fonction.php";

	$tableau = array
				( 
					array
					(
						'Language'=>'PHP',
						'Age'=> 20,
						'Createur'=>'Rasmus Lerdorf',
					),

					array
					(
						'Language'=>'Java',
					  	'Age'=> 33,
					  	'Createur'=>'SUN',
					),

					array
					(
						'Language'=>'C#',
					  	'Age'=> 14,
					  	'Createur'=>'Microsoft',
					),

					array
					(
						'Language'=>'COBOL',
					  	'Age'=> 56,
					  	'Createur'=>'IBM',
					),

					array
					(
						'Language'=>'Basic',
					  	'Age'=> 51,
					  	'Createur'=>'Inconnu',
					),

					array
					(
						'Language'=>'C',
					  	'Age'=> 45,
					  	'Createur'=>'Inconnu',
					),

					array
					(
						'Language'=>'C++',
					  	'Age'=> 17,
					  	'Createur'=>'Toto',
					),
				);

	
	echo "<table>";			
	
	foreach ($tableau as $key => $language ) // boucle pour la dimension 1
	{
		if($key === 0) // sur le premier enregistrement
		{
			echo "<tr>";
			foreach ($language as $entete => $rien) // on a besoin de l'entete uniquement
			{
				echo "<th>".$entete."</th>"; // affichage d'une enetet de tableau
			}
			echo "</tr>";
		}

		echo "<tr>"; // ouverture d'une ligne du tableau
		foreach ($language as $valeur) // boucle pour la dimension 2
		{
			$class='';
			if(is_numeric($valeur)) $class='class="nombre"';
			echo "<td ".$class.">".$valeur."</td>"; // affichage d'une colonne du tableau
		}
		echo "</tr>"; // fermerture de ligne
	}
	echo "</table></br>";	

	echo afficheTableau($tableau);

	$tNombres = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);

	// affichage des nombres pairs
	echo "<pre>";
	print_r(array_filter($tNombres,'pair'));
	
	// affichage des nombres impairs
	
	print_r(array_filter($tNombres, 'impair'));
	
	// affichage des créateur inconnu
	
	print_r(array_filter($tableau, 'inconnu'));
	echo "</pre>";

	// calcul sur le tableau
	echo "<pre>";
	print_r(array_map("cube",$tNombres));
	echo "</pre>";

	// ajout d'une zone divers dans le tableau
	
	echo afficheTableau(array_map('divers',$tableau));
	

	include "footer.php";

?>