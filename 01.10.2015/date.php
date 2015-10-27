<h1>Les fonctions Date et Heure</h1>

<?php

	$debut = microtime(true);
	include "../header.php";

	$Jours = array
	(
		'Monday' => '<strong>Lundi</strong>',
		'Tuesday' => '<strong>Mardi</strong>',
		'Wednesday' => '<strong>Mercredi</strong>',
		'Thursday' => '<strong>Jeudi</strong>',
		'Friday' => '<strong>Vendredi</strong>',
		'Saturday' => '<strong>Samedi</strong>',
		'Sunday' => '<strong>Dimanche</strong>'
	);
	$Mois = array
	(
		'January' =>"Janvier",
		'February' =>"Février",
		'March' =>"Mars",
		'April' =>"Avril",
		'May' =>"Mai",
		'June' =>"Juin",
		'July' =>"Juillet",
		'August' =>"Août",
		'September' =>"Septembre",
		'October' =>"Octobre",
		'November' =>"Novembre",
		'december' =>"Decembre",


	);


	
	echo "<ul>";
	echo "<li><em> La toussaint tombe un </em>".$Jours[date('l',strtotime('1 november 2015'))].".<br/><br/></li>";
	echo "<li><em> Le 11 novembre tombe un </em>".$Jours[date('l',strtotime('11 november 2015'))].".<br/><br/></li>";
	echo "<li><em> Noël tombe un </em>".$Jours[date('l',strtotime('25 december 2015'))].".<br/><br/></li>";
	echo "<li><em> Le Jours de l'an tombe un </em>".$Jours[date('l',strtotime('1 january 2016'))].".<br/><br/></li>";
	echo "<li><em> Pâque tombe un </em>".$Jours[date('l',strtotime('5 april 2016'))].".<br/><br/></li>";
	echo "<li><em> La fête du travail tombe un </em>".$Jours[date('l',strtotime('1 may 2016'))].".<br/><br/></li>";
	echo "<li><em> Le fête de la victoire de 1945 tombe un </em>".$Jours[date('l',strtotime('8 may 2016'))].".<br/><br/></li>";
	echo "<li><em> L'ascension tombe un </em>".$Jours[date('l',strtotime('14 may 2016'))].".<br/><br/></li>";
	echo "<li><em> La pentecôte tombe un </em>".$Jours[date('l',strtotime('24 may 2016'))].".<br/><br/></li>";
	echo "<li><em> La fête nationale tombe un </em>".$Jours[date('l',strtotime('14 july 2016'))].".<br/><br/></li>";
	echo "<li><em> L'assomption tombe un </em>".$Jours[date('l',strtotime('15 august 2016'))].".<br/><br/></li>";
	echo "</ul>";


	$heure = 15;
	$minute = 57;
	$seconde = 0;
	$mois = 10;
	$jour = 2;
	$annee = 2015;

	$timestamp = mktime($heure, $minute, $seconde, $mois, $jour, $annee);
	echo date('l',$timestamp)."<br/><br/>";

	echo "--------------------------------------------------";
	echo "			EXERCICE			";
	echo "--------------------------------------------------<br/><br/>";
	
	$jourSemaineDemander = date('l');
	$moiDemander = date('F');

	echo "Nous somme le : ".$Jours[$jourSemaineDemander].' '.date('j').' '.$Mois[$moiDemander]." ".date('Y')."  ".".Il est : ".date('H\hi')."<br/><br/>";

	echo "---------------------------------------------------------------------------------------------------------------------<br/><br/>";
	$fin = microtime(true);
	echo ($fin-$debut)."<br/><br/></br>";// Permet de calcul le temps d'execution du script


	include "../footer.php";


?>
