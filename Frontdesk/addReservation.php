<?php

	include 'dbconn.php';

	$fname = $_POST['firstName'];
	$mname = $_POST['middleName'];
	$lname = $_POST['lastName'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$pnum = $_POST['mobNum'];
	$email = $_POST['email'];
	$NoA = $_POST['NumberofAdult'];
	$NoC = $_POST['NumberofChild'];
	$RDate = date('Y-m-d');
	$CiD = $_POST['Check-inDate'];
	$CoD = $_POST['Check-outDate'];
	$ExpDate = $_POST['Check-inDate'];
	$AmountPaid = $_POST['amountpaid'];
	$roomNumber = $_POST['RoomNumber'];
	$Status = "Pending";
	$GID = date('Y') . "-" . rand(999,99999);
	$resID = rand(9,999);


	if(isset($_POST['register'])){
    	$query = "INSERT INTO guest (GuestId, GuestFName, GuestMName, GuestLName, Address, Gender, ContactNumber, Email)
    	VALUES('$GID','$fname', '$mname', '$lname', '$address', '$gender', '$pnum', '$email')";

    	$Res = "INSERT INTO Reersvation (ReservationID, GuestID, RoomID, NumberOfAdult, NumberOfChild, ReservationDate, CheckInDate, CheckOutDate, ExpirationDate, Status, AmountPaid)
    	VALUES('$resID', '$GID', '$roomNumber', '$NoA','$NoC', '$RDate', '$CiD', '$CoD', $ExpDate', '$Status','$AmountPaid')";
    	
    	$update = mysqli_query($conn, "UPDATE Room SET RoomStatus = 'Occupied' where RoomID = '$roomNumber'") or die ("no connection update");
    	mysqli_query($conn, $query) or die ("no connection que");
    	mysqli_query($conn, $Res) or die ("no connection res");
 		mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Reservationform.php';
		</SCRIPT>");
 		
    }
 ?>