<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
//header('Content-Type: text/html; charset="utf-8"');
session_start();
include("connect.php");

require 'vendor/autoload.php';
//Variables for the reciever
$bdayname = $infoArr["nickname"];
$birthdaemail = $infoArr["email"];
$birthdaeename = $infoArr["nickname"];
$dob = $infoArr["dob"];


//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug =0;
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
$mail->Username = "hkuisa.emailbot@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "yyjkaxeukbhbibiv";
//Set who the message is to be sent from
$mail->setFrom('hkuisa@hku.hk', 'Information Systems Association BEA HKUSU');
//Set an alternative reply-to address
$mail->addReplyTo('hkuisa@hku.hk', 'Information Systems Association BEA HKUSU');
//Set who the message is to be sent to
$mail->addAddress($birthdaemail, $ename);
// $mail->addBCC('hkuisappc1617@gmail.com');
//Set AddAttachment file

if (isset($_FILES['uploaded']) &&
    $_FILES['uploaded']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['uploaded']['tmp_name'],
                         $_FILES['uploaded']['name']);
}

//Set the subject line
$mail->Subject = '[ISA] Happy Birthday!';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//echo "http://127.0.0.1/expo/email/emailtem.php?nickname=".$_SESSION['nickname'].'';

$mail->msgHTML(file_get_contents('http://i.cs.hku.hk/~isassoc/bday_ecard_automailing/bdaytem.php?nickname='.$bdayname.'&dob='.$dob.''));
//send the message, check for errors
if (!$mail->send()) {
    echo '<h1><p style="color:red">ERRRRRROR</p><h1>';
    echo "Mailer Error: " . $mail->ErrorInfo;
    echo "Message was not sent to ";
    echo $birthdaemail;
  } else {
    echo "Message sent to ";
    echo $birthdaemail;
    echo '<p style="color:green">Success!</p>';
}
