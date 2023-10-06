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

    <?php
    $search = $_POST['search'];
    $sql = "SELECT o.cena, o.km, o.letnik, b.ime AS barva_id, u.uporabnisko_ime AS uporabnik_id, g.ime AS gorivo_id, m.ime AS model_id, s.slika_url AS slika_id, z.ime AS znamka_id
    FROM oglasi AS o
    LEFT JOIN barve AS b ON o.barva_id = b.id
    LEFT JOIN uporabniki AS u ON o.uporabnik_id = u.id
    LEFT JOIN goriva AS g ON o.gorivo_id = g.id
    LEFT JOIN modeli AS m ON o.model_id = m.id
    LEFT JOIN slike AS s ON o.slika_id = s.id
    LEFT JOIN znamke AS z ON m.znamka_id = z.id
    WHERE z.ime LIKE '%$search%' OR m.ime LIKE '%$search%' OR o.letnik LIKE '%$search%' 
    OR o.km LIKE '%$search%' OR g.ime LIKE '%$search%' OR o.cena LIKE '%$search%' 
    OR b.ime LIKE '%$search%' OR u.uporabnisko_ime LIKE '%$search%' 
    OR o.id LIKE '%$search%'";

    /*$sql = "SELECT * FROM oglasi WHERE id LIKE '%$search%' OR cena LIKE 
    '%$search%' OR km LIKE '%$search%' OR letnik LIKE '%$search%';";
    //execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
*/

    //count the rows
    $count = $stmt->rowCount();

    if($count > 0)
    {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $id = $row['id'];
            $cena = $row["cena"];
            $km = $row["km"];
            $letnik = $row["letnik"];
            $barva_id = $row["barva_id"];
            $uporabnik_id = $row["uporabnik_id"];
            $gorivo_id = $row["gorivo_id"];
            $model_id = $row["model_id"];
            $slika_id = $row["slika_id"];
            $znamka_id = $row["znamka_id"];
            ?>

            <div class="oglas">
        <table>
            <th colspan="2">
            <?php echo $znamka_id . " " . $model_id ?>
            </th>
            <tr>
            <td>
            <a href="oglas.php?id=<?php echo $id; ?>">
                <img src="images/<?php echo $slika_id; ?>">
            </td>
            <td>
            Letnik: <?php echo $letnik ?><br>
            Prevoženih: <?php echo $km ?><br>
            Gorivo: <?php echo $gorivo_id ?><br>
            Cena: <?php echo $cena ?><br>
            </td>
            </tr>
        </table>

            <?php

        }
    }
    else
    {
        echo "Ni zadetkov";
    }
    ?>
<br>
                <?php 
                $query = "SELECT * FROM oglasi";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $oglasi = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($oglasi as $oglas)
            {
                
            
            ?>
<div class="oglas">
        <table>
        <?php 
            $query2 = "SELECT ime, znamka_id FROM modeli WHERE id = ?";
            $stmt = $pdo->prepare($query2);
            $stmt->execute([$oglas['model_id']]);
            $model = $stmt->fetch();
            
            $query3 = "SELECT ime FROM znamke WHERE id = ?";
            $stmt = $pdo->prepare($query3);
            $stmt->execute([$model['znamka_id']]);
            $znamka = $stmt->fetch();

             ?>
            <th colspan="2">
            <?php echo $znamka['ime'] ." " . $model['ime']; ?>
            </th>  
            <?php 
            $query1 = "SELECT slika_url FROM slike WHERE id = ?";
            $stmt = $pdo->prepare($query1);
            $stmt->execute([$oglas['slika_id']]);
            $slika = $stmt->fetch();
             ?>
            <tr>
            <td><img src="images/<?php echo $slika['slika_url']; ?>"></td>
            <td>
            Letnik: <?php echo $oglas['letnik'] ?><br>
            Prevoženih: <?php echo $oglas['km'] ?><br>
            Gorivo: <?php echo $oglas['gorivo_id'] ?><br>
            Cena: <?php echo $oglas['cena'] ?><br>
            </td>
            </tr>

        </table>
    </div>
    <br><br>
    <?php
            }
            ?>
    <br>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fake avto.net</p>
    </footer>
</body>
</html>
