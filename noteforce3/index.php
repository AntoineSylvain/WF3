<!DOCTYPE html>
<html>
<head>
	<title>Examen PHP</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="controle.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header><img src="Images/logo.png"></header>

	<?php

	if(isset($_GET['msg'])) echo "<p class='message'>".$_GET['msg']."</p>";


	?>
	<form method="post" action="AfficherFormulaire.php" onsubmit="return verif(this);">
		<fieldset>
		<legend>Connexion</legend>
			<label>Login: <input type="text" name="Login"></label>
			<label>Mot de passe: <input type="password" name="motDePasse"></label>
			<input type="submit" name="connexion" value="Connexion">
		</fieldset>
	</form>

</body>
</html>