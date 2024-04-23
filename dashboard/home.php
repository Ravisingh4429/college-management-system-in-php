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
    <link rel="stylesheet" href="./home.css" />
      
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
                    <li><a href="../personal fetch/pfetch.php">
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
        <div class="row justify-content-between">
                    <div class="col-md-3 cpas pt-2 m-3 pb-4">
                        <h2>Total Student</h2><br>
                        <?php
                        
                          $conn=mysqli_connect("localhost","root","","mini");
                          $str="select count(stu_id) from stu";
                          $res=mysqli_query($conn,$str);
                          $data="";
                          while ($row=mysqli_fetch_assoc($res)) {
                            $data= $row["count(stu_id)"];
                          }

                        ?>
                        <h2><?php echo $data?></h2>
                      
                    </div>
                    <div class="col-md-3 cpas pt-2 m-3 pb-4">
                        <h2>Total Teacher</h2><br>
                        <?php
                          $conn=mysqli_connect("localhost","root","","mini");
                          $str="select count(empid) from teacher_reg";
                          $res=mysqli_query($conn,$str);
                          $data="";
                          while ($row=mysqli_fetch_assoc($res)) {
                            $data= $row["count(empid)"];
                          }

                        ?>
                        <h2><?php echo $data?></h2>
                      
                    </div>
                    <div class="col-md-3 cpas pt-2 m-3 pb-4">
                        <h2>Unpaid Fee</h2><br>
                        <?php
                          $conn=mysqli_connect("localhost","root","","mini");
                          $str="select count(fee_status) from stu where fee_status='unpaid'";
                          $res=mysqli_query($conn,$str);
                          $data="";
                          while ($row=mysqli_fetch_assoc($res)) {
                            $data= $row["count(fee_status)"];
                          }

                        ?>
                        <h2><?php echo $data?></h2>
                      
                    </div>
                   
                </div>
        </div>
      </div>
    </div>
  </body>
</html>
