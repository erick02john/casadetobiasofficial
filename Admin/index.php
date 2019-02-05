<?php
session_start();
include("../dbconn.php");
$name = $_SESSION['Name'];
$type = $_SESSION['UserType'];

if(!empty($_SESSION['Username'])){
if($type != 'Admin' AND $type != 'Frontdesk'){
     echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../__login.php';
        </SCRIPT>");}
}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../__login.php';
        </SCRIPT>");
}
?><?php
include 'dbconn.php';
$reservation='';
$dates='';

$sql = mysqli_query($conn, "SELECT Distinct MONTH(ReservationDate) as 'months', YEAR(ReservationDate) as 'years' FROM reservation order by ReservationDate ASC") or die("err");
while($row = mysqli_fetch_array($sql)){

  $month = $row['months'];
  $year = $row['years'];
  $date = date('F', mktime(0,0,0,$row['months']))." ".$row['years'];
  $query = mysqli_query($conn, "SELECT * from reservation where MONTH(ReservationDate)='$month' and YEAR(ReservationDate)='$year'") or die("errrr");
  $resnum = mysqli_num_rows($query);
  $dates = $dates.'"'.$date.'", ';
  $reservation = $reservation.$resnum.', ';

}
$dates = trim($dates, ",");
$reservation = trim($reservation, ",");
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <!-- <meta http-equiv="refresh" content="3"> -->
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <style type="text/css">

.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(../loader3.gif) center no-repeat #fff;
}

    </style>
  </head>

  <body id="page-top">
<div class="se-pre-con"></div>
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">CASA DE TOBIAS</a>

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
            <a class="dropdown-item"><?php echo "$name"; ?></a>
            <a class="dropdown-item"><?php echo "$type"; ?></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
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
          <a class="nav-link" href="Discounts.php">
            <i class="far fa-address-card"></i>
            <span>Discount</span></a>
       </li>
       <?php } ?>
       <li class="nav-item">
          <a class="nav-link" href="datepickerform.php">
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
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->

          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><div id="show"></div></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="Pending.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"> <div id="showNewReservation"></div> </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="Reserved.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div id="expire"></div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><div id="refreshCheckin"></div></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="Reserved.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><div id="displaynumofguest"></div></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="Check-in.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>



           <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Reservations This Year</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>


            </div>
            <div>
    <?php include('DisplayGuest.php'); ?>
    </div>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Casa de Tobias Mountain Resort 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

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
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
     <script type="text/javascript">
      setInterval(function(){
        $('#displaynumofguest').load("refreshnumberofguest.php").fadeIn(slow);
       }, 1000);

       setInterval(function(){
        $('#refreshCheckin').load("refreshcheckin.php").fadeIn(slow);
       }, 1000);

       setInterval(function(){
        $('#show').load("refreshmessage.php").fadeIn(slow);
       }, 1000);

         setInterval(function(){
        $('#showNewReservation').load("refreshreservation.php").fadeIn(slow);
       }, 1000);

           setInterval(function(){
        $('#expire').load("reservationExpire.php").fadeIn(slow);
       }, 1000);

     </script>
<script type="text/javascript">

 var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
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
<script type="text/javascript">

  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php echo "$dates";?>],
    datasets: [{
      label: "Number of Reservations",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 10,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [<?php echo "$reservation";?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
    $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
  </body>

</html>
