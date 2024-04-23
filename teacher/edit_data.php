<?php
$conn = mysqli_connect("localhost", "root", "", "mini");
if (isset($_POST["sub"])) {
    $empid = $_POST["empid"];
    $emp_name = $_POST["emp_name"];
    $emp_phone = $_POST["emp_phone"];
    $emp_email = $_POST["emp_email"];
    $emp_address = $_POST["emp_address"];
    // $emp_pass = $_POST["emp_pass"];
    $subject = $_POST["subject"];
    $str1 = "select s.course_id from  subject as s ,course as c where s.course_id=c.course_id  and s.subj_id='$subject'";
        $res1 = mysqli_query($conn, $str1);
        $course_id = "";
        while ($row = mysqli_fetch_assoc($res1)) {
            $course_id = $row["course_id"];
            // print_r($row);
        }
    if ($_FILES["image"]["name"]!="") {
        # code...

        $image = $_FILES["image"];
        $tmp = $_FILES["image"]["tmp_name"];
        $name = $_FILES["image"]["name"];
        $path = "C:/xampp/htdocs/php_and_mysql/student management/teacher_image/" . $name;
        move_uploaded_file($tmp, $path);

        


        $str = "update teacher_reg set empname = '$emp_name',emp_phone ='$emp_phone',emp_email='$emp_email',emp_address='$emp_address',subj_id ='$subject',course_id='$course_id',timg='$name' where empid='$empid'";
        $res = mysqli_query($conn, $str);
        if ($res == true) {
            header("location:teacher_manage.php?msg=Data update successfully");
        }
    }
    else{
        $str = "update teacher_reg set empname = '$emp_name',emp_phone ='$emp_phone',emp_email='$emp_email',emp_address='$emp_address',subj_id ='$subject',course_id='$course_id' where empid='$empid'";
        $res = mysqli_query($conn, $str);
        if ($res == true) {
            header("location:teacher_manage.php?msg=Data update successfully");
        }
    }
}
