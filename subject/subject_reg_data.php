<?php
if (isset($_POST["sub"])) {
    $subj_id = $_POST["subjid"];
    $sub_name = $_POST["sub_name"];
    $sub_credit = $_POST["sub_credit"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    try {
        $conn = mysqli_connect("localhost", "root", "", "mini");
        $str = "insert into subject (subj_id,sub_name,sub_credit,course_id,year) values ('$subj_id','$sub_name','$sub_credit','$course','$year')";
        $res = mysqli_query($conn, $str);
        if ($res == true) {
            header("location:subject_reg.php?msg=Data insert successfully");
        }
    } catch (\Throwable $th) {
        echo $th;
        header("location:subject_reg.php?msgdu=duplicate data");
    }
}
