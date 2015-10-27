<?php 

function afficheTableau($table)
{

	$tamponTable="<table>";
	foreach ($table as $key => $language ) // boucle pour la dimension 1
	{
		if($key === 0) // sur le premier enregistrement
		{
			$tamponTable.= "<tr>";
			foreach ($language as $entete => $rien) // on a besoin de l'entete uniquement
			{
				$tamponTable.= "<th>".$entete."</th>"; // affichage d'une enetet de tableau
			}
			$tamponTable.= "</tr>";
		}

		$tamponTable.= "<tr>"; // ouverture d'une ligne du tableau
		foreach ($language as $valeur) // boucle pour la dimension 2
		{
			$class='';
			if(is_numeric($valeur)) $class='class="nombre"';
			$tamponTable.= "<td ".$class.">".$valeur."</td>"; // affichage d'une colonne du tableau
		}
		$tamponTable.= "</tr>"; // fermerture de ligne
	}
	$tamponTable.= "</table></br>";
	return $tamponTable;	
}

function requete($param1,$param2)
{

	$dsn = 'mysql:host=localhost;dbname=noteforce3;charset=utf8';
	$bddUser ="root";
	$bddPass ="";
	$dbh=  new PDO($dsn,$bddUser,$bddPass);

	$req = "SELECT p.nomPersonne as Nom, p.prenomPersonne as Prenom, m.nomMatiere as Matiere,avg(n.note) as Moyenne
					   FROM personnes p
					   join notes n
					   on p.idPersonne=n.idEleve
					   join matieres m
					   on n.idMatiere= m.idMatiere
					   WHERE n.idEleve= ? and m.idMatiere = ?";

	$curseur =$dbh->prepare($req);

	$curseur->execute(array($param1,$param2));
	$resultat = $curseur->fetchALL(PDO::FETCH_ASSOC);

	echo afficheTableau($resultat);
}

?>	