		<?php
	include 'dbconn.php';

	$userid = $_POST['userid'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$contactno = $_POST['contactno'];
	$usertype = $_POST['usertype'];
	$userstatus = $_POST['userstatus'];

	if(isset($_POST['update'])){
		$update = mysqli_query($conn, "UPDATE accounts SET UserName = '$username', Password = '$password', FullName = '$fullname', ContactNo = '$contactno', UserType = '$usertype', UserStatus = '$userstatus' where UserID = '$userid'") or die ("no connection update");
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