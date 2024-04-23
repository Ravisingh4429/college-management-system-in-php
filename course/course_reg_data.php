<?php
if (isset($_POST["sub"])) {
    $course_id = $_POST["course_id"];
    $course_name = $_POST["course_name"];
    $course_duration = $_POST["course_duration"];
    
    try {
        $conn = mysqli_connect("localhost", "root", "", "mini");
        $str = "insert into course (course_id,course_name,course_duration) values ('$course_id','$course_name','$course_duration')";
        $res = mysqli_query($conn, $str);
        
        if ($res = 1) {
            header("location:course_reg.php?msg=Data insert successfully");
        } 
    } catch (\Throwable $th) {
        header("location:course_reg.php?msgdu=duplicate data");
    }
}
