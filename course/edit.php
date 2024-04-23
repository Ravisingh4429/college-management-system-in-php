<?php
session_start();
include("../sweat_alert/sw.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.css" />
    <link rel="stylesheet" href="../dashboard/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row first">
            <div class="col-md-2 top2">
                <a href="../dashboard/home.php">
                    <h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE</h5>
                </a>
            </div>
            <div class="col-md-10 topbar">
                <ul>
                    <li><a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a></li>
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
                    <li><a href="../dashboard/home.php"> <i class="fa-solid fa-house fa-xl" style="color: #000000;"></i>Dashboard</a></li>
                    <li><a href="../teacher/teacher_reg.php"><i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>Teacher Registration</a></li>
                    <li><a href="../student/student_reg.php"><i class="fa-solid fa-user-graduate fa-xl" style="color: #000000;"></i>Student Registration</a></li>
                    <li><a href="./course_reg.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Courses</a>
                        <ul id="tec">
                            <li><a href="./course_reg.php">Register Course</a></li>
                            <li><a href="./course_manage.php">Manage Course</a></li>
                        </ul>
                    </li>
                    <li><a href="../subject/subject_reg.php"><i class="fa-solid fa-book-open fa-xl" style="color: #000000;"></i>Subjects</a></li>
                    <li><a href="../time_table/time_table_reg.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000;"></i>Time Table</a></li>
                   
                    <li><a href="../teacher_salary/salary_reg.php"><i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000;"></i>Teacher Salary</a></li>
                    <li><a href="../fee student/fee_reg.php"><i class="fa-solid fa-credit-card fa-xl" style="color: #000000;"></i>Student Fee</a></li>
                    <li><a href="../manage account/mainpage.php"><i class="fa-solid fa-key fa-xl" style="color: #000000;"></i>Manage Account</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <h5 class="text-success pt-3">
                    <?php
                    if (isset($_REQUEST["edit"])) {
                        $ed = $_REQUEST["edit"];
                    }
                    $conn = mysqli_connect("localhost", "root", "", "mini");
                    $str = "select * from course where course_id = '$ed' ";
                    $res = mysqli_query($conn, $str);
                    $row = mysqli_fetch_assoc($res)
                    ?>
                </h5>
                <form action="./edit_data.php" onsubmit="return vali()" method="post" class="form-group">
                    <input type="hidden" id="course_id" value="<?php echo $row["course_id"] ?>" class="form-control" name="course_id">
                    
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="course_duration">
                                Course Duration
                            </label>
                            <input type="text" id="course_duration" value="<?php echo $row["course_duration"] ?>" class="form-control" name="course_duration">
                            <p id="errcd" class="err"></p>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-md-1 ">
                            <input type="submit" value="Submit" name="sub" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        
        // var course_name = document.getElementById("course_name");
        var course_duration = document.getElementById("course_duration");
       
        var no = 1;

        function vali() {
          
           
            if (course_duration.value == "") {
                document.getElementById("errcd").innerHTML = "enter number";
                no = 0;
            } else if (course_duration.value.length < 0) {
                document.getElementById("errcd").innerHTML = "please enter valid number ";
                no = 0;
            } else {
                document.getElementById("errcd").innerHTML = "";
                no = 1;

            }
           
            if (no) {

                return true;
            } else {
                return false;

            }
        }
    </script>
</body>

</html>