<?php
// email start
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// email end
if (isset($_POST["sub"])) {
    $ref = $_POST["ref"];
    $stu_id = $_POST["stu_id"];
    $semail = $_POST["semail"];
    $course_id = $_POST["course_id"];
    $fee_status = $_POST["fee_status"];
    $sname=$_POST["sname"];
    $year=$_POST["year"];
    // echo $emp_id;
    // echo $stu_id."<br>";
    // echo $course_id;
    $conn = mysqli_connect("localhost", "root", "", "mini");
    $str = "insert into makepayment (ref_id,stu_id,course_id) values ('$ref','$stu_id','$course_id')";
    $res = mysqli_query($conn, $str);
    $str1 = "update stu set fee_status ='$fee_status' where stu_id = '$stu_id'";
    $res1 = mysqli_query($conn, $str1);

    // email start
    require '../email_att/src/Exception.php';
    require '../email_att/src/PHPMailer.php';
    require '../email_att/src/SMTP.php';
    $mail = new PHPMailer(true);
    try {

        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abccollegeinfo4@gmail.com';
        $mail->Password   = 'jygyztlbyrveijit';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('abccollegeinfo4@gmail.com', 'ABC college fee');
        $mail->addAddress($semail);
        // $mail->addAttachment("./pdf/" . $sname . '.pdf');
        $mail->isHTML(true);
        $mail->Subject = 'Fee information from abc college';
        $mail->Body    = ' dear '.$sname.'  your fee of ' .$year. ' year has been recived in cash with '.$ref.' reference number ';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        header("location:fee_manage.php?msg=email sent successfully");
    } catch (Exception $e) {
        header("location:make_payment.php?msg=$mail->ErrorInfo");
    }
// email end

    if ($res == true && $res1 == true) {
        header("location:fee_manage.php?msg=payment successfully");
    }
}
