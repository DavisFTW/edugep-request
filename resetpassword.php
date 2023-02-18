<?php
include "databaseController.php";
$db = new database();

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    sendToken($email);


}
function generateToken($length = 32) {
    $token = openssl_random_pseudo_bytes($length);
    return bin2hex($token);
}

function verifyEmail($email){  # returs true if email is found ! 
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

function sendToken($email){
    

    if(!verifyEmail($email)){
        #redirect user to the email has been sent page
    }
    $_SESSION["token"] = generateToken();

    #send a token to the email, store it as a global variable 

    #user enters the code we do a verification 

    #if match we continue to password reset

    #reset the password 
}