<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/bootstrap.css">
  <link href="bootstrap/style.css" rel="stylesheet" />
  <link href="bootsrap/css/font-awesome.css" rel="stylesheet">
  <link rel="shortcut icon" href="bootstrap/favicon.ico">

  <script src="bootstrap/bootstrap.min.js"></script>
</head>

<?php
require('database.php');
$key_word = $_GET['search'];
$req = $db->query("SELECT * from `produit` WHERE nomProduit LIKE '%$key_word%'");
$resultat = $req->fetchAll();

?>

<?php
    require('header.php');

    ?>

<?php
foreach($resultat  as $item){
            ?>
              <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" width="80" height="200" src="image/<?=$item['image'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $item['nomProduit'] ?></h5>
            <p class="card-text"><?= $item['prix'] ?>Description .....Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary"><i class="fa fa-cart"></i> Ajouter au panier</a>
          </div>
        </div>

      </div>




        <?php }  ?>