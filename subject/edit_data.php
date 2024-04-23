<?php
if (isset($_POST["sub"])) {
    $subj_id=$_POST["subj_id"];
    // $sub_name=$_POST["sub_name"];
    $sub_credit=$_POST["sub_credit"];
    
    $conn=mysqli_connect("localhost","root","","mini");
    $str="update subject set sub_credit='$sub_credit' where subj_id='$subj_id' ";
    $res=mysqli_query($conn,$str);
    if($res==true){
        header("location:subject_manage.php?msg=Data update successfully");
    }
}

?>