
<h1>Agregation SQL</h1>

<?php
	
	get_include_path();
	include 'header.php';

	// connexion BDD
	require_once("connexion.php");

	// requête
	$requete ="SELECT avg(Note)
			   FROM notes
			   WHERE Id_Eleve=1";

	$requete2 ="SELECT avg(Note)
			   FROM notes
			   WHERE Id_Matiere=1";

	$requete3 ="SELECT count(*)
			   FROM insee
			   WHERE codePostal LIKE '025%'";

	$requete4 ="SELECT count(*) AS 'Nombre de ville', MIN(code_Insee) AS 'Plus petit code INSEE' , MAX(code_Insee) AS 'Plus grand code INSEE', codePostal AS 'Code Postal'
			   FROM insee
			   WHERE codePostal LIKE '025%'
			   GROUP BY codePostal ";

	$requete5 ="SELECT m.Nom_Matiere AS Matière, round(avg(n.note),2) AS Moyenne
				FROM notes n
				JOIN matiere m
				ON n.Id_Matiere=m.Id_Matiere			   	
			   	GROUP BY  n.Id_Matiere";

	$requete6 ="SELECT e.Nom_Eleve AS Nom, e.Prenom_Eleve AS Prénom, round(avg(n.note),2) AS Moyenne
				FROM notes n
				JOIN eleve e
				ON n.Id_Eleve=e.Id_Eleve			   	
			   	GROUP BY n.Id_Eleve ";

	// execution de la requête
	$curseur = $dbh->query($requete);
	$curseur2 = $dbh->query($requete2);
	$curseur3 = $dbh->query($requete3);
	$curseur4 = $dbh->query($requete4);
	$curseur5 = $dbh->query($requete5);
	$curseur6 = $dbh->query($requete6);

	// affichage du resultat
	// fectchColumn renvoi la valeur de la premiere colonne

	if(!$curseur3) print_r($bdh->errorInfo());
	else echo $curseur3->fetchColumn();
	echo "<hr/>";

	if(!$curseur) print_r($bdh->errorInfo());
	else echo "Ma moyenne est de: ".$curseur->fetchColumn();
	echo "<hr/>";

	if(!$curseur2) print_r($bdh->errorInfo());
	else echo "La moyenne en Francais est : ".$curseur2->fetchColumn();
	echo "<hr/>";

	if(!$curseur4) print_r($bdh->errorInfo());
	else 
	{
		$resultat = $curseur4->fetchALL(PDO::FETCH_ASSOC);
		include_once "fonction.php";
		echo afficheTableau($resultat);
		echo "<hr/>";
	}

	if(!$curseur5) print_r($bdh->errorInfo());
	else 
	{
		$resultat2 = $curseur5->fetchALL(PDO::FETCH_ASSOC);
		include_once "fonction.php";
		echo afficheTableau($resultat2);
		echo "<hr/>";
	}

	if(!$curseur6) print_r($bdh->errorInfo());
	else 
	{
		$resultat3 = $curseur6->fetchALL(PDO::FETCH_ASSOC);
		include_once "fonction.php";
		echo afficheTableau($resultat3);
		echo "<hr/>";
	}



	include 'footer.php';
?>



