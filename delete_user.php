<?php

include("connection.php");
include("session.php");

adminOnly($pdo);

$uporabnik = $_GET['id'];

$query2 = "DELETE FROM oglasi WHERE uporabnik_id = $uporabnik";
$stmt2 = $pdo->prepare($query2);
$stmt2->execute();

$query = "DELETE FROM uporabniki WHERE id = $uporabnik";
$stmt = $pdo->prepare($query);
$stmt->execute();


header('Location: manage_users.php');