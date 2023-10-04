<?php
include("connection.php");
include('session.php'); 
$user = check_login($pdo);
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
            width: 1250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 93.5%;
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
        input {
            margin-left: 10px;
            width: 93.5%;
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
    <h1>Objavi Oglas</h1>
</form>

<form method="post" action="oglas_proccess.php" enctype="multipart/form-data">
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


        <select name="gorivo">
            <option value="">Gorivo</option>
            <option value="Bencin">Bencin</option>
            <option value="Diesel">Diesel</option>
            <option value="E-pogon">E-pogon</option>
        </select>

        <select name="barva">
            <option value="">Barva</option>
            <option value="Bela">Bela</option>
            <option value="Črna">Črna</option>
            <option value="Srebrna">Srebrna</option>
            <option value="Modra">Modra</option>
            <option value="Siva">Siva</option>
            <option value="Rumena">Rumena</option>
            <option value="Rdeča">Rdeča</option>
            <option value="Zelena">Zelena</option>
            <option value="Roza">Roza</option>
            <option value="Vijolična">Vijolična</option>
        </select>

        <input type="text" name="cena" placeholder="Cena">
        <br>
        <input type="text" name="km" placeholder="Prevoženi km">
        <br>
        <input type="text" name="letnik" placeholder="Letnik">
        <br>
        <input type="file" id="image" name="slika">
        <br><br>
        <button name="submit" type="submit">Objavi</button>
    </form>
    <br><br>

</body>
</html>