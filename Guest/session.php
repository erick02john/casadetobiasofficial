
<?php
	
	session_start();
	$_SESSION['resID'] = $_POST['resID'];

	print ("<script language='JavaScript'>
        window.location.href='upload/index.php';
        </SCRIPT>");


?>