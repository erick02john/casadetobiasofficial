 <?php
	include 'dbconn.php';

if(isset($_POST['add'])){

	$roomnumber = $_POST['roomnumber'];
		$roomnum = mysqli_query($conn, "SELECT * FROM room WHERE RoomID = '$roomnumber'");
		$count = mysqli_num_rows($roomnum);
	if ($count > 0) {
			print ("<script language='JavaScript'>
			window.alert('The room number is already existing!')
			window.location.href='Rooms.php';
		</SCRIPT>");
	} else {
		$roomtype = $_POST['roomtype'];
		$file = rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$folder="upload/";
			move_uploaded_file($file_loc,$folder.$file);
      if ($roomtype == 'Small Kubo'){
  			$roomrate = 1500.00;
  			$roomcapacity = 2;
			$description = 'Breakfast and swimming pool pass for 2 persons';

			$rtID = rand(9,999999);


			$room = mysqli_query($conn, "INSERT INTO room (RoomID, RoomStatus) VALUES ('$roomnumber','Unoccupied')") or die("error room");
			$update = mysqli_query($conn, "UPDATE roomtype SET RoomPhoto = '$file' where RoomType = '$roomtype'") or die ("no connection update");
			$roomtype = mysqli_query($conn, "INSERT INTO roomtype(RoomTypeID, RoomID, RoomNumber, RoomRate, RoomCapacity, RoomType, Description)
										 VALUES ('$rtID','$roomnumber','$roomnumber','$roomrate','$roomcapacity','$roomtype','$description')") or die ("error roomtype");




			mysqli_close($conn);
      print ("<script language='JavaScript'>
			window.location.href='Rooms.php';
			</SCRIPT>");

		} elseif ($roomtype == 'Big Kubo House'){
			$roomrate = 2000.00;
			$roomcapacity = 6;
			$description = 'Breakfast and swimming pool pass for 2 persons';



			$rtID = rand(9,999999);


			$room = mysqli_query($conn, "INSERT INTO room (RoomID, RoomStatus) VALUES ('$roomnumber','Unoccupied')") or die("error room");
			$update = mysqli_query($conn, "UPDATE roomtype SET RoomPhoto = '$file' where RoomType = '$roomtype'") or die ("no connection update");

			$roomtype = mysqli_query($conn, "INSERT INTO roomtype(RoomTypeID, RoomID, RoomNumber, RoomRate, RoomCapacity, RoomType, Description)
										 vALUES ('$rtID','$roomnumber','$roomnumber','$roomrate','$roomcapacity','$roomtype','$description')") or die ("error roomtype");



			mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Rooms.php';
			</SCRIPT>");

		}elseif ($roomtype == 'Dormitory Clubhouse'){
			$roomrate = 2000.00;
			$roomcapacity = 8;
			$description = 'Breakfast and swimming pool pass for 2 persons';



			$rtID = rand(9,999999);


			$room = mysqli_query($conn, "INSERT INTO room (RoomID, RoomStatus) VALUES ('$roomnumber','Unoccupied')") or die("error room");
			$update = mysqli_query($conn, "UPDATE roomtype SET RoomPhoto = '$file' where RoomType = '$roomtype'") or die ("no connection update");

			$roomtype = mysqli_query($conn, "INSERT INTO roomtype(RoomTypeID, RoomID, RoomNumber, RoomRate, RoomCapacity, RoomType, Description)
										 vALUES ('$rtID','$roomnumber','$roomnumber','$roomrate','$roomcapacity','$roomtype','$description')") or die ("error roomtype");



			mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Rooms.php';
			</SCRIPT>");

		}else {
			print ("<script language='JavaScript'>
			window.alert('Select a valid Room type!')
			window.location.href='Rooms.php';
			</SCRIPT>");
		}


	}
}else{
	print ("<script language='JavaScript'>
	window.location.href='Rooms.php';
	</SCRIPT>");
}

?>
