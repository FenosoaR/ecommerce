<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<?php
require('database.php');


if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $email_valid = null;

        $req = $db->query("SELECT * FROM `utilisateur`");
        $resultat = $req->fetchAll();


        foreach ($resultat as $item) {
            if ($email === $item['email']) {
                $email_valid = $email;
            }
        }
        if ($email_valid != null) {
            $req = $db->query("SELECT * FROM `utilisateur` WHERE `email`= '$email_valid' ");
            $item = $req->fetch();

            $compare_mdp = password_verify($mdp, $item['mot_de_passe']);

            if ($compare_mdp) {
                setcookie('email', $email_valid, time() + 3600, '/');
                header('Location:../index.php');
            } else {
                $error = 'Votre mot de passe est incorrecte';
            }
        } else {
            $error = 'Votre email est incorrecte';
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

                <div class="col-xl-6 col-lg-9 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-5">
                            <!-- Nested Row within Card Body -->
                            <h5 class=" text-center text-bold">Veuillez-vous connecter</h5>
                                    <hr>


                                    <form class="form-signin" action="" method="post">

                                        <div class="form-group">
                                            <label for="username">Email</label>
                                            <input type="email" required  class="form-control" value="" name="email"  aria-describedby="emailHelp" placeholder="Entrer votre email" value="{{old('emailAdmin')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mot de passe</label>
                                            <input type="password" class="form-control" value="" name="mdp"  placeholder="Mot de passe">
                                        </div>
                                        <button id="submit" class="btn btn-lg btn-block " name="submit" style="background-color:#42a5f5;" type="submit"><span style="color:white;">Se connecter </span></button>
                                        <a class="btn btn-lg btn-block " style="background-color:#42a5f5;" href="inscription.php"><span style="color:white;">S'inscrire</span></a>
                                    </form>
                                    <hr>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </body>