<?php

include("connection.php");
include("session.php");

adminOnly($pdo);


$query = "SELECT * FROM uporabniki;";
$stmt = $pdo->prepare($query);
$stmt->execute();
$uporabniki = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        body, html
        {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        table
        {
            font-size: 20px;
            margin: auto;
            text-align: center;
            padding: 30px;
            color: black;
        }
        th
        {
            padding: 20px;
        }

        a.menu
        {
            font-size: 25px;
            margin: 10px;
            border: 2px solid black;
            border-radius: 20px;
            text-decoration: none;
            color: black;
            padding: 10px;
            position: fixed;
            right: 10px; bottom: 10px;
        }


    </style>
</head>
<body>
<table>
    <tr>
        <th>ID Uporabnika</th>
        <th>Ime uporabnika</th>
        <th>Je admin?</th>
        <th>Akcije</th>
    </tr>
    <?php
    foreach ($uporabniki as $uporabnik) {
        ?>
        <tr>
            <td><?= $uporabnik['id'] ?></td>
            <td><?= $uporabnik['uporabnisko_ime'] ?></td>
            <td><?= $uporabnik['admin'] ? 'Da' : 'Ne' ?></td>
            <td><a href='delete_user.php?id=<?= $uporabnik['id'] ?>'>Izbriši</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<a class="menu" href="admin.php">Menu</a>
</body>
</html>
