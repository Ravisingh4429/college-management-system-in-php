<?php
if (isset($_POST["sub"])) {
    $salary_id=$_POST["salary_id"];
    $Salary=$_POST["Salary"];
    $course=$_POST["course"];
    
    $conn=mysqli_connect("localhost","root","","mini");
    $str="insert into salary_reg (salary_id,pdsalary,course_id) values ('$salary_id','$Salary','$course')";
    $res=mysqli_query($conn,$str);
    if($res==true){
        header("location:salary_reg.php?msg=Data insert successfully");
    }
}

?>