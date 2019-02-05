<!DOCTYPE html>
<html>
    <head>
        <title>Casa de Tobias Mountain Resort</title>

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

.rowss{
  text-align: center;
}

.rows {
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
  <a href="index.php">My Account</a>
  <a href="contact.php">Contact</a>
  <a href="gallery.html">Gallery</a>
  <a href="rates.html">Rates</a>
  <a href="about.php">About</a>
  <a href="home.php" class="active">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</div>

      <div id="content">
        <div class="grid">
    <div class="shadowundertop"></div>
    <div class="row">

        <h1 class="maintitle "><br>
        <span >ABOUT THE COMPANY</span>
        </h1>
        <center>
        <img src="../images/image.jpg" width="300" height="250" alt = "About">
        <img src="../images/image2.jpg" width="300" height="250" alt = "About">
        <br>
        <br>
        <br>
        <center><p>
          Casa de Tobias Mountain Resort and Hotel offers services and facilities that has 18 hotel rooms, 1 swimming pool, restaurant, bar and functional rooms.<br> They have 32 regular employees. They have front desk clerks, room attendants, banquets and events crew, restaurant and bar employees and administration.<br>
        </p></center>

        <br><br><br>
          <div class="clearfix">
          </div>
        </div>
      </div>
    </div>

    <div class="rows">
  <a href="https://www.facebook.com/Rosario.Resort/" class="fa fa-facebook" target="_blank"></a>
  <a href="https://www.google.com.ph/search?q=rosario+resort+and+gotel&oq=rosario+resort+and+gotel&aqs=chrome..69i57l2j69i60l4.9849j0j4&sourceid=chrome&ie=UTF-8" class="fa fa-google" target="_blank"></a>
</div>
    <div id="footer" class="footer">
      <div class="container">
        <div class="rowss">
            <h4>Contact Us</h4>
            <p><i class="fa fa-home fa-lg" aria-hidden="true"></i> Alibungbungan, Nagcarlan, Laguna </p>
            <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> casadetobiasmountainresort@gmail.com</p>
            <p><i class="fa fa-phone fa-lg" aria-hidden="true"></i> (043) 740 4813 </p>
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
