<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un produit</title>
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">

</head>

<?php
require('database.php');


$id = $_GET['id'];
$req = $db->query("SELECT * FROM `produit` WHERE `id`= $id");
$resultat = $req->fetch();


if (isset($_POST['submit'])) {
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $quantite = $_POST['quantite'];
  $prix = $_POST['prix'];
  $image = $_FILES['image'];
  if (!empty($nom)  && !empty($description) && !empty($quantite) && !empty($prix) && !empty($image)) {
    $file_dir = 'image/';
    $current_file_name = $image['name'];
    $file_extension = strtolower(pathinfo($current_file_name, PATHINFO_EXTENSION));
    $new_file_name = 'IMAGE-' . time() . '.' . $file_extension;
    $file_dest = $file_dir . $new_file_name;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $file_dest)) {
      $req = "UPDATE `produit` SET `nomProduit`=? ,`description`=?,`quantite`=? , `prix`=?,`image`=? WHERE `id`=?";
      $statement = $db->prepare($req);
      $statement->execute(array($nom, $description, $quantite, $prix, $new_file_name, $resultat['id']));
      header('Location:listeProduit.php');
    } else {
      echo 'Telechargement echoué';
    }
  } else {
    echo 'Champs vide';
  }
}





?>


<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-9 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-5">
            <!-- Nested Row within Card Body -->
            <h5 class=" text-center text-bold">Modifier un produit</h5>
            <hr>


            <form class="form-signin" action="" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label for="username">Nom</label>
                <input type="text" required class="form-control" value="<?= $resultat['nomProduit'] ?>" name="nom">
              </div>
              <div class="form-group">
                <label for="username">Description</label>
                <textarea name="description" class="form-control" value="<?= $resultat['description'] ?>"></textarea>
              </div>

              <div class="form-group">
                <label for="username">Quantite</label>
                <input type="number" required class="form-control" value="<?= $resultat['quantite'] ?>" name="quantite">
              </div>

              <div class="form-group">
                <label for="username">Prix</label>
                <input type="text" required class="form-control" value="<?= $resultat['prix'] ?>" name="prix">
              </div>

              <div class="form-group">
                <label for="username">Image</label>
                <input type="file" required class="form-control" value="<?= $resultat['image'] ?>" name="image">
              </div>


              <button id="submit" class="btn btn-lg btn-block " name="submit" style="background-color:#42a5f5;" type="submit"><span style="color:white;">Modifier </span></button>

            </form>
            <hr>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>


</html>