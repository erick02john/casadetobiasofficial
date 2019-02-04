


<?php
	
	session_start();
	$_SESSION['resID'] = $_POST['resID'];
	$_SESSION['from'] = $_POST['checkIn'];
	$_SESSION['to'] = $_POST['checkOut'];

	print ("<script language='JavaScript'>
        window.location.href='Modifyroomdate.php';
        </SCRIPT>");


?>