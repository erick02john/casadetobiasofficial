<?php
session_start();
include("../dbconn.php");

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
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Casa de Tobias - Rooms</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>
<style>

</style>
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
        <li class="nav-item active">
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
              <a href="#"></a>
            </li>
          </ol>
          <br>

           <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Casa de Tobias Mountain Resort 2019</span>
            </div>
          </div>
        </footer>

        <div class="row">
            <div class="col-xl-4 col-sm-4 mb-4">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-edit"></i>
                  </div>
                  <div class="mr-5">Add Room</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#addroom" data-toggle='modal'>
                  <span class="float-left"></span>
                  <span class="float-right">
                    <i class="fa fa-plus"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-4 col-sm-4 mb-4">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-edit"></i>
                  </div>
                  <div class="mr-5">Update Rooms</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#updateroom" data-toggle='modal'>
                  <span class="float-left"></span>
                  <span class="float-right">
                    <i class="fa fa-plus"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-4 col-sm-4 mb-4">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-edit"></i>
                  </div>
                  <div class="mr-5">Add Room Type</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#addroomtype" data-toggle='modal'>
                  <span class="float-left"></span>
                  <span class="float-right">
                    <i class="fa fa-plus"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>




    <div>
    <?php include 'displayRooms.php'; ?>
    </div>

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
