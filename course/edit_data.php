<?php
if (isset($_POST["sub"])) {
    $course_id=$_POST["course_id"];
    // $course_name=$_POST["course_name"];
    $course_duration=$_POST["course_duration"];
    
    $conn=mysqli_connect("localhost","root","","mini");
    $str="update course set course_duration='$course_duration' where course_id='$course_id'";
    $res=mysqli_query($conn,$str);
    if($res==true){
        header("location:course_manage.php?msg=Data update successfully");
    }
}

?>