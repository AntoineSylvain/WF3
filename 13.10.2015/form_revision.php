<?php

/************************************
*									*
*	Formulaire login/password 		*
*									*
************************************/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire</title>
	<script type="text/javascript" src="revision.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">	
	
</head>
<body>
<?php

	if(isset($_GET['msg'])) echo "<p class='message'>".$_GET['msg']."</p>";


?>
	<form method="post" action="revision.php" onsubmit="return verif(this);">
		<p>
			<label>Login: </label>
			<input type="text" name="utilisateur" class="saisie">				
		</p>
		<p>
			<label>Mot de Passe: </label>
			<input type="password" name="motDePasse" class="saisie">
		</p>
		<p>
			<input type="submit" name="btnSub" value="Go!" id="btnSub">
		</p>
	</form>

</body>
</html>