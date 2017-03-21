<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@sandboxf4d957256b09434abbcaca5ae33cea79.mailgun.org';   // SMTP username
$mail->Password = '2ba69d477f064661792c7d71a15939ec';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = 'ross.walker@teamsolutionz.com';
$mail->FromName = 'Mailer';
$mail->addAddress($_POST['email']);                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Hello';
$mail->Body    = 'Testing some Mailgun awesomness SMTP';

if(!$mail->send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent';
}
