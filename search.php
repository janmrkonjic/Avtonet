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
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .oglas {
        width: 50%;
        margin: auto;
        padding: 2%;
        border: 2px solid black;
        border-radius: 10px;
    }

    table {
        margin: auto;
    }


    th {
        background-color: #454545;
        color: white;
        text-align: center;
        font-size: 20px;
    }

    img {
        max-height: 350px;
        max-width: 370px;
    }

    @media screen and (max-width: 600px) {
        .oglas {
            width: 90%;
        }
        img {
            height: 150px;
            width: 200px;
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
        <h1>Oglasi</h1>
    </header>

    <?php

    /*
query = "SELECT * FROM oglasi WHERE 1=1"
if(znamka)
{
  query .= " AND znamka = " . znamka
}

if (model)
{
  query .= " AND model = " . model
}

...

(izvedes query in prikazes rezultate)
*/

    $query = "SELECT *, o.id AS oglas_id, z.ime AS znamka_ime, m.ime AS model_ime FROM oglasi o
LEFT JOIN barve AS b ON o.barva_id = b.id
LEFT JOIN uporabniki AS u ON o.uporabnik_id = u.id
LEFT JOIN goriva AS g ON o.gorivo_id = g.id
LEFT JOIN modeli AS m ON o.model_id = m.id
LEFT JOIN slike AS s ON o.slika_id = s.id
LEFT JOIN znamke AS z ON m.znamka_id = z.id
LEFT JOIN vrste AS v ON m.vrsta_id = v.id
WHERE 1=1";

    if (isset($_GET['znamka']) && $_GET['znamka'] != "") {
        $znamka = $_GET['znamka'];
        $query .= " AND znamka_id = " . $znamka;
    }

    if (isset($_GET['model']) && $_GET['model'] != "") {
        $model = $_GET['model'];
        $query .= " AND model_id = " . $model;
    }

    //search
    if (isset($_GET['search']) && $_GET['search'] != "") {
        $search = $_GET['search'];
        $query .= " AND (z.ime LIKE '%$search%' OR m.ime LIKE '%$search%' OR o.letnik LIKE '%$search%' 
    OR o.km LIKE '%$search%' OR g.ime LIKE '%$search%' OR o.cena LIKE '%$search%' 
    OR b.ime LIKE '%$search%' OR u.uporabnisko_ime LIKE '%$search%' 
    OR o.id LIKE '%$search%')";
    }

    if(isset($_GET['cena']) && $_GET['cena'] != "")
    {
        $cena = $_GET['cena'];
        $query .= " AND cena <= " . $cena;
    }

    //vrsta_vozila
    if (isset($_GET['vrsta_vozila']) && $_GET['vrsta_vozila'] != "") {
        $vrsta_vozila = $_GET['vrsta_vozila'];
        $query .= " AND v.ime = '" . $vrsta_vozila . "'";
    }


    /*$sql = "SELECT * FROM oglasi WHERE id LIKE '%$search%' OR cena LIKE 
    '%$search%' OR km LIKE '%$search%' OR letnik LIKE '%$search%';";
    */
    //execute the query
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    //count the rows
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['oglas_id'];
            $cena = $row["cena"];
            $km = $row["km"];
            $letnik = $row["letnik"];
            $barva_id = $row["barva_id"];
            $uporabnik_id = $row["uporabnik_id"];
            $gorivo_id = $row["gorivo_id"];
            $model_id = $row["model_id"];
            $slika_url = $row["slika_url"];
            $znamka_id = $row["znamka_id"];
    ?>

            <div class="oglas">
                <table>
                    <th colspan="2">
                        <?php echo $row["znamka_ime"] . " " . $row["model_ime"] ?>
                    </th>
                    <tr>
                        <td>
                            <a href="oglas.php?id=<?php echo $id; ?>">
                                <img src="images/<?php echo $slika_url; ?>">
                        </td>

                        <?php 
                                    $query4 = "SELECT ime FROM goriva WHERE id = ?";
                                    $stmt1 = $pdo->prepare($query4);
                                    $stmt1->execute([$gorivo_id]);
                                    $gorivo = $stmt1->fetch();?>
                        <td>
                            Letnik: <?php echo $letnik ?><br>
                            Prevoženih: <?php echo $km . " km" ?><br>
                            Gorivo: <?php echo $gorivo['ime'] ?><br>
                            Cena: <?php echo $cena . " €"?><br>
                        </td>
                    </tr>
                </table>
            </div>

    <?php

        }
    } else {
        echo "Ni zadetkov";
    }
    ?>
    <br>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fake avto.net</p>
    </footer>
</body>

</html>