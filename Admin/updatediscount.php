<?php
include 'dbconn.php';



if (isset($_POST['update'])){
	$dID = $_POST['did'];
$dT = $_POST['dt'];
$dP = $_POST['dp'];
$query = mysqli_query($conn, "UPDATE discount SET DiscountType = '$dT', DiscountPercent = '$dP' where DiscountID = '$dID'") or die ("error");
mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Discounts.php';
		</SCRIPT>");
}

if(isset($_POST['delete'])){
$dID = $_POST['did'];
mysqli_query($conn, "DELETE FROM discount where DiscountID = '$dID'") or die ("error");
mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Discounts.php';
		</SCRIPT>");
}
if(isset($_POST['add'])){
$dT = $_POST['dt'];
$dP = $_POST['dp'];

$query = mysqli_query($conn, "INSERT INTO discount (DiscountType, DiscountPercent) VALUES ('$dT','$dP')") or die ("error");
mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Discounts.php';
		</SCRIPT>");
}




?>