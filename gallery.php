<!DOCTYPE html>
<html>
    <head>
        <title>ROSARIO RESORT AND HOTEL</title>

    <!--WEBSITE CSS/JS -->
    <link rel= "stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <script type="text/javascript" src="js/lightbox-plus-jquery.js"></script>
    <script type="text/javascript" scr="js/lightbox-plus-jquery.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <style>
* {
    margin: 0;
}
html, body {
    height: 100%;
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

h1{
  text-align: center;
  padding-top: 10px;
  color: black;
  margin: 30px 50px;
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
        <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Rosario Resort and Hotel</a>
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

      <div id="content">
        <h1>Gallery</h1>

        <div class="gallery">
        <a href="images/images/gallery (1).jpg" data-lightbox="mygallery"><img src="images/images/gallery (1).jpg"></a>
        <a href="images/images/gallery (2).jpg" data-lightbox="mygallery"><img src="images/images/gallery (2).jpg"></a>
        <a href="images/images/gallery (3).jpg" data-lightbox="mygallery"><img src="images/images/gallery (3).jpg"></a>
        <a href="images/images/gallery (4).jpg" data-lightbox="mygallery"><img src="images/images/gallery (4).jpg"></a>
        <a href="images/images/gallery (5).jpg" data-lightbox="mygallery"><img src="images/images/gallery (5).jpg"></a>
        <a href="images/images/gallery (6).jpg" data-lightbox="mygallery"><img src="images/images/gallery (6).jpg"></a>
        <a href="images/images/gallery (7).jpg" data-lightbox="mygallery"><img src="images/images/gallery (7).jpg"></a>
        <a href="images/images/gallery (9).jpg" data-lightbox="mygallery"><img src="images/images/gallery (9).jpg"></a>
        <a href="images/images/gallery (10).jpg" data-lightbox="mygallery"><img src="images/images/gallery (10).jpg"></a>
        <a href="images/images/gallery (11).jpg" data-lightbox="mygallery"><img src="images/images/gallery (11).jpg"></a>
        <a href="images/images/gallery (12).jpg" data-lightbox="mygallery"><img src="images/images/gallery (12).jpg"></a>
        <a href="images/images/gallery (13).jpg" data-lightbox="mygallery"><img src="images/images/gallery (13).jpg"></a>
        <a href="images/images/gallery (15).jpg" data-lightbox="mygallery"><img src="images/images/gallery (15).jpg"></a>
        <a href="images/images/gallery (16).jpg" data-lightbox="mygallery"><img src="images/images/gallery (16).jpg"></a>
        <a href="images/images/gallery (17).jpg" data-lightbox="mygallery"><img src="images/images/gallery (17).jpg"></a>
        <a href="images/images/gallery (18).jpg" data-lightbox="mygallery"><img src="images/images/gallery (18).jpg"></a>
        <a href="images/images/gallery (19).jpg" data-lightbox="mygallery"><img src="images/images/gallery (19).jpg"></a>
        <a href="images/images/gallery (20).jpg" data-lightbox="mygallery"><img src="images/images/gallery (20).jpg"></a>
        <a href="images/images/gallery (21).jpg" data-lightbox="mygallery"><img src="images/images/gallery (21).jpg"></a>
        <a href="images/images/gallery (22).jpg" data-lightbox="mygallery"><img src="images/images/gallery (22).jpg"></a>
        <a href="images/images/gallery (23).jpg" data-lightbox="mygallery"><img src="images/images/gallery (23).jpg"></a>
        <a href="images/images/gallery (24).jpg" data-lightbox="mygallery"><img src="images/images/gallery (24).jpg"></a>
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