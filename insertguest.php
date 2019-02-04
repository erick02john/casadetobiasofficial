<?php
include('dbconn.php');


if(isset($_POST['add'])){
$GID = date('Y') . "-" . rand(999,99999);
$email = $_POST['email'];

	$query = mysqli_query($conn,"SELECT Email FROM Guest Where Email = '$email'");
	$check = mysqli_num_rows($query);
	if($check != 0){
		echo ("<script language='JavaScript'>
			window.alert('The email is already in use.')
			window.location.href='sign-up.php';
			</SCRIPT>");
	}
	
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$mnum = $_POST['number'];
if($password == $repassword){
$queryEmail = mysqli_query($conn, "SELECT * FROM guest where Email ='$email'") or die ("errorquery");
	$countt = mysqli_num_rows($queryEmail);
	if($countt == 0){
		$ppassword = md5($repassword);
		$guest = mysqli_query($conn, "INSERT INTO guest (GuestId, GuestFName, GuestMName, GuestLName, Address, Gender, ContactNumber, Email, Password) VALUES ('$GID', '$fname', '$mname', '$lname', '$address', '$gender', '$mnum', '$email', '$ppassword')");
		mysqli_close($conn);
		
		print ("<script language='JavaScript'>
			window.alert('Your account has been created.')
			window.location.href='Guest/_log-in.php';
			</SCRIPT>");
			
		}else{
			print ("<script language='JavaScript'>
			window.alert('Email is already in use')
			window.location.href='sign-up.php';
			</SCRIPT>");
		}
}else{
	echo "error";
}







}

?>