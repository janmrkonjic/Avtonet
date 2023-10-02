<?php

include('connection.php');
include('session.php');
$user = check_login($pdo);
if (isset($_POST["submit"]))
{
$query = "INSERT INTO oglasi(cena, km, letnik, barva_id, gorivo_id, model_id, uporabnik_id) VALUES (:cena, :km, :letnik, (SELECT id FROM barve WHERE ime = :barva), (SELECT id FROM goriva WHERE ime = :gorivo), :model_id, :uporabnik_id)";
$stmt = $pdo->prepare($query, );
$stmt->execute([
	"cena" => $_POST["cena"],
	"km" => $_POST["km"],
	"letnik" => $_POST["letnik"],
	"barva" => $_POST["barva"],
	"gorivo" => $_POST["gorivo"],
	"model_id" => $_POST["model"],
    "uporabnik_id" => $user["id"]
]);

header('Location: oglas.php?id=' . $pdo->lastInsertId());
}
