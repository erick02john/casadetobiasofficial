<!DOCTYPE html>
<head>
  <title></title>
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    </style>
  </head>
<body>
<?php
	include('dbconn.php');
	$query = "SELECT *
	from guest g join reservation r
	on g.GuestId = r.GuestID where (Status = 'Checked-out' or Status = 'No Show') ORDER BY CheckInDate DESC";

	$response = mysqli_query($conn, $query) or die ("No connection");?>

	<div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Check-out</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">


	<?php
	echo "<thead>
			<tr>
				<td class='col-xs-2' align = 'center'>ReservationID</td>
				<td align = 'center'>GuestID</td>
				<td align = 'center'>Guest Name</td>
				<td align = 'center'>Room Number(s)</td>
				<td class='col-xs-1'align = 'center'>NumberOfAdult</td>
				<td align = 'center'>CheckInDate</td>
				<td align = 'center'>CheckOutDate</td>
				<td align = 'center'>Status</td>
			</tr>
		 </thead>
		 <tbody>";
			$i=1;
	while ($row = mysqli_fetch_assoc($response)){
	   echo "<tr>
	   			<td class='col-xs-2' align = 'center'>{$row['ReservationID']}</td>
				<td align = 'center'>{$row['GuestId']}</td>
				<td align = 'center'>{$row['GuestFName']} {$row['GuestLName']}</td>
				<td align='center'>{$row['RoomsReserved']}</td>
				<td class='col-xs-1' align = 'center'>{$row['NumberOfAdult']}</td>
				<td align = 'center'>{$row['CheckInDate']}</td>
				<td align = 'center'>{$row['CheckOutDate']}</td>
				<td align = 'center'>{$row['Status']}</td>
			</tr>
			";
			$i++;
	}
  echo "</tbody>"; ?>
 				</table>
              </div>
           	</div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
 <?php


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
