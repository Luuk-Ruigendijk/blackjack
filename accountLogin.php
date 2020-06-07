<?php

require "config.php";

$user= $_POST['name'];
$pass= $_POST['pass'];
$cookie_name= "login";
$cookie_value= $user;

    if(isset($_POST['login']))
{
    if (empty ($user))
    {
        echo "you must enter your unique username <br />";
    }
    if (empty ($_REQUEST['pass']))
    {
        echo "you must enter your password <br />";
    }
}


    $query = "SELECT * FROM users WHERE username = '". $user ."' AND password = '". $pass ."'" ;
    $statement = $conn->prepare($query);
    $statement->execute();
    $retrievedUser = $statement->fetchAll(PDO::FETCH_CLASS);
    $responseText = json_encode($retrievedUser);

    $num_rows = $statement->rowCount();

    $data_exists = ($statement->fetchColumn() > 0) ? true : false;


    if ($num_rows===1) 
    {
        echo "query successfull wrote to DB";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header('location:calculateCash.php');
    }
    else
    {
        $message = "wrong combination!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('location:index.php');
    }
?>