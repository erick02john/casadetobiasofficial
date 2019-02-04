<?php
session_start();

include ('dbconn.php');
	//guest table
	$GID = $_SESSION['guestid'];


	//reservation table
	$resID = $_SESSION['resID'];
	$adult = $_SESSION['adult'];
	$addadult = $_SESSION['adultadd'];
	$CheckInDate = $_SESSION['from'];
	$CheckOutDate = $_SESSION['to'];
	$ttlgst = $addadult + 	$adult;

	$result = mysqli_query($conn, "SELECT RoomID from roominventory Where ReservationID = '$resID'") or die("error result");


	$strrms = "";
	$counterps = 0;

	$delete = mysqli_query($conn, "DELETE FROM roominventory WHERE ReservationID = '$resID'");
	

	$roomSinglePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Presidential(Queen Sized-Bed)'");
	while($counterps < $_SESSION['presSNum']){
	while ($rmsp = mysqli_fetch_assoc($roomSinglePre)){
	if ($counterps < $_SESSION['presSNum']){
		$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmsp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND 
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countps = mysqli_num_rows($pSemp);

	if($countps == 0){
		$availps = $rmsp['RoomID'];
		$strrms = $strrms." ".$availps;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availps', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$counterps++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}
}

	$counterpd = 0;

	$roomDoublePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Presidential(Twin Sized-Bed)'");
	while($counterpd < $_SESSION['presDNum']){
	while ($rmdp = mysqli_fetch_assoc($roomDoublePre)){
	if ($counterpd < $_SESSION['presDNum']){
		$pDemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmdp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND 
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countpd = mysqli_num_rows($pDemp);

	if($countpd == 0){
		$availpd = $rmdp['RoomID'];
		$strrms = $strrms." ".$availpd;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availpd', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$counterpd++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}	
}


	$counterss = 0;

	$roomSingleSup = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Superior(Queen Sized-Bed)'");
	while($counterss < $_SESSION['supSNum']){
	while ($rmss = mysqli_fetch_assoc($roomSingleSup)){
	if ($counterss < $_SESSION['supSNum']){
		$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmss['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND 
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countss = mysqli_num_rows($pSemp);

	if($countss == 0){
		$availss = $rmss['RoomID'];
		$strrms = $strrms." ".$availss;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availss', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$counterss++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}	
}


$countersd = 0;

	$roomDoubleSup = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Superior(Twin Sized-Bed)'");
	while($countersd < $_SESSION['supDNum']){
	while ($rmds = mysqli_fetch_assoc($roomDoubleSup)){
	if ($countersd < $_SESSION['supDNum']){
		$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmds['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND 
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countsd = mysqli_num_rows($pSemp);

	if($countsd == 0){
		$availsd = $rmds['RoomID'];
		$strrms = $strrms." ".$availsd;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availsd', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$countersd++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}	
}

	$result2 = mysqli_query($conn, "SELECT RoomID from roominventory Where ReservationID = '$resID'") or die("error result");
	while($row = mysqli_fetch_assoc($result2)){
					$roomstat = $row['RoomID'];
					$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Occupied' where RoomID = '$roomstat'") or die("error room");
				}

	$reservation = mysqli_query($conn, "UPDATE reservation SET RoomsReserved = '$strrms', CheckInDate = '$CheckInDate', CheckOutDate = '$CheckOutDate',  NumberOfAdult = '$ttlgst' where ReservationID = '$resID'") or die("error reservation");

	//billing table
	$TotalAmount = $_SESSION['totalroom'];

	$bill = mysqli_query($conn, "SELECT * from billing where ReservationID = '$resID'");
	$row = mysqli_fetch_array($bill);
	$paidamount = $row['PaidAmount'];

	$totalbalance = $TotalAmount - $paidamount;
	$billing = mysqli_query($conn, "UPDATE billing set TotalAmount = '$TotalAmount', Balance = '$totalbalance' where ReservationID = '$resID'");
print ("<script language='JavaScript'> 
	window.location.href='index.php';
	</SCRIPT>");
	$_SESSION['guestid'] = $GID;

?>