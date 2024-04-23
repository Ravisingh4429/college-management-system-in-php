<?php
// session_start();
include("../com.php");
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
    <style>
        .cpas{
            background-color: #ff4d4d;
            border: none;
            color: white;
            border-radius: 15px 5px  15px 5px;
            
            
        }
        
        
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row first">
            <div class="col-md-2 top2">
                <a href="./home.php"><h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE</h5></a>
                
            </div>
            <div class="col-md-10 topbar">
           
                <ul>
                    <li><a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a></li>
                    <li><a href="../student/student_reg.php">admission</a></li>
                    <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>
                    <li><a href="./pfetch.php">
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
            <li><a href="./home.php"> <i class="fa-solid fa-house fa-xl" style="color: #000000;"></i>Dashboard</a></li>
            <li><a href="../teacher/teacher_reg.php"><i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>Teacher Registration</a></li>
            <li><a href="../student/student_reg.php"><i class="fa-solid fa-user-graduate fa-xl" style="color: #000000;"></i>Student Registration</a></li>
            <li><a href="../course/course_reg.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Courses</a></li>
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
                
                $conn = mysqli_connect("localhost", "root", "", "mini");
                $str = "select * from admin";
                $res = mysqli_query($conn, $str);
                $row = mysqli_fetch_assoc($res);
                        //  print_r($row);
                
                        
                ?>
            </h5>
                <form  method="post" class="form-group">
                <!-- <input  type="hidden" value="<?php echo $row["course_id"]?>"   class="form-control" name="course_id">
                <input type="hidden"  value="<?php echo $row["stu_id"]?>" class="form-control" name="stu_id"> -->
                    <div class="row py-4 justify-content-between">
                        <div class="col-md-4">
                            <label for="ref_no">
                                admin id
                            </label>
                            <input disabled type="text" value="<?php echo $row["admin_id"] ?>" class="form-control" name="ref">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="sname">
                                Full Name
                            </label>
                            <input disabled type="text"  value="<?php echo $row["fullname"]?>" class="form-control" name="sname">
                        </div>
                        <div class="col-md-4">
                            <label for="stu_fathername">
                                phone
                            </label>
                            <input disabled type="text"  value="<?php echo $row["phone"]?>" class="form-control" name="stu_fathername">
                        </div>
                    </div>
                    <div class="row py-3">
                    <div class="col-md-4">
                            <label for="saddress">
                                Address
                            </label>
                            <!-- <input  type="text"  value="<?php echo $row["address"]?>"  name="gender"> -->
                            <textarea disabled name="" id=""  cols="30" class="form-control" rows="4"><?php echo $row["address"]?></textarea>

                        </div>
                        <div class="col-md-3">
                        <label for="email">
                                 Email
                             </label>
                             <input disabled type="text"   value="<?php echo $row["email"]?>" class="form-control" >
                        </div>
                       
                    </div>

                    
                       
                      
                    <div class="row py-4">
                        <div class="col-md-1 ">
                            <a href="../dashboard/home.php" class="form-control btn btn-primary" >Okay</a>
                            <!-- <input  type="submit" value="Submit" name="sub" class="form-control btn btn-success"> -->
                        </div>
                    </div>
                </form>
            </div>
      </div>
    </div>
  </body>
</html>
