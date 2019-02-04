<?php
include 'dbconn.php';
include 'scriptvalidation.php';
?>
<?php

if(isset($_POST['submit'])){
  $message = $_POST['message'];
  $to = "davepaulgarciaaa@gmail.com";
  $from = $_POST['email'];
  $subject = "Contact Form | Rosario Resort and Hotel";
  
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <$from>' . "\r\n";
$headers .= 'Cc: $from' . "\r\n";


  mail($to,$subject,$message,$headers);
} 


?>
<!DOCTYPE html>
<html>
<title>Welcome to Rosario Resort and Hotel</title>
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
    background-position: center;
    background-size: cover;
    background-image: url("images/images/gallery (22).jpg");
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
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">ROSARIO RESORT AND HOTEL</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#room" class="w3-bar-item w3-button"> ROOMS</a>
      <a href="#gallery" class="w3-bar-item w3-button"> GALLERY</a>
      <a href="#contact" class="w3-bar-item w3-button"> CONTACT</a>
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
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#room" onclick="w3_close()" class="w3-bar-item w3-button">ROOMS</a>
  <a href="#gallery" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="Guest/_log-in.php" onclick="w3_close()" class="w3-bar-item w3-button">LOG-IN</a>
  <a href="datepickerform.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background: #FFF; color: #000;">BOOK NOW</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small" style="background: #616161">Welcome to our Page</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">Welcome to our Page</span><br>
    <span class="w3-large"><br></span>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <div class="w3-container w3-white w3-padding-16">
      <form action="datepickerform.php" method="post" ">
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-calendar-o"></i> Check In</label>
            <input class="w3-input w3-border" type="text" id="from" name="Check-inDate" placeholder="Choose a date" autocomplete="off" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
          </div>
          <div class="w3-half">
            <label><i class="fa fa-calendar-o"></i> Check Out</label>
            <input class="w3-input w3-border" id="to" name="Check-outDate" placeholder="Choose a date" autocomplete="off" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
          </div>
        </div>
        <div align="right" style="margin-top: 10px">
        <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button></div>
      </form>
    </div>
  </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COMPANY</h3>
  <p class="w3-center w3-large"></p>
  <div class="w3-center" style="margin-top:64px">
    <div>
      <center>
      <i class="fa fa-building w3-margin-bottom w3-jumbo w3-center"></i>
     
      <p class="w3-large">SAMPLE ABOUT: Rosario Resort and Hotel offers services and facilities that has 18 hotel rooms, 1 swimming pool, restaurant, bar and functional rooms.<br> They have 32 regular employees. They have front desk clerks, room attendants, banquets and events crew, restaurant and bar employees and administration.</p>
      </center>
    </div>
    
  </div>
</div>

<!--  -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Rosario Resort and Hotel.</h3>
      <p>18 hotel rooms, 1 swimming pool, restaurant, bar and functional rooms</p>
      <p><a href="#gallery" class="w3-button w3-black"><i class="fa fa-th"> </i> View Our Facilities</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="images/images/gallery (1).jpg" alt="Buildings" width="700" height="394">
    </div>
  </div>
</div>

<!-- Room Section -->
<div class="w3-container" style="padding:128px 16px" id="room">
  <h2 class="w3-center">ROOMS</h2>
  <p class="w3-center w3-large"></p>
  <div class="w3-row-padding" style="margin-top:64px">

  <?php 
    $sql = mysqli_query($conn, "SELECT Distinct RoomType FROM roomtype");
    while($roomt = mysqli_fetch_array($sql)){
        $roomtype = $roomt['RoomType'];
        $query = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = '$roomtype'");
        $rooms = mysqli_fetch_array($query);

  ?>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="Admin/upload/<?php echo $rooms['RoomPhoto']?>" alt="<?php echo $rooms['RoomType']?>" style="width:100%">
        <div class="w3-container">
          <h4><?php echo $rooms['RoomType']?></h4>
          <p class="w3-opacity">For 2 Persons <br> Capacity up to <?php echo $rooms['RoomCapacity']?> persons</p>
          <p><?php echo $rooms['Description']?></p>
          <p><input type="button" value="&#8369;<?php echo $rooms['RoomRate']?>" class="w3-button w3-light-grey w3-block" readonly/></p>
        </div>
      </div>
    </div>
    
    <?php } ?>
  </div>
</div>



<!-- Gallery Section -->
<div class="container" style="padding:128px 16px" id="gallery">
  <h3 class="w3-center">GALLERY</h3>
  <p class="w3-center w3-large">Rooms and Facilities</p>


  <div class="gallery">
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (1).jpg" data-lightbox="mygallery"><img src="images/images/gallery (1).jpg" style="width:100%"> </a>
    </div>
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (2).jpg" data-lightbox="mygallery"><img src="images/images/gallery (2).jpg" style="width:100%"></a>
    </div>
    <div class="w3-col l3 m6">
     <a href="images/images/gallery (3).jpg" data-lightbox="mygallery"><img src="images/images/gallery (3).jpg" style="width:100%"></a>
    </div>
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (4).jpg" data-lightbox="mygallery"><img src="images/images/gallery (4).jpg" style="width:100%"></a>
    </div>
  </div>

  <div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (5).jpg" data-lightbox="mygallery"><img src="images/images/gallery (5).jpg" style="width:100%"></a>
    </div>
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (6).jpg" data-lightbox="mygallery"><img src="images/images/gallery (6).jpg" style="width:100%"></a>
    </div>
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (7).jpg" data-lightbox="mygallery"><img src="images/images/gallery (7).jpg" style="width:100%"></a>
    </div>
    <div class="w3-col l3 m6">
      <a href="images/images/gallery (9).jpg" data-lightbox="mygallery"><img src="images/images/gallery (9).jpg" style="width:100%"></a>
    </div>
  </div>
      

  </div>
</div>

<!-- Pricing Section -->
<!-- <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>PRICING</h3>
  <p class="w3-large">Choose a pricing plan that fits your needs.</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
        <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 10</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-red w3-xlarge w3-padding-48">Pro</li>
        <li class="w3-padding-16"><b>25GB</b> Storage</li>
        <li class="w3-padding-16"><b>25</b> Emails</li>
        <li class="w3-padding-16"><b>25</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 25</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
        <li class="w3-padding-16"><b>50GB</b> Storage</li>
        <li class="w3-padding-16"><b>50</b> Emails</li>
        <li class="w3-padding-16"><b>50</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 50</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
</div> -->

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-half">
      <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> National Highway, Brgy. Quilib, Rosario, 4222 Batangas</p>
      <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: (043) 740 4813</p>
      <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: reserve.rosario@gmail.com</p>
      <br>
      <form action="contact.php" method="post" target="_blank">
        <p><input class="w3-input w3-border" type="text" name="name" placeholder="Full Name" required name="Name"></p>
        <p><input class="w3-input w3-border" type="text" name="email" placeholder="Email" required name="Email"></p>
        <p><input class="w3-input w3-border" type="text" name ="message" placeholder="Message" required name="Message"></p>
        <p>
          <button class="w3-button w3-black" type="submit">
            <i class="fa fa-paper-plane"></i> SEND MESSAGE
          </button>
        </p>
      </form>
    </div>
    <div class="w3-half">
      <!-- Add Google Maps -->
      <div id="googleMap" style="width:100%;height:510px;">
        <iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15494.586961859659!2d121.206586!3d13.860231!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd45d9221f9f1ea35!2sRosario+Resort+and+Hotel!5e0!3m2!1sen!2sph!4v1517279324056" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    
    </div>
  </div>
</div>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/Rosario.Resort/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://www.google.com.ph/search?q=Rosario+Resort+and+Hotel&oq=Rosario+Resort+and+Hotel&aqs=chrome..69i57l2j69i60l4.9849j0j4&sourceid=chrome&ie=UTF-8"><i class="fa fa-google w3-hover-opacity"></i></a>

  </div>
  <p>Copyright © Rosario Resort and Hotel 2018</p>
</footer>
 
<!-- Add Google Maps -->
<script>
/*function myMap()
{
  myCenter=new google.maps.LatLng(13.860231, 121.206586);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}*/

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


</body>
</html>