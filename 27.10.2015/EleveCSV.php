<?php 

// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=noteforce3;charset=UTF8','root','');

$sql = "SELECT prenomPersonne,nomPersonne FROM personnes WHERE typePersonne ='E' ORDER BY nomPersonne";

// exrecution de la requête
$curseur = $dbh->query($sql);
// récupération du resultat de la requête
$tabEleve = $curseur->fetchAll(PDO::FETCH_NUM);

$fichier = fopen('eleve.csv', 'w') or die('Houston,On as un probléme');

foreach ($tabEleve as $ligneCSV)
{
	// ecriture d'une ligne au format CSV
	fputcsv($fichier, $ligneCSV,";");
}
// Ne pas oublier la fermeture du fichier
fclose($fichier);

 ?>