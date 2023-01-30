<?php

function makeConnection(){
    $serverName = "localhost";
    $username = "username";
    $password = "password";

    $conn = new mysqli($serverName, $username, $password);

    if($conn->connect_error){
        die("Connection to DB failed !" . $conn->connect_error);
    }
}
?>