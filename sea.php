<a href="#">
              <?php
              if ($_SESSION["uname1"] != "") {
                echo $_SESSION["uname1"];
              } else {
                header("location:../manage account/login.php");
              }
              ?>
            </a>