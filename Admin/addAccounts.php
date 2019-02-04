<?php 
include 'dbconn.php';

	$UID = date('Y') . "-" . rand(999,9999999);
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$contactno = $_POST['contactno'];
	$usertype = $_POST['usertype'];

	if(isset($_POST['adds'])){
		$query = mysqli_query($conn, "INSERT INTO accounts (UserID, Username, Password, FullName, ContactNo, UserType, UserStatus) VALUES ('$UID','$username', '$password', '$fullname', '$contactno', '$usertype', 'Active')") or die("error query");


		mysqli_close($conn);
	print ("<script language='JavaScript'>
		window.location.href='Accounts.php';
		</SCRIPT>");

	}
	else{
		print ("<script language='JavaScript'>
		window.location.href='Accounts.php';
		</SCRIPT>");

	}

?>
