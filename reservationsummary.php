<?php

session_start();
include ('scriptvalidation.php');
include ('dbconn.php');
$modeofpayment = $_SESSION['modeofpayment'];
$payment = $_SESSION['payment'];

$ctr = 0;
$ttlrms = 0;
$roomcount = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
$count = mysqli_num_rows($roomcount);
while($ctr < $count){
     $rcnum = $_SESSION['roomcount'][$ctr];

     $ttlrms += $rcnum;
     $ctr++;
}
            $_SESSION['ttlrms'] = $ttlrms;

?>

<!DOCTYPE html>
<html>
<title>Casa de Tobias Mountain Resort</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/lightbox-plus-jquery.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.css">
    <!--modal extensions-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-color: white;
    min-height: 100%;

}
.w3-bar .w3-button {
    padding: 16px;
}

.gallery{
  margin: 10px 50px;
  text-align: center;
}

.gallery img{
  width: 230px;
  padding: 5px;
  filter: grayscale(100%);
  transition: 1s;
}

.gallery img:hover{
  filter: grayscale(0);
  transform: scale(1.1);
}

#msform {
 width: 370px;
  margin: 50px auto;
  text-align: center;
  position: relative;
  margin-top: 100px;
}

/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: #909090;
  text-transform: uppercase;
  font-size: 10px;
  width: 23%;
  float: left;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: #909090;
  border-radius: 3px;
  margin: 0 auto 5px auto;
  color: white;
}
/*progressbar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: #909090;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: black;
  color: white;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php#home" class="w3-bar-item w3-button w3-wide">Casa de Tobias Mountain Resort</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="index.php#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="index.php#room" class="w3-bar-item w3-button"> ROOMS</a>
      <a href="index.php#gallery" class="w3-bar-item w3-button"> GALLERY</a>
      <a href="index.php#contact" class="w3-bar-item w3-button"> CONTACT</a>
      <a href="Guest/_log-in.php" class="w3-bar-item w3-button"> LOG-IN</a>
      <a href="datepickerform.php" class="w3-bar-item w3-button" style="background: #000; color: #fff;"> BOOK NOW</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="index.php#room" onclick="w3_close()" class="w3-bar-item w3-button">ROOMS</a>
  <a href="index.php#gallery" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a>
  <a href="index.php#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="Guest/_log-in.php" onclick="w3_close()" class="w3-bar-item w3-button">LOG-IN</a>
  <a href="datepickerform.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background: #FFF; color: #000;">BOOK NOW</a>
</nav>
<div class="w3-container">
    <div id="msform">
      <ul id="progressbar">
        <li class="active"><a href="datepickerform">Select Dates</a></li>
        <li class="active"><a href="selectroom.php">Select Rooms</a></li>
        <li class="active"><a href="guestform.php">Guest Form</a></li>
        <li class="active">Summary</li>
      </ul>
    </div>

    </div>
    <div class="w3-container">
        <div class="w3-container w3-center w3-white">
  <div class="w3-row-padding">
    <div class="w3-middle">
        <ul class="w3-ul w3-white w3-hover-shadow"><li class="w3-black w3-xlarge w3-padding-48">RESERVATION SUMMARY</li></ul>





                    <!-- <div class="well" > -->

                        <h3 style="text-align:center;">Guest Detail</h3>
                        <font size="4">Name: </font><label><?php echo $_SESSION['firstName']." ".$_SESSION['middleName']." ".$_SESSION['lastName']; ?></label><br />
                        <font size="4">Address: </font><label><?php echo $_SESSION['address'];?></label><br />
                        <font size="4">Email: </font><label><?php echo $_SESSION['email'];?></label><br />
                        <font size="4">Mobile No: </font><label><?php echo $_SESSION['mobNum'];?></label><br />
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
                        $ctr = 0;
                        $ttlrr = 0;
                        $roomcount = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
                        $count = mysqli_num_rows($roomcount);
                        while($ctr < $count){
                            $rcnum = $_SESSION['roomcount'][$ctr];
                            if($rcnum == 0){

                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>" . $rcnum."x" ." ". $_SESSION['roomtype'][$ctr] . " = " .'&#8369;'. number_format($_SESSION['roomtotal'][$ctr]) . " Per night</label><br />";
                                $addrr = $_SESSION['roomtotal'][$ctr];
                                $ttlrr += $addrr;
                            }

                            $ctr++;
                        }


                        ?>
                        <font size="3">&nbsp;&nbsp;--------------------------------------------------------------------</font><br />

                        <?php
                        $nights = $_SESSION['totalnights'];
                        $total = $ttlrr * $nights;

                        echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."&#8369;" .number_format($total). " For "."$nights night/s</label><br /><br />";
                        $addRate = $_SESSION['adultadd'] * 800 * $nights; ?>
                        <?php
                        if($_SESSION['adultadd'] != ' ')
                             echo "<font size='4'>Additional Guest:</font><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>".$_SESSION['adultadd']." x &#8369;800.00 = ".'&#8369;'.number_format($addRate)." For $nights night</label><br><br>";
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

                <div style="margin-left: 5px; margin-right: 5px;">
                    <a href="#confirm" class="w3-btn w3-border w3-text-white w3-padding-large w3-block" style="font-size: 20px; background: #616161;" name="reserve" value="Confirm" data-toggle="modal">Confirm</a>
                </div>
                <br>
            <?php if($modeofpayment == 'Bank Deposit'){ ?>
                <div class="modal fade" id="confirm" >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
                                    <h4 align="center"><i class="glyphicon glyphicon-question-sign"></i>&nbsp; Upon confirmation, the bank details will be sent on your E-mail account.<br /><br /> Confirm Reservation? </h4>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="addReservation.php" name="submitval" id="submitval" class="once">
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
    <input type="hidden" name="cpp_header_image" value="https://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="cbt" value="Please Click Here to Complete Payment">
    <input type="hidden" name="cancel_return" value="http://rosarioresortandhotel.com/RRH/reservationsummary.php">
    <input type="hidden" name="return" value="http://rosarioresortandhotel.com/RRH/Paypal/success.php">
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

  </div>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/Rosario.Resort/"><i class="fa fa-facebook-official w3-hover-opacity w3-black"></i></a>
    <a href="https://www.google.com.ph/search?q=Rosario+Resort+and+Hotel&oq=Rosario+Resort+and+Hotel&aqs=chrome..69i57l2j69i60l4.9849j0j4&sourceid=chrome&ie=UTF-8"><i class="fa fa-google w3-hover-opacity w3-black"></i></a>

  </div>
  <p>Copyright © Casa de Tobias Mountain Resort 2019</p>
</footer>


 <script type="text/javascript">

     var time = new Date().getTime();
     $(document.body).bind( function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 60000)
             window.location.reload(true);
         else
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000);

</script>
<script>

//Gallery Modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//Datepicker JavaScript
$(document).ready(function(){

    $("#from").datepicker({
        minDate: 0,
        maxDate: "+365D",
        numberOfMonths: 1,
        onSelect: function(selected) {
          $("#to").datepicker("option","minDate", selected)
        }
    });
    $("#to").datepicker({
        minDate: 0,
        maxDate:"+365D",
        numberOfMonths: 1,
        onSelect: function(selected) {
           $("#from").datepicker("option", selected)
        }
    });
});


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>


</body>
</html>
