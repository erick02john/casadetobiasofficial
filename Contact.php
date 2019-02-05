<?php

if(isset($_POST['submit'])){
  $message = $_POST['message'];
  $to = "casadetobiasmountainresort@gmail.com";
  $from = $_POST['email'];
  $subject = "Contact Form | Casa de Tobias Mountain Resort";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <$from>' . "\r\n";
$headers .= 'Cc: $from' . "\r\n";


  mail($to,$subject,$message,$headers);
}








?>
<!DOCTYPE html>
<head>

	<title>Contact</title>

	<!--CSS-->
	<link rel= "stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<style>
	* {
    margin: 0;
}
html, body {
    height: 100%;
}
.wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    margin: 0 auto -142px; /* the bottom margin is the negative value of the footer's height */
}

.topnav {
  overflow: hidden;
  background-color: #003366;
}

.topnav a {
  float: right;
  display: block;
  color: #dfab21;
  text-align: center;
  padding: 25px 15px;
  text-decoration: none;
  font-size: 17px;
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

.contact{
	margin-top: 10px;
	padding: 50px 0 80px;
	text-align: center;
}

.contact p {
	padding-bottom: 80px;
	color: #737373;
}

.contact h2{
	color: #4c4c4c;
	margin: 20px 0 20px;
}

.contact .input-group{
	margin-bottom: 25px;
}

.contact .form-control {
	border-radius: 0 !important;
}

.contact span{
	border-radius: 0 !important;
}

.contact .btn{
	border-radius: 0;
	width: 100%;
	font-size: 15px;
	background-color: #f08080;
	color: #fff;
}

.contact .btn: hover {
	background-color: #a85959 !important;
	color: #fff !important;
}

.contact .map{
	margin-top: 50px;
}

.gmap {
	background: white;
	border: 1px solid #ccc;
	padding: 4px;
	width: 100%;
	height: 374px;
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
	<div id="wrapper">
      <div id="header">
        <div class="topnav" id="myTopnav">
        <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Casa de Tobias Mountain Resort</a>
  <a href="datepickerform.php">Reserve</a>
  <a href = "Guest/_log-in.php">Log-In</a>
  <a href="Contact.php">Contact</a>
  <a href="gallery.php">Gallery</a>
  <a href="rates.php">Rates</a>
  <a href="About.php">About</a>
  <a href="index.php" class="active">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</div>

    <div id="contact" class="contact">
      <div class="container">
        <div class="row">
          <h2>Contact</h2>
          <p>For more inquiries send us an E-mail.</p>
          <form action="contact.php" method="post" enctype="text/plain">
          <div class="col-lg-6 col-mj-6">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              <input class="form-control" type="text" name="name" aria-describedby="sizing-addon1" placeholder="fullname">
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              <input class="form-control" type="email" name="email" aria-describedby="sizing-addon1" placeholder="email">
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
              <input class="form-control" type="phone" aria-describedby="sizing-addon1" placeholder="phone">
            </div>

          </div>
          <div class="col-lg-6 col-mj-6">
            <div class="input-group">
              <textarea cols="80" rows="6" class="form-control" name ="message"></textarea>
            </div>
            <button class="btn btn-lg" name="submit">Submit your message</button>
          </div>
          </form>
        </div>
        <div class="map">
          <h2>Location</h2>
          <iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15494.586961859659!2d121.206586!3d13.860231!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd45d9221f9f1ea35!2sRosario+Resort+and+Hotel!5e0!3m2!1sen!2sph!4v1517279324056" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

    </div>

     <div class="grid">
  <a href="https://www.facebook.com/Rosario.Resort/" class="fa fa-facebook" target="_blank"></a>
  <a href="https://www.google.com.ph/search?q=rosario+resort+and+gotel&oq=rosario+resort+and+gotel&aqs=chrome..69i57l2j69i60l4.9849j0j4&sourceid=chrome&ie=UTF-8" class="fa fa-google" target="_blank"></a>
</div>
    <div id="footer" class="footer">
      <div class="container">
        <div class="row">
            <h4>Contact Us</h4>
            <p><i class="fa fa-home fa-lg" aria-hidden="true"></i> Alibungbungan, Nagcarlan, Laguna </p>
            <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> casadetobiasmountainresort.com</p>
            <p><i class="fa fa-phone fa-lg" aria-hidden="true"></i> (043) 740 4813 </p>
            <p><i class="fa fa-globe fa-lg" aria-hidden="true"></i> website </p>
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

<script>
$(document).ready(function(){
    $('#characterLeft').text('150 characters left');
    $('#message').keydown(function () {
        var max = 150;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');
        }
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');
        }
    });
});

</script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
