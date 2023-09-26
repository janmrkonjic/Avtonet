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
        /* Apply styles to the search form */
        form {
            text-align: center;
            margin-top: 20px;
        }

        h1   {
            margin-left: 20px;
        }

        /* Style the input field */
        input[type="text"] {
            padding: 10px;
            width: 1250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style the search button */
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Hover effect for the search button */
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style the filters */
        select {
            margin-left: 10px;
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        .search {
            margin-left:10px;
        }
    </style>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Domov</a></li>
                <li><a href="avto.php">Avto</a></li>
                <li><a href="moto.php">Moto</a></li>
                <li><a href="ostalo.php">Ostalo</a></li>
                <li><a href="login.php" class="button">Prijava</a></li>
                <li><a href="register.php" class="button">Registracija</a></li>
            </ul>
        </nav>
        <h1>Fake Avto.net</h1>
    </header>
    <h1>Iskanje Vozil</h1>

<form method="get" action="search.php">
    <input type="text" name="search_query" placeholder="Vpišite model, letnik, ceno...">
    <button type="submit">Išči</button>
</form>
<br>
         <!-- Brand filter -->
         <select name="brand">
            <option value="">Znamka</option>
            <!-- Populate the options dynamically using PHP -->
            <?php

                // Query to retrieve brands from the "znamke" table
                $query = "SELECT id, ime FROM znamke"; // Selecting id and ime columns
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($brands as $brand) {
                    echo '<option value="' . $brand['id'] . '">' . $brand['ime'] . '</option>';
                }
  
            ?>
            <!-- Add more brand options as needed -->
        </select>

        <!-- Model filter -->
        <select name="model">
            <option value="">Model</option>
            <?php

                $query = "SELECT id, ime FROM modeli"; // Selecting id and ime columns
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $models = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($models as $model) {
                    echo '<option value="' . $model['id'] . '">' . $model['ime'] . '</option>';
                }
  
            ?>
        </select>

        <!-- Price filter -->
        <select name="price">
            <option value="">Cena</option>
            <option value="1000">Do 1000$</option>
            <option value="5000">Do 5000$</option>
            <option value="10000">Do 10000$</option>
            <option value="20000">Do 20000$</option>
            <!-- Add more price options as needed -->
        </select>

        <!-- Vehicle Type filter -->
        <select name="vehicle_type">
            <option value="">Vrsta vozila</option>
            <option value="Avtomobil">Avtomobil</option>
            <option value="Motor">Motor</option>
            <option value="Ostalo">Ostalo</option>
            <!-- Add more vehicle type options as needed -->
        </select>
        <br><br>
        <button class="search" type="submit">Išči</button>
    </form>

    
    <section class="featured-cars">
        <h2>Popusti</h2>
        <!-- Display featured car listings here -->
    </section>
    
    <section class="latest-news">
        <h2>Novice</h2>
        <!-- Display latest news articles here -->
    </section>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> avto.net Clone</p>
    </footer>
</body>
</html>