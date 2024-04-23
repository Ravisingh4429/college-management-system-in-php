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
                            if ($_SESSION["uname1"] != "") {
                                echo $_SESSION["uname1"];
                            } else {
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
                    <li><a href="./teacher_reg.php"><i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>Teacher Registration</a>
                        <ul id="tec">
                            <li><a href="./teacher_reg.php">Register Teacher</a></li>
                            <li><a href="./teacher_manage.php">Manage Teacher</a></li>
                        </ul>
                    </li>
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
                $em = '2024' . rand(1, 1000000000);
                ?>
            </h5>
                <form action="./teacher_reg_data.php" onsubmit="return vali()" enctype="multipart/form-data" method="post" class="form-group">
                    <div class="row py-4">
                        <div class="col-md-4">
                            <label for="emp_id">
                                emp_id
                            </label>
                            <input type="text" value="<?php echo $em ?>" id="emp_id" class="form-control" name="emp_id">
                        </div>
                        <div class="col-md-4">
                            <label for="emp_name">
                                emp_name
                            </label>
                            <input type="text" id="emp_name" class="form-control" name="emp_name">
                            <p id="errfn" class="err"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="emp_phone">
                                emp_phone
                            </label>
                            <input type="text" id="emp_phone" maxlength="10" class="form-control" name="emp_phone">
                            <p id="errcon" class="err"></p>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-md-6">
                            <label for="emp_email">
                                emp_email
                            </label>
                            <input type="email" id="emp_email" class="form-control" name="emp_email">
                            <p id="erre" class="err"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="emp_address">
                                emp_address
                            </label>
                            <textarea name="emp_address" class="form-control" placeholder="Enter Full Address" id="emp_address" cols="30" rows="4"></textarea>
                            <!-- <input type="text" id="emp_address" maxlength="10" class="form-control" name="emp_address"> -->
                            <p id="erra" class="err"></p>
                        </div>
                    </div>
                    <div class="row py-4">
                       
                        <div class="col-md-6">
                            <label for="gender">
                                Gender
                            </label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <p id="errg" class="err"></p>
                        </div>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "mini");
                        $str = "select * from subject ";
                        $res = mysqli_query($conn, $str);
                        $opt = "";
                        while ($row = mysqli_fetch_array($res)) {
                            $opt = $opt . "<option value=$row[0]>$row[1]</option>";
                        }
                        ?>
                        <div class="col-md-6">
                            <label for="course">
                                Subject
                            </label>
                            <select name="subject" id="sub" class="form-control">
                                <option value="">select</option>
                                <?php echo $opt ?>

                            </select>
                            <p id="errsub" class="err"></p>
                        </div>
                    </div>
                    <div class="row py-3">
                       
                        <div class="col-md-6">
                            <label for="img">
                                Photo
                            </label>
                            <input type="file" name="image" id="timg" class="form-control">
                            <p id="errpho" class="err"></p>
                        </div>

                    </div>
                    <div class="row py-4">
                        <div class="col-md-1 ">
                            <input type="submit" name="sub" value="Submit" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var emp_name = document.getElementById("emp_name");
        var emp_phone = document.getElementById("emp_phone");
        var emp_email = document.getElementById("emp_email");
        var emp_address = document.getElementById("emp_address");
        // var emp_pass = document.getElementById("emp_pass");
        var gender = document.getElementById("gender");
        var sub = document.getElementById("sub");
        var timg = document.getElementById("timg");
        var no = 1;

        function vali() {
            if (emp_name.value == "") {
                document.getElementById("errfn").innerHTML = "enter full name";
                no = 0;
            } else if (emp_name.value.length < 2) {
                document.getElementById("errfn").innerHTML = "please enter valid name ";
                no = 0;
            } else {
                document.getElementById("errfn").innerHTML = "";
                no = 1;

            }
            if (emp_phone.value == "") {
                document.getElementById("errcon").innerHTML = "enter contact Number ";
                no = 0;
            } else if (emp_phone.value.length < 10) {
                document.getElementById("errcon").innerHTML = "please enter vaild number";
                no = 0;
            } else {
                document.getElementById("errcon").innerHTML = "";
                no = 1;
            }
            if (emp_email.value == "") {
                document.getElementById("erre").innerHTML = "enter email id";
                no = 0;
            } else {
                document.getElementById("erre").innerHTML = "";
                no = 1;
            }
            if (emp_address.value == "") {
                document.getElementById("erra").innerHTML = "enter full address";
                no = 0;
            } else {
                document.getElementById("erra").innerHTML = "";
                no = 1;
            }
            // if (emp_pass.value == "") {
            //     document.getElementById("errp").innerHTML = "make password";
            //     no = 0;
            // } else if (emp_pass.value.length < 8) {
            //     document.getElementById("errp").innerHTML = "please enter password more then 8 character";
            //     no = 0;
            // } else {
            //     document.getElementById("errp").innerHTML = "";
            //     no = 1;
            // }
            if (gender.value == "") {
                document.getElementById("errg").innerHTML = "please select gender";
                no = 0;
            } else {
                document.getElementById("errg").innerHTML = "";
                no = 1;
            }
            if (sub.value == "") {
                document.getElementById("errsub").innerHTML = "please select subject";
                no = 0;
            } else {
                document.getElementById("errsub").innerHTML = "";
                no = 1;
            }
            if (timg.value == "") {
                document.getElementById("errpho").innerHTML = "please select photo";
                no = 0;
            } else {
                document.getElementById("errpho").innerHTML = "";
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