<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login_process.php">
        <label for="uporabnisko_ime">Username:</label>
        <input type="text" name="uporabnisko_ime" required><br><br>

        <label for="geslo">Password:</label>
        <input type="password" name="geslo" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
