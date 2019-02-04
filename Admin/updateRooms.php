<?php
include 'dbconn.php';

if(isset($_POST['updateRooms'])){
$roomrate = $_POST['roomrate'];
$roomtype = $_POST['roomtype'];
$roomcapacity = $_POST['roomcapacity'];
$description = $_POST['description'];

$file = rand(1000,100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
 
 	$folder="upload/";
 
 move_uploaded_file($file_loc,$folder.$file);
 
	$update = mysqli_query($conn, "UPDATE roomtype SET RoomRate = '$roomrate', RoomCapacity = '$roomcapacity', Description = '$description', RoomPhoto = '$file' where RoomType = '$roomtype'") or die ("no connection update");
		mysqli_close($conn);
print ("<script language='JavaScript'>
		window.location.href='Rooms.php';
		</SCRIPT>");

}elseif(isset($_POST['update'])){
if(!empty($_POST['roomstatus']) and !empty($_POST['roomid'])){
$date = date('Y-m-d');
$roomNumber = $_POST['roomid'];
$roomrate = $_POST['roomrate'];
$roomtype = $_POST['roomtype'];
$roomcapacity = $_POST['roomcapacity'];
$roomstatus = $_POST['roomstatus'];
	if($roomstatus == 'Undermaintenance'){
		$checkroom = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Checked-in')  AND 
							((CheckInDate >= '$date' and CheckInDate <= '$date' )
						or (CheckOutDate >= '$date'and CheckOutDate <= '$date' ) or (CheckOutDate >= '$date')and(CheckInDate <= '$date')) AND rt.RoomID = '$roomNumber'") or die ("error checkroom");
		$count = mysqli_num_rows($checkroom);

		if($count == 0){
			$update = mysqli_query($conn, "UPDATE room SET RoomStatus = '$roomstatus' where RoomID = '$roomNumber'") or die ("no connection update");
		mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Rooms.php';
		</SCRIPT>");
		}else{
			echo "<script language='JavaScript'>
				window.alert('The room has been booked for today')
				window.location.href='Rooms.php';
				</SCRIPT>";
		}

	}else{
	$update = mysqli_query($conn, "UPDATE room SET RoomStatus = '$roomstatus' where RoomID = '$roomNumber'") or die ("no connection update");

	$updateroom = mysqli_query($conn, "UPDATE roomtype SET RoomRate = $roomrate, RoomCapacity = $roomcapacity  where RoomID = '$roomNumber'") or die ("no connection updateroom");

mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Rooms.php';
		</SCRIPT>");

}
}
}

?>