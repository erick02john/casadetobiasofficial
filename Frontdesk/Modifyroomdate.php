<?php

include('../scriptvalidation.php');
include 'dbconn.php';
session_start();
$Checkin = $_SESSION['from'];
$Checkout = $_SESSION['to'];


if (isset($_POST['next'])):


    $date = strtotime(date('m/d/Y'));
    $start = strtotime($Checkin);
    $end = strtotime($Checkout);


      $timediff = abs($end - $start);

      $out = $timediff/86400;

          $_SESSION['totalnights'] = $out;
          print ("<script language='JavaScript'>
        window.location.href='Modifyroom.php';
        </SCRIPT>");

?>
<?php else: ?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Modify room - Date</title>



    <link rel="stylesheet" type="text/css" href="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.css">
    <script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="../bootstrap/js/jquery.growl.js"></script>
    <script src="../bootstrap/js/dataTables.min.js"></script>
    <script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../backext/css/admin.css">


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

<style type="text/css">
  li.one a:hover {
    background-color: #52697F;
    color: #003366;
  }
  .navbar-nav li {
    text-decoration: none;
    font-size: 15px;
    padding-top: 20px;
    color: #ccc;
  }


.navbar-nav li a {
  padding-top: 20px;

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

.navbar-nav li a.active {


    color: #000;
    background-color: #fff;
    text-decoration: none;
}
.lognav form {
    background-color: #B6B6B4;
    width:  80%;
    padding:20px;
    height: 250px;
    margin: 40px auto;
    border: none;
    position: center;

}


.lognav form button {
    font-family: Verdana;
    cursor: pointer;
}
.lognav form button:hover{
    background-color: #ccc
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
          <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; margin-left: 80px;">Casa de Tobias Mountain Resort</a>

      </div>
  </nav>
    <br><br><br>

    <div class="container">
      <?php
      include 'dbconn.php';?>
          <h1>Reserved Date</h1>

       <div class="lognav">

     <form action="Modifyroomdate.php" method="POST">
     <br><br>

      <div class="col-md-6 date">
        <div class="form-group">
          Check-in Date: <input type='text' class="form-control input-lg" id="from" value= "<?php echo $Checkin; ?>" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
        </div>
      </div>

      <div class="col-md-6 date">
        <div class="form-group">
          Check-out Date: <input type='text' class="form-control input-lg" id="to" value= "<?php echo $Checkout;?>" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />

        </div>
      </div>
      <div align="right">

        <a><button type="submit" class="btn btn-lg btn-cust btn-right" name="next" id="nextbtn"  style="background-color: #728FCE; color: #fff;">NEXT</button></a>
      </div>

    </form>
     </div>
  </div>
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


</body>
</html>

<?php endif; ?>
