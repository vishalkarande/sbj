<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
	if(strpos($_POST['shopping_order_id'], 'prime_') !== false ) {
		$arr = array('user_id'=>$user_id,'valid_upto'=>date('Y-m-d H:i:s', strtotime('+3 months')));
        $user_id = str_replace('prime_', '', $_POST['shopping_order_id']);
        $QueryFire->upDateTable("users",' id='.$user_id, array('user_type'=>'prime'));
		$subscription = $QueryFire->getAllData('user_subscription',' user_id'.$user_id);
		if(!empty($subscription)) {
			$subscription[0]['valid_upto'] = date('Y-m-d H:i:s',strtotime($subscription));
			$QueryFire->upDateTable("user_subscription",' id='.$user_id, array('valid_upto'=>$subscription[0]['valid_upto']));
		} else {
			$QueryFire->insertData('user_subscription_history',$arr);
		}
		$QueryFire->insertData('user_subscription_history',$arr);
	} else{
			$QueryFire->upDateTable("orders",' id='.$_POST['shopping_order_id'], array('is_paid'=>1,'paymet_id'=>$_POST['razorpay_payment_id'],'razor_order_id'=>$_POST['razorpay_order_id']));
				$QueryFire->upDateTable("orders",' id='.$_POST['shopping_order_id'], array('paymet_id'=>$_POST['razorpay_payment_id']));
					$QueryFire->upDateTable("orders",' id='.$_POST['shopping_order_id'], array('razor_order_id'=>$_SESSION['razorpay_order_id']));
	}
	unset($_SESSION['final_amount']);
    header('Location:'.base_url.'thankyou');
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}
echo $html;