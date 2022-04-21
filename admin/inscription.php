<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>

<?php
require('database.php');
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
   
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
  


    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp) && !empty($_POST['mdpC'])) {
        if (strpos($email, '@') && strpos($email, '.')) {
            if (strlen($mdp) < 6 && strlen($mdp) > 40) {
                $error = 'Votre mot de passe est trop court ou trop long';
            } else {


                if ($mdp === $_POST['mdpC']) {

                    $hash = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 12]);
                    $req = "INSERT into `admin`(`nom`,`prenom`,`email`,`mot_de_passe`) VALUES(?,?,?,?)";
                    $statement = $db->prepare($req);
                    $statement->execute(array($nom, $prenom, $email, $hash));

                    session_start();
                    $_SESSION['succes'] = 'Vous etes inscrits avec succes';
                    // header('Location:connexion.php');
                } else {
                    $error = 'Votre confirmation de mot de passe est incorrcete';
                }
            }
        } else {
            $error = "Votre email est incorrecte";
        }
    } else {
        $error = 'Veuillez remplir les champs';
    }
}





?>








    <body class="bg-gradient-dark">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-9 col-lg-9 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-1 p-4"></div>
                                <div class="col-lg-5 p-4">

                                    <h5 class=" text-center text-bold">Inscription</h5>
                                    <hr>
                                    <?php
                                    if (isset($error)) {
                                    ?>
                                        <div class="alert-danger">
                                            <center><?= $error ?></center>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <form class="form-signin" action="" method="post">

                                        <div class="form-group">
                                            <label for="username">Nom</label>
                                            <input type="text" class="form-control" value="" name="nom"  placeholder="Entrer votre nom">
                                            <span style="font-size:13px;margin-left:5px;" class="text-danger">

                                        </div>


                                        <div class="form-group">
                                            <label for="username">Prenom</label>
                                            <input type="text" class="form-control" value="" name="prenom"  placeholder="Entrer votre prenom">
                                            <span style="font-size:13px;margin-left:5px;" class="text-danger">

                                        </div>



                                        <div class="form-group">
                                            <label for="username">Email</label>
                                            <input type="email" class="form-control" value="" name="email"  placeholder="Entrer votre email">
                                            <span style="font-size:13px;margin-left:5px;" class="text-danger">

                                        </div>


                                        <div class="form-group">
                                            <label for="username">Mot de passe</label>
                                            <input type="password" class="form-control" value="" name="mdp"  placeholder="Entrer votre mot de passe">
                                            <span style="font-size:13px;margin-left:5px;" class="text-danger">

                                        </div>


                                        <div class="form-group">
                                            <label for="username">Confirmer votre mot de passe</label>
                                            <input type="password" class="form-control" value="" name="mdpC"  placeholder="Confirmer votre mot de passe">
                                            <span style="font-size:13px;margin-left:5px;" class="text-danger">

                                        </div>
                                        <button id="submit" class="btn btn-lg btn-block " name="submit" style="background-color:#42a5f5;" type="submit"><span style="color:white;">S'inscrire </span></button>

                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>




        </div>












    </body>

</html>