<?php 
	include 'dbconn.php';
	$userid = $_POST['userid'];
	
	if(isset($_POST['delete'])){

	$updateroom = mysqli_query($conn, "DELETE FROM accounts where UserID = '$userid'") or die ("no connection updateroom");
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