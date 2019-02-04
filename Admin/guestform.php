<?php 
session_start();
include("dbconn.php");
include("../scriptvalidation.php");

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


$ctr = 0;
$totalg = 0;
$totalExtra = 0;
$rnum = 0;
$rExtra = 0;
$roomcount = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
$count = mysqli_num_rows($roomcount);
while($ctr < $count){
  
  $rcnum = $_SESSION['roomcount'][$ctr];
  $roomtype = $_SESSION['roomtype'][$ctr];
  $query1 = mysqli_query($conn, "SELECT RoomCapacity FROM roomtype WHERE RoomType = '$roomtype'");
  $row1 = mysqli_fetch_array($query1);
  if($rcnum == 0){
    $rnum=0;
    $rExtra=0;
  }
  else{
    $cpcty = $row1['RoomCapacity'];
    $rnum = $rcnum * 2;
    $rExtra = $rcnum * $cpcty;

  }
    $totalg += $rnum;
    $totalExtra += $rExtra - $rnum;
  
    $ctr++;

}
  
if (!empty($_POST)):


  $adult = $_POST['adult'];
  $modeofpayment = $_POST['modeofpayment'];


  if($adult == ' '){
    echo ("<script language='JavaScript'>
      window.alert('There should be atleast 1 adult')
      window.location.href='guestform.php';
      </SCRIPT>");
  }elseif($modeofpayment == ' ') {
    echo ("<script language='JavaScript'>
      window.alert('Please choose a Mode of Payment')
      window.location.href='guestform.php';
      </SCRIPT>");

  }else{
    
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['middleName'] = $_POST['middleName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['contactNum'] = $_POST['contactNum'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['adult'] = $adult;
    if ($_POST['adultadd'] == " "){
      $_SESSION['adultadd'] = 0;
    } else {
      $_SESSION['adultadd'] = $_POST['adultadd'];
    } 
    $_SESSION['modeofpayment'] = $modeofpayment;
    
    
    echo ("<script language='JavaScript'>
      window.location.href='summary.php';
      </SCRIPT>");
  }



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

    <title>RRH - Walk-in</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">


   
  <style type="text/css">
    .container {
      margin-top: 20px;
    }

    input[type="radio"]:checked + label span {
    background:url('../images/logos/radio.png') -57px top no-repeat;
  }

  .form-control {
    width: 250px;
  }

  </style>
</head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Rosario Resort and Hotel</a>

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
            <li class="breadcrumb-item"><a href="datepickerform.php">Select Date</a></li>
            <li class="breadcrumb-item"><a href="selectroom.php">Select Room</a></li>
            <li class="breadcrumb-item active" style="color: green;" aria-current="page">Guest Form</a></li>
            <li class="breadcrumb-item">Summary</a></li>
          </ol>

           <!-- Sticky Footer -->
       <!--  <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Rosario Resort and Hotel 2018</span>
            </div>
          </div>
        </footer> -->

  <div class="container">
      <h2>Guest Details</h2>

    <div class='table-responsive'>

    <table class="table">
                  
    <form method="Post" action = "guestform.php">
    <tr>
      <td><input type = "text" class = "form-control" name = "firstName" placeholder = "First Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/></td>

      <td><input type = "text" class = "form-control" name = "middleName" placeholder = "Middle Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/></td>

      <td><input type = "text" class = "form-control" name = "lastName" placeholder = "Last Name" onfocus="this.select()" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/></td>
    </tr>
    
    <tr>
      <td><label>Gender: </label></td>
      <td><input type="radio" id="r1" name="gender" value="Female" />
          <label for="r1"><span></span>Female</label></td>
      <td><input type="radio" id="r2" name="gender" value="Male" />
          <label for="r2"><span></span>Male</label></td>
      
    </tr>

    <tr>
      <td colspan = "3"><textarea name= "address" placeholder="Address" rows= "4" cols= "130" onfocus="this.select()" REQUIRED/></textarea></td>
    </tr>
    <tr>
      <td><label>Contact Number:</label></td>
      <td><input type = "text" name = "contactNum" class= "form-control" placeholder = "Contact Number" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" REQUIRED /></td>
    </tr>
    <tr>
      <td><label>Email:</label></th>
      <td colspan="2"><input type="email" name="email" class="form-control" placeholder="Email" onfocus="this.select()" autocomplete="off" REQUIRED /></td>
  </tr>
  
  <tr>
  <td><label>Number of Guest: </label>
  <select style="width:100;" class="form-control" name="adult" REQUIRED>
        <option value=' '>&nbsp;</option>
          <?php for ($x = 1; $x <= $totalg; $x++) {
            echo "<option value='$x'>$x</option>";} ?><br />
  </select></td>
  <td><label>Additional Guest(s): </label>
        <select style="width:100;" class="form-control" name="adultadd" REQUIRED>
          <option value=' '>&nbsp;</option>
          <?php for ($x = 1; $x <= $totalExtra; $x++) {
            echo "<option value='$x'>$x</option>";} ?>
        </select> <font color = "red" size="2"><br>*Additional &#8369;800.00</font>
  </td>
  </tr>

  <tr>
    <td><label>Mode of Payment: </label></td>
    <td colspan="2"><select style="width:150;" class="form-control" name="modeofpayment" REQUIRED>
        <option></option>
        <option value="Cash">Cash</option>
        <option value="Card">Card</option>
    </select></td><br>
  </tr>
  <tr>
    <td colspan="3" align="right"><input type="submit" class="btn btn-outline btn-success btn-lg btn-block" name="checkin" value="Confirm" /></td>
  </tr>

    </form>
</table>
</div>
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

<?php endif; ?>