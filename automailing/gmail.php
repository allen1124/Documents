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

$receiveremail = 'yeungheitung0306@gmail.com';
$name = 'Rachel';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail -> charSet = "UTF-8";
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug =2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "ssphku@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "znmjwvazurhioeht";
//Set who the message is to be sent from
$mail->setFrom('hkussp@hku.hk', 'Student Support Program for NCS');
//Set an alternative reply-to address
$mail->addReplyTo('hkussp@hku.hk', 'Student Support Program for NCS');
//Set who the message is to be sent to
$mail->addAddress($receiveremail, $name);
// $mail->addBCC('hkuisappc1617@gmail.com');
//Set AddAttachment file

if (isset($_FILES['uploaded']) &&
    $_FILES['uploaded']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['uploaded']['tmp_name'],
                         $_FILES['uploaded']['name']);
}

//Set the subject line
// $mail->Subject = '[SSP] 學生缺席中文輔導班事宜';

$mail->Subject = '[SSP] TESTING';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//echo "http://127.0.0.1/expo/email/emailtem.php?nickname=".$_SESSION['nickname'].'';

$mail->msgHTML(file_get_contents('http://www.cllscssp.hku.hk/ssp_system/automailing/emailtem.php'));
// $mail->msgHTML('http://www.cllscssp.hku.hk/ssp_system/automailing/emailtem.php');
//send the message, check for errors
if (!$mail->send()) {
    echo '<h1><p style="color:red">ERRRRRROR</p><h1>';
    echo "Mailer Error: " . $mail->ErrorInfo;
    echo "Message was not sent to ";
    echo $receiveremail;
  } else {
    echo "Message sent to ";
    echo $receiveremail;
    echo '<p style="color:green">Success!</p>';
}
