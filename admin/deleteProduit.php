<?php
require('database.php');
$req = $db->query('SELECT `id` from `produit`');
$resultat = $req->fetch();


$req = 'DELETE FROM `produit` WHERE `id`= ?';
$statement = $db->prepare($req);
$statement->execute(array($resultat['id']));

header('Location:listeProduit.php');



?>