<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='davepaulgarciaaabiz@gmail.com'; // Business email ID
?>
<h4>Welcome, Guest</h4>

<div class="product">
    <div class="image">
        <img src="rrh.jpg" />
    </div>
    <div class="name">
        Casa de Tobias Mountain Resort Payment
    </div>
    <div class="price">

        Price: $10.00
    </div>
    <div class="btn">
    <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Casa de Tobias Mountain Resort Payment">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="10.00">
    <input type="hidden" name="cpp_header_image" value="https://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://demo.phpgang.com/payment_with_paypal/cancel.php">
    <input type="hidden" name="return" value="http://demo.phpgang.com/payment_with_paypal/success.php">
    <input type="image" src="https://www.sharkzone.co.za/wp-content/themes/wordpress-bootstrap-master/images/Paypal-Button.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    </div>
</div>
