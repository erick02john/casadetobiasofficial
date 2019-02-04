<?php
include ('dbconn.php');
session_start();
$from = $_SESSION['from'];
$to = $_SESSION['to'];

if(empty($from) AND empty($to)){
	echo "<script language='JavaScript'>
							window.alert('Please select date first')
							
							window.location.href='datepickerform.php';
							</SCRIPT>";

}
else{
	
$roomSinglePre = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Presidential(Single)'");
$rmsp = mysqli_fetch_array($roomSinglePre);
$roomDoublePre = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Presidential(Double)'");
$rmdp = mysqli_fetch_array($roomDoublePre);
$roomSingleSup = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Superior(Single)'");
$rmss = mysqli_fetch_array($roomSingleSup);
$roomDoubleSup = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Superior(Double)'");
$rmds = mysqli_fetch_array($roomDoubleSup);

$checkIn = $_SESSION['from'];
$time = strtotime($checkIn);
$checkIn = date('Y-m-d', $time);
$_SESSION['from'] = $checkIn;
$checkOut = $_SESSION['to'];
$time = strtotime($checkOut);
$checkOut = date('Y-m-d', $time);
$_SESSION['to'] = $checkOut;
if (!empty($_POST)):

	$presS = $_POST['Presidential(Single)'];
	$presD = $_POST['Presidential(Double)'];
	$supS = $_POST['Superior(Single)'];
	$supD = $_POST['Superior(Double)'];

	if ($presS == ' ' && $presD == ' ' && $supS == ' ' && $supD == ' '){
		echo "<script language='JavaScript'>
							window.alert('Please select atleast one room')
							window.location.href='selectroom.php';
							</SCRIPT>";
	} else {
		if($presS != ''){
			$psRate = $rmsp['RoomRate'];
			$psTotal = $psRate * $presS;
			$_SESSION['presSReservedTotal'] = $psTotal;
			$_SESSION['rmspName'] = 'Presidential(Single)';
			$_SESSION['presSNum'] = $presS;
		} else {
			$_SESSION['presSReservedTotal'] = ' ';
			$_SESSION['rmspName'] = ' ';
			$_SESSION['presSNum'] = ' ';
		}
		if($presD != ''){
			$pdRate = $rmdp['RoomRate'];
			$pdTotal = $pdRate * $presD;
			$_SESSION['presDReservedTotal'] = $pdTotal;
			$_SESSION['rmdpName'] = 'Presidential(Double)';
			$_SESSION['presDNum'] = $presD;
		} else {
			$_SESSION['presDReservedTotal'] = ' ';
			$_SESSION['rmdpName'] = ' ';
			$_SESSION['presDNum'] = ' ';
		}
		if($supS != ''){
			$ssRate = $rmss['RoomRate'];
			$ssTotal = $ssRate * $supS;
			$_SESSION['supSReservedTotal'] = $ssTotal;
			$_SESSION['rmssName'] = 'Superior(Single)';
			$_SESSION['supSNum'] = $supS;
		} else {
			$_SESSION['supSReservedTotal'] = ' ';
			$_SESSION['rmssName'] = ' ';
			$_SESSION['supSNum'] = ' ';
		}
		if($supD != ''){
			$sdRate = $rmds['RoomRate'];
			$sdTotal = $sdRate * $supD;
			$_SESSION['supDReservedTotal'] = $sdTotal;
			$_SESSION['rmdsName'] = 'Superior(Double)';
			$_SESSION['supDNum'] = $supD;
		} else {
			$_SESSION['supDReservedTotal'] = ' ';
			$_SESSION['rmdsName'] = ' ';
			$_SESSION['supDNum'] = ' ';
		}
		echo("<script language='JavaScript'>
				window.location.href='guestform.php';
				</SCRIPT>");
	}
?>
<?php else: ?>
<!DOCTYPE html>
<html>
    <head>
        <title>SELECT ROOMS</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="bootstrap/css/animate.css">
		<link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/jquery.growl.css">

		

		<script src="bootstrap/js/jquery-1.11.3.min.js"></script>
		<script src="bootstrap/js/jquery.growl.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="bootstrap/js/dataTables.min.js"></script>
		<script src="bootstrap/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>


		<!--WEBSITE CSS/JS -->
		<link rel= "stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<style>

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
	margin-top: 20px;
}


.roombox {
	width: 450px;
	height: 540px;
	text-align: center;
	background-color: #ccc;
	margin-top: 10px;
}
</style>
	</head>
	<body>
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
            <a class="navbar-brand" href="index.php" style="color:#dfab21;">Rosario Resort and Hotel</a>
          </div>
      <ul>
         
        <li class="last"><a href="Contact.html">Contact</a></li>
        <li><a href="Gallery.html">Gallery</a></li>
        <li><a href="Rates.html">Rates</a></li>
         <li><a href="About.html">About</a></li>
        <li><a class="active" href="#home">Home</a></li>
      </ul>
    </div>
  </div><br><br><br><br><br>
			<div class="container" style="margin-left: 80px; background-color: #BCB0A0; width: 90%; height: 1350px;">

				<form method="POST" action="selectroom.php">
			<div class="title">
				<?php include 'crumbcontainerroom.php'; ?><br>
				<h1><center>SELECT ROOM</center></h1>
			</div>
				
				<table class="tablecon" align="center">
				  <tr>
				  	<td align="right">
				  		<div class="roombox">
					<div class="alert alert-info">
						<h3>Presidential(Single)<h3>
					</div>

						<img style="width: 250px; height: 180px;" src="images/presingle.jpg" alt="Presidential(Single)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmsp['Description'] ?></font>

						<h4><br>Room Capacity: Up to <?php echo $rmsp['RoomCapacity']?> </h4><br>
						<h4>Room Rate: <?php echo 'P'.number_format($rmsp['RoomRate'])?> &nbsp;<font size="2">(Per night)</font></h4>
						<h4><select name="Presidential(Single)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php 
						$countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending') AND RoomType = 'Presidential(Single)'  AND 
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate >= '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");
			
						
						$presSrow = mysqli_num_rows($countpsreserved);
						$totalpsrow = mysqli_num_rows($roomSinglePre);
						$presScount = $totalpsrow - $presSrow;
						
						for ($x = 1; $x <= $presScount; $x++) {
								echo "<option value='$x'>$x</option>";
							} 
						?>
						</select><font size="2"><?php
						if($presScount <= 0){
							echo "<br>(No Rooms Available)";
						}else{
							if($presScount > 1){
							echo "<br>(" . $presScount . " Rooms Left)";
						}else{
							echo "<br>(" . $presScount . " Room Left)";
						}
						}
						?></font></h4>
						
				</div></td>
				<td><div class="roombox" style="margin-left: 10px;">
					<div class="alert alert-info">
						<header><h3>Presidential(Double)<h3></header>
					</div>

						<img style="width: 250px; height: 180px;" src="images/predouble.jpg" alt="Presidential(Double)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmdp['Description'] ?></font>
						<h4><br>Room Capacity: Up to <?php echo $rmdp['RoomCapacity']?> </h3><br>
						<h4>Room Rate: <?php echo 'P'.number_format($rmdp['RoomRate'])?><font size="2">(Per night)</font></h3>
						<h4><select name="Presidential(Double)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php 
						$countpdreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending') AND RoomType = 'Presidential(Double)'  AND 
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate >= '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");
			
						
						$presDrow = mysqli_num_rows($countpdreserved);
						$totalpdrow = mysqli_num_rows($roomDoublePre);
						$presDcount = $totalpdrow - $presDrow;
						
						for ($x = 1; $x <= $presDcount; $x++) {
								echo "<option value='$x'>$x</option>";
							} 
						?>
						</select><font size="2"><?php
						if($presDcount <= 0){
							echo "<br>(No Rooms Available)";
						}else{
							if($presDcount > 1){
							echo "<br>(" . $presDcount . " Rooms Left)";
						}else{
							echo "<br>(" . $presDcount . " Room Left)";
						}
						}
						?></font></h4>
				</div></td>
			</tr>
			<tr>
				<td align="right"><div class="roombox">
					<div class="alert alert-info">
						<header><h3>Superior(Single)<h3></header>
					</div>
					<img style="width: 250pxpx; height: 180px;" src="images/supsingle.jpg" alt="Superior(Single)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmss['Description'] ?></font>
						<h4><br>Room Capacity: Up to <?php echo $rmss['RoomCapacity']?> </h3><br>
						<h4>Room Rate: <?php echo 'P'.number_format($rmss['RoomRate'])?><font size="2">(Per night)</font></h3>
						<h4><select name="Superior(Single)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php 
						$countssreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending') AND RoomType = 'Superior(Single)'  AND 
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate >= '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");
			
						
						$supSrow = mysqli_num_rows($countssreserved);
						$totalssrow = mysqli_num_rows($roomSingleSup);
						$supScount = $totalssrow - $supSrow;
						
						for ($x = 1; $x <= $supScount; $x++) {
								echo "<option value='$x'>$x</option>";
							} 
						?>
						</select><font size="2"><?php
						if($supScount <= 0){
							echo "<br>(No Rooms Available)";
						}else{
							if($supScount > 1){
							echo "<br>(" . $supScount . " Rooms Left)";
						}else{
							echo "<br>(" . $supScount . " Room Left)";
						}
						}
						?></font></h4>
				</td>
				<td><div class="roombox" style="margin-left: 10px;">
					<div class="alert alert-info">
						<header><h3>Superior(Double)<h3></header>
					</div>
					<img style="width: 250pxpx; height: 180px;" src="images/supdouble.jpg" alt="Superior(Double)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmds['Description'] ?></font>
						<h4><br>Room Capacity: Up to <?php echo $rmds['RoomCapacity']?> </h3><br>
						<h4>Room Rate: <?php echo 'P'.number_format($rmds['RoomRate'])?><font size="2">(Per night)</font></h3>
						<h4><select name="Superior(Double)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php 
						$countsdreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending') AND RoomType = 'Superior(Double)'  AND 
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate >= '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");
			
						
						$supDrow = mysqli_num_rows($countsdreserved);
						$totalsdrow = mysqli_num_rows($roomDoubleSup);
						$supDcount = $totalsdrow - $supDrow;
						
						for ($x = 1; $x <= $supDcount; $x++) {
								echo "<option value='$x'>$x</option>";
							} 
						?>
						</select><font size="2"><?php
						if($supDcount <= 0){
							echo "<br>(No Rooms Available)";
						}else{
							if($supDcount > 1){
							echo "<br>.(" . $supDcount . " Rooms Left)";
						}else{
							echo "<br>(" . $supDcount . " Room Left)";
						}
						}
						?></font></h4>
				</td>
			</tr>
			</table>	
				<div style="margin-left: 950px;">
					<input type="submit" class="btn btn-success btn-md btn-right" name="reserve" value="Next" style="width: 90px; height: 50px;"></input>
				</div>
				</form>
		</div>
	</body>
	
</html>
					
<?php endif; 
}?>