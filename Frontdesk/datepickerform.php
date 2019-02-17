<?php
session_start();
include("../dbconn.php");

$type = $_SESSION['UserType'];
$name = $_SESSION['Name'];

if(!empty($_SESSION['Username'])){
if($type != 'Frontdesk'){
     echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../__login.php';
        </SCRIPT>");}
}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../__login.php';
        </SCRIPT>");
}

include('../scriptvalidation.php');
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
<head>
<title>Frontdesk</title>
<link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../backext/css/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<style type="text/css">
  li.one a:hover {
    background-color: #52697F;
    color: #003366;
  }
  body {
    padding: 0 !important;
  }

</style>

</head>
<body>
<script src="../backext/js/jquery.min.js"></script>
<script src="../backext/js/bootstrap.min.js"></script>
<script src = "../backext/js/admin.js"></script>
<div class="wrap">
  <nav class="nav-bar navbar-inverse" role="navigation">
      <div id ="top-menu" class="container-fluid active">
          <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; margin-left: 80px;">Alibungbungan, Nagcarlan, Laguna</a>
          <ul class="nav navbar-nav">
              <br>
              <li class="dropdown movable">
              <li><a style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif;"><?php echo "$name"; ?></a></li>

      </div>
  </nav>

  <aside id="side-menu" class="aside" role="navigation">
    <ul class="nav nav-list accordion">
    <li><img src="../images/logos/fd.png" width="100px" height="100px" style="margin-left: 50px;"></li>
    <li style="margin-left: 30px; font-family: Arial Black, Helvetica, sans-serif; font-size: 15px;">Frontdesk Officer</li>
   </ul>
    <ul class="nav nav-list accordion">
          <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-globe"></i>Reservation<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="Reserved.php">Reserved</a></li>
              <li><a href="Pending.php">Pending</a></li>
            </ul>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Check-in.php">Check-in</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Check-out.php">Check-out</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Rooms.php">Rooms</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Billing.php">Billing</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="datepickerform.php">Walk-in Guest</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
        <li class="one"><a  style="font-size: 16px;" href="../Admin/logout.php" class="view btn-sm active"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log Out</a></li>
      </ul>

  </aside>
  <div class="content">
    <div class="top-bar">
      <a href="#menu" class="side-menu-link burger">
        <span class='burger_inside' id='bgrOne'></span>
        <span class='burger_inside' id='bgrTwo'></span>
        <span class='burger_inside' id='bgrThree'></span>
      </a>
    </div>
    <div class="container">
      <div class="alert alert-info" style="width: 80%; margin-bottom: 10px;">
          <h3><center>Walk-in</center></h3>
      </div>
          <form id="walkin" action="datepickerform.php" method="POST">

      <div class="col-md-4 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="from" name="Check-inDate" placeholder="Check-IN Date" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
        </div>
      </div>

      <div class="col-md-4 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="to" name="Check-outDate" placeholder="Check-Out Date" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
        </div>
      </div>

      <div class="col-md-4 date">
        <div align="left">
          <input type="submit" style='width: 150px; height: 40px;' class='btn btn-info' name="walkin" value="Walk-in">
          </form>
        </div>
      </div>
    </div>

</div>
<div>
  </div>
  <script type="text/javascript">

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
         $("#from").datepicker("option", selecd)
      }
  });
});

 </script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
 <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 <script type="text/javascript">
      $(function () {
          $("#datepicker").datepicker({
              shoeButtonPanel: true,
              showOn: "button",
              buttonImage: "Images/calendar.png",
              buttonImageOnly: true,
              buttonText: "Select date"
           });
      });

 </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
  </html>
  <?php endif; ?>
