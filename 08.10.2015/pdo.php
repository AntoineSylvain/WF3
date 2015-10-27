<?php
/************************
*						*
*	COURS SQL ET PDO	*
*	LE 08/10/2015		*
*						*
************************/
$titrePage = 'SQL et PDO';
include "header.php";  //entêtes HTML

// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'root', 
			   '');
//requête SQL AJOUT NOTES
$sql = "INSERT INTO notes(date, idEleve, idMatiere, note, commentaire)
        VALUES(NOW(), 1,1,10,'bien'),(NOW(), 1,2,10,'oups')";
//exécution
$count = $dbh->exec($sql);
echo "<p>".$count." note(s) ajouté(s)</p>";

//requête SQL AJOUT ECOLE
$sql4 = "INSERT INTO ecole(Nom, codeInsee) VALUES('Paris', '75104')";
//exécution
$count4 = $dbh->exec($sql4);
echo "<p>".$count4." école ajoutée</p>";

//requête SQL SUPPRESSION ECOLE
$sql2 = "DELETE FROM ecole where nom = 'Paris'";
//exécution
$count2 = $dbh->exec($sql2);
echo "<p>".$count2." école(s) supprimée(s)</p>";

//requête SQL MISE A JOUR ELEVE
$sql3 = "UPDATE eleve SET idEcole=1 WHERE idEleve=10";
//exécution
$count3 = $dbh->exec($sql3);
if($count3<>0) echo "<p>".$count3." élève(s) modifié(s)</p>";
else echo "Aucun élève modifié";
//print_r($dbh);

/********************
*					*
* PAUSE DEJEUNER	*
*					*
********************/

// déconnexion
unset($dbh); // ou $dbh = null;


include "footer.php"; //bas de page
?>