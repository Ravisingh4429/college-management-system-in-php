<?php
if (isset($_REQUEST["del"])) {
    $del=$_REQUEST["del"];
    
}
  $conn=mysqli_connect("localhost","root","","mini");
  $str="delete from teacher_reg where empid ='$del'";
  $res=mysqli_query($conn,$str);
if ($res==true) {
    header("location:teacher_manage.php?msg=Data delete successfully");
}
?>