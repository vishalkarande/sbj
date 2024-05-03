<?php
require_once('header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
	echo "<script>window.location.href='index.php';</script>";
}
require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';

if(isset($_GET['token'])) {
    $data = $QueryFire->getAllData('users',' access_token="'.trim(strip_tags($_GET['token'])).'"');
    if(!empty($data)) {
      $data=$data[0];
        if($QueryFire->upDateTable("users",' access_token="'.trim(strip_tags($_GET['token'])).'"', array('access_token'=>'','is_verified'=>1))) {
            $msg = 'You have successfully verified your account.';            
            //set session
            $_SESSION['user'] = $data;
            $to = $data['email'];
            $subject = 'Welcome to Saptdhanya. You have successfully created your profile.';
            $mail = new PHPMailer(true);
        
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vishal.we33ras@gmail.com';
            $mail->Password = 'cpgziveevrzshouj';
            $mail->SMTPSecure = 'tls';
            $mail->Port     = 587;
        
            // Set content-type header for sending HTML email
            $mail->setFrom('vishal.we33ras@gmail.com', 'vishal Karande'); 
            $mail->Subject = $subject; 
            $mail->addAddress($to); 

              $template = file_get_contents('mail_template.php');
              $template = str_replace('%name%', $data['name'] , $template);
              $template = str_replace('%data%', "You have verified your account on <a href='index.php'>Saptdhanya</a><br><br> For any help kindly contact us at saptdhanya@gmail.com" , $template);
              $template = str_replace('%link2%', 'https://saptdhanya.com/' , $template);
              $template = str_replace('%link2text%', 'Saptdhanya' , $template);
              $mail->isHTML(true); 
              $mailContent = $template;
              $mail->Body = $mailContent; 
              if(!$mail->send()){ 
                $message= 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
              }else{ 
                $message= 'Message has been sent.'; 
              }
              echo "<script> alert('Your account is activated now.');window.location.href='index.php';</script>";
        }
        else
            $msg=" You are not verified your email yet. Kindly check your mail and then click to verify.";
    }
    else {
      
        $msg = " Sorry, we are unable to verify your email. We request you to click the link sent on your registered email.";
    }
} else {
    $msg = " Sorry, we are unable to verify your email. We request you to click the link sent on your registered email.";
}
?>
<div class="breadcrumb-area gray-bg" style="margin:10%">
  <div class="container">
    <div class="breadcrumb-content">      
      <nav class="" role="navigation" aria-label="breadcrumbs">
        <ul>
          
          <li>
            <span><?=$msg?></span>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>


<?php require_once('footer.php');?>
