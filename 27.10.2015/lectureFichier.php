<?php 

// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8','root','');

$sql = "SELECT * FROM insee WHERE codePostal='02500' ORDER BY nomCommune  ASC";

// exrecution de la requête
$curseur = $dbh->query($sql);
// récupération du resultat de la requête
$resul = $curseur->fetchAll(PDO::FETCH_NUM);
 // enregistrement dans un fichier texte d'une entete
// PHP_EOL = saut de ligne
file_put_contents('insee.txt', 'Export code postal 02500'.PHP_EOL);
// on ajoute à la suite le resultat de la requête
// attention de ne pas oublier le FIL_APPEND
file_put_contents('insee.txt', print_r($resul,true),FILE_APPEND);

// Lecture du fichier
echo '<pre>';
/*echo file_get_contents('insee.txt');*/

	// ouverture de fichier
	$fd = fopen('insee.txt','r') or die('Ouverture imposible');
	// Lecture du contenu
	echo fread($fd,filesize('insee.txt'));
	// Fermeture du fichier
	fclose($fd);
echo '</pre>';

// ouverture du fichier avec curseur à la fin
$fd2 = fopen('insee.txt','a+');
// ecriture d'une nouvelle ligne
$ligne = PHP_EOL."nouvelle ligne ...";
fwrite($fd2, $ligne);
// fermeture du fichier
fclose($fd2);



 ?>