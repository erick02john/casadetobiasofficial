<?php
if (!empty($_POST)):
session_start();
	$email = ($_POST['Email']);
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
						print ("<script language='JavaScript'>
									window.location.href='index.php';
									</SCRIPT>");
									$_SESSION['Email'] = $dbEmail;
									$_SESSION['Passwords'] = $dbPassword;
									$_SESSION['guestid'] = $dbGuestID;


				}else{
					print "<script language='JavaScript'>
					window.alert('Incorrect Username or Password!')
					window.location.href='_log-in.php';
					</SCRIPT>";

				}
		}else{
			print ("<script language='JavaScript'>
				window.alert('Username and Password does not exists!')
				window.location.href='_log-in.php';
				</SCRIPT>");
		}

?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Casa de Tobias Mountain Resort</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="../css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../css/website/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
	.custwell{
		background: red;
		color: white;
	}
	body{
		background:#ebebe0;
	}
	@import url(http://fonts.googleapis.com/css?family=Roboto);* {
    margin: 0;
	}
	* {
    	margin: 0;
	}

	html, body {
    height: 100%;
    font-family: arial;
	}
	.wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    margin: 0 auto -142px; /* the bottom margin is the negative value of the footer's height */
	}

	.topnav {
  	overflow: hidden;
  	background-color: #158f53;
	}

	.topnav a {
  	float: right;
  	display: block;
  	color: #dfab21;
  	text-align: center;
  	padding: 25px 15px;
  	text-decoration: none;
  	font-size: 20px;
	}

.topnav a:hover {
  background-color: transparent;
  color: black;
}

.navbar-brand:hover{
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: center;
  }

}


/****** LOGIN MODAL ******/
.loginmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  margin-top: 50px;
  margin-bottom: 50px;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;

}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1);
  background-color: #003366;
  padding: 17px 0px;

  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #31708f;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.signmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1);
  background-color: #2ecc71;
  padding: 17px 0px;

  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.signmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #27ae60;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
}

.login-help{
  font-size: 14px;
}



.footer {
  padding: 30px;
  color: #eeeeee;
  background-color: black;
}

.row{
  text-align: center;
}

.grid {
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #222222;
   color: white;
   text-align: center;
}
.fa {
  padding: 20px;
  font-size: 15px;
  width: 25px;
  text-align: center;
  text-decoration: none;
  margin: 7px 4px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}
  </style>
  </head>

  <body>
  <script src="bootstrap/js/bootstrap.min.js"></script>
 <div id="wrapper">
    <div id="header">
      <div class="topnav" id="myTopnav">
        <a class="navbar-brand" href="../index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Casa de Tobias Mountain Resort</a>
  <a href="../datepickerform.php" style=" font-size: 17px;">Reserve</a>
  <a href = "_log-in.php" style="cursor: pointer; font-size: 17px;">Log-In</a>

  <a href="../contactus.php" style=" font-size: 17px;">Contact</a>
  <a href="../gallery.php" style=" font-size: 17px;">Gallery</a>
  <a href="../rates.php" style=" font-size: 17px;">Rates</a>
  <a href="../About.php" style=" font-size: 17px;">About</a>
  <a href="../index.php" class="active" style=" font-size: 17px;">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>




<div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Log-in</h1><br>
				  <form  action='_log-in.php' method='POST'>
					<input type="text" name="Email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
				  <form action="../sign-up.php">
				  	<input type="submit" name="signup" class="login signmodal-submit" value="Sign Up">
				  </form>

				  <div class="login-help">
					<a href="../forgot.php" style="color:red;">Forgot Password?</a>
				  </div>
				</div>
			</div>
<!-- FOOTER -->
  <div class="grid">
  <a href="https://www.facebook.com/Casa-De-Tobias-Mountain-Resort-254137624658146/" target="_blank"></a>
  <a href="https://www.waze.com/en/directions/philippines/nagcarlan/casa-de-tobias-mountain-resort/79560845.795739526.5393912.html" class="fa fa-google" target="_blank"></a>
</div>
    <div id="footer" class="footer">
      <div class="container">
        <div class="row">
            <h4>Contact Us</h4>
            <p><i class="fa fa-home fa-lg" aria-hidden="true"></i> Alibungbungan, Nagcarlan, Laguna </p>
            <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> casadetobiasmountainresort@gmail.com</p>
            <p><i class="fa fa-phone fa-lg" aria-hidden="true"></i> (02) 794 3471 </p>
            <p><i class="fa fa-globe fa-lg" aria-hidden="true"></i> website </p>
          </div>
        </div>
      </div>
</div>
  </div>


        <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>

  </body>
</html>


<?php endif; ?>
