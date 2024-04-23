<?php
// email start
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// email end
$random_number = random_int(1, 100000000);
$conn = mysqli_connect("localhost", "root", "", "mini");
if (isset($_POST["sub"])) {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $emp_phone = $_POST["emp_phone"];
    $emp_email = $_POST["emp_email"];
    $emp_address = $_POST["emp_address"];
    // $emp_pass = $_POST["emp_pass"];
    $gender = $_POST["gender"];
    $subject = $_POST["subject"];
    $image = $_FILES["image"];


    // pdf start
    require("C:/xampp/htdocs/php_and_mysql/fpdf186/fpdf.php");
    $pdf = new FPDF();
    $pdf->addpage();
    $pdf->setfont("arial", "", 16);
    $pdf->cell(0, 10, "teacher Form", 1, 1, "C");
    $pdf->ln(5);
    // $pdf->Line(10,30,200,30);
    $pdf->setlinewidth(0.8);


    // img start
    $tmp = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    $path = "C:/xampp/htdocs/php_and_mysql/student management/teacher_image/" . $name;
    move_uploaded_file($tmp, $path);
    $pdf->cell(30, 30, "Date:- ", 0, 0);
    $pdf->cell(30, 30, date("d/m/y"), 0, 0);
    $pdf->cell(40, 30, "Ref No:-", 0, 0);
    $pdf->cell(40, 30, $random_number, 0, 0);
    $img = $pdf->image($path, 150, 30, 50, 45);
    $pdf->cell(50, 50, $img, 1, 1);
    // img end



    $pdf->ln(5);
    $pdf->cell(45, 10, "emp id :-", 1, 0);
    $pdf->cell(0, 10, $emp_id, 1, 1);
    $pdf->cell(45, 10, "Name :-", 1, 0);
    $pdf->cell(0, 10, $emp_name, 1, 1);
    $pdf->cell(45, 10, "phone no :-", 1, 0);
    $pdf->cell(0, 10, $emp_phone, 1, 1);
    $pdf->cell(45, 10, "emp email :-", 1, 0);
    $pdf->cell(0, 10, $emp_email, 1, 1);
    $pdf->cell(45, 10, "emp add :-", 1, 0);
    $pdf->cell(0, 10, $emp_address, 1, 1);
    
    $pdf->cell(45, 10, "gender :-", 1, 0);
    $pdf->cell(0, 10, $gender, 1, 1);
    $pdf->cell(45, 10, "subject:-", 1, 0);
    $pdf->cell(0, 10, $subject, 1, 1);
    $pdf->ln(8);
    $pdf->write(5, " NOTE :- $emp_name Congratulations you are successfully registered with as");
    $pdf->ln(5);
    $pdf->cell(100, 10, "", 0, 0);
    $pdf->cell(70, 30, "Signature", 0, 1, "R");
    $file = $emp_name . ".pdf";
    $pdf->Output('F', 'pdf/' . $file);

    // pdf end
    $str1 = "select s.course_id from  subject as s ,course as c where s.course_id=c.course_id  and s.subj_id='$subject'";
    $res1 = mysqli_query($conn, $str1);
    $course_id = "";
    while ($row = mysqli_fetch_assoc($res1)) {
        $course_id = $row["course_id"];
        // print_r($row);
    }
    try {
        $str = "insert into teacher_reg (empid,empname,emp_phone,emp_email,emp_address,emp_gender,subj_id,course_id,timg) values ('$emp_id','$emp_name','$emp_phone','$emp_email','$emp_address','$gender','$subject','$course_id','$name')";
        $res = mysqli_query($conn, $str);

        if ($res == true) {
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
                $mail->setFrom('abccollegeinfo4@gmail.com', 'Mailer');
                $mail->addAddress($emp_email);
                $mail->addAttachment("./pdf/" . $emp_name . '.pdf');
                $mail->isHTML(true);
                $mail->Subject = 'registration information';
                $mail->Body    = 'you are successfully <b>registration with as !</b>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                header("location:teacher_reg.php?msg=email sent successfully");
            } catch (Exception $e) {
                header("location:teacher_reg.php?msg=$mail->ErrorInfo");
            }

            // email end
        }
    } catch (\Throwable $th) {
        header("location:teacher_reg.php?msgdu=duplicate data");
    }
}
