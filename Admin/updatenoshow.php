<?php
include 'dbconn.php';

$date = date('Y-m-d');

$query = mysqli_query($conn, "SELECT * FROM reservation WHERE CheckOutDate <= '$date'") or die("error query");

	while ($row = mysqli_fetch_array($query)){
	$resID = $row['ReservationID'];
	$resnoshow = mysqli_query($conn, "UPDATE reservation SET Status = 'No Show' WHERE ReservationID = '$resID'") or die("error res");
	$rminnoshow = mysqli_query($conn, "UPDATE roominventory SET Status = 'No Show' where ReservationID = '$resID'") or die("error rmin");
		
	
	}





?>