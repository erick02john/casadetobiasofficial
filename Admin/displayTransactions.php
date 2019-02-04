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
    		width: 100% ;
    	}
    </style>
	</head>


<body>

<?php 
	include('dbconn.php');

	$query = "SELECT * 
	FROM Guest INNER JOIN Reservation 
	on Guest.GuestID = Reservation.GuestID ORDER BY ReservationDate DESC";

	$response = mysqli_query($conn, $query) or die ("No connection");

  echo "<div class='table-responsive'>
		<table id='myTable' class='display table' width='100%' style='font-size: 13px;'>";
  echo "<thead>
  			<tr>
				<td align = 'center'>Transaction Date</td>
				<td align = 'center'>GuestID</td>
				<td align = 'center'>Guest Name</td>
				<td align = 'center'>Rooms Reserved</td>
				<td align = 'center'>CheckInDate</td>
				<td align = 'center'>CheckOutDate</td>
				<td align = 'center'>Status</td>
			</tr>
		</thead>
		<tbody>";

	while ($row = mysqli_fetch_assoc($response)){
		$fname = $row['GuestFName'];
		$mname = $row['GuestMName'];
		$lname = $row['GuestLName'];
		echo "<tr>
				<td align = 'center'>{$row['ReservationDate']}</td>
				<td align = 'center'>{$row['GuestId']}</td>
				<td align = 'center'>$fname $mname $lname</td>
				<td align = 'center'>{$row['RoomsReserved']}</td>
				<td align = 'center'>{$row['CheckInDate']}</td>
				<td align = 'center'>{$row['CheckOutDate']}</td>
				<td align = 'center'>{$row['Status']}</td>
			</tr>";
	}
	 echo "</tbody>
  </table>
  </div>";

  mysqli_close($conn);

?>

</body>
</html>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});

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