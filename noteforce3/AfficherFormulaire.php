<?php

	include 'includes/header.php';
	include 'includes/fonction.php';

	if (isset($_POST['connexion']))
	{
		// récupération du login et du mot de passe
		$login = $_POST['Login'];
		$pwd = $_POST['motDePasse'];

		
		$dsn = 'mysql:host=localhost;dbname=noteforce3;charset=utf8';
		$bddUser ="root";
		$bddPass ="";
		$dbh=  new PDO($dsn,$bddUser,$bddPass);

		
		$reqLogin = "SELECT * FROM noteforce3.personnes WHERE loginPersonne= ?";
		$curseurLogin = $dbh->prepare($reqLogin);

		$reqPass = "SELECT * FROM noteforce3.personnes  WHERE loginPersonne= ? and passPersonne= PASSWORD(?) ";
		$curseurPass =$dbh->prepare($reqPass);

		$reqType = "SELECT typePersonne FROM noteforce3.personnes WHERE loginPersonne= ?";
		$curseurType =$dbh->prepare($reqType);

		$reqIdEleve = "SELECT idPersonne FROM noteforce3.personnes WHERE loginPersonne= ?";
		$curseurIdEleve =$dbh->prepare($reqIdEleve);

		$reqTabEleve1 = "SELECT p.nomPersonne as Nom, p.prenomPersonne as Prenom, m.nomMatiere as Matiere,avg(n.note) as Moyenne
					   FROM personnes p
					   join notes n
					   on p.idPersonne=n.idEleve
					   join matieres m
					   on n.idMatiere= m.idMatiere
					   WHERE n.idEleve= ? 
					   group by m.idMatiere";

		$curseurTabEleve1 =$dbh->prepare($reqTabEleve1);


		// vérification du login

		$curseurLogin->execute(array($login));
		$resultatLogin = $curseurLogin->fetchColumn();

		if($resultatLogin === false)
		{
			header('location: index.php?msg=login incorrect');
		}
		// sinon login connu
		else
		{
			// verification du login et du mot de passe
			$curseurPass->execute(array($login,$pwd));
			$resultatPass = $curseurPass->fetchColumn();
			
			if($resultatPass === false)
			{
				header('location: index.php?msg=Mot de passe incorrect');
			}
			else
			{
				$curseurType->execute(array($login));
				$resultatType = $curseurType->fetchColumn();
				$curseurIdEleve->execute(array($login));
				$resultatIdEleve = $curseurIdEleve->fetchColumn();

								
				if ($resultatType === 'F') echo 'Pas encore fait';
				elseif ($resultatType === 'A' ) echo 'Pas encore fait';
				elseif($resultatType === 'E')
				{
					
					$curseurTabEleve1->execute(array($resultatIdEleve));
					$resultatTabEleve1 = $curseurTabEleve1->fetchALL(PDO::FETCH_ASSOC);					

					echo afficheTableau($resultatTabEleve1);

					echo "<input type='submit' name='' value='HTML/CSS' onclick=".requete($resultatIdEleve,1).">";
					
					

				} 

			}


		}

		unset($dbh);
		

	}



?>