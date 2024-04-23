<?php
// email start
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// email end
$random_number = random_int(1, 100000000);
if (isset($_POST["sub"])) {
    $roll_no = $_POST["roll_no"];
    $sname = $_POST["sname"];
    $stu_fathername = $_POST["stu_fathername"];
    $sphone = $_POST["sphone"];
    $sgender = $_POST["sgender"];
    $saddress = $_POST["saddress"];
    $semail = $_POST["semail"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $image = $_FILES["image"];


    // pdf start
    require("C:/xampp/htdocs/php_and_mysql/fpdf186/fpdf.php");
    $pdf = new FPDF();
    $pdf->addpage();
    $pdf->setfont("arial", "", 16);
    $pdf->cell(0, 10, "student Form", 1, 1, "C");
    $pdf->ln(5);
    // $pdf->Line(10,30,200,30);
    $pdf->setlinewidth(0.5);


    // img start
    $tmp = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    $path = "C:/xampp/htdocs/php_and_mysql/student management/student_image/" . $name;
    move_uploaded_file($tmp, $path);
    $pdf->cell(30, 30, "Date:- ", 0, 0);
    $pdf->cell(30, 30, date("d/m/y"), 0, 0);
    $pdf->cell(40, 30, "Ref No:-", 0, 0);
    $pdf->cell(40, 30, $random_number, 0, 0);
    $img = $pdf->image($path, 150, 30, 50, 45);
    $pdf->cell(50, 50, $img, 1, 1);
    // img end



    $pdf->ln(5);
    $pdf->cell(45, 10, "Enrollment No :-", 1, 0);
    $pdf->cell(0, 10, $roll_no, 1, 1);
    $pdf->cell(45, 10, "Full Name :-", 1, 0);
    $pdf->cell(0, 10, $sname, 1, 1);
    $pdf->cell(45, 10, "Father Name :-", 1, 0);
    $pdf->cell(0, 10, $stu_fathername, 1, 1);
    $pdf->cell(45, 10, "Contact No :-", 1, 0);
    $pdf->cell(0, 10, $sphone, 1, 1);
    $pdf->cell(45, 10, "Gender :-", 1, 0);
    $pdf->cell(0, 10,  $sgender, 1, 1);
    $pdf->cell(45, 10, "Address :-", 1, 0);
    $pdf->cell(0, 10,  $saddress, 1, 1);
    $pdf->cell(45, 10, "Email :-", 1, 0);
    $pdf->cell(0, 10, $semail, 1, 1);
    $pdf->cell(45, 10, "Course:-", 1, 0);
    $pdf->cell(0, 10, $course, 1, 1);
    $pdf->cell(45, 10, "Year :-", 1, 0);
    $pdf->cell(0, 10, $year, 1, 1);

    $pdf->ln(8);
    $pdf->write(5, " NOTE :-  $sname Congratulations you are successfully registered with us ABC college");
    $pdf->ln(5);
    $pdf->cell(100, 10, "", 0, 0);
    $pdf->cell(70, 30, "Signature", 0, 1, "R");
    $file =  $sname . ".pdf";
    $pdf->Output('F', 'pdf/' . $file);

    // pdf end
    try {
        $conn = mysqli_connect("localhost", "root", "", "mini");
        $str = "insert into stu (stu_id,sname,stu_fathername,sphone,sgender,saddress,semail,course_id,year,simg) values ('$roll_no','$sname','$stu_fathername','$sphone','$sgender','$saddress','$semail','$course','$year','$name')";
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
                $mail->setFrom('abccollegeinfo4@gmail.com', 'ABC college');
                $mail->addAddress($semail);
                $mail->addAttachment("./pdf/" . $sname . '.pdf');
                $mail->isHTML(true);
                $mail->Subject = 'registration information from abc college';
                $mail->Body    = 'you are successfully <b>registration with us !</b>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                
                header("location:student_reg.php?msg=email sent successfully");
            } catch (Exception $e) {
                header("location:student_reg.php?msg=$mail->ErrorInfo");
                
            }

            // email end

        }
    } catch (\Throwable $th) {
        header("location:student_reg.php?msgdu=duplicate data");
    }
}
