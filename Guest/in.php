<?php
session_start();
include("dbconn.php");

if(!empty($_SESSION['Email'])){
  $guestid = $_SESSION['guestid'];
  $email = $_SESSION['Email'];


}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='_log-in.php';
        </SCRIPT>");
}
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Casa de Tobias Mountain Resort</a>
            </div>
            <!-- /.navbar-header -->


            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-info fa-fw"></i> Reservation Information</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-user fa-fw"></i>Account</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-book fa-fw"></i>Book Now</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-history fa-fw"></i>Check-in History</a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
 <?php include 'dbconn.php';

      $query = mysqli_query($conn, "SELECT * FROM reservation r JOIN guest g ON r.GuestID = g.GuestId join billing b on r.ReservationID = b.ReservationID WHERE r.GuestId = '$guestid' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in')") or die("asdfsd");
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ReservationID</th>
                                        <th>GuestName</th>
                                        <th>Number of Guest</th>
                                        <th>Check in Date</th>
                                        <th>Check out Date</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th>Reservation Status</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
        <?php
              $i=1;
      while ($row = mysqli_fetch_array($query)) {
        echo "<tr>
                <td>{$row['ReservationID']}</td>
                <td>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</td>
                <td>{$row['NumberOfAdult']}</td>
                <td>{$row['CheckInDate']}</td>
                <td>{$row['CheckOutDate']}</td>
                <td>{$row['PaidAmount']}</td>
                <td>{$row['Balance']}</td>
                <td>{$row['Status']}</td>";

            if($row['Status'] == 'Pending'){
                echo "<td align= 'center'>
                <form method ='Post' action='photo/index.php'>
                 <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <button type='submit' name='upload' class ='btn btn-info' style='font-size: 11px;'>Upload</button>";
          echo "</form></td>";}
                if($row['Status'] == 'Reserved' || $row['Status'] == 'Pending'){
                    if($row['Status'] == 'Reserved'){
                        echo "<td></td>";
                    }
          echo "<td>
                <form method ='Post' action='container.php'>
                <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <button type='submit' name='resched' class ='btn btn-info' style='font-size: 11px;'>Reschedule</button></form></td>";
                echo "
                <td>
                <form method ='Post' action='getdate.php'>
                <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <input type='hidden' name='checkIn' value ='{$row['CheckInDate']}'>
                <input type='hidden' name='checkOut' value ='{$row['CheckOutDate']}'>
                <button type='submit' name='modify' class ='btn btn-info' style='font-size: 11px;'>Modify Room</button>
                </td></form>";
            }else {
                echo "<td></td>
                <td></td>
                <td></td>";
            }

               echo "<td>";
      echo "<a href='#modal$i' data-placement='bottom' class='btn btn-info btn-sm' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-print large'></i></a>

<div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Edit Rooms</h4>
        </div>
        <div class='modal-body'>
        <div>
    <div class='table-responsive'>
    <form method = 'Post' target='_blank' action='samplepdf.php'>
    <input class = 'form-control' type='hidden' name='bid' value='{$row['BillingID']}' readonly/>
    <input class = 'form-control' type='hidden' name='rid' value='{$row['ReservationID']}' readonly/>
    "; ?> <?php include 'Admin/displayRecit.php' ?> <?php echo"
    </div>
    </div>
    </div>

        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
        <input type='submit' class='btn btn-warning' name='print' value='Print' />
        </form>
        </div>
      </div>
    </div>
  </div>
</div>";

          echo "</td> </tr>";
          $i++;
            }?>


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
