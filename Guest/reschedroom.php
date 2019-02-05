<?php
include ('dbconn.php');
session_start();
$from = $_SESSION['from'];
$to = $_SESSION['to'];

$resID = $_SESSION['resID'];

$query = mysqli_query($conn, "SELECT * FROM roominventory WHERE ReservationID = '$resID'");
while($res = mysqli_fetch_array($query)){
	$room = $res['RoomID'];
	$query2 = mysqli_query($conn, "SELECT RoomType FROM roomtype WHERE RoomID = '$room'");
	$check = mysqli_fetch_array($query2);




}


if(empty($from) AND empty($to)){
	echo "<script language='JavaScript'>
							window.alert('Please select date first')

							window.location.href='rescheduledate.php';
							</SCRIPT>";

}
else{

$roomSinglePre = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Presidential(Queen Sized-Bed)'");
$rmsp = mysqli_fetch_array($roomSinglePre);
$roomDoublePre = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Presidential(Twin Sized-Bed)'");
$rmdp = mysqli_fetch_array($roomDoublePre);
$roomSingleSup = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Superior(Queen Sized-Bed)'");
$rmss = mysqli_fetch_array($roomSingleSup);
$roomDoubleSup = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Superior(Twin Sized-Bed)'");
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
							window.location.href='walkinselectroom.php';
							</SCRIPT>";
	} else {
		if($presS != ' '){
			$psRate = $rmsp['RoomRate'];
			$psTotal = $psRate * $presS;
			$_SESSION['presSReservedTotal'] = $psTotal;
			$_SESSION['rmspName'] = 'Presidential(Queen Sized-Bed)';
			$_SESSION['presSNum'] = $presS;
		} else {
			$_SESSION['presSReservedTotal'] = ' ';
			$_SESSION['rmspName'] = ' ';
			$_SESSION['presSNum'] = ' ';
		}
		if($presD != ' '){
			$pdRate = $rmdp['RoomRate'];
			$pdTotal = $pdRate * $presD;
			$_SESSION['presDReservedTotal'] = $pdTotal;
			$_SESSION['rmdpName'] = 'Presidential(Twin Sized-Bed)';
			$_SESSION['presDNum'] = $presD;
		} else {
			$_SESSION['presDReservedTotal'] = ' ';
			$_SESSION['rmdpName'] = ' ';
			$_SESSION['presDNum'] = ' ';
		}
		if($supS != ' '){
			$ssRate = $rmss['RoomRate'];
			$ssTotal = $ssRate * $supS;
			$_SESSION['supSReservedTotal'] = $ssTotal;
			$_SESSION['rmssName'] = 'Superior(Queen Sized-Bed)';
			$_SESSION['supSNum'] = $supS;
		} else {
			$_SESSION['supSReservedTotal'] = ' ';
			$_SESSION['rmssName'] = ' ';
			$_SESSION['supSNum'] = ' ';
		}
		if($supD != ' '){
			$sdRate = $rmds['RoomRate'];
			$sdTotal = $sdRate * $supD;
			$_SESSION['supDReservedTotal'] = $sdTotal;
			$_SESSION['rmdsName'] = 'Superior(Twin Sized-Bed)';
			$_SESSION['supDNum'] = $supD;
		} else {
			$_SESSION['supDReservedTotal'] = ' ';
			$_SESSION['rmdsName'] = ' ';
			$_SESSION['supDNum'] = ' ';
		}
		echo("<script language='JavaScript'>
				window.location.href='reschedguest.php';
				</SCRIPT>");
	}
?>
<?php else: ?>
<!DOCTYPE html>
<html>
    <head>
        <title>SELECT ROOMS</title>
		<link rel= "stylesheet" href="../css/mystyle.css">
    	<link rel="stylesheet" href="../css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="../js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="bootstrap/css/animate.css">
		<link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/jquery.growl.css">
<!--


		<script src="bootstrap/js/jquery-1.11.3.min.js"></script>
		<script src="bootstrap/js/jquery.growl.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="bootstrap/js/dataTables.min.js"></script>
		<script src="bootstrap/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css"/> -->

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
          <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; margin-left: 80px;">Casa de Tobias Mountain Resort</a>
          <div class="nav navbar-nav">

              </div>
      </div>
  </nav>

		<br><br><br>
	<div class="container">

      	<?php include 'crumbreschedroom.php'; ?>
          <h2><center>SELECT ROOM</center></h2>

			<form method="POST" action="reschedroom.php">
				<table class="tablecon" align="center">
				  <tr>
				  	<td>
				  		<div class="roombox">
						<div class="alert alert-info" style="background-color: #002366; color: #fff;">
							<h4>Presidential(Queen Sized-Bed)<h4>
						</div>

						<img style="width: 180px; height: 130px;" src="../Admin/upload/<?php echo $rmsp['RoomPhoto']?>" alt="Presidential(Queen Sized-Bed)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmsp['Description'] ?></font>
						<br>
						<h4>Room Capacity: Up to <?php echo $rmsp['RoomCapacity']?> </h4>
						<h4>Room Rate: <?php echo 'P'.number_format($rmsp['RoomRate'])?> &nbsp;<font size="2">(Per night)</font></h4>
						<h4><select name="Presidential(Single)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php
						$countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = 'Presidential(Queen Sized-Bed)'  AND
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate > '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");


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
				<td><div class="roombox">
					<div class="alert alert-info" style="background-color: #002366; color: #fff;">
						<h4>Presidential(Twin Sized-Bed)</h4>
					</div>

						<img style="width: 180px; height: 130px;" src="../Admin/upload/<?php echo $rmdp['RoomPhoto']?>" alt="Presidential(Twin Sized-Bed)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmdp['Description'] ?></font><br>
						<h4>Room Capacity: Up to <?php echo $rmdp['RoomCapacity']?> </h3>
						<h4>Room Rate: <?php echo 'P'.number_format($rmdp['RoomRate'])?><font size="2">(Per night)</font></h3>
						<h4><select name="Presidential(Double)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php
						$countpdreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = 'Presidential(Twin Sized-Bed)'  AND
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate > '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");


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

				<td><div class="roombox">
					<div class="alert alert-info" style="background-color: #002366; color: #fff;">
						<header><h4>Superior(Queen Sized-Bed)</h4></header>
					</div>
					<img style="width: 180px; height: 130px;" src="../Admin/upload/<?php echo $rmss['RoomPhoto']?>" alt="Superior(Queen Sized-Bed)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmss['Description'] ?></font><br>
						<h4>Room Capacity: Up to <?php echo $rmss['RoomCapacity']?> </h3>
						<h4>Room Rate: <?php echo 'P'.number_format($rmss['RoomRate'])?><font size="2">(Per night)</font></h3>
						<h4><select name="Superior(Single)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php
						$countssreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = 'Superior(Queen Sized-Bed)'  AND
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate > '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");


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
				<td><div class="roombox">
					<div class="alert alert-info" style="background-color: #002366; color: #fff;">
						<header><h4>Superior(Twin Sized-Bed)</h4></header>
					</div>
					<img style="width: 180px; height: 130px;" src="../Admin/upload/<?php echo $rmds['RoomPhoto']?>" alt="Superior(Twin Sized-Bed)" />
						<br><font size="2">(Airconditioned room)
						<br />(for 2 persons)
						<br /><?php echo $rmds['Description'] ?></font><br>
						<h4>Room Capacity: Up to <?php echo $rmds['RoomCapacity']?> </h3>
						<h4>Room Rate: <?php echo 'P'.number_format($rmds['RoomRate'])?><font size="2">(Per night)</font></h3>
						<h4><select name="Superior(Double)" style="width: 150px;"><option value=' '>&nbsp;</option>
						<?php
						$countsdreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = 'Superior(Twin Sized-Bed)'  AND
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate > '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");


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
							echo "<br>(" . $supDcount . " Rooms Left)";
						}else{
							echo "<br>(" . $supDcount . " Room Left)";
						}
						}
						?></font></h4>
				</td><br>
			</tr>
			</table>
			<div align="right">
					<input type="submit" class="btn btn-success btn-md btn-right" name="reserve" value="Next" style="width: 100px; height: 50px;"/>
				</div>
			</div>

				</form>


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


<?php endif;
}?>
