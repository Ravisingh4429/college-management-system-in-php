<?php
// email start
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// email end
$conn = mysqli_connect("localhost", "root", "", "mini");
if (isset($_REQUEST["edit"])) {
    $empid = $_REQUEST["edit"];
    $str1 = "select sc.sal_cal_id,e.emp_email, sc.empid,sc.month,sc.gernate,sc.status,e.empname from salary_cal as sc ,teacher_reg as e where sc.empid=e.empid and sc.status='unpaid' and e.empid='$empid'";
    $res = mysqli_query($conn, $str1);
    while ($a = mysqli_fetch_assoc($res)) {
        // print_r($a);
        $empname = $a["empname"];
        $mon = $a["month"];
        $gen = $a["gernate"];
        $email = $a["emp_email"];
    }
    
    
    
    $str="update salary_cal set status ='paid' where empid='$empid' ";
    $res1 = mysqli_query($conn, $str);

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
         $mail->setFrom('abccollegeinfo4@gmail.com', 'ABC college payment');
         $mail->addAddress($email);
         // $mail->addAttachment("./pdf/" . $sname . '.pdf');
         $mail->isHTML(true);
         $mail->Subject = 'Payment information from abc college';
         $mail->Body    = ' dear '.$empname.'  total salary '.$gen.' of ' .$mon. '  has been credited in your bank account ';
         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         $mail->send();

         header("location:give_salary.php?msg=email sent successfully");
     } catch (Exception $e) {
         header("location:give_salary.php?msg=$mail->ErrorInfo");
     }
    // email end
}

// if($res==true){
//     header("location:give_salary.php?msg=Salary given successfully");
// }
