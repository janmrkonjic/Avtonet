<?php
include("connection.php");

try {
    // Get user input
    $uporabnisko_ime = $_POST['uporabnisko_ime'];
    $email = $_POST['email'];
    $raw_password = $_POST['geslo'];

    // Check if 'uporabnisko_ime' already exists
    $check_query = "SELECT * FROM uporabniki WHERE uporabnisko_ime = ?";
    $check_stmt = $pdo->prepare($check_query);
    $check_stmt->execute([$uporabnisko_ime]);

    if ($check_stmt->rowCount() > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Hash the password securely
        $hashed_password = password_hash($raw_password, PASSWORD_BCRYPT);

        // Insert user data into the database with hashed password using prepared statement
        $insert_query = "INSERT INTO uporabniki (uporabnisko_ime, email, geslo) VALUES (?, ?, ?)";
        $insert_stmt = $pdo->prepare($insert_query);
        $insert_stmt->execute([$uporabnisko_ime, $email, $hashed_password]);

        echo "Registration successful!";
        header('Refresh:1; url=login.php');
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
