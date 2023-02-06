<?php
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $conn = makeConnection();

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($_POST['pwd'], $row['pwd'])) {
        header('Location: good.php');
    } else {
        header('Location: bad.php');
    }
} else {
    header('Location: verybad.php');
}

function makeConnection(){
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "edugep-data";

    $conn = new mysqli($serverName, $username, $password, $databaseName);

    if($conn->connect_error){
        die("Connection to DB failed !" . $conn->connect_error);
    }
    return $conn;
}
?>