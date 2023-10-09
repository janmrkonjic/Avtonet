<?php

include("connection.php");
include("session.php");

adminOnly($pdo);

$oglas = $_GET['id'];

$query = "DELETE FROM oglasi WHERE id = $oglas";
$stmt = $pdo->prepare($query);
$stmt->execute();

header('Location: manage_oglasi.php');