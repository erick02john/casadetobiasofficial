<?php
include 'dbconn.php';

$resID = $_POST['reservationid'];
$status = $_POST['status'];
$join = mysqli_query($conn, "SELECT RoomID from roominventory Where ReservationID = '$resID'") or die("error join");

if(isset($_POST['update'])){
		if($_POST['status'] == 'Checked-out'){

		if(empty($_POST['amountentered'])){
			$amountentered = 0;
		}else{
			$amountentered = $_POST['amountentered'];
		}
			$query = mysqli_query($conn, "SELECT * FROM billing where ReservationID = '$resID'");
			$row = mysqli_fetch_assoc($query);
			$pa = $row['PaidAmount'];
			$balance = $row['Balance'];

			if($balance == 0 and $amountentered > 0){
				echo "<script language='JavaScript'>
				window.alert('Guest is already settled the account')
				window.location.href='Check-in.php';
	 			</SCRIPT>";
			}elseif($amountentered > $balance){
				echo "<script language='JavaScript'>
				window.alert('Please Enter a much lesser value')
				window.location.href='Check-in.php';
				</SCRIPT>";
			}elseif($amountentered < 0){
				echo "<script language='JavaScript'>
				window.alert('Please Enter a much more value')
				window.location.href='Check-in.php';
				</SCRIPT>";
			}
			if($balance >= 0){
			$totalbalance = $balance - $amountentered;
			$totalamoutpaid = $amountentered + $pa;

			if($totalbalance == "0.00"){
				mysqli_query($conn, "UPDATE billing SET Balance = '$totalbalance', PaidAmount = '$totalamoutpaid', BillingStatus = 'Fully Paid' where ReservationID = '$resID'") or die ("no connection updates");
				$res = mysqli_query($conn, "UPDATE reservation SET Status = '$status' where ReservationID = '$resID'") or die("error res");
		 		$rin = mysqli_query($conn, "UPDATE roominventory SET Status = '$status' where ReservationID = '$resID'") or die("error rin");

		 		while($row = mysqli_fetch_assoc($join)){
					$roomstat = $row['RoomID'];
					$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Unoccupied' where RoomID = '$roomstat'") or die("error room");
				}

		 		mysqli_close($conn);
				print ("<script language='JavaScript'>
				window.location.href='Check-in.php';
				</SCRIPT>");
			}else{
			mysqli_query($conn, "UPDATE billing SET Balance = '$totalbalance', PaidAmount = '$totalamoutpaid' where ReservationID = '$resID'") or die ("no connection updates");
			$res = mysqli_query($conn, "UPDATE reservation SET Status = '$status' where ReservationID = '$resID'") or die("error res");
		 	$rin = mysqli_query($conn, "UPDATE roominventory SET Status = '$status' where ReservationID = '$resID'") or die("error rin");

		 	while($row = mysqli_fetch_assoc($join)){
				$roomstat = $row['RoomID'];
				$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Unoccupied' where RoomID = '$roomstat'") or die("error room");
			}
			mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Check-in.php';
			</SCRIPT>");
 			}
		}
 		}else{
 		print ("<script language='JavaScript'>
		window.location.href='Check-in.php';
		</SCRIPT>");
 		}
}else{
	print ("<script language='JavaScript'>
	window.location.href='Check-in.php';
	</SCRIPT>");
	}
?>
