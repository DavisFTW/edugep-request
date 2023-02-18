<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    sendToken($email);


}
function generateToken($length = 32) {
    $token = openssl_random_pseudo_bytes($length);
    return bin2hex($token);
}

function sendToken($email){
    

    #check if email exists in database, if it doesnt stop here

    #send a token to the email, store it as a global variable 

    #user enters the code we do a verification 

    #if match we continue to password reset

    #reset the password 
}