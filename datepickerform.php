<?php

include('scriptvalidation.php');
if (!empty($_POST)):
session_start();


  if(!empty($_POST['Check-inDate']) && !empty($_POST['Check-outDate'])){
    $date = strtotime(date('m/d/Y'));
    $start = strtotime($_POST['Check-inDate']);
    $end = strtotime($_POST['Check-outDate']);

    if($start >= $date){

      $timediff = abs($end - $start);

      $out = $timediff/86400;
        if($out == 0){

          print ("<script language='JavaScript'>
                    window.alert('You shoud stay atleast 1 night')
                    window.location.href='datepickerform.php';
                    </SCRIPT>");
        }else{
          $_SESSION['from'] = $_POST['Check-inDate'];
          $_SESSION['to'] = $_POST['Check-outDate'];
          $_SESSION['totalnights'] = $out;
          print ("<script language='JavaScript'>
        window.location.href='selectroom.php';
        </SCRIPT>");
        }
    }else{
      print ("<script language='JavaScript'>
        window.alert('Please Select A Valid Date')
        window.location.href='datepickerform.php';
        </SCRIPT>");
    }
  }else{
    print ("<script language='JavaScript'>
    window.alert('Select Check-In and Check-Out Dates')
    window.location.href='datepickerform.php';
    </SCRIPT>");
  }
?>
<?php else: ?>

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
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<style>

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
  width: 360px;
  margin: 50px auto;
  text-align: center;
  position: relative;
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
<?php
include('navlinks.php');
?>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-large"></span>
  </div>
  <div class="w3-display-middle w3-text-grey w3-large" style="padding:24px 48px">
    <div id="msform">
      <ul id="progressbar">
        <li class="active">Select Dates</li>
        <li>Select Rooms</li>
        <li>Guest Form</li>
        <li>Summary</li>
      </ul>
    </div>
     <div class="w3-container w3-pale-green">
      <h2><i class="w3-margin-right"></i>RESERVE DATE</h2>
    </div>
    <div class="w3-container w3-light-gray w3-padding-16">
      <form action="datepickerform.php" method="post" ">
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-calendar-o"></i> Check In</label>
            <input class="w3-input w3-border" type="text" id="from" name="Check-inDate" placeholder="Choose a date" autocomplete="off" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
          </div>
          <div class="w3-half">
            <label><i class="fa fa-calendar-o"></i> Check Out</label>
            <input class="w3-input w3-border" id="to" name="Check-outDate" placeholder="Choose a date" autocomplete="off" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
          </div>
        </div>
        <div align="right" style="margin-top: 10px">
        <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></div>
      </form>
    </div>
  </div>
</header>


<!-- footerter -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/Casa-De-Tobias-Mountain-Resort-254137624658146/"></i></a>
    <a href="https://www.waze.com/en/directions/philippines/nagcarlan/casa-de-tobias-mountain-resort/79560845.795739526.5393912.html"></i></a>

  </div>
  <p>Copyright © Casa de Tobias Mountain Resort 2019</p>
</footer>

<!-- Add Google Maps -->
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
        minDate: +3,
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
<?php endif; ?>
