<h1>PDO fonction FETCH</h1>

<?php 

	get_include_path();
	include "header.php";

	
	$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=utf8', 'root', ""); 

	$rq = "SELECT nomCommune FROM insee WHERE codePostal='02500'";

	echo '<h2>Liste des communes donc le code postal est 02500:</h2>';
	echo '<ul>';
	$stmt = $dbh->query($rq);

	if(!$stmt)
	{
		echo "PDO::errorInfo()";
		print_r($dbh->errorInfo());
	}
	else while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<li>".$row['nomCommune']."</li>";
	}
	echo "</ul>";
	$dbh= null;

	include "footer.php";

?>