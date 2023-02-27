<?php
include "databaseController.php";

$db = new database();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    
    if(verifyEmail($email)){
        header("Location: register.php?message=".urlencode("The email address is already in use."));
        exit;
    }
    if ($_POST['pwd'] == $_POST['pwd2']) {
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        registerUser($first_name, $last_name, $email, $pwd);
        header('Location: register.php');
    } else {
        header('Location: register.php');
    }
}

function verifyEmail($email){  # returs true if email is found ! cd
    global $db;

    $conn = $db->makeConnection();
    
    $query = "SELECT * FROM users WHERE email = '$email'";

    $res = $conn->query($query);

    if($res){
        if (mysqli_num_rows($res) > 0) {
            $db->closeConnection($conn);
            return true;
        } else {
            $db->closeConnection($conn);
            return false;
        }
    }
}
function registerUser($first_name, $last_name, $email, $password)
{
    global $db;
    
    $conn = $db->makeConnection();

    $sql = "INSERT INTO users (first_name, last_name, email, pwd, userrole) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    $defaultrole = 0;

    mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $password, $defaultrole);

    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_close($stmt);
    
    $db->closeConnection($conn);
}