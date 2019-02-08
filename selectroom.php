<?php
include ('dbconn.php');
session_start();
$from = $_SESSION['from'];
$to = $_SESSION['to'];

if(empty($from) AND empty($to)){
	echo "<script language='JavaScript'>
							window.alert('Please select date first')

							window.location.href='datepickerform.php';
							</SCRIPT>";

}
else{



$checkIn = $_SESSION['from'];
$time = strtotime($checkIn);
$checkIn = date('Y-m-d', $time);
$_SESSION['from'] = $checkIn;
$checkOut = $_SESSION['to'];
$time = strtotime($checkOut);
$checkOut = date('Y-m-d', $time);
$_SESSION['to'] = $checkOut;
if (!empty($_POST)):

	 $record = mysqli_query($conn, "SELECT DISTINCT RoomType FROM roomtype");
 	while($row=mysqli_fetch_assoc($record)){
 		$counts[]= str_replace(" ","*",$row['RoomType']);
 		$counter[]= $row['RoomType'];
 		$type = $row['RoomType'];

 		$recrate = mysqli_query($conn, "SELECT * FROM roomtype where RoomType = '$type'");
 			$rates=mysqli_fetch_assoc($recrate);
 			$rate[]=$rates['RoomRate'];
	}
$ctr=0;
 $rrs=0;
	$roomcount = mysqli_num_rows($record);
	$ctr=0;
while($ctr < $roomcount){
$rr = $_POST[$counts[$ctr]];
$rrs += $rr;
$total = $rate[$ctr] * $rr;
$_SESSION['roomcount'][$ctr] = $rr;
$_SESSION['roomtype'][$ctr] = $counter[$ctr];
$_SESSION['roomtotal'][$ctr] = $total;
$ctr++;
}
if ($rrs == 0){
echo "<script language='JavaScript'>
							window.alert('Please select atleast one room')
							window.location.href='selectroom.php';
	 						</SCRIPT>";
}else{
		 	echo("<script language='JavaScript'>
				window.location.href='guestform.php';
			</SCRIPT>");

}

?>
<?php else: ?>
<!DOCTYPE html>
<html>
<title>Casa de Tobias Mountain Resort</title>
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

#msform {
  width: 370px;
  margin: 50px auto;
  text-align: center;
  position: relative;
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
<?php
include('navlinks.php');
?>

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


	<form method="POST" action="selectroom.php">

			<!-- Room Section -->
			<div class="w3-container" style="padding:120px 16px">
			<div id="msform">

      			<ul id="progressbar">
        			<li class="active"><a href="datepickerform.php">Select Dates</a></li>
        			<li class="active">Select Rooms</li>
        			<li>Guest Form</li>
        			<li>Summary</li>
      			</ul>
    		</div>
  				<h2 class="w3-center">SELECT ROOMS</h2>
  				<p class="w3-center w3-large"></p>
 			 	<div class="w3-row-padding" style="margin-top:40px">

  					<?php
            			$record = mysqli_query($conn, "SELECT DISTINCT RoomType FROM roomtype");

            			$roomcount = mysqli_num_rows($record);
            			while($row=mysqli_fetch_assoc($record)){
              				$counts[]= str_replace(" ","*",$row['RoomType']);
              				$counter[] = $row['RoomType'];
            			}

            			$ctr=0;

            			while($ctr < $roomcount){

              				$data = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = '$counter[$ctr]'");
              				$rmdt = mysqli_fetch_array($data);
          			?>
    				<div class="w3-row m6 w3-margin-bottom w3-border" style"width:100%">
        					<div class="w3-col l6 w3-padding">
        						<img src="Admin/upload/<?php echo $rmdt['RoomPhoto']?>" alt="<?php echo $rmdt['RoomPhoto']?>" style="width:100%">
        					</div>
        					<div class="w3-col l6 w3-padding">
          						<h4><b><?php echo $counter[$ctr]?></b></h4>
          						<!-- <p class="w3-opacity">(Airconditioned room) Good For 2 Persons</p> -->
          						<p class="w3-opacity"> Capacity up to <?php echo $rmdt['RoomCapacity']?> persons</p>
          						<p><?php echo $rmdt['Description'] ?></p>
          						<h5>&#8369;<?php echo number_format($rmdt['RoomRate'])?>(Per night)</h5>
          						<p><select name="<?php echo $counts[$ctr]?>" style="width: 150px;"><option value=0>&nbsp;</option>

            				<?php
              					$countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = '{$counter[$ctr]}'  AND
              ((CheckInDate >= '$checkIn' and CheckInDate < '$checkOut' )
            or (CheckOutDate > '$checkIn'and CheckOutDate < '$checkOut' ) or (CheckOutDate >= '$checkOut')and(CheckInDate < '$checkIn'))");


            					$presSrow = mysqli_num_rows($countpsreserved);
            					$totalpsrow = mysqli_num_rows($data);
            					$presScount = $totalpsrow - $presSrow;

            						for ($x = 1; $x <= $presScount; $x++) {
                						echo "<option value='$x'>$x</option>";
              						}
            				?>
            					</select><font size="2">
            						<?php
            						if($presScount <= 0){
              								echo "<br>(No Rooms Available)";
            						}else{
              							if($presScount > 1){
              								echo "<br>(" . $presScount . " Rooms Left)";
            							}else{
              								echo "<br>(" . $presScount . " Room Left)";
            							}
            						}
            						?></font>
        					</div>
    				</div>

    				<?php $ctr++;} ?>
  				</div>
  			<div align="right">
          		<b><input type="submit" class="w3-btn w3-border w3-text-white w3-padding-large w3-block" name="reserve" value="Next >" style="font-size: 20px; background: #616161;"/></b>
        </div>
			</div>



		</form>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.facebook.com/Casa-De-Tobias-Mountain-Resort-254137624658146/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a href="https://www.waze.com/en/directions/philippines/nagcarlan/casa-de-tobias-mountain-resort/79560845.795739526.5393912.html"><i class="fa fa-google w3-hover-opacity"></i></a>

  </div>
  <p>Copyright © Casa de Tobias Mountain Resort 2019</p>
</footer>


 <script type="text/javascript">

	 var time = new Date().getTime();
     $(document.body).bind( function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 60000)
             window.location.reload(true);
         else
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000);

</script>
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


</body>
</html>

<?php endif;
}?>
