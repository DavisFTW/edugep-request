<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('databaseController.php');

$db = new database();

var_dump("start");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
var_dump("get");

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
        $reset_link = "http://localhost/edugep-release/edugep-request/changepassword.php?token=$token";
        include 'SendPasswordreset.php';
        var_dump($reset_link);
        $db->closeConnection($db_conn);
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump("post");
    if(isset($_POST['pwdsubmit']))
    {
    var_dump("pwdsubmit");

        $db_conn = $db->makeConnection();
        
        $user_id = mysqli_real_escape_string($db_conn, $_POST['user_id']);
        $password = mysqli_real_escape_string($db_conn, $_POST['pwd1']);
        $confirm_password = mysqli_real_escape_string($db_conn, $_POST['pwd2']);
    

        if($password != $confirm_password){
            die("passwords do not match ! ");
        }
        if(strlen($password) < 8){
            die("password has to be longer then characters!");
        }
                // Update password in database
        $query = "UPDATE users SET pwd = ? WHERE id = ?";
        $stmt = mysqli_prepare($db_conn, $query);
        mysqli_stmt_bind_param($stmt, 'si', $hashed_password, $user_id);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) != 1) {
            die('Error updating password');
        }
        # everything was successful, we can now delete the token
        // Delete reset token from database
        $query = "DELETE FROM password_reset_tokens WHERE user_id = ?";
        $stmt = mysqli_prepare($db_conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) != 1) {
        die('Error deleting reset token');
        }

        // Redirect to login page
        header('Location: login.php');
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