<?php
$keys = array(
    'YOUR_TEST_KEY'  => 'TEST.KASSA', //ONLY FOR TESTING
    'YOUR_SHOP1_KEY'  => 'SHOP1.KASSA',
    'YOUR_SHOP2_KEY'  => 'SHOP2.KASSA',
);

$sha_keys = array();
foreach ($keys as $key => $val)
    $sha_keys[$key] = hash('sha256', $_POST['cashboxCode'].'&'.$_POST['orderId'].'&'.$_POST['baseSum'].'&'.$_POST['totalSum'].'&'.$_POST['contact'].'&'.$_POST['paymentCode'].'&'.$_POST['cashboxCurrencyCode'].'&'.$_POST['paymentCurrencyCode'].'&'.$_POST['customInfo'].'&'.$key );
    
//Checking
if( empty($_POST['sha256_hash']) || !in_array( $_POST['sha256_hash'], $sha_keys) )
    exit();

/*
* Use $_POST to work with your Orders/Users/etc
* Example:
*/

//Get kassa name
$kassa_name = $keys[array_search($_POST['sha256_hash'], $sha_keys)];

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
