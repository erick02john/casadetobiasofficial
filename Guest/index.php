<?php 
session_start();
include("dbconn.php");

if(!empty($_SESSION['Email'])){
  $guestid = $_SESSION['guestid'];
  $email = $_SESSION['Email'];


}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='_log-in.php';
        </SCRIPT>");
}
?><!DOCTYPE html>
<html>
    <head>
        <title>Rosario Resort and Hotel</title>
    <link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../backext/css/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<style type="text/css">
.topnav {
  overflow: hidden;
  background-color: #003366;
}

.topnav a {
  float: right;
  display: block;
  color: #dfab21;
  text-align: center;
  padding: 25px 15px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: transparent;
  color: black;
}

.navbar-brand:hover{
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: center;
  }

}
</style>


    <!--WEBSITE CSS/JS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

  </head>
  <body>
    <script src="../backext/js/jquery.min.js"></script>
<script src="../backext/js/bootstrap.min.js"></script>
<script src = "../backext/js/admin.js"></script>
 <div class="wrap">

      <div id="wrapper">
      <div id="header">
        <div class="topnav" id="myTopnav">
        <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px; text-align: center;">Rosario Resort and Hotel</a>
  <a href="index.php">My Account</a>
  <a href="contact.php">Contact</a>
  <a href="gallery.html">Gallery</a>
  <a href="rates.html">Rates</a>
  <a href="about.php">About</a>
  <a href="home.php" class="active">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
  
<aside id="side-menu" class="aside" role="navigation">
    <ul class="nav nav-list accordion">
        <li><img src="../images/logos/fd.png" width="100px" height="100px" style="margin-left: 50px;"></li>
        <li style="margin-left: 70px; font-family: Arial Black, Helvetica, sans-serif; font-size: 15px;">Guest</li>
    </ul>
    <ul class="nav nav-list accordion">                    
        <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-globe"></i>Current<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="Personalinfo.php">Personal Info.</a></li>  
              <li><a href="Reservationinfo.php">Reservation Info.</a></li>  
            </ul>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Personalinfo.php">Personal Info.</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Reservationinfo.php">Reservation Info.</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="datepickerform.php">Book Now</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Checkinhistory.php">Check-in History</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
        <li class="one"><a  style="font-size: 16px;" href="logout.php" class="view btn-sm active"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log Out</a></li>
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
    <?php include 'displayRecords.php';
     ?>
    </section>
  </div>  
  
  </div>
  
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>
