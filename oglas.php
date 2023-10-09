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
            margin: 0 auto;
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

    .nazaj {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            float: right;
            margin-bottom: 50px;
            margin-right: 300px;
        }

        @media screen and (max-width = 600px)
        {
            input[type="text"] {
                width: 50%;
            }
            select {
                width: 90%;
            }
            .container {
                width: 80%;
            }
            .okvir {
                width: 90%;

            }
            .main {
                padding-left: 0px;
                margin: 0 auto;
            }
            .main img {
                height: 50px;
                width: 100px;
            }
            .cena {
                font-size: 20px;
            }
            .tabela {
                padding-left: 0px;
                padding-top: 0px;
            }
            .podatki {
                margin: 0 auto;
                width: 90%;
            }
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
    <?php 
        $query = "SELECT o.cena, o.km, o.letnik, b.ime AS barva_id,
         u.uporabnisko_ime AS uporabnik_id, g.ime AS gorivo_id,
          m.ime AS model_id, s.slika_url AS slika_id, z.ime AS znamka_id,
          m.motor AS motor_id, m.menjalnik AS menjalnik_id
        FROM oglasi AS o
        LEFT JOIN barve AS b ON o.barva_id = b.id
        LEFT JOIN uporabniki AS u ON o.uporabnik_id = u.id
        LEFT JOIN goriva AS g ON o.gorivo_id = g.id
        LEFT JOIN modeli AS m ON o.model_id = m.id
        LEFT JOIN slike AS s ON o.slika_id = s.id
        LEFT JOIN znamke AS z ON m.znamka_id = z.id
        WHERE o.id = $_GET[id]";        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

         // Check if there are rows in the result set
    if ($data) {
        foreach ($data as $row) {
            $cena = $row["cena"];
            $km = $row["km"];
            $letnik = $row["letnik"];
            $barva_id = $row["barva_id"];
            $uporabnik_id = $row["uporabnik_id"];
            $gorivo_id = $row["gorivo_id"];
            $model_id = $row["model_id"];
            $slika_id = $row["slika_id"];
            $znamka_id = $row["znamka_id"];
            $motor_id = $row["motor_id"];
            $menjalnik_id = $row["menjalnik_id"];
        }
    } else {
        echo "No records found";
    }

            ?>

    <h1><?php echo $znamka_id . " " . $model_id ?></h1>
    </div>
    <div class="main">
    <div class="slika">
    <img src="images/<?php echo $slika_id ?>"></div>
    <div class="podatki">
        <table class="tabela">

            <tr class="siv">
                <th colspan="2" class="osnovni_podatki">Osnovni podatki </th>
                <th></th>
            </tr>
            <tr>
                <td class="bold">Prevoženi km: </td>
                <td><?php echo $km . " km" ?></td>
            </tr>
            <tr>
                <td class="bold">Motor: </td>
                <td><?php echo $motor_id ?></td>
            </tr>
            <tr>
                <td class="bold">Menjalnik: </td>
                <td><?php echo $menjalnik_id ?></td>
            </tr>
            <tr>
                <td class="bold">Gorivo: </td>
                <td><?php echo $gorivo_id ?></td>
            </tr>
            <tr>
                <td class="bold">Letnik: </td>
                <td><?php echo $letnik?></td>
            </tr>
            <tr>
                <td class="bold">Barva: </td>
                <td><?php echo $barva_id?></td>
            </tr>
            <tr>
                <td class="bold">Uporabnik: </td>
                <td><?php echo $uporabnik_id?></td>
            </tr>
            <tr>
                <td class="cena">Cena: </td>
                <td class="cena"><?php echo $cena . " €" ?></td>
            </tr>
        </table>
        <a class="nazaj" href="oglasi.php">Nazaj</a>
    </div>
    </div>

</body>
</html>