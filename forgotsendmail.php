<?php
include 'dbconn.php';
$for_email = $_POST['email'];

if (isset($_POST['sendmail'])){
	if (!empty($for_email)){
	$result = mysqli_query($conn, "SELECT * FROM guest WHERE Email = '$for_email'");
	$count= mysqli_num_rows($result);
	 if ($count == 0){
	 	echo "<div class='alert alert-warning'>
    			<strong><center>Warning!</strong> Your email is not registered.</center>
  			</div>";
  		include 'forgot.php';
	 }else{
	 	$for_email=$_POST['email'];
	 	$randpass = rand(1000000,9999999);
    $encpass = md5($randpass);
	 	$query = mysqli_query($conn, "UPDATE guest SET Password = '$encpass' WHERE Email = '$for_email' ");

        $for_email=$_POST['email'];

        $to      = $for_email;
        $subject = 'Casa de Tobias Mountain Resort | Forgot Password';
        $message = '

        Greetings!

        Your account password is below.

        ------------------------
        Password: '.$randpass.'
        ------------------------

        You can change your password in your account for the security of your account.

        ';

       $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: <casadetobiasmountainresort@gmail.com>' . "\r\n";
	$headers .= 'Cc: casadetobiasmountainresort@gmail.com' . "\r\n";

	mail($to,$subject,$message,$headers);


        echo "<div class='alert alert-success'>
    			<strong><center>Success!</strong> Your password has been sent to your email.</center>
  			</div>";
          include 'forgot.php';



	 }
  }else{
  	echo "<div class='alert alert-danger'>
    			<center>Invalid. Enter your email.</center>
  			</div>";
  		include 'forgot.php';
  }

}else{
	echo("<script language='JavaScript'>
				window.location.href='forgot.php';
				</SCRIPT>");
}

?>
