<!DOCTYPE html>
<html>
    <head>
        <title>Casa de Tobias Mountain Resort</title>

    <!--WEBSITE CSS/JS -->

        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/prettify-1.0.css" rel="stylesheet">
        <link href="./css/base.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="../js/modernizr-2.6.2.min.js"></script>
        <!--fonts-->
        <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script> -->

       <link rel="stylesheet" type="text/css" href="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.css">
    <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="bootstrap/js/jquery.growl.js"></script>
    <script src="bootstrap/js/dataTables.min.js"></script>
    <script src="bootstrap/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.js"></script>

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

.content{
  margin-bottom: 50px;
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
  padding: 8px;
  font-size: 15px;
  width: 30px;
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
<?php
include('navlinksguest.php');
?>

<br>
	<div class="container">
      <form action="datepickerform.php" method="POST">
      <center><h2>Please select your <strong>Check-in</strong> and <strong>Check-out</strong> dates to confirm.</h2></center> <br><br>

      <div class="col-md-6 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="from" name="Check-inDate" placeholder="Check-IN Date" onkeypress="return restrictCharacters(this, event, dateOnly);" />
        </div>
      </div>

      <div class="col-md-6 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="to" name="Check-outDate" placeholder="Check-Out Date" onkeypress="return restrictCharacters(this, event, dateOnly);" />

        </div>
      </div>
      <div align="right">

        <a><button type="submit" class="btn btn-lg btn-cust btn-right" name="next" id="nextbtn"  style="background-color: #003366; color: yellow; width: 100px;">NEXT</button></a>
      </div>

    </form>
    </div>

    <br><br><br><br>

  <!-- FOOTER -->
    <div class="grid">
  <a href="https://www.facebook.com/Casa-De-Tobias-Mountain-Resort-254137624658146/" class="fa fa-facebook"></a>
  <a href="https://www.waze.com/en/directions/philippines/nagcarlan/casa-de-tobias-mountain-resort/79560845.795739526.5393912.html" class="fa fa-google"></a>
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

</div>
<script type="text/javascript">

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
