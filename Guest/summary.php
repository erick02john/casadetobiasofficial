<?php

session_start();

include("dbconn.php");
include ('../scriptvalidation.php');
$modeofpayment = $_SESSION['modeofpayment'];
$payment = $_SESSION['payment'];

if(!empty($_SESSION['Email'])){
  $guestid = $_SESSION['guestid'];
  $email = $_SESSION['Email'];



}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='_log-in.php';
        </SCRIPT>");
}



$guestid = $_SESSION['guestid'];

$addpS = 0;
$addpD = 0;
$addsS = 0;
$addsD = 0;


if($_SESSION['presSNum'] == ' '){
                $_SESSION['presSNum'] = 0;
            }
             if($_SESSION['presDNum'] == ' '){
                $_SESSION['presDNum'] = 0;
            }
             if($_SESSION['supSNum'] == ' '){
                $_SESSION['supSNum'] = 0;
            }
             if($_SESSION['supDNum'] == ' '){
                $_SESSION['supDNum'] = 0;
            }
            echo  $_SESSION['supSNum'] ;

            $ttlrms = $_SESSION['presSNum'] + $_SESSION['presDNum'] + $_SESSION['supSNum'] + $_SESSION['supDNum'];
            $_SESSION['ttlrms'] = $ttlrms;


    $query = mysqli_query($conn, "SELECT * FROM guest Where GuestID = '$guestid'");

    $info = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html>
    <head>
        <title>SELECT ROOMS</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="../bootstrap/css/animate.css">
		<link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.growl.css">



		<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap/js/jquery.growl.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/dataTables.min.js"></script>
		<script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>


		<!--WEBSITE CSS/JS -->
		<link rel= "stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

        <style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: right;
}

li a {
    display: block;
    color: #fff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
    text-decoration: none;
}

li a.active {
    color: #000;
    background-color: #fff;
    text-decoration: none;
}

.table{
	color: #ffffff;
	width: 55%;
	border-radius: 6px;
	padding: 20px;
	border: 0;
	border-collapse: collapse;
    border: 1px solid #ccc;
}


input[type="radio"] {
    display:none;
}

input[type="radio"] + label {
    color:black;
    font-family:Arial, sans-serif;
}

input[type="radio"] + label span {
    display:inline-block;
    width:19px;
    height:19px;
    margin:-2px 10px 0 0;
    vertical-align:middle;
    background:url('images/radio.png') -38px top no-repeat;
    cursor:pointer;
}

input[type="radio"]:checked + label span {
    background:url('images/radio.png') -57px top no-repeat;
}
</style>
	</head>
	<body>
         <div class="row">


    <center><h2>Reservation Summary</h2></center>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <div style="background-color: #ccc; width: 450px" class ="container">
                    <!-- <div class="well" > -->

                        <h3 style="text-align:center;">Guest Detail</h3>
                        <font size="4">Name: </font><label><?php echo $info['GuestFName']." ".$info['GuestMName']." ".$info['GuestLName']; ?></label><br />
                        <font size="4">Address: </font><label><?php echo $info['Address'];?></label><br />
                        <font size="4">Email: </font><label><?php echo $info['Email'];?></label><br />
                        <font size="4">Mobile No: </font><label><?php echo $info['ContactNumber'];?></label><br />
                        <font size="4">Guest(s): </font><label><?php echo $_SESSION['adult'];?></label><br />
                        <?php if ($_SESSION['adultadd'] != ' '){ ?>
                        <font size="4">Additional number of Guest(s): </font><label><?php echo $_SESSION['adultadd'];?></label><br />
                           <?php } ?>




                        <h3 style="text-align:center;">Room Details</h3><br>
                        <font size="4">Check-in Date: </font><label><?php echo $_SESSION['from'];?></label><br />
                        <font size="4">Check-out Date: </font><label><?php echo $_SESSION['to'];?></label><br />
                        <font size="4">Nights: </font><label><?php echo $_SESSION['totalnights'];?></label><br />
                        <font size="4">Rooms to Reserve:</font><br />
                        <?php
                            if($_SESSION['presSNum'] == ' '){

                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>" . $_SESSION['presSNum']."x" ." ". $_SESSION['rmspName'] . " = " .'&#8369;'. number_format($_SESSION['presSReservedTotal']) . " Per night</label><br />";
                                $addpS = $_SESSION['presSReservedTotal'];
                            }
                            if($_SESSION['presDNum'] == ' '){

                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>" .  $_SESSION['presDNum']."x"  ." " . $_SESSION['rmdpName']. " = " . '&#8369;'.number_format($_SESSION['presDReservedTotal'])." Per night</label><br />";
                                $addpD = $_SESSION['presDReservedTotal'];
                            }
                            if($_SESSION['supSNum'] == ' '){

                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>"  . $_SESSION['supSNum']."x". " " . $_SESSION['rmssName'] . " = " .'&#8369;'. number_format($_SESSION['supSReservedTotal'])." Per night</label><br />";
                                $addsS = $_SESSION['supSReservedTotal'];
                            }


                        ?>
                        <font size="3">&nbsp;&nbsp;--------------------------------------------------------------------</font><br />

                        <?php
                        $nights = $_SESSION['totalnights'];
                        $total = ($addpS + $addpD + $addsS + $addsD) * $nights;

                        echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."&#8369;" .number_format($total). " For "."$nights night/s</label><br /><br />";
                        $addRate = $_SESSION['adultadd'] * 800 * $nights; ?>
                        <font size="4">Additional Guest:</font><br />
                        <?php
                        if($_SESSION['adultadd'] != ' ')
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>".$_SESSION['adultadd']." x &#8369;800.00 = ".'&#8369;'.number_format($addRate)." For $nights night</label><br><br>";
                        $ttotal = $total + $addRate ;
                        $down = $ttotal / 2;
                        $_SESSION['totalroom'] = $ttotal;
                        echo "<font size='5'>Total Room Payment:  <label></font>";
                        echo "<font size='4' color='#4E8975'>".'&#8369;'.number_format($ttotal). " For " . $nights . " Night/s </font>";?></label><br />
                        <?php
                            if ($payment == 'Down Payment') {
                                echo "<font size='5'>Down Payment:  <label></font>";
                                echo "<font size='4' color='#4E8975'>".'&#8369;'.number_format($down) . " </font>";
                            }
                        ?></label><br />


                        <br /><br /><br />
                <div align="right">

                    <a href="#confirm" class="btn btn-success" value="Confirm"  data-toggle="modal">Confirm</a>
                </div>
            <?php if($modeofpayment == 'Bank Deposit'){ ?>
                <div class="modal fade" id="confirm" >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
                                    <h4 align="center"><i class="glyphicon glyphicon-question-sign"></i>&nbsp; Upon confirmation, the bank details will be sent on your E-mail account.<br /><br /> Confirm Reservation? </h4>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="addreservation.php" name="submitval" id="submitval" class="once">
                                        <a class="btn btn-default" data-dismiss="modal">Cancel</a>

                                        <input type="submit" class="btn btn-success" id="reserve" name="reserve" value="Reserve" ondblclick="this.disabled=true;" />
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
            <?php } else { ?>

                <div class="modal fade" id="confirm" >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
                                    <h4 align="center"><i class="glyphicon glyphicon-question-sign"></i>&nbsp; Upon confirmation, You will be redirected to Paypal for your payment transaction.<br /><br /> Confirm Reservation? </h4>
                                </div>
                                <div class="modal-footer">



        <?php $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
            $paypal_id='casadetobiasmountainresort@gmail.com'; // Business email ID

            $ttlnights = $_SESSION['totalnights'];

        if (($ttlrms >= 15) || ($ttlnights >= 15)) {
            $lessAmount = $ttotal * .10;
            $DscntdAmount = $ttotal - $lessAmount;
            $_SESSION['amount'] =  $DscntdAmount;
        } else {
            $DscntdAmount = $ttotal;
            $_SESSION['amount'] = $DscntdAmount;
        }

        if ($payment = 'Down Payment'){
        	 $DscntdAmount = $down;
        	 $_SESSION['paidamount'] =  $DscntdAmount;
        } else {
        	 $_SESSION['paidamount'] = $_SESSION['amount'];
        }


        ?>


<div class="product">

    <div class="btn">

    <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1" id="submitval" class="once">
    <a class="btn btn-default" data-dismiss="modal" id="submitval" class="once">Cancel</a>
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Casa de Tobias Mountain Resort Payment">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo $DscntdAmount; ?>">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="cbt" value="Please Click Here to Complete Payment">
    <input type="hidden" name="cancel_return" value="http://localhost/casadetobiasofficial/Guest/summary.php">
    <input type="hidden" name="return" value="http://localhost/casadetobiasofficial/Guest/GuestPaypal/success.php">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">


                                        <input type="submit" class="btn btn-success" id="reserve" name="submit" value="Confirm" alt="PayPal - The safer, easier way to pay online!" ondblclick="this.disabled=true;" />
                                       </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php } ?>
            </div>
        </div>

    </body>
</html>
