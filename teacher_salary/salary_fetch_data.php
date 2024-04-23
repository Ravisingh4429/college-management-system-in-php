<?php
if (isset($_POST["sub"])) {
    $ref=$_POST["ref"];
    $emp_name=$_POST["emp_name"];
    $Month=$_POST["Month"];
    $tottal_salary=$_POST["tottal_salary"];
    
    // echo $emp_name;
    // echo $Month;
    // echo $tottal_salary;
    
    $conn=mysqli_connect("localhost","root","","mini");
    $str="insert into salary_cal (sal_cal_id,empid,month,gernate) values ('$ref','$emp_name','$Month','$tottal_salary')";
    $res=mysqli_query($conn,$str);
   
 

    if($res==true){
        header("location:salary_calu.php?msg=salary gernate successfully");
    }
}

?>