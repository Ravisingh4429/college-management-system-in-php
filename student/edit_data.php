<?php
if (isset($_POST["sub"])) {
    $roll_no = $_POST["stu_id"];
    $sname = $_POST["sname"];
    $stu_fathername = $_POST["stu_fathername"];
    $sphone = $_POST["sphone"];
    // $sgender = $_POST["sgender"];
    $saddress = $_POST["saddress"];
    $semail = $_POST["semail"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    if ($name = $_FILES["image"]["name"]!="") {
        # code...

        $image = $_FILES["image"];
        $tmp = $_FILES["image"]["tmp_name"];
        $name = $_FILES["image"]["name"];
        $path = "C:/xampp/htdocs/php_and_mysql/student management/student_image/" . $name;
        move_uploaded_file($tmp, $path);
        $conn = mysqli_connect("localhost", "root", "", "mini");
        $str = "update stu set sname= '$sname',stu_fathername='$stu_fathername',sphone='$sphone',saddress='$saddress',semail= '$semail', course_id='$course',year='$year',simg='$name' where stu_id ='$roll_no'";
        $res = mysqli_query($conn, $str);
        if ($res == true) {
            header("location:student_manage.php?msg=Data update successfully");
        }
    }
    else{
        $conn = mysqli_connect("localhost", "root", "", "mini");
        $str = "update stu set sname= '$sname',stu_fathername='$stu_fathername',sphone='$sphone',saddress='$saddress',semail= '$semail', course_id='$course',year='$year' where stu_id ='$roll_no'";
        $res = mysqli_query($conn, $str);
        if ($res == true) {
            header("location:student_manage.php?msg=Data update successfully");
        }
    }
}
