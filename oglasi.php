<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Avto</title>
</head>
<style>
    body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

    .oglas {
        width: 50%;
        margin: auto;
        padding:2%;
        border: 2px solid black;
        border-radius: 10px;
    }

    table {
        margin: auto;
    }


    th {
            background-color: black;
            color: white;
            text-align: center;
            font-size: 20px;
        }
    
        img {
        max-height:350px;
        max-width: 370px;
    }
</style>
<body>
<header>
        <nav>
            <ul>
                <li><a href="index.php">Domov</a></li>
                <li><a href="oglasi.php">Oglasi</a></li>
                <li><a href="login.php" class="button">Prijava</a></li>
                <li><a href="register.php" class="button">Registracija</a></li>
                <li><a href="oglas_add.php" class="button">Objavi Oglas</a></li>
                <li><a href="logout.php">Odjava</a></li>
            </ul>
        </nav>
        <h1>Oglasi</h1>
    </header>
<br>
<div class="oglas">
        <table>
            <th colspan="2">Znamka model</th>
            <tr>
            <td><img src="images/avto.png"></td>
            <td>
            Letnik: <br>
            Prevoženih: <br>
            Gorivo: <br>
            Cena: <br>
            </td>
            </tr>
        </table>
    </div>
    <br><br>
    <div class="oglas">
        <table>
            <th colspan="2">Znamka model</th>
            <tr>
            <td><img src="images/avto.png"></td>
            <td>
            Letnik: <br>
            Prevoženih: <br>
            Gorivo: <br>
            Cena: <br>
            </td>
            </tr>
        </table>
    </div>
    <br><br>
    <div class="oglas">
        <table>
            <th colspan="2">Znamka model</th>
            <tr>
            <td><img src="images/avto.png"></td>
            <td>
            Letnik: <br>
            Prevoženih: <br>
            Gorivo: <br>
            Cena: <br>
            </td>
            </tr>
        </table>
    </div>
    <br>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fake avto.net</p>
    </footer>
</body>
</html>
