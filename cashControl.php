<?php echo $_POST["playerCash"];


?><?php
$playerCash = $_POST["playerCash"];



session_start();

require "config.php";

$login = $_COOKIE["login"];

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "UPDATE users SET cash = $playerCash WHERE username = '". $login ."'";
$conn->query($query);

?>