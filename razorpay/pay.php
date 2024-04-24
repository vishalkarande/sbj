<?php
require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
$id=$_GET['id'];
$order = $QueryFire->getAllData('orders',' id='.$id);
pr($order);
$order = $order[0];
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
$order['grand_total']=1;
//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders


$order['grand_total']=$order['grand_total'];

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
    "description"       => "Order Payment |Sbjnamkeens@gmail.com",
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
