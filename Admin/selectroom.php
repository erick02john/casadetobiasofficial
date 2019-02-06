<?php
include ('dbconn.php');
session_start();

$type = $_SESSION['UserType'];

if(!empty($_SESSION['Username'])){
if($type != 'Admin' AND $type == 'Frontdesk'){
     echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../_login.php';
        </SCRIPT>");}
}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../_login.php';
        </SCRIPT>");
}

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
al
?>
<?php else: ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Casa de Tobias - Walk-in</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">


    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style type="text/css">
    	.roombox {
			width: 1000px;
			height: 400px;
			text-align: center;
			background-color: #ccc;
			margin-top: 10px;
		}
	</style>

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Casa de Tobias Mountain Resort</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">


        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="Setting.php">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-book"></i>
            <span>Transactions</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Reservation:</h6>
            <a class="dropdown-item" href="Pending.php">Pending</a>
            <a class="dropdown-item" href="Reserved.php">Reserved</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header"></h6>
            <a class="dropdown-item" href="Check-in.php">Check-in</a>
            <a class="dropdown-item" href="Check-out.php">Check-out</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Rooms.php">
            <i class="fas fa-bed"></i>
            <span>Rooms</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Billing.php">
            <i class="fas fa-file-invoice-dollar"></i>
            <span>Billing</span></a>
        </li>
        <?php if ($type == 'Admin'){ ?>
        <li class="nav-item">
          <a class="nav-link" href="Accounts.php">
            <i class="far fa-address-card"></i>
            <span>Accounts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Discounts.php">al
            <i class="far fa-address-card"></i>
            <span>Discount</span></a>
       </li>
       <?php } ?>
       <li class="nav-item active">
          <a class="nav-link href="datepickerform.php">
            <i class="far fa-address-card"></i>
            <span>Walk-in</span></a>
       </li>
       <?php if ($type == 'Admin'){ ?>
       <li class="nav-item">
          <a class="nav-link" href="Report.php">
            <i class="far fa-address-card"></i>
            <span>Reports</span></a>
       </li>
       <?php } ?>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="datepickerform.php">Select Date</a></li>
            <li class="breadcrumb-item active" style="color: green; aria-current="page">Select Room</a></li>
            <li class="breadcrumb-item">Guest Form</li>
            <li class="breadcrumb-item">Summary</li>
          </ol>

           <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Casa de Tobias Mountain Resort 2019</span>
            </div>
          </div>
        </footer>

			<div class="container">

				<form method="POST" action="selectroom.php">
			<div class="title">

				<h1><center>SELECT ROOM</center></h1>
			</div>

				<table class="tablecon" align="center">


					<tr>

				<!--TEST START-->

						<?php
						$record = mysqli_query($conn, "SELECT DISTINCT RoomType FROM roomtype");

						$roomcount = mysqli_num_rows($record);
 						while($row=mysqli_fetch_assoc($record)){
 							$counts[]= str_replace(" ","*",$row['RoomType']);
 							$counter[] = $row['RoomType'];
						}

 						$ctr=0;
						?>

						<?php
						while($ctr < $roomcount){

							$data = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = '$counter[$ctr]'");
							$rmdt = mysqli_fetch_array($data);
						?>

						<td align="right">
				  		<div class="roombox">
						<div class="alert alert-info" style="height: 80px;">
						<?php echo "<h3>$counter[$ctr]<h3>"?></div>
						<div align="left"><img style="margin-left:50px; margin-top: 20px; width: 250px; height: 180px;" src="upload/<?php echo $rmdt['RoomPhoto']?>" alt="<?php echo $counter[$ctr]?>" /><br><br>
						<font size="2" style="margin-left: 100px;">(Airconditioned room)</font>
						<br /><font size="2" style="margin-left: 120px;">(for 2 persons)</font>
						<br /><font size="2" style="margin-left: 40px;"><?php echo $rmdt['Description'] ?></div></font>

						<div style="margin-top: -190px; "><font size="5">Room Capacity: Up to <?php echo $rmdt['RoomCapacity']?> persons<br><br>
						Room Rate: <?php echo 'P'.number_format($rmdt['RoomRate'])?> <font size="2">(Per night)</div></font>
						<div style="text-align: right; margin-right: 80px; margin-top: -80px; "><select name="<?php echo $counts[$ctr]?>" style="width: 150px;"><option value=0>&nbsp;</option>

						?>
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
						</select><font size="2"><?php
						if($presScount <= 0){
							echo "<br>(No Rooms Available)";
						}else{
							if($presScount > 1){
							echo "<br>(" . $presScount . " Rooms Left)";
						}else{
							echo "<br>(" . $presScount . " Room Left)";
						}
						}
						?></div></font>
						</td>
						</tr>

						<?php $ctr++;} ?>



				</table>
				<br>
				<div style="margin-left: 150px; margin-right: 150px;">
					<input type="submit" class="btn btn-outline btn-success btn-lg btn-block" name="reserve" value="Next"/>
				</div>

				</form>
		</div>
	</br>

  <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>



<!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>



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
           $("#from").datepicker("option", selecd)
        }
    });
});



</script>



</body>
</html>


<?php endif;
}?>
