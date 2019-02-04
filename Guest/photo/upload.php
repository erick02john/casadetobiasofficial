<?php

include '../dbconn.php';
session_start();
$resID = $_SESSION['resID'];
if(isset($_POST['upload']))
{  
 	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 
 	$folder="upload/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO Reservation(Photo) VALUES('$file') WHERE ReservationID = '$resID'";
 mysqli_query($conn, $sql); 
}

echo ("<script language ='JavaScript''>
window.location.href ='index.php'; 
</SCRIPT>");
?>