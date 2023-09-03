<?php
    $host = "localhost";
    $port = "3306";
    $user = "root";
    $password = "";
    $dbname = "opovo";

    //usando PDO
    try {
        $pdo = new PDO("mysql:host=$host; port=$port; dbname=$dbname", $user,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // echo "deu";
    } catch (PDOException $e) {

        die($e->getMessage());
    }
?>