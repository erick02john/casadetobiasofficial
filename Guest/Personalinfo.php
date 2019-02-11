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
        <title>Casa de Tobias Mountain Resort</title>
    <link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../backext/css/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="./css/prettify-1.0.css" rel="stylesheet">
<link href="./css/base.css" rel="stylesheet">
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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
        <?php include('navlinksguest.php') ?>
      <div id="header">

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
    <h2>Personal Information</h2>

    <?php include 'dbconn.php';

      $query = mysqli_query($conn, "SELECT * FROM guest WHERE GuestId = '$guestid' ") OR die('no');

      $info = mysqli_fetch_array($query);
        $add =  $info['Address'];

      echo "
      <div class='info'>
      <div>
    <div class='table-responsive'>
      <table>
      <form action='Personalinfo.php'>
      <tr>
          <th>Name:  </th>
          <td><h5>{$info['GuestFName']} {$info['GuestMName']} {$info['GuestLName']}</h5></td>
          <td><a href='#editname' data-toggle='modal' style='margin-left: 100px';>Edit</a>
      </tr>
      <tr>
      <th>Gender: </th>
      <td><h5>{$info['Gender']}</h5></td>
      <td></td>
      </tr>
      <tr>
          <th><lable>Address: </label></th>
          <td><h5>$add</h5>
          <td><a href='#editadd' data-toggle='modal' style='margin-left: 100px';>Edit</a></td>
      </tr>
      <tr>
          <th><lable>Contact Number: </label></th>
          <td><h5>{$info['ContactNumber']}</h5></td>
          <td><a href='#editnumber' data-toggle='modal' style='margin-left: 100px';>Edit</a></td>
      </tr>
      <tr>
          <th><lable>Contact Email: </label></th>
          <td><h5>{$info['Email']}</h5></td>
          <td><a href='#editemail' data-toggle='modal' style='margin-left: 100px';>Edit</a></td>
      </tr>
       <tr>
          <th><lable>Password:  </label></th>
          <td></td>
          <td><a href='#editpassword' data-toggle='modal' style='margin-left: 100px';>Change Password</a></td>
      </tr>
      </form>
      </table>
      </div></div>
      </info>";


    ?>
   <?php include 'modal.php';?>

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
