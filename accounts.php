<?php
//zodra script is uitgevoerd is alle info die hier staat kwijt, inclusief 'variables'
require "config.php";


    /*if(isset($_POST['login']))
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
    }*/

if(isset($_POST['createAccount']))
{
    $query = "SELECT * FROM users WHERE username = '". $_POST['name'] ."'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $retrievedUser = $statement->fetchAll(PDO::FETCH_CLASS);
    $responseText = json_encode($retrievedUser);
    $num_rows = $statement->rowCount();
    $data_exists = ($statement->fetchColumn() > 0) ? true : false;
    if ($num_rows===1) {
        header('location:index.php');
    }
    else{
        $sql = "INSERT INTO users (username, password, cash)
        VALUES ('" . $_POST['name'] . "', '" . $_POST['pass'] . "', '" . $_POST['cash'] . "')";
        $stmt = $conn->query($sql);
        if ($stmt->errorCode() === "00000") {
            echo "New record created successfully";
            $user= $_POST['name'];
            $pass= $_POST['pass'];
            $cash= $_POST['cash'];
            $cookie_name= "login";
            $cookie_value= $user;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            header('location:calculateCash.php');
        }   else {
            echo "Error: " . $sql . "<br>" . $conn->errorInfo()[2];
        }
    }
}

?>