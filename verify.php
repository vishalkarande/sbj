<?php
$active_tab = 'Verify Account';
require_once('header.php');
require_once('menu.php');
//check token is valid or not
if(isset($_REQUEST['token'])) {
    $data = $QueryFire->getAllData('users',' access_token="'.trim(strip_tags($_REQUEST['token'])).'"')[0];
    if(!empty($data)) {
        if($QueryFire->upDateTable("users",' access_token="'.trim(strip_tags($_REQUEST['token'])).'"', array('access_token'=>'','is_verified'=>1))) {
            $msg = 'You have successfully verified your account.';            
            //set session
            $_SESSION['user'] = $data;
            $to = $data['email'];
            $subject = ' Your account is activated.';
            // Set content-type header for sending HTML email
            $headers= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // Additional headers
            $headers .= 'From:Admin <info@granostore.com>' . "\r\n";
              $template = file_get_contents('mail_template.php');
              $template = str_replace('%name%', $data['name'] , $template);
              $template = str_replace('%data%', "You have verified your account on <a href=". base_url .">". base_url ."</a><br><br> For any help kindly contact us at info@granostore.com" , $template);
              $template = str_replace('%link2%', base_url , $template);
              $template = str_replace('%link2text%', 'SBJ Namkeens' , $template);
            if(mail($to,$subject,$template ,$headers))
                echo "<script> alert('Your account is activated now.');window.location.href='".base_url."';</script>";
        }
        else
            $msg=" You are not verified your email yet. Kindly check your mail and then click to verify.";
    }
    else {
        $msg = " Sorry, we are unable to verify your email. We request you to click the link sent on your registered email/mobile no.";
    }
}/* else {
    $msg = " Sorry, we are unable to verify your email. We request you to click the link sent on your registered email.";
}*/
?>
<div class="breadcrumb-area gray-bg">
  <div class="container">
    <div class="breadcrumb-content">      
      <nav class="" role="navigation" aria-label="breadcrumbs">
        <ul>
          <li>
            <a href="<?= base_url?>" title="Back to the home page">Home</a>
          </li>
          <li>
            <span>Verify Your Account</span>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<div class="about-us-area pt-100 pb-100" id="section-about-area">
  <div class="container">
    <?= isset($success)?'<h4 class="text-center text-primary">'.$success.'</h4>':(isset($error)?'<h4 class="text-center text-danger">'.$error.'</h4>':'')?>
    <?php if(!isset($success)) { ?>
        <div class="row">
            <div class="col-md-6 col-12 col-md-offset-3">
                <form action="" method="post">
                    <h4>Verify Account</h4>
                    <div class="form-group">
                        <input type="text" name="token" required placeholder="Enter verification code" class="form-control" />
                    </div>
                    <button class="btn btn-primary" type="submit" >Submit</button>
                </form>
            </div>
        </div>
    <?php } ?>
  </div>
</div>
<?php require_once('footer.php');?>
