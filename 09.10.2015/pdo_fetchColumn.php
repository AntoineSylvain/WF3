<h1>PDO fonction FETCHCOLUMN</h1>

<?php 

	get_include_path();
	include "header.php";

	
	$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=utf8', 'root', ""); 

	$rq = "SELECT count(nomCommune) FROM insee WHERE codePostal='02500'";

	$stmt = $dbh->query($rq);

	$nbCommunes = $stmt->fetchColumn();

	echo "Nombre de ligne dans le tableau</br>";
	echo $nbCommunes."</br>";

	unset($dbh);

	include "footer.php";

?>