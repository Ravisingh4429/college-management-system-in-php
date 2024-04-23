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
                   
                    <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>
                    <li><a href="#">
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
                   
                    <li><a href="../teacher_salary/salary_reg.php"><i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000;"></i>Teacher Salary</a></li>
                    <li><a href="./fee_reg.php"><i class="fa-solid fa-credit-card fa-xl" style="color: #000000;"></i>Student Fee</a>
                        <ul id="tec">
                            <li><a href="./fee_reg.php">Register fee</a></li>
                            <li><a href="./fee_manage.php">Manage fee</a></li>
                        </ul>
                    </li>
                    <li><a href="../manage account/mainpage.php"><i class="fa-solid fa-key fa-xl" style="color: #000000;"></i>Manage Account</a></li>
                </ul>
            </div>
            <div class="col-md-10">
            <h5 class="text-success pt-3">
                <?php
                if (isset($_REQUEST["edit"])) {
                    $ed=$_REQUEST["edit"];
                }
                $conn = mysqli_connect("localhost", "root", "", "mini");
                $str = "select s.year,s.stu_id,s.semail,s.simg,s.sname,s.stu_fathername,s.sphone,s.sgender,fs.tottal_fee,c.
                course_name,fs.course_id from stu as s , fee_student as fs , course as c where s.course_id = fs.course_id and fs.course_id = c.course_id and s.stu_id='$ed' ";
                $res = mysqli_query($conn, $str);
                $row = mysqli_fetch_assoc($res);
                        //  print_r($row);
                $ren='2024'.rand(1,100);
                        // echo $ren;
                ?>
            </h5>
                <form action="./make_payment_data.php" method="post" class="form-group">
                <input  type="hidden" value="<?php echo $row["course_id"]?>"   class="form-control" name="course_id">
                <input type="hidden"  value="<?php echo $row["stu_id"]?>" class="form-control" name="stu_id">
                <input type="hidden"  value="<?php echo $row["semail"]?>" class="form-control" name="semail">
                <input type="hidden"  value="<?php echo $row["year"]?>" class="form-control" name="year">
                    <div class="row py-4 justify-content-between">
                        <div class="col-md-4">
                            <label for="ref_no">
                                Ref No
                            </label>
                            <input type="text" value="<?php echo $ren ?>" class="form-control" name="ref">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="sname">
                                Full Name
                            </label>
                            <input  type="hidden"  value="<?php echo $row["sname"]?>" class="form-control" name="sname">
                            <input disabled type="text"  value="<?php echo $row["sname"]?>" class="form-control" name="sname">
                        </div>
                        <div class="col-md-4">
                            <label for="stu_fathername">
                                Father Name
                            </label>
                            <input disabled type="text"  value="<?php echo $row["stu_fathername"]?>" class="form-control" name="stu_fathername">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="sphone">
                                Contact No
                            </label>
                            <input disabled type="text"   value="<?php echo $row["sphone"]?>" class="form-control" name="sphone">
                        </div>
                        <div class="col-md-6">
                            <label for="sgender">
                                Gender
                            </label>
                            <input disabled type="text"  value="<?php echo $row["sgender"]?>" class="form-control" name="gender">

                        </div>
                    </div>

                    <div class="row py-3">
                       <div class="col-md-3">
                       <label for="tottal_fee">
                                Total Fee
                            </label>
                            <input  disabled type="text"  value="<?php echo $row["tottal_fee"]?>" class="form-control" name="tottal_fee">
                       </div>
                       <div class="col-md-3">
                       <label for="course_name">
                                Course Name
                            </label>
                            <input disabled type="text"   value="<?php echo $row["course_name"]?>" class="form-control" name="course_name">
                       </div>
                       <div class="col-md-3">
                       <label for="fee_status">
                                Fee Status
                            </label>
                            <select name="fee_status" class="form-control" id="">
                                <option value="Paid">Paid</option>
                                <option value="UnPaid">UnPaid</option>
                            </select>
                       </div>
                       <div class="col-md-3">
                       <label for="photo">
                                Photo
                            </label>
                            
                            <img src="../student_image/<?php echo $row["simg"] ?>" width="50%" alt="image" class="form-control" >
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