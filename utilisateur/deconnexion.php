<?php

setcookie('email', $email_valid, time()-3600, '/');

header('Location:connexion.php');







?>