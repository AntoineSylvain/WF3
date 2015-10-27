<h1>PDO Fonction FETCHALL</h1>

<?php 

	get_include_path();
	include "header.php";



	// connexion PDO_MySQL
	$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'root', 
			   '');

	$rq = "SELECT code_Insee,nomCommune,codePostal,Libelle FROM insee WHERE codePostal='02500'";

	$stmt = $dbh->query($rq);

	$row = $stmt->fetchALL(PDO::FETCH_ASSOC);

	
	echo "<pre>";
	print_r($row);
	echo "</pre>";

	$dbh =null;




	include "footer.php";

?>