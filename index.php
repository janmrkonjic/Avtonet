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
            width: 95%;
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

        @media screen and (max-width = 600px)
        {
            input[type="text"] {
                width: 50%;
            }
            select {
                width: 100%;
            }
            .container {
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
    <h1>Iskanje Vozil</h1>
<br>
<div class="container">
<form method="get" action="search.php">

<input type="text" name="search" placeholder="Vpišite model, letnik, ceno... " 
    value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>"><br><br>
    <button type="submit" name="submit">Išči</button>
         <!-- Brand filter -->
         <select name="znamka" id="brand">
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
        <select name="model" id="model">
            <option value="">Model</option>
            <?php

                $query = "SELECT id, ime, znamka_id FROM modeli"; // Selecting id and ime columns
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $models = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($models as $model) {
                    echo '<option data-znamka="' . $model['znamka_id'] . '" value="' . $model['id'] . '">' . $model['ime'] . '</option>';
                }

            ?>
        </select>

        <script>
            const znamka_select = document.getElementById("brand")
            const model_select = document.getElementById("model")
            znamka_select.addEventListener("change", function(e) {
                model_select.value = ""
                const options = model_select.querySelectorAll("option")
                const toShow = znamka_select.value
                options.forEach(function(option){
                    if(option.dataset.znamka == toShow)
                    {
                        option.style.display = "block"
                    }
                    else
                    {
                        option.style.display = "none"
                    }
                })

            })

        </script>

        <!-- Price filter -->
        <select name="cena">
            <option value="">Cena</option>
            <option value="1000">Do 1000€</option>
            <option value="10000">Do 10000€</option>
            <option value="20000">Do 20000€</option>
            <option value="50000">Do 50000€</option>
            <!-- Add more price options as needed -->
        </select>

        <!-- Vehicle Type filter -->
        <select name="vrsta_vozila">
            <option value="">Vrsta vozila</option>
            <option value="Avtomobil">Avtomobil</option>
            <option value="Motor">Motor</option>
            <option value="Ostalo">Ostalo</option>
            <!-- Add more vehicle type options as needed -->
        </select>
        <br><br>
        <button class="search" type="submit">Išči</button>
    </form>
    </div>
    <br><br>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Fake avto.net</p>
    </footer>
</body>
</html>