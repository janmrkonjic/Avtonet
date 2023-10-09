<?php
include("connection.php");
include("session.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <style>



        .title
        {
            color: black;
            font-size: 60px;
            text-align: center;
        }

        .main
        {
            padding: 230px;
            text-align: center;
        }

        .main a
        {
            font-size: 30px;
            margin: 10px;
            border: 2px solid black;
            border-radius: 20px;
            text-decoration: none;
            color: black;
            padding: 10px;
        }

        .menu
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
<div class="main">
<h1 class="title">Pozdravljen, admin!</h1>
<a href="manage_users.php">Uporabniki</a>
<a href="manage_oglasi.php.">Oglasi</a>
    <a class="menu" href="index.php">Menu</a>

</div>
</body>
</html>