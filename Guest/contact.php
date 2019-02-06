<!DOCTYPE html>
<head>

	<title>Contact</title>

	<!--CSS-->
	<link rel= "stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        <a class="navbar-brand" href="../index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Casa de Tobias Mountain Resort</a>
  <a href="index.php">My Account</a>
  <a href="Contact.php">Contact</a>
  <a href="gallery.html">Gallery</a>
  <a href="rates.html">Rates</a>
  <a href="about.php">About</a>
  <a href="home.php" class="active">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</div>

    <div id="contact" class="contact">
    	<div class="container">
    		<div class="row">
    			<h2>Contact</h2>
    			<p>For more inquiries send us an E-mail.</p>
    			<form action="mailto:someone@example.com" method="post" enctype="text/plain">
    			<div class="col-lg-6 col-mj-6">
    				<div class="input-group input-group-lg">
    					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
    					<input class="form-control" type="text" name="name" aria-describedby="sizing-addon1" placeholder="fullname">
    				</div>
    				<div class="input-group input-group-lg">
    					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
    					<input class="form-control" type="email" name="mail" aria-describedby="sizing-addon1" placeholder="email">
    				</div>
    				<div class="input-group input-group-lg">
    					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
    					<input class="form-control" type="phone" aria-describedby="sizing-addon1" placeholder="phone">
    				</div>

    			</div>
    			<div class="col-lg-6 col-mj-6">
    				<div class="input-group">
    					<textarea cols="80" rows="6" class="form-control"></textarea>
    				</div>
    				<button class="btn btn-lg" >Submit your message</button>
    			</div>
    			</form>
    		</div>
    		<div class="map">
    			<h2>Location</h2>
    			<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d16122.454019686036!2d121.40985074751899!3d14.153485976700352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x33bd59965aaaaaab%3A0xbd2e2e6cb805ecdd!2sCasa+De+Tobias+Mountain+Resort%2C+Alibungbungan%2C+Nagcarlan%2C+Laguna!3m2!1d14.153554499999998!2d121.4149029!5e1!3m2!1sen!2sph!4v1548942171554" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    		</div>
    	</div>

    </div>

    <div class="grid">
  <a href="https://www.facebook.com/Casa-De-Tobias-Mountain-Resort-254137624658146/" class="fa fa-facebook" target="_blank"></a>
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
