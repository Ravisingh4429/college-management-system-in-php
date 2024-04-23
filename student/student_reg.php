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
                <ul id="tec">
                    <li><a href="./student_reg.php">Register Student</a></li>
                    <li><a href="./student_manage.php">Manage Student</a></li>
                </ul>
            </li>
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
                if (isset($_REQUEST["msg"])) {
                  ?>
                  <script>
                  Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "<?php echo $_REQUEST["msg"]; ?>",
                                showConfirmButton: false,
                                timer: 1500
                            });
              </script>
              <?php
                }else if(isset($_REQUEST["msgdu"])){
                    ?>
                    <script>
                    Swal.fire({
                                  position: "center",
                                  icon: "warning",
                                  title: "<?php echo $_REQUEST["msgdu"]; ?>",
                                  showConfirmButton: false,
                                  timer: 1500
                              });
                </script>
                <?php
                }
                $enr = '2024' . rand(1, 1000000000);
                ?>
            </h5>
            <form action="./student_reg_data.php" onsubmit="return vali()" enctype="multipart/form-data" method="post" class="form-group">
                <div class="row py-4 justify-content-between">
                    <div class="col-md-3">
                        <label for="roll_no">
                        Enrollment No
                        </label>
                        <input type="text" value="<?php echo $enr ?>" id="roll_no" class="form-control" name="roll_no">
                        <p id="errr" class="err"></p>
                    </div>
                    <div class="col-md-4">
                        <label for="sname">
                           Full Name
                        </label>
                        <input type="text" id="sname"  class="form-control" name="sname">
                        <p id="errfn" class="err"></p>
                    </div>
                    <div class="col-md-4">
                        <label for="stu_fathername">
                            Father Name
                        </label>
                        <input type="text" id="stu_fathername" class="form-control" name="stu_fathername">
                        <p id="errfath" class="err"></p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-6">
                        <label for="sphone">
                            Contact No
                        </label>
                        <input type="text" id="sphone" maxlength="10" class="form-control" name="sphone">
                        <p id="errc" class="err"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="sgender">
                           Gender
                        </label>
                        <select name="sgender" id="sgender" class="form-control">
                            <option value="">select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <p id="errg" class="err"></p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-6">
                        <label for="saddress">
                            Address
                        </label>
                        <textarea name="saddress" class="form-control" placeholder="Enter Full Address" id="saddress" cols="30" rows="4"></textarea>
                        <!-- <input type="text" id="saddress" class="form-control" name="saddress"> -->
                        <p id="errad" class="err"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="semail">
                            Email
                        </label>
                        <input type="text" id="semail" class="form-control" name="semail">
                        <p id="errem" class="err"></p>
                    </div>
                </div>
                <div class="row py-3">
                <?php
                            $conn = mysqli_connect("localhost", "root", "", "mini");
                            $str = "select * from course ";
                            $res = mysqli_query($conn, $str);
                            $opt="";
                            while ($row = mysqli_fetch_array($res)) 

                            {
                                $opt=$opt."<option value=$row[0]>$row[1]</option>";
                            }
                            ?>
                    <div class="col-md-4">
                        <label for="course">
                            Course
                        </label>
                        <select name="course" id="scourse" class="form-control">
                            <option value="">select</option>
                            <?php echo $opt?>
                           
                        </select>
                        <p id="errcou" class="err"></p>
                    </div>
                    <div class="col-md-4">
                        <label for="year">
                            Year
                        </label>
                        <select name="year" id="year" class="form-control">
                            <option value="">select</option>
                            <option value="first">first</option>
                            <option value="second">second</option>
                            <option value="third">third</option>
                            <option value="fourth">fourth</option>
                           
                        </select>
                        <p id="erryer" class="err"></p>
                    </div>
                    <div class="col-md-4">
                        <label for="img">
                            Photo
                        </label>
                            <input type="file" name="image" id="img" class="form-control">
                            <p id="errim" class="err"></p>
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
        var roll_no = document.getElementById("roll_no");
        var sname = document.getElementById("sname");
        var stu_fathername = document.getElementById("stu_fathername");
        var sphone = document.getElementById("sphone");
        var sgender = document.getElementById("sgender");
        var saddress = document.getElementById("saddress");
        var semail = document.getElementById("semail");
        var scourse = document.getElementById("scourse");
        var year = document.getElementById("year");
        var img = document.getElementById("img");
        var no = 1;

        function vali() {
            if (roll_no.value == "") {
                document.getElementById("errr").innerHTML = "enter number";
                no = 0;
            } else if (roll_no.value.length < 0) {
                document.getElementById("errr").innerHTML = "please enter valid number ";
                no = 0;
            } else {
                document.getElementById("errr").innerHTML = "";
                no = 1;

            }
            if (sname.value == "") {
                document.getElementById("errfn").innerHTML = "enter full name ";
                no = 0;
            }  else {
                document.getElementById("errfn").innerHTML = "";
                no = 1;
            }
            if (stu_fathername.value == "") {
                document.getElementById("errfath").innerHTML = "enter full name";
                no = 0;
            } else {
                document.getElementById("errfath").innerHTML = "";
                no = 1;
            }
            if (sphone.value == "") {
                document.getElementById("errc").innerHTML = "enter contact number";
                no = 0;
            } else if (sphone.value.length < 10) {
                document.getElementById("errc").innerHTML = "please enter valid number ";
                no = 0;
            } 
            else {
                document.getElementById("errc").innerHTML = "";
                no = 1;
            }
            if (sgender.value == "") {
                document.getElementById("errg").innerHTML = "please select one";
                no = 0;
            }  else {
                document.getElementById("errg").innerHTML = "";
                no = 1;
            }
            if (saddress.value == "") {
                document.getElementById("errad").innerHTML = "please enter full address";
                no = 0;
            } else {
                document.getElementById("errad").innerHTML = "";
                no = 1;
            }
            if (semail.value == "") {
                document.getElementById("errem").innerHTML = "please enter email id";
                no = 0;
            } else {
                document.getElementById("errem").innerHTML = "";
                no = 1;
            }
            if (scourse.value == "") {
                document.getElementById("errcou").innerHTML = "please select course";
                no = 0;
            } else {
                document.getElementById("errcou").innerHTML = "";
                no = 1;
            }
            if (year.value == "") {
                document.getElementById("erryer").innerHTML = "please select year";
                no = 0;
            } else {
                document.getElementById("erryer").innerHTML = "";
                no = 1;
            }
            if (img.value == "") {
                document.getElementById("errim").innerHTML = "please select photo";
                no = 0;
            } else {
                document.getElementById("errim").innerHTML = "";
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
