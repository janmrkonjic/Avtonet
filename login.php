<?php
include_once("auth.php");
include("session.php");
if(isset($_SESSION['user_id']))
{
    header("Location: index.php");
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Reset some default browser styles */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

h2 {
    text-align: center;
    font-size: 30px;
}

/* Container for the login and register forms */
form {
    text-align: center;
    width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input {
    width: 50%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Button styling */
.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.content {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.register {
    color: #007bff;
}

.domov {
    color: #007bff;
    float: right;
}

@media screen and (max-width = 600px)
{
    input[type="text"] {
        width: 50%;
    }
    select {
        width: 100%;
    }
    .content {
        width: 300px;
    }

}

</style>
<body>
<header>
<nav>
            <ul>
                <li><a href="index.php">Domov</a>
                <a href="oglasi.php">Oglasi</a>
                <a href="oglas_add.php" class="button">Objavi Oglas</a>
                <?php
        if (isset($_SESSION['user_id'])) {
            // User is logged in, display appropriate links
            echo '<a href="logout.php">Odjava</a>';
        } else {
            // User is not logged in, display login and registration links
            echo '<a href="login.php" class="button">Prijava</a>';
            echo '<a href="register.php" class="button">Registracija</a>';
        }
        ?>

                </li>
            </ul>
        </nav>
        <h1>Fake Avto.net</h1>
    </header>
    <div class="content"><br><br><br><br><br><br><br><br><br>

    <h2>Prijava</h2>
    <form method="post" action="login_process.php">
    <div class="g_id_signin" data-type="standard"></div>
        <label for="uporabnisko_ime">Uporabnisko ime:</label>
        <input type="text" name="uporabnisko_ime" required><br><br>
        <label for="geslo">Geslo:</label>
        <input type="password" name="geslo" required><br><br>

        <input class="btn" type="submit" value="Prijava">
    </form>
<br>
    <div style="text-align:center;">
    <a href="<?= Auth::get_google_login_url() ?>" class="btn">Google login</a><br><br>
    <hr>Še nimate računa?
    <hr>
</div>
    <br>
    <a class="register" href="register.php">Registracija tukaj</a>
    <a class="domov" href="index.php">Domov</a><br><br><br>
    </div>
    <br>
</body>
</html>