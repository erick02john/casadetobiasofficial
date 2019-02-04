<?php
include 'dbconn.php';
	
if(isset($_POST['updatename'])){
	$guestid = $_POST['guestid'];
	$password = md5($_POST['password']);
	$query = mysqli_query($conn, "SELECT * FROM guest where Password = '$password' and GuestId ='$guestid'") or die ("errorquery");
	$count = mysqli_num_rows($query);
	if(!empty($_POST)){
	$fname = $_POST['fName'];
	$mname = $_POST['mName'];
	$lname = $_POST['lName'];
	if($count == 1){
		mysqli_query($conn, "UPDATE guest set GuestFName = '$fname', GuestMName = '$mname', GuestLName = '$lname' where GuestId = '$guestid'") or die();
		mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Personalinfo.php';
			</SCRIPT>");
	}else{
		print "<script language='JavaScript'>
			   window.alert('Invalid Password')
			   window.location.href='Personalinfo.php';
			   </SCRIPT>";
	}
}
}
if(isset($_POST['updateadd'])){
	$guestid = $_POST['guestid'];
	$password = md5($_POST['password']);
	$query = mysqli_query($conn, "SELECT * FROM guest where Password = '$password' and GuestId ='$guestid'") or die ("errorquery");
	$count = mysqli_num_rows($query);
if(!empty($_POST)){
	$address = $_POST['address'];
if($count == 1){
		mysqli_query($conn, "UPDATE guest set Address = '$address' where GuestId = '$guestid'") or die();
		mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Personalinfo.php';
			</SCRIPT>");
	}else{
		print "<script language='JavaScript'>
			   window.alert('Invalid Password')
			   window.location.href='Personalinfo.php';
			   </SCRIPT>";
	}
}
}
if(isset($_POST['updatenumber'])){
	$guestid = $_POST['guestid'];
	$password = md5($_POST['password']);
	$query = mysqli_query($conn, "SELECT * FROM guest where Password = '$password' and GuestId ='$guestid'") or die ("errorquery");
	$count = mysqli_num_rows($query);
if(!empty($_POST)){
	$number = $_POST['number'];
if($count == 1){
		mysqli_query($conn, "UPDATE guest set ContactNumber = '$number' where GuestId = '$guestid'") or die();
		mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Personalinfo.php';
			</SCRIPT>");
	}else{
		print "<script language='JavaScript'>
			   window.alert('Invalid Password')
			   window.location.href='Personalinfo.php';
			   </SCRIPT>";
	}
}
}

if(isset($_POST['updatepassword'])){
	$guestid = $_POST['guestid'];
	$password = md5($_POST['password']);
	$query = mysqli_query($conn, "SELECT * FROM guest where Password = '$password' and GuestId ='$guestid'") or die ("errorquery");
	$count = mysqli_num_rows($query);
if(!empty($_POST)){

	$newpass = md5($_POST['newpassword']);
	$rnewpass = md5($_POST['rnewpassword']);

if($count == 1){
		if($newpass == $rnewpass){
		mysqli_query($conn, "UPDATE guest set Password = '$rnewpass' where GuestId = '$guestid'") or die("error update");
		mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Personalinfo.php';
			</SCRIPT>");
		}else{
			print "<script language='JavaScript'>
			   window.alert(' sdffs')
			   window.location.href='Personalinfo.php';
			   </SCRIPT>";
	}
		}
	else{
		print "<script language='JavaScript'>
			   window.alert('Invalid Password')
			   window.location.href='Personalinfo.php';
			   </SCRIPT>";
	}
}
}

if(isset($_POST['updateEmail'])){
	$guestid = $_POST['guestid'];
	$password = md5($_POST['password']);
	$query = mysqli_query($conn, "SELECT * FROM guest where Password = '$password' and GuestId ='$guestid'") or die ("errorquery");
	$count = mysqli_num_rows($query);
if(!empty($_POST)){
	$email = $_POST['email'];
if($count == 1){
	$queryEmail = mysqli_query($conn, "SELECT * FROM guest where Password = '$password' and Email ='$email'") or die ("errorquery");
	$countt = mysqli_num_rows($queryEmail);
	if($countt == 0){
		mysqli_query($conn, "UPDATE guest set Email = '$email' where GuestId = '$guestid'") or die();
		mysqli_close($conn);
			print ("<script language='JavaScript'>
			window.location.href='Personalinfo.php';
			</SCRIPT>");
		}else{
			print ("<script language='JavaScript'>
			window.alert('Email is already in use')
			window.location.href='Personalinfo.php';
			</SCRIPT>");
		}
	}else{
		print "<script language='JavaScript'>
			   window.alert('Invalid Password')
			   window.location.href='Personalinfo.php';
			   </SCRIPT>";
	}
}
}



?>