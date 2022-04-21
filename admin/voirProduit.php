<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>


<?php
require('database.php');


$id = $_GET['id'];
$req = $db->query("SELECT * FROM `produit` WHERE `id`=$id");
$resultat = $req->fetch();

?>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-9 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <!-- Nested Row within Card Body -->
                        <h5 class=" text-center text-bold">Details d'un produit</h5>
                        <hr>
                        <div class="row">
                            <div id="sidebar">
                                <div class="well well-small">
                                    <img src="image/<?= $resultat['image'] ?>" width="300" height="200">
                                </div>
                            </div>
                            <div class="container">
                                <div class="well well-small">
                                    <div class="row-fluid">
                                        <h3><?= $resultat['nomProduit'] ?> </h3>

                                        <p><?= $resultat['description'] ?></p>
                                        <p>Quantite:<?= $resultat['quantite'] ?></p>
                                        <p>Prix :<?= $resultat['prix'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>