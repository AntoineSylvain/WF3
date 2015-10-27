<?php 

	get_include_path();
	include "header.php";
	include "fonction.php";
	

/************************
*						*
*	le 06/10/2015		*
*	Révision PHP 		*
*	- Tableau 2D		*
*	- Boucles			*
*						*
************************/

	$tableau = array( 
						array("Nom" =>"Antoine Sylvain","Francais" => mt_rand(0,20),"Math" => mt_rand(0,20),"Info" => mt_rand(0,20)),
						array("Nom" =>"Arcole David","Francais" => mt_rand(0,20),"Math" => mt_rand(0,20),"Info" => mt_rand(0,20)),
						array("Nom" =>"Besancon JB","Francais" => mt_rand(0,20),"Math" => mt_rand(0,20),"Info" => mt_rand(0,20)),
						array("Nom" =>"Cherfi Ali","Francais" => mt_rand(0,20),"Math" => mt_rand(0,20),"Info" => mt_rand(0,20)),
						
					);

	echo "<pre>";
	print_r($tableau);
	echo "</pre>";

	// moyenne pour les maths
	$moyMath = 0;

	// moyenne pour le francais
	$moyFrancais = 0;

	// moyenne pour l'info
	$moyInfo = 0;

	// Premiere boucle
	$nbElmt = count($tableau);
	echo "<table><tr><th>Nom</th><th>Francais</th><th>Math</th><th>Info</th><th>Moyenne</th></tr>";
	for ($i=0; $i <$nbElmt ; $i++)
	{ 
		$moyElev = 0;
		echo "<tr>";
		foreach ($tableau[$i] as $valeur =>$elem)
		{
			//echo "<td>".$elem."</td>";
			if($valeur == "Francais")
			{
				$moyFrancais+=$elem;
				$moyElev +=$elem;

			} 
			else if($valeur == "Math")
			{
				$moyMath+=$elem;
				$moyElev +=$elem;
			} 
			else if($valeur == "Info")
			{
				$moyInfo+=$elem;
				$moyElev +=$elem;
			} 
			echo tableauCouleur($elem);


		}
		$moyElev /= (count($tableau[$i])-1);

		echo tableauCouleur(round($moyElev,2));
		echo "</tr>";		

		
	}
	// affichage des moyenne par matiére

	$moyG = ($moyFrancais+$moyMath+$moyInfo)/(3*$nbElmt);
	$moyG = round($moyG,2);

	$moyFR =tableauCouleur($moyFrancais/$nbElmt);
	$moyM = tableauCouleur($moyMath/$nbElmt);
	$moyI = tableauCouleur($moyInfo/$nbElmt);
	$moyB = tableauCouleur($moyG);


	echo "<tr><td><strong>Moyenne</strong></td>".$moyFR.$moyM.$moyI.$moyB."</tr>";
	echo "</table>";

	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";


?>