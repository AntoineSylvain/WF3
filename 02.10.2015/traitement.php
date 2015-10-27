
<h1>Formulaire</h1>

<?php 

	include "../header.php";

	echo "<pre>";
	print_r($_GET); // affichage des éléments utilisant la méthode GET
	print_r($_POST); // affichage des éléments utilisant la méthode POST
	echo "</pre>";
	echo "___________________________________________________________________________</br></br>";
	echo "___________________________________________________________________________</br></br>";

	$_POST['login'] = strip_tags($_POST['login']);
	$_POST['pass'] = strip_tags($_POST['pass']);
	$_POST['txtArea'] = strip_tags($_POST['txtArea']);



	// affichage de la zone Login du formulaire
	//echo "Login: ".$_POST['login']."</br>";

	// si le login est trop court (<8 caracteres)
	//if(strlen($_POST['login'])<8) echo "Login trop court</br>";

	// boucle de traitement
	foreach ($_POST as $cle => $valeur)
	{
		if(is_array($valeur)) // si la valeur est un tableau
		{
			echo "<ul>"; // on créer un liste HTML
			foreach ($valeur as $sousValeur) // on parcours le tableau
			{
				// on affiche la valeur du sous tableau avec la clé du tableau POST
				echo "<li>".$cle." ".$sousValeur."</li>";
			}
			echo "</ul>";
		}
		// si la valeur n'est pas un tableau on l'affiche avec la clé
		else echo "<strong>".$cle."</strong>: ".$valeur."</br>";
	}
	echo "</br>";

	// tableau des caractéres à rechercher
	$from = array('â','ä','à','é','è','ë','ê','î','ï','ô','ö','û','ü','ù');
	// tableau des caractéres de remplacement
	$to = array('a','a','a','e','e','e','e','i','i','o','o','u','u','u');

	// chercher/remplacer caractére par caractére
	echo str_replace($from, $to, $_POST['txtArea'])."</br>";
	// affichage avec remplacement des caractéres
	echo strtr($_POST['txtArea'],' oile','_0173')."</br>";

	// detection du '@' dans le textarea
	if(strpos($_POST['txtArea'],'@')!== false) echo "caractére @ interdit</br>";


	//-------------------------------------------------------------------

	// Monsieur ou Madame

	$sexe =""; // on céer un variable pour le sexe

	if(!isset($_POST['sexe']))$sexe="Monsieur ou Madame";
	elseif($_POST['sexe'] === 'h') $sexe="Monsieur"; // si la valeur est H on assigne Monsieur àla variable sexe
	elseif ($_POST['sexe'] === 'f') $sexe="Madame"; // si la valeur est F on assigne Madame à la variable sexe
	 // si aucune case cocher on assigne les deux valeur à la variable sexe		


	// On affiche un message personnaliser 
	echo "___________________________________________________________________________</br></br>";
	echo "Bonjour ".$sexe." <strong>".$_POST['login']."</strong>.</br> Votre commentaire: <strong>&quot".$_POST['txtArea']."&quot</strong> est bien enregistrer.</br></br>";
	
	echo "___________________________________________________________________________</br></br>";

	
	$from3 = array("merde","con","enculé","lol","mdr");
	$to3 = array("mince","personne pas intelligente","personne qui aime ça","c'est drôle","mort de rire");
	$Commentaire = str_replace($from3, $to3,$_POST['txtArea']);

	//--------------------------------Login-----------------------------------------------

	if($_POST['login'] === "") echo "Le champ nom  n'est pas rempli</br></br>";
	else if(strlen($_POST['login'])<8) echo "Le nom est trop court</br></br>";
	

	//------------------------------Password--------------------------------------------------
	
	if($_POST['pass'] === "") echo "Le champ password n'est pas rempli</br></br>";
	else if(strlen($_POST['pass'])<13) echo "Le mot de passe est trop court</br></br>";
	
	
	// verification de la complexité du mot de passe
	$iLenPass = strlen($_POST['pass']); // Longueur du mot de passe
	$cptDigit = $cptChr =0;// compteur de lettres et de chiffres

	for ($i=0; $i <$iLenPass ; $i++) // boucle (la chaine est aussi un tableau)
	{ 
		if(is_numeric($_POST['pass'][$i])) $cptDigit++; // si numerique, increment du compteur num
		elseif(is_string($_POST['pass'][$i])) $cptChr++; // sinon incrément compteur chr
	}
	// affichage du nombre de caractéres et du nombre de chiffres
	echo "le mot de passe contient ".$cptChr." caractéres et ".$cptDigit." chiffres.</br></br>";

	//---------------------------------Sexe--------------------------------------------------

	if(!isset($_POST['sexe'])) echo "Le champ sexe  n'est pas rempli</br></br>";

	//--------------------------------Commentaire--------------------------------------------------------

	if($_POST['txtArea'] == "") echo "Le champ Commentaire n'est pas rempli</br></br>";
	if(strpos($_POST['txtArea'],'@')!== false) echo "caractére @ interdit</br></br>";
	
	echo "___________________________________________________________________________</br></br>";
	
	// cas des mots séparés par une virgule
	$tTxtArea = explode(',',$_POST['txtArea']);
	echo "<pre>".print_r($tTxtArea,true)."</pre></br></br>";

	echo "___________________________________________________________________________</br></br>";
	// tableau des filtres à appliquer au resultat du formulaire
	$filtres = array(
		'login' => FILTER_SANITIZE_STRING, // chaine de caractére nettoyé
		'pass' => FILTER_SANITIZE_STRING,
		'sexe' => FILTER_SANITIZE_STRING,
		'type' => array('filter' => FILTER_SANITIZE_NUMBER_INT, // integer nettoyé
						'option' => array('min_range' => 1, 'max_range' =>2) // bornage entre 1 et 0
					 ),
		'content'=> array('filter' => FILTER_VALIDATE_INT,// integer valide
						  'flags' =>FILTER_FORCE_ARRAY, // tableau
					),
		'txtArea' => FILTER_SANITIZE_STRING,// chaine de caractére nettoyé
	);
	$safe = filter_var_array($_POST, $filtres);
	echo "<pre>";
	var_dump($_POST); // le tableau $_POST recu du formulaire
	var_dump($safe); // le tableau filtré et nettoyé
	echo "</pre>";

	
	

	include "../footer.php";
?>