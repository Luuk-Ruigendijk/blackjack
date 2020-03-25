<?php

session_start();

require "config.php";

$login = $_COOKIE["login"];

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT cash FROM users WHERE username = '". $login ."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) 
    {
    	while ($row = $result->fetch_assoc()) {
	    	$cash = $row['cash'];
		}
    	$cookie_name= "cash";
		$cookie_value= $cash;
        //$cash;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header('location:blackjack.php');
		
    }
    else
    {
        echo"unscccessful login";
    }

$conn->close();
?>