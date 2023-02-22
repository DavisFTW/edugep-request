<?php
include "databaseController.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$db = new database();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['submitemail'])) {
        $email = $_GET["email"];
        sendToken($email);
    }
    if (isset($_GET['submitcode'])) {
        $digits = array     (
            $_GET["digit1"],
            $_GET["digit2"],
            $_GET["digit3"],
            $_GET["digit4"],
            $_GET["digit5"],
            $_GET["digit6"]
        );    
        $concatenated = implode('', $digits);
        $test = 111111;
        var_dump($concatenated);
        if($concatenated == $test){ # $_SESSION["token"]
            $page = 'changePassword.php';

            var_dump($concatenated);
            $arg = $_SESSION["resetpwEmail"];

            $query_string = http_build_query(array('arg1' => $arg));

            $page .= '?' . $query_string;
            
            header('Location: ' . $page);
            exit;
        }
    }

    if (isset($_GET["pwdsubmit"])) {
        $email = $_GET["arg1"];
        $pwd = 0;
        $conn = $db->makeConnection();

        $stmt = $conn->prepare("UPDATE users SET pwd=? WHERE email=$email");
        $stmt->bind_param("s", $pwd);

        $db->closeConnection($conn);
    }
}
function generateToken($lengthmin = 100000, $lenghtmax = 999999) {
    $token = mt_rand($lengthmin, $lenghtmax);
    return $token;
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
    $_SESSION["resetpwEmail"] = $email;

    var_dump($_SESSION["token"]);

    $curr = $_SESSION["token"];

    # SEND CURR TO PROVIDED EMAIL
}