<?php
session_start();

function check_login($pdo)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];

        $query = "SELECT * FROM uporabniki WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user_data)
        {
            return $user_data;
        }
    }



    //redirect to login
    header("Location: login.php");
    die;

}

function isAdmin() {
    $result = false;
    if (isset($_SESSION['admin']) && ($_SESSION['admin']==1)) {
        $result = true;
    }
    return $result;
}

function adminOnly() {
    //če ni admin, ga preusmeri na index
    if (!isAdmin()) {
        header("Location: index.php");
        die();
    }
}



?>