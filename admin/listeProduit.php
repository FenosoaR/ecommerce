<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>
<?php
    require('database.php');
    $req = $db->query('SELECT * FROM `produit`');
    $resultat = $req->fetchAll();




?>

<body>
<div class="container">  
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
        foreach($resultat  as $item){
            ?>
            <tr>
             
                <td><?= $item['nomProduit'] ?></td>
                <td><?= $item['prix'] ?></td>
                <td><img width="60" height="60" src="image/<?=$item['image'] ?>"></td>
                <td><a href="voirProduit.php?id=<?= $item['id']?>"><button class="btn btn-success">Detail</button></a></td>
                <td><a href="modifyProduit.php?id=<?=$item['id']?>"><button class="btn btn-primary">Modifier</button></a></td>
                <td><a href="deleteProduit.php?id=<?=$item['id']?>"><button class="btn btn-danger">Supprimer</button></a></td>            
              </tr>





        <?php }  ?>    
        
        
        
    </tbody>
  </table>
</body>

</html>