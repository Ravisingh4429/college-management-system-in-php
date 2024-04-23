<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$con = mysqli_connect('localhost', 'root', '', 'mini');
$email = $_POST['email'];
$res = mysqli_query($con, "select * from admin where email='$email'");
$count = mysqli_num_rows($res);
if ($count > 0) {
    // $_SESSION["uname"] = $email;
	$otp = rand(11111, 99999);
	mysqli_query($con, "update admin set otp='$otp' where email='$email'");
	$html = "Your otp verification code is " . $otp;
	$_SESSION['EMAIL'] = $email;
	require './email_att/src/Exception.php';
	require './email_att/src/PHPMailer.php';
	require './email_att/src/SMTP.php';
	$mail = new PHPMailer(true);
	$mail->SMTPDebug = SMTP::DEBUG_OFF;
	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->Username = "abccollegeinfo4@gmail.com";
	$mail->Password = "jygyztlbyrveijit";
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port       = 465;
	$mail->setFrom('abccollegeinfo4@gmail.com', 'abc college');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = 'OTP Verification';
	$mail->Body    = $html;
	$mail->send();
	echo "true";
} else {
	echo "not_exist";
}






