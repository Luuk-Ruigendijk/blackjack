<?php
//zodra script is uitgevoerd is alle info die hier staat kwijt, inclusief 'variables'
var_dump($_POST);
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



    if(isset($_POST['login']))
{
    $user= $_POST['name'];
    $pass= $_POST['pass'];
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
        header('location:blackjack.php');
    }
    else
    {
        echo"unscccessful login";
    }

if(isset($_POST['createAccount']))
{
    $sql = "INSERT INTO users (username, password, cash)
    VALUES ('" . $_POST['name'] . "', '" . $_POST['pass'] . "', '" . $_POST['cash'] . "')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $user= $_POST['name'];
        $pass= $_POST['pass'];
        $cash= $_POST['cash'];
        header('location:blackjack.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



$conn->close();
?>