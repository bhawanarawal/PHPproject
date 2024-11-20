<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

function send_mail($recipient , $subject ,$message){

$mail = new PHPMailer();
$mail->IsSMTP();

$mail->SMTPDebug =0;                                        
$mail->Host       = 'smtp.gmail.com';                     
$mail->SMTPAuth   = true;                                   
$mail->Username   = 'bhwbi.rawal@gmail.com';                     
$mail->Password   = 'ggqy lava vjbc ewwx';                               
$mail->SMTPSecure = "tls";            
$mail->Port       = 587;                                    

$mail->isHTML(true);
$mail->addAddress($recipient, "esteemed customer");
$mail->setFrom('bhwbi.rawal@gmail.com', 'My website');     
$mail->Subject =$subject;
$content=$message;


