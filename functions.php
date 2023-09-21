<?php

function check_login($con)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM uporabniki WHERE id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }



    //redirect to login
    header("Location: login.php");
    die;

}

function get_user($con, $id)
{

        $query = "SELECT * FROM uporabniki WHERE id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

        return null;

}

/*function check_admin($con)
{

    if(isset($_SESSION['user_id']))
    {

        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM uporabniki WHERE id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            if($user_data['admin'])
            {
                return true;
            }
        }
    }


    //redirect to user page
    header("Location: index.php");
    die;

}
*/
