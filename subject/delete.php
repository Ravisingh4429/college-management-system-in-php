<?php
if (isset($_REQUEST["del"])) {
    $del=$_REQUEST["del"];
    
}
  $conn=mysqli_connect("localhost","root","","mini");
  $str="delete from subject where subj_id ='$del'";
  $res=mysqli_query($conn,$str);
if ($res==true) {
    header("location:subject_manage.php?msg=Data delete successfully");
}
?>