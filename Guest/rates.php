<!DOCTYPE html>
<html>
    <head>
        <title>Casa de Tobias Mountain Resort</title>

    <!--WEBSITE CSS/JS -->
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chocolat.css" type="text/css" media="screen">
    <link href="../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" property="" />
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="../js/modernizr-2.6.2.min.js"></script>
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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
.jumbotron{
	padding:25px;
	margin:80px;
	background-color: white;
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

      <div id="content">
</div>

<table class="table table-striped table-bordered">
<div class="jumbotron">
<h3 align="center" style="padding-bottom:30px;">Room Rates</h3>
<div class="row">


<div class="col-md-6">
<div align = "center">
<img src="../Admin/upload/28741-3.0.jpg" alt="small room" class="form-controls" border="5" width="80%">
<h3> Small Kubo - &#x20b1;1500.00</h3>
</div>
</div>
<div class="col-md-6">
<div align="center">
<img src="../Admin/upload/3711-dormitory2.jpg" alt="small room" class="form-controls" border="5" width="100%" >
<h3> Dormitory Clubhouse - &#x20b1;2000.00</h3>
</div><br><br><br><br><br>
</div><div class="col-md-6">
<div align="center">
<img src="../Admin/upload/15505-bigkubo2.jpg" alt="small room" class="form-controls" border="5" width="80%">
<h3> Big Kubo House - &#x20b1;2000.00</h3>
</div>
</div><div class="col-md-6">

</div>
</div>



<a style="color:red;">
*Note:
<br>
Room reservation is available in this website. Furthermore, rooms are subject to availability.
<br>
ADDITIONAL BED = 800 pesos</a>

</table>
</div>


      </div>

      <div class="grid">
  		  <a href="https://www.facebook.com/Casa-De-Tobias-Mountain-Resort-254137624658146/" class="fa fa-facebook style="font-size:48px"" target="_blank"></a>
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
