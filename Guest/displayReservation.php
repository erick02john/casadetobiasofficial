
<!DOCTYPE html>
<html>
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
    		width: 70%;
    	}
    </style>
</head>
<body>
<?php 
	include 'dbconn.php';
	$date = date("");
	$query = mysqli_query($conn, "SELECT * from reservation where GuestID = '$guestid' ORDER BY CheckInDate ASC");


	echo "
	<div class = 'table-responsive'>
	<table align='center' id='myTable' class='display table' width='100%' style='border: 1px solid black;'>";
	echo "<tr>
			<td align='center'>No.</td>
			<td align='center'>Date</td>
			<td align='center'>Days</td>
			<td align='center'>FDO</td>
		</tr>";
		$x= 1;
	while($row = mysqli_fetch_array($query)){
			$checkin = strtotime($row['CheckInDate']);
			$checkout = strtotime($row['CheckOutDate']);
			$nightcon = abs($checkout - $checkin);
			$nightcount = ($nightcon/86400);
			echo "<tr>
			<td align='center'>$x</td>
			<td align='center'>{$row['CheckInDate']}</td>
			<td align='center'>$nightcount</td>
			<td align='center'>{$row['FDO']}</td>
			</tr>";
			$x++;
		
		}
	
echo "</table>
	</div>";
?>
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
</body>
</html>
