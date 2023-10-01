<?php
include("connection.php");
try {
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
        echo "Prijava uspešna!";
        header('Refresh:1; url=index.php');
    } else {
        echo "Prijava neuspešna. Preverite uporabniško ime in geslo.";
        header('Refresh:2; url=login.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
