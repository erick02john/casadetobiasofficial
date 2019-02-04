<!DOCTYPE html>
<html>
<head>
	   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php

	session_start();
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	include('dbconn.php');
		$checkLoginName = mysqli_query($conn, "SELECT * FROM guest WHERE Email ='$email'");
		$numrows = mysqli_num_rows($checkLoginName); 
		if($numrows!=0){
				while($row = mysqli_fetch_assoc($checkLoginName)){
					$dbEmail = $row['Email'];
					$dbPassword = $row['Password'];
					$dbGuestID = $row['GuestId'];
				}
				if($email==$dbEmail and $password==$dbPassword){
					?>
						  <div class="panel-body">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Success! <a href="#" class="alert-link"></a>.
                            </div>
					<?php
						print ("<script language='JavaScript'> 
									window.location.href='index.php';
									</SCRIPT>");
									$_SESSION['Email'] = $dbEmail;
									$_SESSION['Passwords'] = $dbPassword;
									$_SESSION['guestid'] = $dbGuestID;
							
					
				}else{?>

							<div class="panel-body">
 								<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Incorrect Username or Password!.
                            </div>
                        </div>
				<?php
					
				}
		}else{?>
		<div class="panel-body">
		 <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                User does not exist. <a href="sign-up.php" class="alert-link">Sign-up</a>.
                            </div></div>
		<?php }
	
	
?>
<!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>