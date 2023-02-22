<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('databaseController.php');

$db = new database();

var_dump("start");
IF($_SERVER['REQUEST_METHOD'] == 'GET'){
var_dump("post");

    if(isset($_GET['submitemail'])){
        var_dump("submitemail");

        $db_conn = $db->makeConnection();
        $token = bin2hex(random_bytes(16));

        $email = mysqli_real_escape_string($db_conn, $_GET["email"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die('Invalid email address');
          }
         
        $expire_time = time() + 3600; // One hour from now

        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $query = "INSERT INTO password_reset_tokens (user_id, token, expire_time) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($db_conn, $query);
        mysqli_stmt_bind_param($stmt, 'iss', $userID, $token, $expires);
        $userID = getUserID($email);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) != 1) {
            die('Error generating reset token');
        }
        $reset_link = "https://example.com/reset_password.php?token=$token";
        var_dump($reset_link);
        $db->closeConnection($db_conn);
    }
}

function getUserID($email){
    global $db;

    $conn = $db->makeConnection();
    
    $query = "SELECT id FROM users WHERE email = '$email'";

    $res = $conn->query($query);

    if($res){
        if (mysqli_num_rows($res) > 0) {
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $db->closeConnection($conn);
            return $id;
        } else {
            $db->closeConnection($conn);
            die();  #TESTME: what happens here ?
        }
    }
}