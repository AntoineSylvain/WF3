<?php

	if (isset($_POST['btnSub']))
	{
		// récupération du login et du mot de passe
		$login = $_POST['utilisateur'];
		$pwd = $_POST['motDePasse'];




		// connexion PDO
		// on pourrait mettre les infos de connexion dans un fichier
		// et faire un include pour gagner du temps et faciliter la maintenance
		$dsn = 'mysql:host=localhost;dbname=webforce3;charset=utf8';
		$bddUser ="root";
		$bddPass ="";
		$dbh=  new PDO($dsn,$bddUser,$bddPass);

		// Préparation des requetes SQL
		$reqLogin = "SELECT * FROM webforce3.securite WHERE login= ?";
		$curseurLogin = $dbh->prepare($reqLogin);

		$reqPass = "SELECT * FROM webforce3.securite  WHERE login= ? and password=PASSWORD(?) ";
		$curseurPass =$dbh->prepare($reqPass);

		// vérification du login

		$curseurLogin->execute(array($login));
		$resultatLogin = $curseurLogin->fetchColumn();

		if($resultatLogin === false)
		{
			header('location: form_revision.php?msg=login incorrect');
		}
		// sinon login connu
		else
		{
			// verification du login et du mot de passe
			$curseurPass->execute(array($login,$pwd));
			$resultatPass = $curseurPass->fetchColumn();

			if($resultatPass === false)
			{
				header('location: form_revision.php?msg=Mot de passe incorrect');
			}
			else echo 'Connection etablie';
		}

		unset($dbh);
		

	}



?>