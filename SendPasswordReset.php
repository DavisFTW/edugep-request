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
    $mail->Subject = 'Password reset for Edugep account.';
    $mail->Body    =
        '
        <html>
        <head>
        <title>Password reset</title>
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
                <p class="bodytext">Hey, did you want to reset your password?</p>
                <hr>
                <p class="bodytext">Someone (hopefully you) has asked us to reset the password for your Edugep account. Please click the link below to do so. If you did not request this password reset, you can go ahead and ignore this email!</p>
                <p>Link: </p>
            </body>
        </html>
    ';
    $mail->AltBody = "Someone (hopefully you) has asked us to reset the password for your Edugep account. If you didn't request this password reset, you can go ahead and ignore this email! Please click the link to reset: ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


