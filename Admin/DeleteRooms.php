<?php
include 'dbconn.php';

$roomNumber = $_POST['roomid'];
$now = date('Y-m-d');
$date = date('Y-m-d', strtotime($now. ' + 1 year')); 

if(isset($_POST['delete'])){
	$stat = mysqli_query($conn, "SELECT * FROM room r JOIN roominventory ri ON r.RoomID = ri.RoomID WHERE ri.RoomID = '$roomNumber' and (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND ((CheckInDate >= '$now' and CheckInDate < '$date' )
            or (CheckOutDate >= '$now' and CheckOutDate < '$date' ) or (CheckOutDate >= '$date')and(CheckInDate < '$now'))");
    $statcnt = mysqli_num_rows($stat); 
    if ($statcnt != 0) {
    	print ("<script language='JavaScript'>
    	window.alert('You cannot delete this room.')
		window.location.href='Rooms.php';
		</SCRIPT>");
    } else {

	$updateroom = mysqli_query($conn, "DELETE FROM roominventory where RoomID = '$roomNumber'") or die ("no connection updateroom");
	$updateroom = mysqli_query($conn, "DELETE FROM roomtype where RoomID = '$roomNumber'") or die ("no connection updateroom");
	$update = mysqli_query($conn, "DELETE FROM room where RoomID = '$roomNumber'") or die ("no connection update");

	
	mysqli_close($conn);
	print ("<script language='JavaScript'>
		window.location.href='Rooms.php';
		</SCRIPT>");
	}
}else{
		
		print ("<script language='JavaScript'>
		window.location.href='Rooms.php';
		</SCRIPT>");
	}

?>