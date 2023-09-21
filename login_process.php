<?php
// Database connection using PDO
$dsn = "mysql:host=localhost;dbname=avtonet";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get user input
    $uporabnisko_ime = $_POST['uporabnisko_ime'];
    $raw_password = $_POST['geslo'];

    // Retrieve the hashed password from the database
    $query = "SELECT geslo FROM uporabniki WHERE uporabnisko_ime = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$uporabnisko_ime]);

    $row = $stmt->fetch();
    $hashed_password = $row['geslo'];

    // Verify the password
    
    if (password_verify($raw_password, $hashed_password)) {
        echo "Login successful!";
        header('Refresh:1; url=index.php');
    } else {
        echo "Login failed. Please check your username and password.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
