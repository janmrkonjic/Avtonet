<?php
include('connection.php');
include('session.php');
$user = check_login($pdo);
$image_id = NULL;
if (isset($_POST["submit"]) && isset($_FILES['slika']))
{

	$img_name = $_FILES['slika']['name'];
	$img_size = $_FILES['slika']['size'];
	$tmp_name = $_FILES['slika']['tmp_name'];
	$error = $_FILES['slika']['error'];

	if($error === 0)
	{
		if($img_size > 125000)
		{
			$em = "Prevelika slika.";
			header("Location: index.php?error=$em");
		}
		else
		{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");

			if(in_array($img_ex_lc, $allowed_exs))
			{
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				//Insert into database
				$sql = "INSERT INTO slike(slika_url) VALUES ('$new_img_name')";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$sql1 = "SELECT id FROM slike WHERE slika_url ='$new_img_name' limit 1";
				$stmt = $pdo->prepare($sql1);
				$stmt->execute();
				$result = $stmt->fetch();
				if($result)
				{
					$image_id = $result['id'];
					echo $image_id;
				}
			}
			else
			{
				$em = "Ne moreš objaviti slik tega tipa!";
				header("Location: index.php?error=$em");
			}
		}
	}
	else
	{
		$em = "unknown error occured!";
		header("Location: index.php?error=$em");
	}

$query = "INSERT INTO oglasi(cena, km, letnik, barva_id, gorivo_id, model_id, uporabnik_id, slika_id)
VALUES (:cena, :km, :letnik, (SELECT id FROM barve WHERE ime = :barva), (SELECT id FROM goriva WHERE ime = :gorivo), :model_id, :uporabnik_id, :slika_id)";
$stmt = $pdo->prepare($query, );
$stmt->execute([
	"cena" => $_POST["cena"],
	"km" => $_POST["km"],
	"letnik" => $_POST["letnik"],
	"barva" => $_POST["barva"],
	"gorivo" => $_POST["gorivo"],
	"model_id" => $_POST["model"],
    "uporabnik_id" => $user["id"],
	"slika_id" => $image_id

]);
	
header('Location: oglas.php?id=' . $pdo->lastInsertId());
//header('Location: index.php');
}
