<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\PHPproject\registration\PHPMailer-master (1)\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\PHPproject\registration\PHPMailer-master (1)\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHPproject\registration\PHPMailer-master (1)\PHPMailer-master\src\SMTP.php';

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

$mail->msgHTML($content);
if(!$mail->send()){
    echo"Error while sending Email.";
    echo"<pre>";
    var_dump($mail);
    return false;
}else{
    echo "Email sent sucessfully";
    return true;
}
}
?>


