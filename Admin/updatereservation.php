<?php 
include 'dbconn.php';

$resID = $_POST['reservationid'];
$status = $_POST['status'];
$date = date('Y-m-d');
$join = mysqli_query($conn, "SELECT RoomID from roominventory Where ReservationID = '$resID'") or die("error join");

if(isset($_POST['update'])){

	if($_POST['status'] == 'Checked-in'){
		$res = mysqli_query($conn, "UPDATE reservation SET Status = '$status' where ReservationID = '$resID'") or die("error res");
		$rin = mysqli_query($conn, "UPDATE roominventory SET Status = '$status' where ReservationID = '$resID'") or die("error rin");

		while($row = mysqli_fetch_assoc($join)){
		$roomstat = $row['RoomID'];
		$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Occupied' where RoomID = '$roomstat'") or die("error room");
		}

		mysqli_close($conn);
		print ("<script language='JavaScript'>
		window.location.href='Reserved.php';
		</SCRIPT>");
		}elseif($_POST['status'] == 'Pending'){
				echo "<script language='JavaScript'>
				window.alert('Please select a valid status')
				window.location.href='Pending.php';
				</SCRIPT>";
			}elseif($_POST['status'] == 'Reserved'){
			
			$amountentered = $_POST['amountentered'];
			$query = mysqli_query($conn, "SELECT * FROM billing where ReservationID = '$resID'");
			$row = mysqli_fetch_assoc($query);
			$pa = $row['PaidAmount'];
			$balance = $row['Balance'];

			if($balance == 0 and $amountentered > 0){
				echo "<script language='JavaScript'>
				window.alert('Guest is already settled the account')
				window.location.href='Pending.php';
				</SCRIPT>";
			}elseif($amountentered > $balance){
				echo "<script language='JavaScript'>
				window.alert('Please Enter a much lesser value')
				window.location.href='Pending.php';
				</SCRIPT>";
			}elseif($amountentered < 0){
				echo "<script language='JavaScript'>
				window.alert('Please Enter a much more value')
				window.location.href='Pending.php';
				</SCRIPT>";
			}
			if($balance >= 0){

			$totalbalance = $balance - $amountentered;
			$totalamoutpaid = $amountentered + $pa;

			if($totalbalance == "0.00"){
				mysqli_query($conn, "UPDATE billing SET Balance = '$totalbalance', PaidAmount = '$totalamoutpaid', BillingStatus = 'Fully Paid' where ReservationID = '$resID'") or die ("no connection updates");
				$res = mysqli_query($conn, "UPDATE reservation SET Status = '$status' where ReservationID = '$resID'") or die("error res");
		 		$rin = mysqli_query($conn, "UPDATE roominventory SET Status = '$status' where ReservationID = '$resID'") or die("error rin");
		 		mysqli_close($conn);
				print ("<script language='JavaScript'>
				window.location.href='Reserved.php';
				</SCRIPT>");
			}else{
			mysqli_query($conn, "UPDATE billing SET Balance = '$totalbalance', PaidAmount = '$totalamoutpaid' where ReservationID = '$resID'") or die ("no connection updates");
			$res = mysqli_query($conn, "UPDATE reservation SET Status = '$status' where ReservationID = '$resID'") or die("error res");
		 	$rin = mysqli_query($conn, "UPDATE roominventory SET Status = '$status' where ReservationID = '$resID'") or die("error rin");
			mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Reserved.php';
			</SCRIPT>");
 			}
		 
		}
	
}
	
}elseif(isset($_POST['updaterev'])){
	if($_POST['status'] == 'Checked-in'){
	
	
		$query = mysqli_query($conn, "SELECT * FROM reservation WHERE ReservationID = '$resID'");
		$row = mysqli_fetch_array($query);
		 	$checkIn = $row['CheckInDate'];
		 if($checkIn > $date){
		 	echo "<script language='JavaScript'>
				window.alert('Current date and Check-in date is not the same.')
				window.location.href='Reserved.php';
				</SCRIPT>";	
		 }else{

			$amountentered = $_POST['amountentered'];
			$query = mysqli_query($conn, "SELECT * FROM billing where ReservationID = '$resID'");
			$row = mysqli_fetch_assoc($query);
			$pa = $row['PaidAmount'];
			$balance = $row['Balance'];

			if($balance == 0 and $amountentered > 0){
				echo "<script language='JavaScript'>
				window.alert('Guest is already settled the account')
				window.location.href='Reserved.php';
				</SCRIPT>";
			}elseif($amountentered > $balance){
				echo "<script language='JavaScript'>
				window.alert('Please Enter a much lesser value')
				window.location.href='Reserved.php';
				</SCRIPT>";
			}elseif($amountentered < 0){
				echo "<script language='JavaScript'>
				window.alert('Please Enter a much more value')
				window.location.href='Reserved.php';
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
				$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Occupied' where RoomID = '$roomstat'") or die("error room");
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
				$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Occupied' where RoomID = '$roomstat'") or die("error room");
			}
			mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Check-in.php';
			</SCRIPT>");
 			}
 		}
	}
	
	}elseif($_POST['status'] == 'Reserved'){
		echo "<script language='JavaScript'>
			window.alert('Please select a valid status')
			window.location.href='Reserved.php';
				</SCRIPT>";
	}elseif($_POST['status'] == 'No Show'){
		$res = mysqli_query($conn, "UPDATE reservation SET Status = '$status' where ReservationID = '$resID'") or die("error res");
		 	$rin = mysqli_query($conn, "UPDATE roominventory SET Status = '$status' where ReservationID = '$resID'") or die("error rin");
	}
}else{
print ("<script language='JavaScript'>
		window.location.href='Reserved.php';
		</SCRIPT>");
}
?>