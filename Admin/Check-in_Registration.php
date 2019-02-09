<?php
session_start();

include ('dbconn.php');
	//guest table
	$GID = date('Y') . "-" . rand(999,99999);
	$fname = $_SESSION['firstName'];
	$mname = $_SESSION['middleName'];
	$lname = $_SESSION['lastName'];
	$address = $_SESSION['address'];
	$gender = $_SESSION['gender'];
	$mnum = $_SESSION['contactNum'];
	$email = $_SESSION['email'];




	//reservation table
	$ResID = rand(9,9999);
	$adult = $_SESSION['adult'];
	$addadult = $_SESSION['adultadd'];
	$CheckInDate = $_SESSION['from'];
	$CheckOutDate = $_SESSION['to'];
	$RevDate = date('Y-m-d');

	$numdays = abs(strtotime($CheckInDate) - strtotime($RevDate))/86400;
	if ($numdays > 7) {
	$ExpirationDate = date('Y-m-d', strtotime($RevDate. ' + 1 days'));
	}else{
		$ExpirationDate = $CheckOutDate;
	}

	$ttlgst = $addadult + 	$adult;


$ctr = 0;
$record = mysqli_query($conn, "SELECT Distinct RoomType FROM roomtype");
$roomcount = mysqli_num_rows($record);
while($row=mysqli_fetch_assoc($record)){
 	$counter[] = $row['RoomType'];
}

while($ctr < $roomcount){
	$data = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = '$counter[$ctr]'");

	$countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = '$counter[$ctr]'  AND
              ((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
            or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");


			$presDrow = mysqli_num_rows($countpsreserved);
			$totalpdrow = mysqli_num_rows($data);
			$presDcount = $totalpdrow - $presDrow;

	if($_SESSION['roomcount'][$ctr] > $presDcount){

    	 echo ("<script language='JavaScript'>
        window.alert('The rooms are already taken')
        window.location.href='selectroom.php';
        </SCRIPT>");
    }
	$ctr++;
}





	$guest = mysqli_query($conn, "INSERT INTO guest (GuestId, GuestFName, GuestMName, GuestLName, Address, Gender, ContactNumber, Email, Password) VALUES ('$GID', '$fname', '$mname', '$lname', '$address', '$gender', '$mnum', '$email')");
	$strrms = "";


	$rec = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
	$roomcount = mysqli_num_rows($rec);
	$ctr=0;
	while($ctr < $roomcount){

		$rr=$_SESSION['roomcount'][$ctr];
		$rrs=$_SESSION['roomtype'][$ctr];
		$rrt=$_SESSION['roomtotal'][$ctr];
		if($rr > 0){
			$counterps = 0;
			$roomSinglePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = '$rrs'");
			while($counterps < $rr){
				while ($rmsp = mysqli_fetch_assoc($roomSinglePre)){
					if ($counterps < $rr){
						$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmsp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending') AND
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
						$countps = mysqli_num_rows($pSemp);

							if($countps == 0){
								$availps = $rmsp['RoomID'];
								$strrms = $strrms." ".$availps;
	 							mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$ResID', '$availps', '$CheckInDate', '$CheckOutDate', 'Pending')");
 								$counterps++;
	 						} else {
	 							echo "skip";
	 						}
					}else{
						break;
					}
				}
			}
		}
	$ctr++;
	}





	$date = date('Y-m-d');
	if ($CheckInDate == $date){
		$resStatus = 'Checked-in';
	}else{
		$resStatus = 'Reserved';
	}
	$reservation = mysqli_query($conn, "INSERT INTO reservation (ReservationID, GuestID, RoomsReserved, NumberOfAdult, ReservationDate, CheckInDate, CheckOutDate, Status)
		VALUES('$ResID', '$GID', '$strrms', '$ttlgst', '$date', '$CheckInDate', '$CheckOutDate', '$resStatus')") or die("error reservation");

	//billing table
	$TotalAmount = $_SESSION['totalroom'];
	$ModeOfPayment = $_SESSION['modeofpayment'];

	$billing = mysqli_query($conn, "INSERT INTO billing (ReservationID, TotalAmount, PaidAmount, Balance, BillingStatus, ModeOfPayment)
		VALUES('$ResID','$TotalAmount', '0.00', '$TotalAmount', 'Pending', '$ModeOfPayment')");

	mysqli_close($conn);

	print ("<script language='JavaScript'>
        window.location.href='Check-in.php';
        </SCRIPT>");


?>
