<!DOCTYPE html>
<html>
<head>
	<title>Ma premiére page PHP</title>
	<style type="text/css">
	body{background-color: silver;}
	h1{text-align: center; color: green;}
	img{height: 150px;}
	</style>
</head>
<body>

	<?php 
		echo "<h1>Hello WF3!</h1>";
		$entier = 15;
		$decimal = 23.3;
		$string = "Truc de ouf";
		$tville = array("papeete","Pointe à Pitre","Cancun");
		$tFruitPrix = array("pomme" => 1.2,"poire" => 1.3,"cassis" => 0.5);
		$bEtat =true;

		echo $string ."<br/> ";
		echo $entier."<br/> ";
		echo $decimal."<br/>";
		echo '<p><img src="loup.jpg"/></p>';
		echo "<pre>";
		print_r ($tville);
		echo "</pre>";
		var_dump ($bEtat);
		echo "<br/>".$tville[0]."<br/>";
		echo "<pre>";
		print_r ($tFruitPrix);
		echo "</pre>";
		echo "<br/>".$tFruitPrix["pomme"]."<br/>";


		$note = rand(0,20);
		switch($note)
		{
			case 0: $appreciation = '<img src="images/eleve-endormie.jpg" />';
					break;
			case 1:
			case 2:
			case 3:
			case 4:
			case 5:
			case 6:
			case 7:
			case 8:
			case 9: $appreciation = '<img src="images/vieux.jpg" />';
					break;
			case 10:
			case 11:
			case 12:
			case 13:
			case 14:
			case 15:
			case 16:
			case 17:
			case 18:
			case 19:
			case 20	:$appreciation = '<img src="images/sexy.jpg"/>';
					break;	
			default: $appreciation = "non noté";
					break;	
		}

		echo 'Tu as eu : '.$note.'<br/>';
		echo $appreciation;

	?>
	
</body>
</html>