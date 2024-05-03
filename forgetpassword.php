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

if(isset($_GET['reset'])==1 && isset($_GET['id'])){
    $reset=1;
}else{
    $reset=0;
}

if(isset($_GET["pop"]) && isset($_GET["mes"])) {
	$pop=$_GET["pop"];
	$mes=$_GET['mes'];
	if($pop==1 && $mes==1){
	  $message=  "Enter Correct OTP";
	}elseif($pop==1 && $mes==2){
	  $message= "Wrong Email !";
	}elseif($pop==1 && $mes==3){
		$message=" "; 
	}elseif($pop==1 && $mes==4){
		$message="Failed to update Password"; 
	}else{
	  $pop=0;
	}
  }else{
	  $pop=0;
	}

if(isset($_POST['restpass'])) {
    $data = $QueryFire->getAllData('users',' email="'.trim(strip_tags($_POST['username'])).'"');
    if(!empty($data[0])) {
		$data = $data[0];
        $token= rand(100000,999999);
            if($QueryFire->upDateTable("users",' email="'.trim(strip_tags($_POST['username'])).'"', array('access_token'=>$token,'is_verified'=>1))) {
		    $to = $data['email'];
            $subject = 'Reset Password Token.';
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
              $template = str_replace('%data%', "Your Password Change Code ".$token." . </a><br><br> For any help kindly contact us at saptdhanya@gmail.com" , $template);
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
              echo "<script> alert('OTP sent on mail.');window.location.href='forgetpassword.php?reset=1&id=".$data['id']."';</script>";
		
	}else{
		echo "<script> alert('Failed to send OTP !');window.location.href='forgetpassword.php';</script>";
		
		
	}
}else{
    echo "<script> alert('Wrong Email !');window.location.href='forgetpassword.php';</script>";
}

}

if(isset($_POST['changePassword']) && isset($_GET['id']) ) {
    $data = $QueryFire->getAllData('users',' id='.$_GET['id'].' and access_token="'.trim(strip_tags($_POST['otp'])).'"');
    if(!empty($data)) {
      $data=$data[0];
        if($QueryFire->upDateTable("users",' id='.$_GET['id'].' and access_token="'.trim(strip_tags($_POST['otp'])).'"', array('access_token'=>'','password'=>md5(trim(strip_tags($_POST['newpass'])))))) {
            $msg = 'You have successfully Reset your Password.';            
            //set session
              
             echo "<script> alert('You have successfully Reset your Password.');window.location.href='login.php';</script>";
        }
        else
            $msg="Failed to update Password";
            echo "<script> alert('Failed to update Password !');window.location.href='forgetpassword.php?reset=1&id=".$_GET['id']."';</script>";
          
    }
    else {
      
        $msg = "Enter Correct OTP";
        echo "<script> alert('Enter Correct OTP!');window.location.href='forgetpassword.php?reset=1&id=".$_GET['id']."';</script>";
    }
}/* else {
    $msg = " Sorry, we are unable to verify your email. We request you to click the link sent on your registered email.";
}*/

if($reset!=1){
?>


<div class="breadcrumb-area gray-bg" style="margin:10%">
  <div class="container">
    <div class="breadcrumb-content">      
      
    <div class="col-12 col-md-6 col-login">


												<h2 class="wd-login-title">Forget Password</h2>

												<form method="post"
													class="login woocommerce-form woocommerce-form-login" action="">


													<p
														class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
														<label for="username">Email&nbsp;<span
																class="required">*</span></label>
														<input type="text" required
															class="woocommerce-Input woocommerce-Input--text input-text"
															name="username" id="username" value="" />
													</p>
											


													<p class="form-row">
														<input type="hidden" id="woocommerce-login-nonce"
															name="woocommerce-login-nonce" value="a35c8b2951" /><input
															type="hidden" name="_wp_http_referer"
															value="/my-account/" />
														<button type="submit"
															class="button woocommerce-button woocommerce-form-login__submit"
															name="restpass" value="Log in">Send Mail</button>
													</p>

													<p class="login-form-footer">
														<a href="login.php" class="woocommerce-LostPassword lost_password">
														    Click to Login</a>
														
													</p>



												</form>



											</div>

    </div>
  </div>
</div>
<?php }else{ ?>

    <div class="breadcrumb-area gray-bg" style="margin:10%">
  <div class="container">
    <div class="breadcrumb-content">      
      
    <div class="col-12 col-md-6 col-login">


												<h2 class="wd-login-title">Forget Password</h2>

												<form method="post"
													class="login woocommerce-form woocommerce-form-login" action="">


													<p
														class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
														<label for="username">OTP&nbsp;<span
																class="required">*</span></label>
														<input type="text" required
															class="woocommerce-Input woocommerce-Input--text input-text"
															name="otp" id="otp" value="" />
													</p>
                                                    <p
														class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
														<label for="password">Password&nbsp;<span
																class="required">*</span></label>
														<input
															class="woocommerce-Input woocommerce-Input--text input-text"
															type="password" name="newpass" id="newpass"
															autocomplete="current-password" />
													</p>
                                                   
											


													<p class="form-row">
														<input type="hidden" id="woocommerce-login-nonce"
															name="woocommerce-login-nonce" value="a35c8b2951" /><input
															type="hidden" name="_wp_http_referer"
															value="/my-account/" />
														<button type="submit"
															class="button woocommerce-button woocommerce-form-login__submit"
															name="changePassword" value="Log in">Reset Password</button>
													</p>

													<p class="login-form-footer">
														<a href="login.php" class="woocommerce-LostPassword lost_password">
														    Click to Login</a>
														
													</p>



												</form>



											</div>

    </div>
  </div>
</div>

<?php }?>


		

<?php
     require_once('footer.php');?>
