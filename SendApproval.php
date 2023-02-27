<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
    $mail->Subject = 'New Equipment Request';
    $mail->Body    = '<html>
    <head>
      <title>New Equipment Request Alert</title>
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
      <h1 class="header">You have a new equipment request!</h1>
      <img src="https://i.imgur.com/WsbTtwa.png" class="logo" alt="Logo">
      <p>There is a new equipment request waiting for your approval.
    </body>
  </html>
  ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


