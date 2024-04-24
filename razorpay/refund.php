<?php
pr($_REQUEST);
require('config.php');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
if(isset($_REQUEST['razorpay'])) {
    
    $api = new Api($keyId, $keySecret);
    $payment = $api->payment->fetch($_REQUEST['razorpay']);
    $refund = $payment->refund();
    pr($refund);
} else {
    echo "Access denied";
}