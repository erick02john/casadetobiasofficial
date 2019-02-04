<?php 
session_start();
include("dbconn.php");
include("../scriptvalidation.php");

if(!empty($_SESSION['Email'])){
  $guestid = $_SESSION['guestid'];
  $email = $_SESSION['Email'];

}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='__login.php';
        </SCRIPT>");
}

$psNum = 0;
$pdNum = 0;
$ssNum = 0;
$sdNum = 0;

    if($_SESSION['presSNum'] == ' '){
        $psNum = 0;
        $psExtra = 0;
    }else{
              
        $psNum = $_SESSION['presSNum'] * 2;
        $psExtra = $_SESSION['presSNum'] * 8;
    }
    if($_SESSION['presDNum'] == ' '){
        $pdNum = 0;
        $pdExtra = 0;
    }else{
        $pdNum = $_SESSION['presDNum'] * 2;
        $pdExtra = $_SESSION['presDNum'] * 8;
    }
    if($_SESSION['supSNum'] == ' '){
        $ssNum = 0;
        $ssExtra = 0;
    }else{
        $ssNum = $_SESSION['supSNum'] * 2;
        $ssExtra = $_SESSION['supSNum'] * 8;
    }
    if($_SESSION['supDNum'] == ' '){
        $sdNum = 0;
        $sdExtra = 0;
    }else{
        $sdNum = $_SESSION['supDNum'] * 2;
        $sdExtra = $_SESSION['supDNum'] * 8;
    }
  $totalg = $psNum + $pdNum + $ssNum + $sdNum;
  $totalExtra = (($psExtra - $psNum) + ($pdExtra - $pdNum) + ($ssExtra - $ssNum) + ($sdExtra - $sdNum));
if (!empty($_POST)):


  $adult = $_POST['adult'];
  $modeofpayment = $_POST['modeofpayment'];


  if($adult == ' '){
    echo ("<script language='JavaScript'>
      window.alert('There should be atleast 1 adult')
      window.location.href='guestform.php';
      </SCRIPT>");
  }elseif($modeofpayment == ' ') {
    echo ("<script language='JavaScript'>
      window.alert('Please choose a Mode of Payment')
      window.location.href='guestform.php';
      </SCRIPT>");

  }else{
    $_SESSION['adult'] = $adult;
    if ($_POST['adultadd'] == " "){
      $_SESSION['adultadd'] = 0;
    } else {
      $_SESSION['adultadd'] = $_POST['adultadd'];
    } 
    $_SESSION['modeofpayment'] = $modeofpayment;
    $_SESSION['payment'] = $_POST['payment'];
    
    echo ("<script language='JavaScript'>
      window.location.href='summary.php';
      </SCRIPT>");
  }



?>
<?php else: ?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book Now - Select Rooms</title>
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
    <link rel= "stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



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

.tablecon {
  
}


.roombox {
  width: 320px;
  height: 400px;
  text-align: center;
  background-color: #ccc;
  border: 1px solid #fff;
}

.container {
  margin-left: 20px;
  margin-right: 0;
  
  width: 1300px;
}

.form-control {
  width: 400px;

}


</style>


</head>
<body>

 <div class="wrap">
  <nav class="nav-bar navbar-inverse" role="navigation">
      <div id ="top-menu" class="container-fluid active">
          <center><a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; margin-left: 80px;">Rosario Resort and Hotel</a></center>
          <div class="nav navbar-nav">        

              </div>
      </div>      
  </nav>
  <br><br>
  <div class="container">
      <?php include '../crumbcontainerguest.php'; ?><br>

    <div class='table-responsive'>

    <table class="table">
                  
    <form method="Post" action = "guestform.php">

  
  <tr>
  <td><label>Number of Guest: </label>
  <select style="width:100;" class="form-control" name="adult" REQUIRED>
        <option value=' '>&nbsp;</option>
          <?php for ($x = 1; $x <= $totalg; $x++) {
            echo "<option value='$x'>$x</option>";} ?>
              <br /></select></td>
  <td><label>Additional Guest(s): </label>
        <select style="width:100;" class="form-control" name="adultadd" REQUIRED>
        <option value=' '>&nbsp;</option>
          <?php for ($x = 1; $x <= $totalExtra; $x++) {
            echo "<option value='$x'>$x</option>";} ?>
              </select> <font color = "red" size="2"><br>*Additional &#8369;800.00</font></td>
  </tr>

  <tr>
    <td><label>Mode of Payment: </label>
    	<select style="width:150px;" class="form-control" name="modeofpayment" REQUIRED>
        	<option></option>
        	<option value="Bank Deposit">Bank Deposit</option>
        	<option value="Paypal">Paypal</option>
    	</select></td>
    <td><label>Payment: </label>
	<select style="width:150px;" class="form-control" name="payment" REQUIRED>
		<option></option>
		<option value="Down Payment">Down Payment</option>
		<option value="Full Payment">Full Payment</option>
	</select><br></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><input type="submit" class="btn btn-success btn-md btn-right" name="checkin" value="Confirm" /></td>
  </tr>

    </form>
</table>
</div>
</body>
</html>

<?php endif; ?>