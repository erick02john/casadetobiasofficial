<!DOCTYPE html>
<head>
  <title></title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
    <link rel="stylesheet" href="../bootstrap/css/animate.css">
   <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

    <link rel="stylesheet" href="../bootstrap/css/jquery.growl.css">


    <script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="../bootstrap/js/jquery.growl.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/dataTables.min.js"></script>
    <script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>
    <style type="text/css">
    	.table-responsive {
    		font-size: 18px;
    	}
    </style>
</head>

<body>

<?php
  include('dbconn.php');

  $query= "SELECT * FROM amenity a JOIN reservation r
  ON a.ReservationID=r.ReservationID";

  $response = mysqli_query($conn, $query);

  echo "<div class='table-responsive'>
        <table id='myTable' class='display table' width='100%'>";
  echo "   <thead>
                <tr>
                    <td align = 'center'>AmenityID</td>
                    <td align = 'center'>AmenityType</td>
                    <td align = 'center'>AmenityPrice</td>
                    <td align = 'center'>Description</td>
                    <td align = 'center'>Action</td>
                </tr>


?>