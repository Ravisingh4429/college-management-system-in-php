<?php
if (isset($_REQUEST["del"])) {
    $del=$_REQUEST["del"];
    
}
  $conn=mysqli_connect("localhost","root","","mini");
  $str="delete from course where course_id ='$del'";
  $res=mysqli_query($conn,$str);
if ($res==true) {
    header("location:course_manage.php?msg=Data delete successfully");
}
?>