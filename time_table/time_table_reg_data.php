<?php
if (isset($_POST["sub"])) {
    $conn = mysqli_connect("localhost", "root", "", "mini");
    $subj_id = $_POST["subject"];
    $time = $_POST["time"];
    $day = $_POST["day"];
    $empid = "";

    $str1 = "select s.course_id,e.empid,s.year from teacher_reg as e, subject as s ,course as c where s.course_id=c.course_id and c.course_id=e.course_id and e.subj_id='$subj_id'";
    $res1 = mysqli_query($conn, $str1);
    $course_id = "";
    while ($row = mysqli_fetch_assoc($res1)) {
        $course_id = $row["course_id"];
        $empid = $row["empid"];
        $year = $row['year'];
        // print_r($row);
    }

    $str = "insert into time_table (subj_id,time,day,course_id,empid,year) values ('$subj_id','$time','$day','$course_id','$empid','$year')";
    $res = mysqli_query($conn, $str);
    if ($res == true) {
        header("location:time_table_reg.php?msg=Data insert successfully");
    }
}
