
<?php
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';
$mail = new PHPMailer(true);
try {

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'amazingfacts820@gmail.com';
    $mail->Password   = 'apeopwwrlroubjmv';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->setFrom('amazingfacts820@gmail.com', 'Mailer');
    $mail->addAddress('amazingfacts820@gmail.com');
    $mail->addAttachment("C:/xampp/htdocs/php_and_mysql/email/avi singh.pdf");
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

