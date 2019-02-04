<?php 
session_start();
include("dbconn.php");
include("../scriptvalidation.php");


$psNum = 0;
$pdNum = 0;
$ssNum = 0;
$sdNum = 0;


	$query1 = mysqli_query($conn, "SELECT RoomCapacity FROM roomtype WHERE RoomType = 'Presidential(Queen Sized-Bed)'");
	while($row1 = mysqli_fetch_array($query1)){
		$cpctyPQ = $row1['RoomCapacity'];
	}
	$query2 = mysqli_query($conn, "SELECT RoomCapacity FROM roomtype WHERE RoomType = 'Presidential(Twin Sized-Bed)'");
	while($row2 = mysqli_fetch_array($query2)){
		$cpctyPT = $row2['RoomCapacity'];
	}
	$query3 = mysqli_query($conn, "SELECT RoomCapacity FROM roomtype WHERE RoomType = 'Superior(Queen Sized-Bed)'");
	while($row3 = mysqli_fetch_array($query3)){
		$cpctySQ = $row3['RoomCapacity'];
	}
	$query4 = mysqli_query($conn, "SELECT RoomCapacity FROM roomtype WHERE RoomType = 'Superior(Twin Sized-Bed)'");
	while($row4 = mysqli_fetch_array($query4)){
		$cpctyST = $row4['RoomCapacity'];
	}
	


		if($_SESSION['presSNum'] == ' '){
				$psNum = 0;
				$psExtra = 0;
		}else{
							
				$psNum = $_SESSION['presSNum'] * 2;
				$psExtra = $_SESSION['presSNum'] * $cpctyPQ;
		}
		if($_SESSION['presDNum'] == ' '){
				$pdNum = 0;
				$pdExtra = 0;
		}else{
				$pdNum = $_SESSION['presDNum'] * 2;
				$pdExtra = $_SESSION['presDNum'] * $cpctyPT;
		}
		if($_SESSION['supSNum'] == ' '){
				$ssNum = 0;
				$ssExtra = 0;
		}else{
				$ssNum = $_SESSION['supSNum'] * 2;
				$ssExtra = $_SESSION['supSNum'] * $cpctySQ;
		}
		if($_SESSION['supDNum'] == ' '){
				$sdNum = 0;
				$sdExtra = 0;
		}else{
				$sdNum = $_SESSION['supDNum'] * 2;
				$sdExtra = $_SESSION['supDNum'] * $cpctyST;
		}
		
  $totalg = $psNum + $pdNum + $ssNum + $sdNum;
  $totalExtra = (($psExtra - $psNum) + ($pdExtra - $pdNum) + ($ssExtra - $ssNum) + ($sdExtra - $sdNum));
if (!empty($_POST)):


  $adult = $_POST['adult'];



  if($adult == ' '){
    echo ("<script language='JavaScript'>
      window.alert('There should be atleast 1 adult')
      window.location.href='modifyguestform.php';
      </SCRIPT>");
  }else{
    $_SESSION['adult'] = $adult;
    if ($_POST['adultadd'] == " "){
      $_SESSION['adultadd'] = 0;
    } else {
      $_SESSION['adultadd'] = $_POST['adultadd'];
    } 

    
    
    echo ("<script language='JavaScript'>
      window.location.href='modifysummary.php';
      </SCRIPT>");
  }



?>
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Walk-in</title>

  <link rel= "stylesheet" href="../css/mystyle.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <style type="text/css">
    .container {
      margin-top: 20px;
    }

    input[type="radio"]:checked + label span {
    background:url('../images/logos/radio.png') -57px top no-repeat;
  }

  .form-input {
    width: 250px;
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
          <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; margin-left: 80px;">Rosario Resort and Hotel</a>
          
      </div>      
  </nav>

    <br>
  <div class="container">
  

    <div class='table-responsive' style="margin-top: 90px;">

    <table class="table">
                  
    <form method="Post" action = "modifyguestform.php">

  
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
    <td colspan="3" align="right"><input type="submit" class="btn btn-success btn-md btn-right" name="checkin" value="Confirm" /></td>
  </tr>

    </form>
</table>
</div>
</body>
</html>

<?php endif; ?>