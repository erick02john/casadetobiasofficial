<?php 
session_start();
include("../dbconn.php");
include("../scriptvalidation.php");

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
    
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['middleName'] = $_POST['middleName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['contactNum'] = $_POST['contactNum'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['adult'] = $adult;
    if ($_POST['adultadd'] == " "){
      $_SESSION['adultadd'] = 0;
    } else {
      $_SESSION['adultadd'] = $_POST['adultadd'];
    } 
    $_SESSION['modeofpayment'] = $modeofpayment;
    
    
    echo ("<script language='JavaScript'>
      window.location.href='summary.php';
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



  <div class="container">
      <div class="header alert alert-info">
          <h3><center><b>Walk-in</b></center></h3>
      </div>

    <div class='table-responsive'>

    <table class="table">
                  
    <form method="Post" action = "guestform.php">
    <tr>
      <td><input type = "text" class = "form-input" name = "firstName" placeholder = "First Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/></td>

      <td><input type = "text" class = "form-input" name = "middleName" placeholder = "Middle Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/></td>

      <td><input type = "text" class = "form-input" name = "lastName" placeholder = "Last Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/></td>
  
      
    </tr>
    
    <tr>
      <td><label>Gender: </label></td>
      <td><input type="radio" id="r1" name="gender" value="Female" />
          <label for="r1"><span></span>Female</label></td>
      <td><input type="radio" id="r2" name="gender" value="Male" />
          <label for="r2"><span></span>Male</label></td>
      
    </tr>

    <tr>
      <td colspan = "3"><textarea name= "address" placeholder="Address" rows= "4" cols= "130" onfocus="this.select()" REQUIRED/></textarea></td>
    </tr>
    <tr>
      <td><label>Contact Number:</label></td>
      <td><input type = "text" name = "contactNum" class= "form-input" placeholder = "Contact Number" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" REQUIRED /></td>
    </tr>
    <tr>
      <td><label>Email:</label></th>
      <td colspan="2"><input type="email" name="email" class="form-input" placeholder="Email" onfocus="this.select()" autocomplete="off" REQUIRED /></td>
  </tr>
  
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
    <td><label>Mode of Payment: </label></td>
    <td colspan="2"><select style="width:150;" class="form-control" name="modeofpayment" REQUIRED>
        <option></option>
        <option value="Cash">Cash</option>
        <option value="Card">Card</option>
    </select></td><br>
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