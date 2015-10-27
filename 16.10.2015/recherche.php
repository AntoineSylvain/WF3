<h1>Resultat googleForce3</h1>

<?php

	get_include_path();
	include 'header.php';

	// recuperation du numero de la page
	if(isset($_GET['page']))
	{
		$page = htmlentities((strip_tags($_GET['page'])));
	}
	else $page = 1;
	$fin=15;
	$debut = $fin *($page-1);

	// Récupération de l'info à chercher
	$motCle = htmlentities(strip_tags($_GET['search']));
	$critereRecherche = htmlentities(strip_tags($_GET['critereRecherche'])); 
	$requete ="SELECT code_Insee,nomCommune,codePostal,code_Dept,departement_nom 
			   FROM insee join departement 
			   on code_Dept=departement_code 
			   WHERE ".$critereRecherche.
			   " LIKE ? ";
			   

	// connexion BDD
	require_once 'connexion.php';
	// execution de la requete
	$curseur= $dbh->prepare($requete); // Preparation de la requete
	$curseur->execute(array('%'.$motCle.'%')); // Execution de la requete
	$resultatRecherche = $curseur->fetchALL(PDO::FETCH_ASSOC); // Affichage des resultats
	$pageTotal = ceil(count($resultatRecherche)/$fin); // Comptage de nombre de page total

	$requete.="LIMIT ".$debut.",".$fin; // Concaténation de le requete avec une limit
	$curseur= $dbh->prepare($requete); // Preparation de la requete
	$curseur->execute(array('%'.$motCle.'%')); // Execution de la requete
	$resultatRecherche = $curseur->fetchALL(PDO::FETCH_ASSOC); // Affichage des resultats
	
	$nbligne = count($resultatRecherche); // Compter le nombre de ligne

	if($page>1)
	{
		// Retour à la page precedente
		echo  '<button onclick="document.location.href=\'recherche.php?critereRecherche='.$critereRecherche.'&search='.$motCle.'&page='.($page-1).'\';">&lt;</button>';
		// Retour à la premiére page
		echo  '<button onclick="document.location.href=\'recherche.php?critereRecherche='.$critereRecherche.'&search='.$motCle.'&page=1\';">&lt;&lt;</button>';
		
	} 
	if($nbligne == $fin && $page<$pageTotal)
	{
		// Passe à l page suivante
		echo  '<button onclick="document.location.href=\'recherche.php?critereRecherche='.$critereRecherche.'&search='.$motCle.'&page='.$pageTotal.'\';">&gt;&gt;</button>';
		// Passe à la derniére page
		echo  '<button onclick="document.location.href=\'recherche.php?critereRecherche='.$critereRecherche.'&search='.$motCle.'&page='.($page+1).'\';">&gt;</button>';
	} 
		
	// Pour l'affichage du tableau
	include "fonction.php";

	echo '</br></br>';
	echo afficheTableau($resultatRecherche);

	// Donne le nombre de page
	echo 'page '.$page.' sur '.$pageTotal.'</br></br>';

	// Retour à la recherche
	echo  '<button onclick="document.location.href=\'moteur_recherche.php\'">Retour</button>';



	include 'footer.php';
?>