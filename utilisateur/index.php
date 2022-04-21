<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
  require('database.php');

if(isset($_COOKIE['email'])){

	$email = $_COOKIE['email'];
	$req = $db->query("SELECT * FROM `utilisateur` WHERE `email` ='$email'");

			$resultat = $req->fetch();


}else{

	header('Location:connexion.php');
}


?>
<body>
 
  <center><h1>BIENVENUE <?=$resultat['nom']."  ".$resultat['prenom']?></h1></center>
<button class="btn btn-danger"><a href="deconnexion.php">Se deconnecter</a></button>
</body>
</html>