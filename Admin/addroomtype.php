<?php
	include 'dbconn.php';

if(isset($_POST['addroomtype'])){

	$roomnumber = $_POST['roomnumber'];
	$roomrate = $_POST['roomrate'];
	$roomtype = $_POST['roomtype'];
	$roomcapacity = $_POST['roomcapacity'];
	$description = $_POST['description'];

	$file = rand(1000,100000)."-".$_FILES['file']['name'];
  	$file_loc = $_FILES['file']['tmp_name'];
 	$folder="upload/";
 
 	move_uploaded_file($file_loc,$folder.$file);
 	
 	$rtID = rand(9,999999);
 	
 	$addrm = mysqli_query($conn, "INSERT INTO room (RoomID, RoomStatus) VALUES ('$roomnumber','Unoccupied')") or die("error room");
 	
 	$addrmt = mysqli_query($conn, "INSERT INTO roomtype(RoomTypeID, RoomID, RoomNumber, RoomRate, RoomCapacity, RoomType, Description, RoomPhoto) 
										 VALUES ('$rtID','$roomnumber','$roomnumber','$roomrate','$roomcapacity','$roomtype','$description', '$file')") or die ("error roomtype");
										 
			mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Rooms.php';
			</SCRIPT>");
										 
 } else {
 	print ("<script language='JavaScript'>
		window.location.href='Rooms.php';
		</SCRIPT>");
 
 
 }
 	
 ?>