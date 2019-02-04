<?php


include ('dbconn.php');
include ('scriptvalidation.php');
session_start();

$ctr = 0;
$totalg = 0;
$totalExtra = 0;
$rnum = 0;
$rExtra = 0;
$roomcount = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
$count = mysqli_num_rows($roomcount);
while($ctr < $count){
	
	$rcnum = $_SESSION['roomcount'][$ctr];
	$roomtype = $_SESSION['roomtype'][$ctr];
	$query1 = mysqli_query($conn, "SELECT RoomCapacity FROM roomtype WHERE RoomType = '$roomtype'");
	$row1 = mysqli_fetch_array($query1);
	$cpcty = $row1['RoomCapacity'];
	if($rcnum == 0){
		$rnum=0;
		$rExtra=0;
	}
	else{
		
		$rnum = $rcnum * 2;
		$rExtra = $rcnum * $cpcty;

	}
		$totalg += $rnum;
		$totalExtra += $rExtra - $rnum;
	
		$ctr++;

}

if (!empty($_POST)):


	$adult = $_POST['adult'];
	$modeofpayment = $_POST['modeofpayment'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmnpassword = $_POST['confirmnpassword'];

	$query = mysqli_query($conn,"SELECT Email FROM Guest Where Email = '$email'");
	$check = mysqli_num_rows($query);

		

	if($adult == ' '){
		echo ("<script language='JavaScript'>
			window.alert('There should be atleast 1 adult')
			window.location.href='guestform.php';
			</SCRIPT>");
	}elseif($modeofpayment == ' ') {
		echo ("<script language='JavaScript'>
			window.alert('Please choose a Mode of Payment')
			window.location.href='guestform.php';
			</SCRIPT>");
	}elseif($check != 0){
		echo ("<script language='JavaScript'>
			window.alert('The email is already in use.')
			window.location.href='guestform.php';
			</SCRIPT>");
	} elseif ($password != $confirmnpassword) {
		echo ("<script language='JavaScript'>
			window.alert('Passwords should be the same.')
			window.location.href='guestform.php';
			</SCRIPT>");

	}else{
		
		$_SESSION['firstName'] = $_POST['firstName'];
		$_SESSION['middleName'] = $_POST['middleName'];
		$_SESSION['lastName'] = $_POST['lastName'];

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['mobNum'] = $_POST['mobNum'];
		$_SESSION['gender'] = $_POST['gender'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['adult'] = $adult;
		if ($_POST['adultadd'] == " "){
			$_SESSION['adultadd'] = 0;
		} else {
			$_SESSION['adultadd'] = $_POST['adultadd'];
		}	
		$_SESSION['modeofpayment'] = $modeofpayment;
		$_SESSION['payment'] = $_POST['payment'];
		
		echo ("<script language='JavaScript'>
			window.location.href='reservationsummary.php';
			</SCRIPT>");
	}


?>
<?php else: ?>
<!DOCTYPE html>
<html>
<title>Rosario Resort and Hotel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <script type="text/javascript" src="js/lightbox-plus-jquery.js"></script>
    <script type="text/javascript" scr="js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
	margin-top: 200px;
    background-position: center;
    background-size: cover;
    background-color: white;
    min-height: 100%;
    
}
.w3-bar .w3-button {
    padding: 16px;
}

.gallery{
  margin: 10px 50px;
  text-align: center;
}

.gallery img{
  width: 230px;
  padding: 5px;
  filter: grayscale(100%);
  transition: 1s;
}

.gallery img:hover{
  filter: grayscale(0);
  transform: scale(1.1);
}

#msform {
  width: 370px;
  margin: 50px auto;
  text-align: center;
  position: relative;
  margin-top: 100px;
}

/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: #909090;
  text-transform: uppercase;
  font-size: 10px;
  width: 23%;
  float: left;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: #909090;
  border-radius: 3px;
  margin: 0 auto 5px auto;
  color: white;
}
/*progressbar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: #909090;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: black;
  color: white;
}
</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php#home" class="w3-bar-item w3-button w3-wide">ROSARIO RESORT AND HOTEL</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="index.php#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="index.php#room" class="w3-bar-item w3-button"> ROOMS</a>
      <a href="index.php#gallery" class="w3-bar-item w3-button"> GALLERY</a>
      <a href="index.php#contact" class="w3-bar-item w3-button"> CONTACT</a>
      <a href="Guest/_log-in.php" class="w3-bar-item w3-button"> LOG-IN</a>
      <a href="datepickerform.php" class="w3-bar-item w3-button" style="background: #000; color: #fff;"> BOOK NOW</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.php#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="index.php#room" onclick="w3_close()" class="w3-bar-item w3-button">ROOMS</a>
  <a href="index.php#gallery" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a>
  <a href="index.php#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="Guest/_log-in.php" onclick="w3_close()" class="w3-bar-item w3-button">LOG-IN</a>
  <a href="datepickerform.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background: #FFF; color: #000;">BOOK NOW</a>
</nav>

<!-- <div class="bgimg-1  w3-container w3-grayscale-min">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    
    <span class="w3-large"></span>
  </div> 
  <div class="w3-display-topmiddle w3-text-grey w3-large" style="padding:24px 48px">
    <div id="msform">
     
      <ul id="progressbar">
        <li class="active"><a href="datepickerform">Select Dates</a></li>
        <li class="active"><a href="selectroom.php">Select Rooms</a></li>
        <li class="active">Guest Form</li>
        <li>Summary</li>
      </ul>
    </div>
   </div>
   <div class="w3-display-middle w3-text-grey w3-large" style="padding:24px 48px">
   	<div class="w3-container w3-indigo">
      <h2><i class="w3-margin-right"></i>Registration</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16">
		<form method="POST" action="guestform.php" name="myForm">
			
			<div class="w3-row-padding" style="margin:0 -16px;">
          		<div class="w3-margin-bottom">
          			<input class="w3-input w3-border" type="email" name="email" placeholder="Email" onfocus="this.select()" autocomplete="off" REQUIRED />
          		</div>
			
				<div class="w3-half">
					<input class="w3-input w3-border" type="password" name="password" id="password" placeholder="Password" onkeyup="checkPhone();" onfocus="this.select()" autocomplete="off" style="width: 200px;" REQUIRED />
				</div>
				<div class="w3-half">
					<input class="w3-input w3-border" type="password" name="confirmnpassword" id="confirmnpassword" placeholder="Confirm Password" onkeyup='checkPhone();' onfocus="this.select()" autocomplete="off" style="width: 200px;" REQUIRED />
					<span style="font-size: 14px; margin-right: 130px; width: 200px;" id='message'></span>
				</div>
			</div>
		

	</form>
</div>

  
</div>

</div> -->
<div class="w3-container">
	<div id="msform">
      <ul id="progressbar">
        <li class="active"><a href="datepickerform">Select Dates</a></li>
        <li class="active"><a href="selectroom.php">Select Rooms</a></li>
        <li class="active">Guest Form</li>
        <li>Summary</li>
      </ul>
</div>
<form class="w3-container" method="POST" action="guestform.php" name="myForm">
<h2 class="w3-center">GUEST FORM</h2>
<div class="w3-card-2" style="margin-top: 20px;">
  <div class="w3-container w3-black">
    <h2>Registration</h2>
  </div>
  	
  	<div class="w3-row-padding">

    <p><div>      
    	<input class="w3-input w3-border" type="email" name="email" placeholder="Email" onfocus="this.select()" autocomplete="off" REQUIRED /></div></p>
    <p><div class="w3-half">     
    	<input class="w3-input w3-border" type="password" name="password" id="password" placeholder="Password" onkeyup="checkPhone();" onfocus="this.select()" autocomplete="off" REQUIRED /></div></p>
    <p><div class="w3-half">      
    	<input class="w3-input w3-border" type="password" name="confirmnpassword" id="confirmnpassword" placeholder="Confirm Password" onkeyup='checkPhone();' onfocus="this.select()" autocomplete="off" REQUIRED />.</div></p>
    
	</div>

</div>
<div class="w3-card-2" style="margin-top: 30px;">
  <div class="w3-container w3-black">
    <h2>Personal Information</h2>
  </div>
  <div class="w3-row-padding">

    <p><div class="w3-third">      
    	<input class="w3-input w3-border" type="text" name="firstName" placeholder="First Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);"  autocomplete="off" REQUIRED /></div></p>
    <p><div class="w3-third">      
    	<input class="w3-input w3-border" type="text" name="middleName" placeholder="Middle Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);"  autocomplete="off" REQUIRED/></div></p>
    <p><div class="w3-third">      
    	<input class="w3-input w3-border" type="text" name="lastName" placeholder="Last Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);"  autocomplete="off" REQUIRED/></div></p>
    <p><div class="w3-container">
        <label style="font-size: 18px;">Gender: &nbsp;</label>
        <input type="radio" class="w3-radio" id="r1" name="gender" value= "Female" REQUIRED />
        <label for="r1"><span></span>Female</label>
        <input type="radio" class="w3-radio" id="r2" name="gender" value= "Male"/>
        <label for="r2"><span></span>Male</label></div></p>
    <p><div class="w3-container">
    	<textarea class="w3-input w3-border" name= "address" placeholder="Address" rows= "4" cols= "50" onfocus="this.select()" REQUIRED/></textarea></div></p>
    <p><div class="w3-container">      
    	<input class="w3-input w3-border" type = "text" name = "mobNum" placeholder = "Mobile Number" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" REQUIRED />.</div></p>
    <p><div class="w3-half">
            <label style="font-size: 18px;">Guest(s): &nbsp;</label>
            <select style="width:200;" class="w3-select w3-border" name="adult" REQUIRED>
            <option value=' '>&nbsp;</option>
              <?php for ($x = 1; $x <= $totalg; $x++) {
              echo "<option value='$x'>$x</option>";} ?>
              <br /></select></div></p>
    <p><div class="w3-half">
            <label style="font-size: 18px;">Additional Guest(s): &nbsp;</label>
            <select style="width:200;" class="w3-select w3-border" name="adultadd" REQUIRED>
            <option value=' '>&nbsp;</option>
              <?php for ($x = 1; $x <= $totalExtra; $x++) {
              echo "<option value='$x'>$x</option>";} ?>
              </select> 
            <font color = "#000" size="2"><br><br>*Additional &#8369;800.00<br></font></div></p>


	</div>
</div>
<div class="w3-card-2" style="margin-top: 30px;">
  <div class="w3-container w3-black">
    <h2>Payment Details</h2>
  </div>
  	
  	<div class="w3-row-padding">

    <p><div class="w3-half">       
    	<label style="font-size: 18px;">Mode of Payment: &nbsp;</label>
      <select style="width:200px;" class="w3-select w3-border" name="modeofpayment" REQUIRED>
        <option></option>
        <option value="Bank Deposit">Bank Deposit</option>
        <option value="Paypal">Paypal</option>
    </select><br><br>
    <img height="50px" width="50px" src="images/logos/paypal.png">&nbsp;&nbsp;&nbsp;<img height="60px" width="65px" src="images/logos/banklogo.png"></div></p>
    <p><div class="w3-half">     
    	<label style="font-size: 18px;">Payment: &nbsp;</label>
      <select style="width:200px;" class="w3-select w3-border" name="payment" REQUIRED>
        <option></option>
        <option value="Down Payment">Down Payment</option>
        <option value="Full Payment">Full Payment</option>
    </select></div></p>
  
    
	</div>

</div>
<br>
	<b><input type="submit" class="w3-btn w3-border w3-text-white w3-padding-large w3-block" name="reserve" value="Next >" style="font-size: 20px; background: #616161;"/></b>

</form>
</div>
<br>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/Rosario.Resort/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://www.google.com.ph/search?q=Rosario+Resort+and+Hotel&oq=Rosario+Resort+and+Hotel&aqs=chrome..69i57l2j69i60l4.9849j0j4&sourceid=chrome&ie=UTF-8"><i class="fa fa-google w3-hover-opacity"></i></a>

  </div>
  <p>Copyright © Rosario Resort and Hotel 2018</p>
</footer>
 


<script>

//Gallery Modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//Datepicker JavaScript
$(document).ready(function(){

    $("#from").datepicker({
        minDate: 0,
        maxDate: "+365D",
        numberOfMonths: 1,
        onSelect: function(selected) {
          $("#to").datepicker("option","minDate", selected)
        }
    });
    $("#to").datepicker({
        minDate: 0,
        maxDate:"+365D",
        numberOfMonths: 1,
        onSelect: function(selected) {
           $("#from").datepicker("option", selected)
        }
    }); 
});


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>
 <!--Passsword Validation Script -->
 

<script type="text/javascript">
        function checkPhone() {s
            var phone = document.forms["myForm"]["password"].value;
            var pcon = document.forms["myForm"]["confirmnpassword"].value;
            var phoneNum = phone;
            var p = pcon;


         //    if(phoneNum.length==14) {   
         //        document.getElementById("password").style.borderColor="green";//and you want to remove invalid style
         //         return true;
         // } 
         //     else {
         //     document.getElementById("password").style.borderColor="red";
         //     return false;

         //   }
           if (pcon == phone && phoneNum.length != 0) {
           	document.getElementById("confirmnpassword").style.borderColor="green";//and you want to remove invalid style
                return true;
                alert(pcon);
           }else if (pcon == "" || phone == ""){
           	
            return false;
           }
           else if(pcon != phoneNum && phoneNum.length != 0){
            document.getElementById("confirmnpassword").style.borderColor="red";
            return false;

            }
        }
    </script>
</body>
</html>
<?php endif; ?>