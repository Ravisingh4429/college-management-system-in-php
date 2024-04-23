<?php
session_start();
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
                    <li><a href="./student_reg.php"><i class="fa-solid fa-user-graduate fa-xl" style="color: #000000;"></i>Student Registration</a>
                    </li>
                    <li><a href="../course/course_reg.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Courses</a></li>
                    <li><a href="../subject/subject_reg.php"><i class="fa-solid fa-book-open fa-xl" style="color: #000000;"></i>Subjects</a></li>
                    <li><a href="../time_table/time_table_reg.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000;"></i>Time Table</a></li>
                  
                    <li><a href="./salary_reg.php"><i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000;"></i>Teacher Salary</a>
                    <ul id="tec">
                    <li><a href="./salary_reg.php">Register salary</a></li>
                    <li><a href="./salary_calu.php">Salary Calulater</a></li>
              
                </ul>
                </li>
                    <li><a href="../fee student/fee_reg.php"><i class="fa-solid fa-credit-card fa-xl" style="color: #000000;"></i>Student Fee</a>  
                    </li>
                    <li><a href="../manage account/mainpage.php"><i class="fa-solid fa-key fa-xl" style="color: #000000;"></i>Manage Account</a></li>
                </ul>
            </div>
            <div class="col-md-10">
            <h5 class="text-success pt-3">
                <?php
                if (isset($_POST["sub"])) {
                     $empid=$_POST["empid"];
                     $month=$_POST["month"];
                    // echo $empid;
                    // echo $month;
                 
                }

                $conn = mysqli_connect("localhost", "root", "", "mini");
                $str = "select e.empid, e.empname ,e.emp_phone,e.emp_gender,s.course_name from  course as s, teacher_reg as e where e.course_id=s.course_id and  e.empid='$empid'";
                $str1="select e.empid,e.empname,sr.pdsalary, count(status) from salary_reg as sr, teacher_reg as e, teacher_att as att where att.status='p' and e.empid=att.empid and e.empid='$empid' and att.month='$month' and sr.course_id=e.course_id  ";
                $res1 = mysqli_query($conn, $str1);
                $row1 = mysqli_fetch_assoc($res1);
                // print_r($row1);
                $tlsalary=$row1["pdsalary"]*$row1["count(status)"];
                // echo $tlsalary;
                $res = mysqli_query($conn, $str);
                $row = mysqli_fetch_assoc($res);
                       
                $ren='2024'.rand(1,100);
                ?>
            </h5>
                <form action="./salary_fetch_data.php" method="post" class="form-group">
                    <div class="row py-4 justify-content-between">
                        <div class="col-md-4">
                            <label for="ref_no">
                                Ref No
                            </label>
                            <input type="text" value="<?php echo $ren ?>" class="form-control" name="ref">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="emp_name">
                                Emp Name
                            </label>
                            <input disabled type="text"  value="<?php echo $row["empname"]?>" class="form-control" >
                            <input  type="hidden"  value="<?php echo $row["empid"]?>" class="form-control" name="emp_name">
                        </div>
                        <div class="col-md-4">
                            <label for="Emp_phone">
                                Contact
                            </label>
                            <input disabled type="text"  value="<?php echo $row["emp_phone"]?>" class="form-control" name="Emp_phone">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-6">
                        <label for="course_name">
                                Course Name
                            </label>
                            <input disabled type="text"   value="<?php echo $row["course_name"]?>" class="form-control" name="course_name">
                        </div>
                        <div class="col-md-6">
                            <label for="sgender">
                                Gender
                            </label>
                            <input disabled type="text"  value="<?php echo $row["emp_gender"]?>" class="form-control" name="gender">

                        </div>
                    </div>

                    <div class="row py-3">
                       <div class="col-md-3">
                       <label for="tottal_salary">
                                Total Salary
                            </label>
                            <input  disabled type="text"  value="<?php echo "$tlsalary" ?>" class="form-control" >
                            <input   type="hidden"  value="<?php echo "$tlsalary" ?>" class="form-control" name="tottal_salary">
                       </div>
                       <div class="col-md-3">
                       <label for="Month">
                                Month
                            </label>
                            <input disabled type="text"   value="<?php echo "$month"?>" class="form-control" >
                            <input  type="hidden"   value="<?php echo "$month"?>" class="form-control" name="Month">
                       </div>              
                    </div>
                    <div class="row py-4">
                        <div class="col-md-1 ">
                            <input  type="submit" value="Submit" name="sub" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>