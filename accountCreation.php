<?php

require "config.php";


if(isset($_POST['createAccount']))
{
	$sql = "INSERT INTO users (username, password, cash)
	VALUES ('" . $_POST['name'] . "', '" . $_POST['pass'] . "', '" . $_POST['cash'] . "')";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	    header('location:blackjack.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?>