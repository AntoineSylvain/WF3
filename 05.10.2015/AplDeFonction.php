<h1>Fonctions</h1>



<?php 

	get_include_path();
	include "header.php";
	include "fonction.php";

	echo double(5)."</br>";
	echo triple(3)."</br>";
	echo double(triple(3))."</br>";
	echo puissance(45,1)."</br>";

	// date du jour en format US
	$dateJour = date('Y-m-d');
	// conversion en date FR
	echo date_fr($dateJour)."</br>";
	// reconversion au format US
	echo date_us(date_fr($dateJour))."</br>";




	include "footer.php";

?>