<?php
$key = 'YOUR_KASSA_SECRET_KEY';

$checkSum = hash('sha256', $_POST['cashboxCode'].'&'.$_POST['orderId'].'&'.$_POST['baseSum'].'&'.$_POST['totalSum'].'&'.$_POST['contact'].'&'.$_POST['paymentCode'].'&'.$_POST['cashboxCurrencyCode'].'&'.$_POST['paymentCurrencyCode'].'&'.$_POST['customInfo'].'&'.$key );
//Checking
if( empty($_POST['sha256_hash']) || $_POST['sha256_hash'] != $checkSum )
    exit();

/*
* Use $_POST to work with your Orders/Users/etc
* Example:
*/

//Add balance to user (Note! orderId must be unique)
function yourBalanceFunction( int $user_id, float $sum, string $currency ) {}
yourBalanceFunction( $_POST['customInfo'], $_POST['baseSum'], $_POST['paymentCurrencyCode'] );

//Payment verification for order
function orderPayment( int $order_id, float $sum, string $currency ) {
    if(
      ceil($sum) != ceil($order_sum) ||
      $currency != $order_currency
      )
        return false;
        
     //SUCCESS!
}
orderPayment( $_POST['orderId'], $_POST['baseSum'], $_POST['paymentCurrencyCode'] );
