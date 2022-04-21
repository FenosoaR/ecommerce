<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="../jquery/jquery-3.4.1.js" href="text/javascript"> </script>
    <script src="../jquery/indexJquery.js" href="text/javascript"></script>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link href="bootstrap/style.css" rel="stylesheet" />
    <link href="bootsrap/css/font-awesome.css" rel="stylesheet">
    <link rel="shortcut icon" href="bootstrap/favicon.ico">

    <script src="bootstrap/bootstrap.min.js"></script>
</head>
<?php
require('database.php');

$req = $db->query('SELECT * FROM `produit`');
 $resultat = $req->fetchAll();

// if(isset($_COOKIE['email'])){

//     $email = $_COOKIE['email'];
//     // $req = $db->query("SELECT * FROM `admin` WHERE `email` ='$email'");
    
//     //         $resultat = $req->fetch();
//     $req = $db->query('SELECT * FROM `produit`');
// $resultat = $req->fetchAll();
    
//     }else{
    
//     header('Location:connexion.php');
//     }
    


// ?>


<body>



    <?php
    require('header.php');

    ?>

    <div class="row">
        <div id="sidebar">
            <div class="well well-small">
                <center><h4> <b>Categorie</b>  </h4></center>
                <ul>
                    <li><a href="">Vestes</a></li>
                    <li><a href="">Chemises</a></li>
                    <li><a href="">Pantalon</a></li>
                    <li><a href="">Chaussures</a></li>
                    <li><a href="">Accessoires</a></li>

                </ul>
            </div>
        </div>




        <div class="container">
            <div class="well well-small">
                <div class="row-fluid">
                    <div class="form-group">
                        <a href="addProduit.php"> <button class="btn btn-primary">Ajouter un nouveau produit</button> </a>
                    </div>
                    <table class="table table-condensed">
                        <thead>
                            <tr>

                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Image</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resultat  as $item) {
                            ?>
                                <tr>

                                    <td><?= $item['nomProduit'] ?></td>
                                    <td><?= $item['prix'] ?></td>
                                    <td><img width="60" height="60" src="image/<?= $item['image'] ?>"></td>
                                    <td><a href="voirProduit.php?id=<?= $item['id'] ?>"><button class="btn btn-success">Detail</button></a></td>
                                    <td><a href="modifyProduit.php?id=<?= $item['id'] ?>"><button class="btn btn-primary">Modifier</button></a></td>
                                    <td><a href="deleteProduit.php?id=<?= $item['id'] ?>"><button class="btn btn-danger">Supprimer</button></a></td>
                                </tr>





                            <?php }  ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>


</html>