<?php
include 'dbconn.php'; 
session_start();
        
$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['txn_id']; // Paypal transaction ID
$item_price         = $_REQUEST['mc_gross']; // Paypal received amount
$item_currency      = $_REQUEST['mc_currency']; // Paypal received currency type
 
$price = $_SESSION['amount'];
$currency='PHP';
 
//Rechecking the product price and currency details
if($item_price==$price && $item_currency==$currency)
{
     print "<script language='JavaScript'>
					window.location.href='../addreservation.php';
					</SCRIPT>";
}
else
{
    echo "<h1>Payment Failed</h1>";
    echo $item_transaction;
    echo "$item_currency";
}
?>
