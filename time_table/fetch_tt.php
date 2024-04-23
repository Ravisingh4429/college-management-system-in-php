<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.css"/>
    <link rel="stylesheet" href="../dashboard/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row first">
            <div class="col-md-2 top2">
                <a href="../dashboard/home.php"><h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE</h5></a>
            </div>
            <div class="col-md-10 topbar">
                <ul>
                    <li>
                        <a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff"></i></a>
                    </li>
                    <li><a href="../student/student_reg.php">admission</a></li>
                   
                    <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>                    <li><a href="#">
                      <?php
                        if ($_SESSION["uname1"]!="") {
                          echo $_SESSION["uname1"];
                        }
                        else{
                          header("location:../manage account/login.php");
                        }
                      ?>
                    </a></li>
                </ul>
            </div>
        </div>
        <div class="row sidemain">
            <div class="col-md-2 side">
                <ul>
                    <li>
                        <a href="../dashboard/home.php">
                            <i class="fa-solid fa-house fa-xl" style="color: #000000"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="../teacher/teacher_reg.php"><i class="fa-solid fa-user fa-xl"
                                style="color: #000000"></i>Teacher Registration</a>
                                
                    </li>
                    <li>
                        <a href="../student/student_reg.php"><i class="fa-solid fa-user-graduate fa-xl" style="color: #000000"></i>Student
                            Registration</a>
                           
                    </li>
                    <li>
                        <a href="../course/course_reg.php"><i class="fa-solid fa-book fa-xl" style="color: #000000"></i>Courses</a>
                    </li>
                    <li>
                        <a href="../subject/subject_reg.php"><i class="fa-solid fa-book-open fa-xl" style="color: #000000"></i>Subjects</a>
                    </li>
                    <li>
                        <a href="./time_table_reg.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a>
                        <ul id="tec">
                    <li><a href="./time_table_reg.php">Register time table</a></li>
                    <li><a href="./show_time_table.php">Show time table</a></li>
                   
                </ul>
                    </li>
                    
                    <li>
                        <a href="../teacher_salary/salary_reg.php"><i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000"></i>Teacher
                            Salary</a>
                    </li>
                   
                    <li>
                        <a href="../fee student/fee_reg.php"><i class="fa-solid fa-credit-card fa-xl" style="color: #000000"></i>Student Fee</a>
                    </li>
                    <li>
                        <a href="../manage account/mainpage.php"><i class="fa-solid fa-key fa-xl" style="color: #000000"></i>Manage Account</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                
                <div  class="table-responsive py-1">
                <h5 class="text-success">
                        <?php
                        if (isset($_REQUEST["msg"])) {
                            echo $_REQUEST["msg"];
                        }
                        ?>
                    </h5>
                
                <table class="table table-bordered">
                    <thead>
                        <th>Subject Name</th>
                        <th>Time</th>
                        <th>Day</th>
                        <th>Course Name</th>
                        <th>Teacher Name</th>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_POST["sub"])) {
                        $course=$_POST["course"];
                        $day=$_POST["day"];
                        $year = $_POST["year"];

                        # code...
                    }

                            $conn = mysqli_connect("localhost", "root", "", "mini");
                           
                            $str1="select s.sub_name,s.year,tt.time,tt.day,c.course_name,e.empname from teacher_reg as e, course as c, subject as s,time_table as tt where s.subj_id=tt.subj_id and c.course_id=tt.course_id and tt.empid=e.empid and tt.day='$day' and tt.course_id='$course'and tt.year='$year'";
                            $res = mysqli_query($conn, $str1);
                            while ($row = mysqli_fetch_assoc($res)) {
                            //    print_r($row);

                            ?>
                        <tr>
                        <td><?php echo $row["sub_name"] ?></td>
                        <td><?php echo $row["time"] ?></td>
                        <td><?php echo $row["day"] ?></td>
                        <td><?php echo $row["course_name"] ?></td>
                        <td><?php echo $row["empname"] ?></td>
                        </tr>
                    </tbody>

                    <?php
                            }
                    ?>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>

</html>