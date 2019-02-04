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
    		width: 100%;
    	}
    </style>
</head>

<body>
	<?php 
	include 'dbconn.php';
	include '../scriptvalidation.php';
	include 'updatenoshow.php';
	
	/*$query = mysqli_query($conn, "SELECT * FROM guest g join Reservation r 
								  on g.GuestID = r.GuestID join roominventory ri 
								  on r.ReservationID = ri.ReservationID join Room rm 
								  on ri.RoomID = rm.RoomID join RoomType rt 
								  on rm.RoomID = rt.RoomID");*/
	$query = mysqli_query($conn, "SELECT * FROM guest g join reservation r on g.GuestID = r.GuestID where Status = 'Reserved'");


	echo "<div class='table-responsive'>
		<table id='myTable' class='display table' width='100%' style=' font-size: 14px; '>";
	echo "<thead>
			<tr>
		 		<td align='center'>ReservationID</td>
		 		<td align='center'>Name</td>
		 		<td align='center'>RoomsReserved</td>
		 		<td align='center'>Number of Adult</td>
				<td align='center'>ReservationDate</td>
		 		<td align='center'>CheckInDate</td>
		 		<td align='center'>CheckOutDate</td>
		 		<td align='center'>Status</td>
		 		<td align='center'>Action</td>
			</tr>
		  </thead>
		  <tbody>";
		 $i=1;
	while($row = mysqli_fetch_array($query)){
		echo"<tr>
				<td align='center'>{$row['ReservationID']}</td>
				<td align='center'>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</td>
				<td align='center'>{$row['RoomsReserved']}</td>
				<td align='center'>{$row['NumberOfAdult']}</td>
				<td align='center'>{$row['ReservationDate']}</td>
				<td align='center'>{$row['CheckInDate']}</td>
				<td align='center'>{$row['CheckOutDate']}</td>
				<td align='center'>{$row['Status']}</td>
				<td align='center'>
					<a href='#myModal$i' data-placement='bottom' class='btn btn-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-edit large'></i></a>
					<div class='modal fade' id='myModal$i' role='dialog'>

   <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Reservation</h4>
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>

		<table class='table'>
		<form method = 'Post' action='updatereservation.php'>";
		$result = mysqli_query($conn, "SELECT * FROM reservation r join billing b on r.ReservationID = b.ReservationID where r.ReservationID = '{$row['ReservationID']}'") or die ("error");
 		$rows=mysqli_fetch_array($result);
 		
	echo "<tr>
			<th>ReservationID:</th>
			<td><input class = 'form-control' type='text' name='reservationid' value='{$row['ReservationID']}' readonly /></td>
		</tr>
		<tr>
			<th>Name:</th>
			<td><input class = 'form-control' type='text' name='name' value='{$row['GuestFName']}' readonly/></td>
		</tr>
		<tr>
			<th>RoomsReserved:</th>
			<td><input class = 'form-control' type='text' name='roomsreserved' value='{$row['RoomsReserved']}' readonly/></td>
		</tr>
		<tr>
			<td>Balance</td>
			<td><input class = 'form-control' type='button' name='balance' value='{$rows['Balance']}' readonly/></td>
		</tr>
		<tr>
			<td>Billing</td>
			<td><input class = 'form-control' type='text' name='amountentered' onkeypress='return restrictCharacters(this, event, integerOnly);' /></td>
		</tr>
		<tr>
			<th>Status:</th>
			<td>
				<select  class='form-control'  name = 'status'>
				<option value = '{$row['Status']}' selected hidden>{$row['Status']}</option>
     			<option value = 'Checked-in'>Check-in</option>
        		</select>
        	</td>
		</tr>

		
		</table>
		</div>
		</div>
		</div>							
       	
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
		<a href='#areyousure$i' data-toggle='modal' class='btn btn-success' >Update</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='modal fade' id='areyousure$i' role='dialog' style='z-index: 9998'>
						<div class='modal-dialog modal-sm'>
							<div class='modal-content'>
								<div class='modal-body'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
									<h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> update Reservation {$row['ReservationID']}?</h4>
								</div>
								<div class='modal-footer'>
										<a class='btn btn-default' data-dismiss='modal'>NO</a>
										<input type='submit' class='btn btn-warning' name='updaterev' value='YES' />
										</form>
									</div>
								</div>
							</div>
						</div>
		</div>

			</td>
		</tr>";
			$i++;
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