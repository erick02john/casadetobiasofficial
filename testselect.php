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
	


$checkIn = $_SESSION['from'];
$time = strtotime($checkIn);
$checkIn = date('Y-m-d', $time);
$_SESSION['from'] = $checkIn;
$checkOut = $_SESSION['to'];
$time = strtotime($checkOut);
$checkOut = date('Y-m-d', $time);
$_SESSION['to'] = $checkOut;
if (!empty($_POST)):

	 $record = mysqli_query($conn, "SELECT DISTINCT RoomType FROM roomtype");
 	while($row=mysqli_fetch_assoc($record)){
 		$counts[]= str_replace(" ","*",$row['RoomType']);
 		$counter[]= $row['RoomType'];
 		$type = $row['RoomType'];

 		$recrate = mysqli_query($conn, "SELECT * FROM roomtype where RoomType = '$type'");
 			$rates=mysqli_fetch_assoc($recrate);
 			$rate[]=$rates['RoomRate'];
	}
$ctr=0;
 $rrs=0;
while($ctr < 4){
$rr = $_POST[$counts[$ctr]];
$rrs += $rr;
$total = $rate[$ctr] * $rr;
$_SESSION['roomcount'][$ctr] = $rr;
$_SESSION['roomtype'][$ctr] = $counter[$ctr];
$_SESSION['roomtotal'][$ctr] = $total;
echo  "$counter[$ctr]$rr = $total<br> ";
$ctr++;
}
if ($rrs == 0){
echo "<script language='JavaScript'>
							window.alert('Please select atleast one room')
							window.location.href='testselect.php';
	 						</SCRIPT>";
}else{
		 	echo("<script language='JavaScript'>
				window.location.href='../echos.php';
			</SCRIPT>");
	 
}
	// $presS = $_POST['Presidential(Single)'];

	// $presD = $_POST['Presidential(Double)'];
	// $supS = $_POST['Superior(Single)'];
	// $supD = $_POST['Superior(Double)'];

	// if ($presS == ' ' && $presD == ' ' && $supS == ' ' && $supD == ' '){
	// 	echo "<script language='JavaScript'>
	// 						window.alert('Please select atleast one room')
	// 						window.location.href='selectroom.php';
	// 						</SCRIPT>";
	// } else {
	// 	if($presS != ' '){
	// 		$psRate = $rmsp['RoomRate'];
	// 		$psTotal = $psRate * $presS;
	// 		$_SESSION['presSReservedTotal'] = $psTotal;
	// 		$_SESSION['rmspName'] = 'Presidential(Queen Sized-Bed';
	// 		$_SESSION['presSNum'] = $presS;
	// 	} else {
	// 		$_SESSION['presSReservedTotal'] = ' ';
	// 		$_SESSION['rmspName'] = ' ';
	// 		$_SESSION['presSNum'] = ' ';
	// 	}
	// 	if($presD != ' '){
	// 		$pdRate = $rmdp['RoomRate'];
	// 		$pdTotal = $pdRate * $presD;
	// 		$_SESSION['presDReservedTotal'] = $pdTotal;
	// 		$_SESSION['rmdpName'] = 'Presidential(Twin Sized-Bed)';
	// 		$_SESSION['presDNum'] = $presD;
	// 	} else {
	// 		$_SESSION['presDReservedTotal'] = ' ';
	// 		$_SESSION['rmdpName'] = ' ';
	// 		$_SESSION['presDNum'] = ' ';
	// 	}
	// 	if($supS != ' '){
	// 		$ssRate = $rmss['RoomRate'];
	// 		$ssTotal = $ssRate * $supS;
	// 		$_SESSION['supSReservedTotal'] = $ssTotal;
	// 		$_SESSION['rmssName'] = 'Superior(Queen Sized-Bed)';
	// 		$_SESSION['supSNum'] = $supS;
	// 	} else {
	// 		$_SESSION['supSReservedTotal'] = ' ';
	// 		$_SESSION['rmssName'] = ' ';
	// 		$_SESSION['supSNum'] = ' ';
	// 	}
	// 	if($supD != ' '){
	// 		$sdRate = $rmds['RoomRate'];
	// 		$sdTotal = $sdRate * $supD;
	// 		$_SESSION['supDReservedTotal'] = $sdTotal;
	// 		$_SESSION['rmdsName'] = 'Superior(Twin Sized-Bed)';
	// 		$_SESSION['supDNum'] = $supD;
	// 	} else {
	// 		$_SESSION['supDReservedTotal'] = ' ';
	// 		$_SESSION['rmdsName'] = ' ';
	// 		$_SESSION['supDNum'] = ' ';
	// 	}

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

.roombox {
	width: 1000px;
	height: 400px;
	text-align: center;
	background-color: #ccc;
	margin-top: 10px;
}
</style>
	</head>
	<body>

    <div class="topnav" id="myTopnav">
        <a class="navbar-brand" href="../index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Rosario Resort and Hotel</a>
  <a href="datepickerform.php">Reserve</a>
  <a href = "Guest/_log-in.php">Log-In</a>
  <a href="contact.php" style=" font-size: 17px;">Contact</a>
  <a href="gallery.php" style=" font-size: 17px;">Gallery</a>
  <a href="rates.php" style=" font-size: 17px;">Rates</a>
  <a href="About.php" style=" font-size: 17px;">About</a>
  <a href="index.php" class="active" style=" font-size: 17px;">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
  <br>
			<div class="container" style="margin-left: 80px; width: 90%; height: 1350px;">

				<form method="POST" action="testselect.php">
			<div class="title">
				<?php include 'crumbcontainerroom.php'; ?><br>
				<h1><center>SELECT ROOM</center></h1>
			</div>
				
				<table class="tablecon" align="center">


					<tr>

				<!--TEST START-->

						<?php
						$record = mysqli_query($conn, "SELECT DISTINCT RoomType FROM roomtype");
						
						$roomcount = mysqli_num_rows($record);
 						while($row=mysqli_fetch_assoc($record)){
 							$counts[]= str_replace(" ","*",$row['RoomType']);
 							$counter[] = $row['RoomType'];
						}

 						$ctr=0;
						?>
							
						<?php
								while($ctr < $roomcount){
							
							$data = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = '$counter[$ctr]'");
							$rmdt = mysqli_fetch_array($data);
						?>

						<td align="right">
				  		<div class="roombox">
						<div class="alert alert-info" style="height: 80px;">
						<?php echo "<h3>$counter[$ctr]<h3>"?></div>
						<div align="left"><img style="margin-left:50px; margin-top: 20px; width: 250px; height: 180px;" src="Admin/upload/<?php echo $rmdt['RoomPhoto']?>" alt="<?php echo $counter[$ctr]?>" /><br><br>
						<font size="2" style="margin-left: 100px;">(Airconditioned room)</font>
						<br /><font size="2" style="margin-left: 120px;">(for 2 persons)</font>
						<br /><font size="2" style="margin-left: 40px;"><?php echo $rmdt['Description'] ?></div></font>

						<div style="margin-top: -190px; "><font size="5">Room Capacity: Up to <?php echo $rmdt['RoomCapacity']?> persons<br><br>
						Room Rate: <?php echo 'P'.number_format($rmdt['RoomRate'])?> <font size="2">(Per night)</div></font>
						<div style="text-align: right; margin-right: 80px; margin-top: -80px; "><select name="<?php echo $counts[$ctr]?>" style="width: 150px;"><option value=0>&nbsp;</option>	

						?>
						<?php
							$countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = '{$counter[$ctr]}'  AND 
							((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
						or (CheckOutDate > '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");
			
						
						$presSrow = mysqli_num_rows($countpsreserved);
						$totalpsrow = mysqli_num_rows($data);
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
						?></div></font>
						</td>
						</tr>
						
						<?php $ctr++;} ?>
 				
					
				
				</table>
				<br>
				<div style="margin-left: 150px; margin-right: 150px;">
					<input type="submit" class="btn btn-outline btn-success btn-lg btn-block" name="reserve" value="Next"/>
				</div>
				
				</form>
		</div>
		<script type="text/javascript">
	
	 var time = new Date().getTime();
     $(document.body).bind( function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 60000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000);

</script>
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
					
<?php endif; 
}?>
