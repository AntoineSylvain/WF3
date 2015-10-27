<?php
$titrePage = "Connexion PDO";
include "header.php";

// si le bouton du formulaire a été cliqué
if(isset($_POST['btnSub']))
{
	// connexion PDO_MySQL
	$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=utf8', 
				   'root', 
				   '');
	// 	récupération du login et du mot de passe

	if (strlen($_POST['login']) === strlen(htmlentities(strip_tags($_POST['login']))))
	{
		$login = (htmlentities(strip_tags($_POST['login'])));
	}

	if (strlen($_POST['pwd']) === strlen(htmlentities(strip_tags($_POST['pwd']))))
	{
		$pwd = (htmlentities(strip_tags($_POST['pwd'])));
	}


	// requete de verification du login avec protection quote
	$sql = "SELECT * FROM webforce3.securite 
	WHERE login= :login";
	// requete de verification du login\Mot de passe avec protection quote
	$sql2 = "SELECT * FROM webforce3.securite 
					 WHERE login= :login and password=PASSWORD(:password) ";
	
	 $stmt = $dbh->prepare($sql);
	 $stmt->bindParam(':login',$login, PDO::PARAM_STR,20);
	 $stmt->execute();
	 $stmtBis = $dbh->prepare($sql2);
	 $stmtBis->bindParam(':login',$login, PDO::PARAM_STR,10);
	 $stmtBis->bindParam(':password',$pwd, PDO::PARAM_STR,42);
	 $stmtBis->execute();
	
	

	$resultat = $stmt->fetchColumn();
	// si aucun résultat renvoyé, login invalide
	if($resultat==0)
	{
		
		// redirection formulaire avec msg login incorect
		header('location: pdo_form.php?msg=1');
	} 
	// sinon login et mdp retrouvés
	else
	{
		
		$resultat2 = $stmtBis->fetchColumn();
		
		// si aucun résultat renvoyé, mdp invalide
		if($resultat2==0)
		{
			header('location: pdo_form.php?msg=2');
		}
		else echo "Connecté!";
	}

	unset($dbh); //déconnexion
}
include "footer.php";
?>