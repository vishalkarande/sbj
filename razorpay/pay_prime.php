<?php
require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
if(isset($_REQUEST['order_id'])) {
    $order = $QueryFire->getAllData('','','SELECT o.id,op.grand_total,u.name,u.mobile_no,u.email,CONCAT( u.address, " ", u.pincode ) AS address FROM orders as o JOIN (select order_id, sum( (price*qty) - (price*qty*(discount/100)) ) as grand_total from order_has_products GROUP BY order_id ) as op ON op.order_id=o.id LEFT JOIN users as u ON u.id=o.user_id WHERE o.is_deleted=0 and o.status="in-process" and o.is_paid=0 and o.id='.$_REQUEST['order_id']);
} else if(isset($_SESSION['user'])) {
    $order = $QueryFire->getAllData('','','SELECT o.id,op.grand_total,u.name,u.email,u.mobile_no,CONCAT( u.address, " ", u.pincode ) AS address FROM orders as o JOIN (select order_id, sum( (price*qty) - (price*qty*(discount/100)) ) as grand_total from order_has_products GROUP BY order_id ) as op ON op.order_id=o.id LEFT JOIN users as u ON u.id=o.user_id WHERE o.is_deleted=0 and o.status="in-process" and o.is_paid=0 and  o.user_id='.$_SESSION['user']['id']);
}
if(empty($order)) {
    header('Location:'.base_url);
    echo " Unauthorised Access....";die;
}
$order = $order[0];
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $order['id'],
    'amount'          => $order['grand_total'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => ucwords($order['name']),
    "description"       => "Order Payment | Oplus.co.in",
    "image"             => base_url."images/logo.png",
    "prefill"           => [
    "name"              => ucwords($order['name']),
    "email"             => $order['email'],
    "contact"           => $order['mobile_no'],
    ],
    "notes"             => [
    "address"           => $order['address'],
    "merchant_order_id" => $order['id'],
    ],
    "theme"             => [
    "color"             => "#00a215"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
