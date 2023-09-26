<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registracija</h2>
    <form method="post" action="register_process.php">
        <label for="uporabnisko_ime">Username:</label>
        <input type="text" name="uporabnisko_ime" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="geslo">Password:</label>
        <input type="password" name="geslo" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>