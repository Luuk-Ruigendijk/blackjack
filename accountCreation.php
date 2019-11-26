<?php

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

$sql = "INSERT INTO users (username, password, cash)
VALUES ('" . $_POST['name'] . "', '" . $_POST['pass'] . "', '" . $_POST['cash'] . "')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>