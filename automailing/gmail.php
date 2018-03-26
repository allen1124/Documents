<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
// header('Content-Type: text/html; charset="utf-8"');
session_start();
include("connect.php");

require 'vendor/autoload.php';
//Variables for the reciever

$lid = $_POST['lid'];
$date = $_POST['date'];

$gid = $_POST['gid'];
$GSql = mysqli_query($conn, "SELECT `venue` FROM group_list WHERE `gid`='$gid';");
$GinfoArr = mysqli_fetch_assoc($GSql);
$Gvenue = $GinfoArr['venue'];

$ABS_Sql = mysqli_query($conn, "SELECT `sid` FROM att_list WHERE `lid`='$lid' AND `att`='0';");
$ABS_students = array();
while ($ABS = mysqli_fetch_assoc($ABS_Sql)){
    $ABS_students[] = $ABS['sid'];
}
$Techer_ABSs = array();
foreach ($ABS_students as $ABS_student){
    $Sql = mysqli_query($conn, "SELECT `school` FROM student_list WHERE `sid`='$ABS_student';");
    $infoArr = mysqli_fetch_assoc($Sql);
    $Techer_ABSs[$infoArr['school']][] = $ABS_student;
}

$data = array('success' => "", 'error' => "");

foreach ($Techer_ABSs as $Sid=>$Techer_ABS) {
    $mail = new PHPMailer;
    $mail -> charSet = "UTF-8";
    $mail->isSMTP();
    $mail->SMTPDebug =0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "ssphku@gmail.com";
    $mail->Password = "znmjwvazurhioeht";
    $mail->setFrom('hkussp@hku.hk', 'Student Support Program for NCS');
    $mail->addReplyTo('hkussp@hku.hk', 'Student Support Program for NCS');
    if (isset($_FILES['uploaded']) &&
        $_FILES['uploaded']['error'] == UPLOAD_ERR_OK) {
        $mail->AddAttachment($_FILES['uploaded']['tmp_name'],
                             $_FILES['uploaded']['name']);
    }
    $mail->Subject = '[SSP] 學生缺席中文輔導班事宜';
    $Sql = mysqli_query($conn, "SELECT * FROM school_list WHERE `Sid`='$Sid';");
    $info = mysqli_fetch_assoc($Sql);
    $info['teacher_name'] .= '老師';
    $mail->addAddress($info['email_addr'], $info['teacher_name']);
    $query = http_build_query($Techer_ABS,'ABS' );
    $mail->msgHTML(file_get_contents('http://localhost/automailing/emailtem.php?venue='.$Gvenue.'&date='.$date.'&gid='.$gid.'&'.$query));
    if (!$mail->send()) {
        $data['error'] = $mail->ErrorInfo;
        $data['receiver_name'][] = $info['teacher_name'];
        $data['receiver_addr'][] = $info['email_addr'];
    } else {
        $data['success'] = '1';
        $data['receiver_name'][] = $info['teacher_name'];
        $data['receiver_addr'][] = $info['email_addr'];
    }
}
$resultJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
echo $resultJSON;
?>