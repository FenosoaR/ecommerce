<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script src="jquery/jquery-3.4.1.js" href="text/javascript"> </script>
   <script src="jquery/indexJquery.js" href="text/javascript"></script>
  <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="./bootstrap/bootstrap.css">
  <link href="bootstrap/style.css" rel="stylesheet" />
  <link href="bootsrap/css/font-awesome.css" rel="stylesheet">
  <link rel="shortcut icon" href="bootstrap/favicon.ico">

  <script src="bootstrap/bootstrap.min.js"></script>
</head>




<body>


 
    <?php
    require('header.php');

    ?>
     <div class="container">
    <div class="row">


    <?php
      require('database.php');
      $req = $db->query('SELECT * FROM `produit`');
      $resultat = $req->fetchAll();
  
        foreach($resultat  as $item){
            ?>
              <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" width="80" height="200" src="image/<?=$item['image'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $item['nomProduit'] ?></h5>
            <p class="card-text"><?= $item['prix'] ?>Description .....Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="voirProduit.php?id=<?= $item['id']?>" class="btn btn-success"><i class="fa fa-cart"></i>Voir</a>
            <a href="#" class="btn btn-primary"><i class="fa fa-cart"></i> Ajouter au panier</a>
          </div>
        </div>

      </div>




        <?php }  ?>  

     

      </div>
     

     
  </div>

</body>

</html>