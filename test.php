<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'vishal.we33ras@gmail.com';
$mail->Password = 'cpgziveevrzshouj';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;
   

// Sender info 
$mail->setFrom('vishal.we33ras@gmail.com', 'vishal Karande'); 
//$mail->addReplyTo('reply@example.com', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress('vishalkarande6@gmail.com'); 
 
// Add cc or bcc  
// $mail->addCC('cc@example.com'); 
// $mail->addBCC('bcc@example.com'); 
 
// Email subject 
$mail->Subject = 'Send Email via SMTP using PHPMailer'; 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Email body content 
$mailContent = ' 
    <h2>Send HTML Email using SMTP Server in PHP</h2> 
    <p>It is a test email by CodexWorld, sent via SMTP server with PHPMailer using PHP.</p> 
    <p>Read the tutorial and download this script from <a href="https://www.codexworld.com/">CodexWorld</a>.</p>'; 
$mail->Body = $mailContent; 
 
// Send email 
if(!$mail->send()){ 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
}else{ 
    echo 'Message has been sent.'; 
}

?>