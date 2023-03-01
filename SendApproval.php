<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'resetpassword.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$email = $_POST['email'];

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
    // $mail->addAddress($email);      You should use this instead of line 28

    $mail->isHTML(true);
    $mail->Subject = 'New Equipment Request';
    $mail->Body    = '<html>
    <head>
      <title>New Equipment Request Alert</title>
      <style>
        body {
          width: 100px;
          height: 100px;
          text-align: center;
        }
        .logo {
          display: block;
          margin: 0 auto;
          width: 200px;
        }
        .bodytext {
          text-align: center;
          padding: 10px;
        }
      </style>
    </head>
    <body>
      <img src="https://i.imgur.com/WsbTtwa.png" class="logo" alt="Logo">
      <h2 class="bodytext">New equipment request!</h2>
      <p class="bodytext">There is a new equipment request waiting for your approval.
    </body>
  </html>
  ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


