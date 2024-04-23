<?php
$date = date_create(date('y-m-d'));
$date1 = date_format($date, "Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time= date("h:i:sa");
if (isset($_POST["sub"])){

    $mess = $_POST["mess"];
    $image = $_FILES["img"];
    $name = $_FILES["img"]["name"];
    $tmp = $_FILES["img"]["tmp_name"];
    $path = "C:/xampp/htdocs/php_and_mysql/student management/anoc_image/" . $name;
    move_uploaded_file($tmp, $path);
    $conn = mysqli_connect("localhost", "root", "", "mini");
    $str = "insert into announcement(date,time,message,image) values ('$date1','$time','$mess','$name')";
    $res = mysqli_query($conn, $str);
    if($res==true){
            header("location:anoc.php?msg=messages sent successfully");
        }

    }