<?php
session_start();
include ('dbconn.php');
include ('../scriptvalidation.php');

$ctr = 0;
$ttlrms = 0;
$roomcount = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
$count = mysqli_num_rows($roomcount);
while($ctr < $count){
     $rcnum = $_SESSION['roomcount'][$ctr];

     $ttlrms += $rcnum;
     $ctr++;
}
    $_SESSION['ttlrms'] = $ttlrms;

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RRH - Walk-in</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

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
          <a class="nav-link" href="Discounts.php">
            <i class="far fa-address-card"></i>
            <span>Discount</span></a>
       </li>
       <?php } ?>
       <li class="nav-item active">
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
            <li class="breadcrumb-item active"><a href="datepickerform.php"> Select Date</a></li>
            <li class="breadcrumb-item"><a href="selectroom.php">Select Room</a></li>
            <li class="breadcrumb-item"><a href="guestform.php">Guest Form</a></li>
            <li class="breadcrumb-item active" style="color: green;" aria-current="page">Summary</a></li>
          </ol>

           <!-- Sticky Footer -->
    <!--     <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Casa de Tobias Mountain Reosrt 2019</span>
            </div>
          </div>
        </footer> -->


<div class="container">
    <h2>Summary</h2><center>

                        <div style="background-color: #ccc; width: 500px" class ="container">
                    <!-- <div class="well" > -->

                        <h3 style="text-align:center;">Guest Detail</h3>
                        <font size="4">Name: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['firstName']." ".$_SESSION['middleName']." ".$_SESSION['lastName']."</font>"; ?></label><br />
                        <font size="4">Address: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['address']."</font>";?></label><br />
                        <font size="4">Email: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['email']."</font>";?></label><br />
                        <font size="4">Mobile No: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['contactNum']."</font>";?></label><br />
                        <font size="4">Guest(s): </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['adult']."</font>";?></label><br />
                        <?php if ($_SESSION['adultadd'] != ' '){ ?>
                        <font size="4">Additional number of Guest(s): </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['adultadd']."</font>";?></label><br />
                           <?php } ?>




                        <h3 style="text-align:center;">Room Details</h3><br>
                        <font size="4">Check-in Date: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['from']."</font>";?></label><br />
                        <font size="4">Check-out Date: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['to']."</font>";?></label><br />
                        <font size="4">Nights: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['totalnights']."</font>";?></label><br />
                        <font size="4">Rooms to Reserve:</font><br /><font color = '#4e8975'>
                        <?php
                        $ctr = 0;
                        $ttlrr = 0;
                        $roomcount = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
                        $count = mysqli_num_rows($roomcount);
                        while($ctr < $count){
                            $rcnum = $_SESSION['roomcount'][$ctr];
                            if($rcnum == 0){

                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>" . $rcnum."x" ." ". $_SESSION['roomtype'][$ctr] . " = " .'&#8369;'. number_format($_SESSION['roomtotal'][$ctr]) . " Per night</label><br />";
                                $addrr = $_SESSION['roomtotal'][$ctr];
                                $ttlrr += $addrr;
                            }

                            $ctr++;
                        }

                        ?>
                        </font><font size="3">&nbsp;&nbsp;--------------------------------------------------------------------</font><br />

                        <?php
                        $nights = $_SESSION['totalnights'];
                        $total = $ttlrr * $nights;

                        echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = '#4e8975'>"."&#8369;" .number_format($total). " For "."$nights night/s</font></label><br /><br />";

                        $addRate = $_SESSION['adultadd'] * 800 * $nights; ?>

                        <?php
                        if($_SESSION['adultadd'] != ' ')
                            echo "<font size='4'>Additional Guest:</font><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><font color = '#4e8975'>".$_SESSION['adultadd']." x &#8369;800.00 = ".'&#8369;'.number_format($addRate)." For $nights night</font></label><br><br>";

                        $ttotal = $total + $addRate ;
                        $_SESSION['totalroom'] = $ttotal;
                        echo "<font size='5'>Total Room Payment:  <label>";
                        echo "<font size='4' color='#4E8975'>".'&#8369;'.number_format($ttotal). " For " . $nights . " Night/s </font>";?></label><br />

                       <br><br><br>
                <div align="right">

                    <a href="#confirm" class="btn btn-outline btn-success btn-lg btn-block" value="Confirm"  data-toggle="modal">Confirm</a>
                </div>
                <div class="modal fade" id="confirm" >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
                                    <h4 align="center"><i class="fa fa-question"></i>&nbsp;Confirm Registration? </h4>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="Check-in_Registration.php" name="submitval" id="submitval" class="once">
                                        <a class="btn btn-default" data-dismiss="modal">Cancel</a>

                                        <input type="submit" class="btn btn-success" id="reserve" name="reserve" value="Reserve" ondblclick="this.disabled=true;" />
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
          </div>
                </center>
            </div>
 <br>

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

    </body>
</html>
