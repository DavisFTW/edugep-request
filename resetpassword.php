<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include "databaseController.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$db = new database();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['submitemail'])) {
        $email = $_GET["email"];
        sendToken($email);
    }
    if (isset($_GET['submitcode'])) {
        $digit1 = $_GET["digit1"];
        $digit2 = $_GET["digit2"];
        $digit3 = $_GET["digit3"];
        $digit4 = $_GET["digit4"];
        $digit5 = $_GET["digit"];
        $digit6 = $_GET["digit1"];

    }
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

    $curr = $_SESSION["token"];

    $mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'kenheine1337@gmail.com';
    $mail->Password   = 'nztlaaimbdtklibw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('admin@gmail.com');
    $mail->addAddress('laimonis.greks@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Reset password';
    $mail->Body    = '<html>
    <head>
      <title>Reset password Alert</title>
      <style>
        .header {
          font-size: 36px;
          font-weight: bold;
          text-align: center;
        }
        .logo {
          display: block;
          margin: 0 auto;
          width: 200px;
        }
      </style>
    </head>
    <body>
      <h1 class="header">You have a new password reset request! Verification code = '.$curr.'</h1>
      <img src="https://i.imgur.com/WsbTtwa.png" class="logo" alt="Logo">
    </body>
  </html>
  ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}