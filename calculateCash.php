<?php

require "config.php";


    $login = $_COOKIE["login"];

    $query = "SELECT cash FROM users WHERE username = '". $login ."'";

    $statement = $conn->prepare($query);
    $statement->execute();
    $retrievedUser = $statement->fetchAll(PDO::FETCH_CLASS);
    $responseCash = json_encode($retrievedUser);

    if ($responseCash){
        $allCash = json_decode($responseCash);
        echo $retrievedUser[0]->cash;

        //var_dump($responseCash);
    	$cookie_name= "cash";
		$cookie_value= $retrievedUser[0]->cash;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header('location:blackjack.php');
    }
    else
    {
        echo"unsuccessful login";
    }
?>