<!DOCTYPE html>
<head>
  <title></title>


</head>

<body>


	<?php 
	include 'dbconn.php';
	include '../scriptvalidation.php';
	
	include 'reservationExpire.php';
        
                      
                                
	/*$query = mysqli_query($conn, "SELECT * FROM Guest g join Reservation r 
								  on g.GuestID = r.GuestID join roominventory ri 
								  on r.ReservationID = ri.ReservationID join Room rm 
								  on ri.RoomID = rm.RoomID join RoomType rt 
								  on rm.RoomID = rt.RoomID");*/
	$query = mysqli_query($conn, "SELECT * FROM guest g join reservation r on g.GuestID = r.GuestID where Status = 'Pending'") or die(); ?>

	<div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Pending</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 13.5px;">

	
	<?php
	echo "<thead>
			<tr>
				<td align='center'>Message</td>
		 		<td align='center'>ReservationID</td>
		 		<td align='center'>Guest Name</td>
		 		<td align='center'>RoomsReserved</td>
		 		<td align='center'>Number of Adult</td>
				<td align='center'>ReservationDate</td>
		 		<td align='center'>CheckInDate</td>
		 		<td align='center'>CheckOutDate</td>
		 		<td align='center'>ExpirationDate</td>
		 		<td align='center'>Status</td>
		 		<td align='center'>Action</td>
			</tr>
		  </thead>
		  <tbody>";
		 $i=1;
	while($row = mysqli_fetch_array($query)){
		$message = mysqli_query($conn, "SELECT Photo from Reservation where ReservationID = '{$row['ReservationID']}' AND Status = 'Pending'");
		$count = mysqli_fetch_array($message);
		$photo = $count['Photo'];
		if($photo != NULL){
			echo"<tr class='odd gradeX'>
			<td align='center'><i class='fa fa-envelope'></i></td>";
		}else{
			echo"<tr class='odd gradeX'>
			<td align='center'></td>";
		}
		echo"
				
				<td align='center'>{$row['ReservationID']}</td>
				<td align='center'>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</td>
				<td align='center'>{$row['RoomsReserved']}</td>
				<td align='center'>{$row['NumberOfAdult']}</td>
				<td align='center'>{$row['ReservationDate']}</td>
				<td align='center'>{$row['CheckInDate']}</td>
				<td align='center'>{$row['CheckOutDate']}</td>
				<td align='center'>{$row['ExpirationDate']}</td>
				<td align='center'>{$row['Status']}</td>
				<td align='center'>
					<a href='#myModal$i' data-placement='bottom' class='btn btn-outline-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-edit' style ='font-size:13px;'></i></a>
					<div class='modal fade' id='myModal$i' role='dialog'>

    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
        <h4 class='modal-title'>Reservation</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>

		<table class='table'>
		<form method = 'Post' action='updatereservation.php'>
		";
 		$result_set=mysqli_query($conn, "SELECT * FROM reservation r join billing b on r.ReservationID = b.ReservationID where r.ReservationID = '{$row['ReservationID']}'") or die ("error");
 		$rows=mysqli_fetch_array($result_set);
         echo "
         <img src='../Guest/photo/upload/{$rows['Photo']}' width='420' height='420'>"; 

		echo "<tr>
			<td><input class = 'form-control' type='hidden' name='reservationid' value='{$row['ReservationID']}' readonly /></td>
		</tr>
		<tr>
			<td>Balance</td>
			<td><input class = 'form-control' type='button' value='{$rows['Balance']}' readonly/></td>	
		</tr>
		<tr>
			<td>Billing</td>
			<td><input class = 'form-control' type='text' name='amountentered' onkeypress='return restrictCharacters(this, event, integerOnly);' required/></td>
		</tr>
		<tr>
			<th>Status:</th>
			<td>
				<select  class='form-control'  name = 'status'>
				<option value = '{$row['Status']}' selected hidden>{$row['Status']}</option>
     			<option value = 'Reserved'>Reserved</option>
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
									<h4 align='center'><i class='far fa-question-circle'></i> update Reservation {$row['ReservationID']}?</h4>
								</div>
								<div class='modal-footer'>
										<a class='btn btn-default' data-dismiss='modal'>NO</a>
										<input type='submit' class='btn btn-warning' name='update' value='YES' />
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
   <!-- DataTables JavaScript -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<script>

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