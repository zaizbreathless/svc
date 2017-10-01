<?php 
//load database connection
    $host = "localhost";
    $user = "svc-v4";
    $password = "4e2usaty8";
    $database_name = "faisal_svc-v4";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
?>