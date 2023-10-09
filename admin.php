<?php
include("connection.php");
include("session.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            right: 10px; bottom: 10px;
        }

        @media screen and (max-width: 600px)
        {
            .title
            {
                font-size: 50px;
                margin: 0 auto;
            }
            .main
            {
                margin-top: 10px;
                padding: 100px;
            }
            .main a
            {
                font-size: 20px;
            }
            .menu {
                font-size: 20px;
                margin: 0 auto;
                position: relative;
            }
        }

    </style>
</head>
<body>
<div class="main">
<h1 class="title">Pozdravljen, admin!</h1><br>
<a href="manage_users.php">Uporabniki</a><br><br><br>
<a href="manage_oglasi.php">Oglasi</a><br><br><br>
<a class="menu" href="index.php">Menu</a>
</div>

</body>
</html>