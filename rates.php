<!DOCTYPE html>
<html>
    <head>
        <title>ROSARIO RESORT AND HOTEL</title>

    <!--WEBSITE CSS/JS -->
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

#content{
  padding-top: 10px;
  text-align: center;
}

#content p{
  box-sizing: border-box;
  text-align: center;
  padding: 10px 10px;
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
        <a class="navbar-brand" href="../index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Rosario Resort and Hotel</a>
  <a href="datepickerform.php">Reserve</a>
  <a href = "Guest/_log-in.php">Log-In</a>
  <a href="contact.php" style=" font-size: 17px;">Contact</a>
  <a href="gallery.php" style=" font-size: 17px;">Gallery</a>
  <a href="rates.php" style=" font-size: 17px;">Rates</a>
  <a href="About.php" style=" font-size: 17px;">About</a>
  <a href="index.php" class="active" style=" font-size: 17px;">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

      <div id="content">
</div>

<div id="rns" class="container">
<h2><p align="center">Room Rates</p></h2>
<table class="table table-striped table-bordered">

<div class="row">

  
  <div class="col-md-6">
    <div align = "center">
    <img src="images/images/room (3).jpg" alt="small room" class="form-controls" border="5" width="80%">
    <h3> Presidential Room (Queen Size Bed) - &#x20b1;3000.00</h3>
    </div>
  </div>
  <div class="col-md-6">
  <div align="center">
    <img src="images/images/room (6).jpg" alt="small room" class="form-controls" border="5" width="80%">
    <h3> Presidential Room (Twin Size Bed) - &#x20b1;3000.00</h3>
    </div>
  </div><div class="col-md-6">
  <div align="center">
    <img src="images/images/room (5).jpg" alt="small room" class="form-controls" border="5" width="80%">
    <h3> Superior Room (Queen Size Bed) - &#x20b1;2000.00</h3>
    </div>
  </div><div class="col-md-6">
  <div align="center">
    <img src="images/images/room (4).jpg" alt="small room" class="form-controls" border="5" width="80%">
    <h3> Superior Room (Twin Size Bed) - &#x20b1;2000.00</h3>
    </div>
  </div>
</div>



<a style="color:red;">
*Note: 
<br>
Room reservation is available in this website. Furthermore, rooms are subject to availability.
<br>
ADDITIONAL BED = 800 pesos</a>
</div>

</table>
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
            <p><i class="fa fa-home fa-lg" aria-hidden="true"></i> National Highway, Brgy. Quilib, Rosario, 4222 Batangas </p>
            <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> reserve.rosario@gmail.com</p>
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

</body>
</html>