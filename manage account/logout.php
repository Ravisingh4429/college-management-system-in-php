<?php
session_start();
if ($_SESSION["uname1"] != "") {
    session_destroy();
    header("location:login.php");
}
