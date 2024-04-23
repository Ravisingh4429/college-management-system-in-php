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
  <style>
    .cpas {
      background-color: #ff4d4d;
      border: none;
      color: white;
      border-radius: 15px 5px 15px 5px;


    }
  </style>
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
          <li><a href="./anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>
          <li><?php include("../sea.php");?></li>
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
          <li><a href="../subject/subject_reg.php"><i class="fa-solid fa-book-open fa-xl" style="color: #000000;"></i>Subjects</a></li>
          <li><a href="../time_table/time_table_reg.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000;"></i>Time Table</a></li>
          <li><a href="../teacher_salary/salary_reg.php"><i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000;"></i>Teacher Salary</a></li>
          <li><a href="../fee student/fee_reg.php"><i class="fa-solid fa-credit-card fa-xl" style="color: #000000;"></i>Student Fee</a></li>
          <li><a href="../manage account/mainpage.php"><i class="fa-solid fa-key fa-xl" style="color: #000000;"></i>Manage Account</a></li>
        </ul>
      </div>
      <div class="col-md-10">

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
        }


        ?>

        <form action="./anoc_data.php" enctype="multipart/form-data" method="post" class="form-group">
          <div class="row py-4 ">
            <label for="mess">
              Messages
            </label>
            <div class="col-md-6">
              <textarea name="mess" id="mess" class="form-control" cols="50" rows="5"></textarea>
            </div>
          </div>
          <div class="row py-3">

            <div class="col-md-6">
              <label for="img">
                Image
              </label>
              <input type="file" name="img" id="img" class="form-control">
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
</body>

</html>