<!DOCTYPE html>
<html>
<head>
	<title>Formulaire PDO</title>
	<meta charset="utf-8">
	<style>
	  label
	  {
	  	float: left;
	  	width: 100px;
	  	display: block;
	  }
	  #btnSub
	  {
	  	background-color: red;
	  	color: white;
	  	border-color: white;
	  	margin-left: 80px;
	  	width: 100px;
	  	height: 50px;
	  }
	  .message
	  {
	  	border: 2px solid red;
	  	color: red;
	  	text-transform: capitalize;
	  }
	</style>
</head>
<body>
  <?php 
  if(isset($_GET['msg']))
  {
  	echo '<p class="message">';
  	if($_GET['msg']==1) echo "login incorrect";
  	if($_GET['msg']==2) echo "Mot de passe incorrect";
  	echo "</p>";
  }
  ?>
  <form method="post" action="loginPDO.php">
    <p><label for="login">Login:</label>
    <input type="text" name="login"></p>
    <p><label for="pwd">Mot de Passe:</label>
    <input type="password" name="pwd"></p>
    <input type="submit" name="btnSub" value="Connexion" id="btnSub">
  </form>
</body>
</html>