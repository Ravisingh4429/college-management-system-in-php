<?php
if (isset($_POST["sub"])) {
    $fee_id=$_POST["fee_id"];
    $totalfee=$_POST["totalfee"];
    $course=$_POST["course"];
    
    $conn=mysqli_connect("localhost","root","","mini");
    $str="insert into fee_student (fee_id,tottal_fee,course_id) values ('$fee_id','$totalfee','$course')";
    $res=mysqli_query($conn,$str);
    if($res==true){
        header("location:fee_reg.php?msg=Data insert successfully");
    }
}

?>