<?php

function makeConnection(){
    $serverName = "localhost";
    $username = "username";
    $password = "password";
    $databaseName = "DBNAME";

    $conn = new mysqli($serverName, $username, $password, $databaseName);

    if($conn->connect_error){
        die("Connection to DB failed !" . $conn->connect_error);
    }
}
