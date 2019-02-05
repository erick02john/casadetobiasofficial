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
?>
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
  body {
    padding: 0 !important;
  }
  li.one a:hover {
    background-color: #52697F;
    color: #003366;
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
          </li>
        </ul>
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
    <section class="content-inner">
    <h2>Overview</h2>
    <div>
     <div class=" col-md-4 col-lg-4" style="margin-bottom:30px; width: 50%;">
        <div class="home_div" style="width:90%; border:1px solid #bbb;">
            <div class="text-left" style="margin-bottom:15px;border-bottom:1px solid #aaa;margin-top:00px;background:#243545;height:40px;padding-top:10px;">
                  <h5 style="margin-top:0px; color:#fff"><b>&nbsp;New Reservations</b></h5>
            </div>
              <div style="margin-left:10px;">
                <?php
                  include('dbconn.php');
                  $query = mysqli_query($conn,"SELECT * FROM reservation r Join guest g ON r.GuestID = g.GuestID WHERE Status = 'Reserved'  ORDER BY CheckInDate ASC LIMIT 0, 9;") or die(mysqli_error());
                  $i = 1;

                  while($row = mysqli_fetch_array($query)){
                ?>
                  <tr>
                    <td>
                      <?php echo "<font size='3'> On <u>".$row['CheckInDate']."</u> <u>".$row['GuestFName']." ".$row['GuestMName']." ".$row['GuestLName']." </u> will be checking in at Room <u>".$row['RoomsReserved']."</u></font><br>";?>
                      </td>
                  </tr>

                <?php
                  $i++;
                  }
                ?>
          </div>
              </div>
                  <div class="height30 visible-xs"></div>
</div>
</div>

<div>
     <div class=" col-md-4 col-lg-4" style="margin-bottom:30px; width: 50%;">
        <div class="home_div" style="width:90%;margin-left:20px;border:1px solid #bbb;">
            <div class="text-left" style="margin-bottom:15px;border-bottom:1px solid #aaa;margin-top:00px;background:#243545;height:40px;padding-top:10px;">
                  <h5 style="margin-top:0px; color:#fff"><b>&nbsp;Number of Guest: Checked-in</b></h5>
            </div>
              <div style="margin-left:10px;">
                <?php
                  include('dbconn.php');
                  $query = mysqli_query($conn,"SELECT SUM(NumberOfAdult) As totalNum FROM reservation WHERE Status = 'Checked-in'") or die(mysqli_error());
                  $i = 1;

                  $row = mysqli_fetch_array($query);
                  $numOfGuest = $row['totalNum'];

                ?>
                  <tr>
                    <td>
                      <?php echo "<font size='3'> Total Number of Guest:". $numOfGuest."</u> <u></font>";?>
                      </td>
                  </tr>

                <?php
                  $i++;

                ?>
          </div>
              </div>
                  <div class="height30 visible-xs"></div>
</div>

    </section>
  </div>

  </div>

</div>
</body>
</html>
