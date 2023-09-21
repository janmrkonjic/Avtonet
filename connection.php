<?php
// Database connection using PDO
$dsn = "mysql:host=localhost;dbname=avtonet";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}