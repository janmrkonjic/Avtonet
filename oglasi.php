<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Oglasi</title>
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
            background-color: #454545;
            color: white;
            text-align: center;
            font-size: 20px;
        }
    
        img {
        height:250px;
        width: 400px;
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
                <li><a href="index.php">Domov</a>
                <a href="oglasi.php">Oglasi</a>
                <a href="login.php" class="button">Prijava</a>
                <a href="register.php" class="button">Registracija</a>
                <a href="oglas_add.php" class="button">Objavi Oglas</a>
                <a href="logout.php">Odjava</a></li>
            </ul>
        </nav>
        <h1>Oglasi</h1>
    </header>
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
            <td>
            <a href="oglas.php?id=<?php echo $oglas['id']; ?>">
                <img src="images/<?php echo $slika['slika_url']; ?>">
            </td>
            <td>
            Letnik: <?php echo $oglas['letnik'] ?><br>
            Prevoženih: <?php echo $oglas['km'] . " km" ?><br>
            <?php 
            $query4 = "SELECT ime FROM goriva WHERE id = ?";
            $stmt = $pdo->prepare($query4);
            $stmt->execute([$oglas['gorivo_id']]);
            $gorivo = $stmt->fetch();
             ?>
            Gorivo: <?php echo $gorivo['ime'] ?><br>
            Cena: <?php echo $oglas['cena'] . " €" ?><br>
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
