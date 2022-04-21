<?php
$dsn = 'mysql:dbname=ecommerce;host:127.0.0.1';

try {

    $db = new PDO($dsn, 'root', null);
} catch (PDOException $error) {
    echo $error->getMessage();
}

?>