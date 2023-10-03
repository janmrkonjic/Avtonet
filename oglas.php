<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avto.net Clone</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}
        /* Apply styles to the search form */

        h1   {
            text-align: center;
        }

        .okvir {
            border: 2px solid gray;
            border-radius: 10px;
            margin-left: 10px;
            padding-right: 10px;
        }


        .main {
            padding-left: 200px;
        }

        .osnovni_podatki {
            text-align: center;
            font-weight: bolder;
            font-size: 22px;
        }

        .siv {
            background-color: lightgray;
        }

        img {
        height:450px;
        width: 570px;
    }

    .tabela {
        padding-left: 100px;
        padding-top: 70px;
        }

        td {
            padding: 10px;
        }

    .slika {
        float: left;
    }

    .cena {
        font-weight: bold;
        font-size: 26px;
    }

    .bold {
        font-weight: bold;
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
        <h1>Fake Avto.net</h1>
    </header>
    <div class="okvir">
    <h1>Znamka Model</h1>
    </div>
    <div class="main">
    <div class="slika">
    <img src="images/avto.png">
    </div>

    <div class="podatki">
        <table class="tabela">
            <tr class="siv">
                <th colspan="2" class="osnovni_podatki">Osnovni podatki </th>
                <th></th>
            </tr>
            <tr>
                <td class="bold">Prevoženi km: </td>
                <td>123456</td>
            </tr>
            <tr>
                <td class="bold">Motor: </td>
                <td>180 kW</td>
            </tr>
            <tr>
                <td class="bold">Gorivo: </td>
                <td>Bencin</td>
            </tr>
            <tr>
                <td class="bold">Letnik: </td>
                <td>2020</td>
            </tr>
            <tr>
                <td class="bold">Barva: </td>
                <td>Modra</td>
            </tr>
            <tr>
                <td class="bold">Uporabnik: </td>
                <td>jan</td>
            </tr>
            <tr>
                <td class="cena">Cena: </td>
                <td class="cena">15000€</td>
            </tr>
        </table>
    </div>
    </div>
</body>
</html>