
<h1>Tableau multidimensionnel</h1>

<?php 

	include "../header.php";
	
	$t2dim = array
				(
					array('Buire',array(800,4.13)),
					array('Hirson',array(9348,33.77)),
					array('Reims',array(181893,47.02)),
					array('Paris',array(2240621,105.4)),

				);

	// Affichage du premier élément
	echo $t2dim[0][0]."<br/>";

	// pour la superficie de Buire
	echo $t2dim[0][1][1]."<br/>";


	echo "<pre>"; // pour un affichage plus lisible du tableau
	print_r($t2dim);
	echo "</pre>";

	echo "<table>
			<tr>
				<th>Ville</th>
				<th>Population</th>
				<th>Superficie</th>
			</tr>";
	$iNbEnreg = count($t2dim);
	for ($i=0; $i <$iNbEnreg ; $i++)
	{ 
		echo "<tr>";
		foreach ($t2dim[$i] as $Dim2)
		{
			if(is_string($Dim2)) echo "<td>".$Dim2."</td>";
			else foreach ($Dim2 as $Dim3)
			{
				echo "<td>".$Dim3."</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";


	include "../footer.php";
?>