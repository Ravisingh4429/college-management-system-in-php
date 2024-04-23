<?php
session_start();
$con= mysqli_connect("localhost", "root", "", "mini");

$email = $_SESSION["uname1"];
$re = mysqli_query($con, "select * from admin where email='$email'");
$ro = mysqli_fetch_assoc($re);
$sid = $ro["admin_id"];
//  $c_id = $ro["course_id"];
 $name=$ro["fullname"];
//  $year=$ro["year"];
