<?php
    $env = parse_ini_file(".env");
    $host = $env["DB_HOST"];
    $dbname = $env["DB_NAME"];
    $username = $env["DB_USER"];
    $password = $env["DB_PASSWORD"];

    $dsn = "mysql:host=$host; dbname=$dbname;charset=utf8mb4";
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        echo "Connection failed: " . $error->getMessage();
    }
?>