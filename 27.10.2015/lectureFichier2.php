<?php 

// Ouverture du fichier
$fd = fopen('outil.txt', 'r') or die('ouverture impossible');

$cptLigne = 1;

echo '<ul>';
// tant que "pas fin de fichier"
while(!feof($fd))
{
	// Lecture d'une ligne
	$ligne = fgets($fd, 4096);
	// affichage du N° de ligne et du contenu
	echo '<li>'.$cptLigne++." ".$ligne.'</li>';
}

echo '</ul>';
// Fermeture du fichier
fclose($fd);


//---------------------------------------------------------------------------
// ouverture du fichier avec curseur à la fin
$fd2 = fopen('outil.txt','a+');
// ecriture d'une nouvelle ligne
$ligne = PHP_EOL."nouvelle ligne ...";
fwrite($fd2, $ligne);
// fermeture du fichier
fclose($fd2);
//----------------------------------------------------------------------------
$tContenu = file('outil.txt');
echo "<pre>" ;
print_r($tContenu);
echo "</pre>";
//----------------------------------------------------------------------------

$fichier = fopen('monFichier.csv', 'w');
$tab = array(array(10,20,30,40),
			 array(50,60,70,80),
			 array(70,80,90,00));

// boucle de parcours
foreach ($tab as $ligneCSV)
{
	// ecriture d'une ligne au format CSV
	fputcsv($fichier, $ligneCSV,";");
}
// Ne pas oublier la fermeture du fichier
fclose($fichier);

 ?>