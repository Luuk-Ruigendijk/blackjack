<?php 

require "config.php";


echo $_POST["playerCash"];

$playerCash = $_POST["playerCash"];

$login = $_COOKIE["login"];

$query = "UPDATE users SET cash = $playerCash WHERE username = '". $login ."'";
$conn->query($query);

?>