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

          <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>
          <li><a href="#">
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
          <li><a href="../teacher/teacher_reg.php"><i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>Teacher Registration</a></li>
          <li><a href="../student/student_reg.php"><i class="fa-solid fa-user-graduate fa-xl" style="color: #000000;"></i>Student Registration</a></li>
          <li><a href="../course/course_reg.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Courses</a></li>
          <li><a href="../subject/subject_reg.php"><i class="fa-solid fa-book-open fa-xl" style="color: #000000;"></i>Subjects</a>
          </li>
          <li><a href="./time_table_reg.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000;"></i>Time Table</a>
            <ul id="tec">
              <li><a href="./time_table_reg.php">Register time table</a></li>
              <li><a href="./show_time_table.php">Show time table</a></li>

            </ul>
          </li>

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
              swal({
                title: "<?php echo $_REQUEST["msg"]; ?>",

                icon: "success",
                button: "ok",
              });
            </script>
          <?php
          }
          ?>
        </h5>
        <form action="./fetch_tt.php" onsubmit="return vali()" method="post" class="form-group">


          <div class="row py-3">
            <div class="col-md-4">
              <label for="day">
                Day
              </label>
              <select name="day" id="day" class="form-control">
                <option value="">select</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
              </select>
              <p id="errday" class="err"></p>
            </div>
            <div class="col-md-4">
              <label for="year">
                Select Year
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
            <?php
            $conn = mysqli_connect("localhost", "root", "", "mini");
            $str = "select * from course ";
            $res = mysqli_query($conn, $str);
            $opt = "";
            while ($row = mysqli_fetch_array($res)) {
              $opt = $opt . "<option value=$row[0]>$row[1]</option>";
            }
            ?>
            <div class="col-md-4">
              <label for="course">
                Course
              </label>
              <select name="course" id="cour" class="form-control">
                <option value="">select</option>
                <?php echo $opt ?>

              </select>
              <p id="errsub" class="err"></p>
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
    var day = document.getElementById("day");
    var cour = document.getElementById("cour");
    var no = 1;
    var year = document.getElementById("year");

    function vali() {
      if (year.value == "") {
        document.getElementById("erryer").innerHTML = "please select year";
        no = 0;
      } else {
        document.getElementById("erryer").innerHTML = "";
        no = 1;
      }
      if (day.value == "") {
        document.getElementById("errday").innerHTML = "select one";
        no = 0;
      } else {
        document.getElementById("errday").innerHTML = "";
        no = 1;
      }
      if (cour.value == "") {
        document.getElementById("errsub").innerHTML = "select one";
        no = 0;
      } else {
        document.getElementById("errsub").innerHTML = "";
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