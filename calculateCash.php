<?php

session_start();

require "config.php";

$servername = DB_SERVER;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;
$login = $_COOKIE["login"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT cash FROM users WHERE username = '". $login ."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) 
    {
    	while ($row = $result->fetch_assoc()) {
	    	$cash = $row['cash']."<br>";
		}
    	echo $cash;
    	$cookie_name= "cash";
		$cookie_value= $cash;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		
    }
    else
    {
        echo"unscccessful login";
    }

$conn->close();
?>