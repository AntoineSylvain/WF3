<?php
/************************
*						*
*	COURS SQL ET PDO	*
*	LE 08/10/2015		*
*						*
************************/
$titrePage = 'SQL et PDO';

get_include_path();
include "header.php";  //entêtes HTML
include "fonction.php";

// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'root', 
			   '');

//$sql = "select nom, prenom from eleve where idEleve > 1 and idEleve < 10 ";
$sql ="SELECT n.Date, s.Nom_Ecole,e.Nom_Eleve, e.Prenom_Eleve, m.Nom_Matiere, n.Note, 
	   n.Commentaire  
	   FROM notes n
	   join eleve e 
	   on e.Id_Eleve = n.Id_Eleve 
	   join ecole s 
	   on s.ID_Ecole = e.Id_Ecole
	   join matiere m 
	   on m.Id_Matiere = n.Id_Matiere
	   where s.Nom_Ecole = ?
	   ORDER BY e.Nom_Eleve ASC";

$stmt = $dbh->prepare($sql);
$stmt->execute(array("Hirson"));
$row = $stmt->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau($row);


/*----------------------------AUTRE METHODE D'ECRITURE-----------------------------------------------------

$ville = 'Hirson';
$sth = $dbh->prepare("SELECT n.Date, s.Nom_Ecole,e.Nom_Eleve, e.Prenom_Eleve, m.Nom_Matiere, n.Note, 
	   n.Commentaire  
	   FROM notes n
	   join eleve e 
	   on e.Id_Eleve = n.Id_Eleve 
	   join ecole s 
	   on s.ID_Ecole = e.Id_Ecole
	   join matiere m 
	   on m.Id_Matiere = n.Id_Matiere
	   where s.Nom_Ecole = :ville
	   ORDER BY e.Nom_Eleve ASC");

$sth->bindParam(':ville',$ville, PDO::PARAM_STR,30);
$sth->execute();
$row = $sth->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau($row);

------------------------------------------------------------------------------*/	   

/*echo "<pre>";
foreach($dbh->query($sql) as $row)
{
	//echo $row['nom']." ".$row['prenom']."<br/>";
	print_r($row);
}
echo "</pre>";*/


// déconnexion
unset($dbh); // ou $dbh = null;

include "footer.php"; //bas de page
?>