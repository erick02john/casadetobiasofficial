<?php
session_start();
include("../dbconn.php");
$type = $_SESSION['UserType'];

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
$bid = $_SESSION['bilid'];
$rid = $_SESSION['resid'];
?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Amenity</title>

    <!-- Bootstrap -->
    <link rel= "stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
          <div class = "navbar-header">
            <button type = "button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="color: #fff";>Casa de Tobias Mountain Resort</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff;"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="../Admin/logout.php" class="view btn-sm active" data-toggle="modal" ><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Log Out</a></li>
              </ul>
            </li>
          </ul>
       </div>
      </div>
    </div>

    <br><br><br><br><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="Reserved.php">Reserved <span class="sr-only">(current)</span></a></li><br>
            <li><a href="Check-in.php">Checked-in</a></li><br>
            <li><a href="Check-out.php">Checked-out</a></li><br>
            <br>
            <li><a href="Billing.php">Billing</a></li>
            <br>
            <li><a href="Rooms.php">Rooms</a></li><br>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Facilities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Swimming Pool</a></li>
                  <li><a href="#">Function Hall</a></li>
                  <li><a href="#">Restaurant</a></li>
                </ul>
                </li>
          </ul>

        </div>
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Amenity</h1><br><br>
          <?php

            // error_reporting(0);
            // ini_set('display_errors', 0);
            ?>
          <div class="tableposition" style="margin-top:20px; margin-left: 80px;">
            <form method="Post" action="Amenity.php">
               <!--  <input type="hidden" name="bid" <?php echo "value='$bidd'"; ?> />
              <input type="hidden" name="rid" <?php echo "value='$ridd'"; ?>/> -->
              <input type="text" name="type" />
              <input type="text" name="description" />
              <input type="text" name="quan" />
              <input type="text" name="price" />
              <input type="submit" name="add" value="Add">
            </form>
          <?php
          function addAmenity(){
            include 'dbconn.php';
            $type = $_POST['type'];
            $description = $_POST['description'];
            $quan = $_POST['quan'];
            $price = $_POST['price'];
            $query = mysqli_query($conn, "SELECT * FROM billing where BillingID = '$bid'") or die("select");
            $row = mysqli_fetch_assoc($query);
            $totalAmount = $row['TotalAmount'];
            $balance = $row['Balance'];

            mysqli_query($conn, "INSERT INTO amenity (ReservationID, AmenityType, Quantity, AmenityPrice, Description) VALUES ('$rid', '$type', '$quan', '$price', '$description')") or die("insert");
            $totalPrice = $price * $quan;
            $tbalance = $balance + $totalPrice;
            $tAmount = $totalAmount + $totalPrice;
            mysqli_query($conn, "UPDATE billing SET TotalAmount = '$tAmount', Balance = '$tbalance' where BillingID = '$bid'") or die ("no connection update");

    mysqli_close($conn);
    print ("<script language='JavaScript'>
    window.location.href='Amenity.php';
    </SCRIPT>");
          }
          if(isset($_POST['add'])){
            addAmenity();
          }


          ?> </div>


  </body>

</body>
</html>
