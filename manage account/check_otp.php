<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'mini');
$otp = $_POST['otp'];
$email = $_SESSION['EMAIL'];
$res = mysqli_query($con, "select * from admin where email='$email' and otp='$otp'");
$count = mysqli_num_rows($res);
if ($count > 0) {
	mysqli_query($con, "update admin set otp='' where email='$email'");
	$_SESSION['uname1'] = $email;
	$id= session_create_id();
	 $_SESSION['id']=$id;
	 
	echo "yes";
} else {
	echo "not_exist";
}
