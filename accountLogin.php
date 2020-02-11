<?php

session_start();

require "config.php";

$servername = DB_SERVER;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;
if(!isset($_POST) || !isset($_POST['name'])) {
	die("we hebben geen POST info of een username ontvangen");
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) 
    {
        echo "query successfull wrote to DB";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header('location:calculateCash.php');
        
    }
    else
    {
        echo"unscccessful login";
    }




$conn->close();
?>