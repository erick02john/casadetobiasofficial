<!DOCTYPE html>
<head>
  <title></title>
   <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <style type="text/css">
    	<style type="text/css">
      .table-responsive {
        width: 95%;
      }
    </style>
</head>

<body>
<?php
	include('dbconn.php');
	include '../scriptvalidation.php';
	
	$query = "SELECT *
	from guest g join reservation r
	on g.GuestId = r.GuestID where Status = 'Checked-in' ORDER BY CheckInDate DESC";

	$response = mysqli_query($conn, $query) or die ("No connection");?>

  <div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Check-in</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 13.5px;">

  
  <?php
	echo "<thead>
			<tr>
				<td class='col-xs-2' align = 'center'>GuestID</td>
				<td align = 'center'>Guest Name</td>
				<td align = 'center'>Room Number(s)</td>
				<td class='col-xs-1'align = 'center'>NumberOfGuest</td>
				<td align = 'center'>CheckInDate</td>
				<td align = 'center'>CheckOutDate</td>
				<td align = 'center'>Status</td>
				<td align = 'center'>Action</td>
        <td></td>
			</tr>
		</thead>
		<tbody>";
			$i=1;
	while ($row = mysqli_fetch_assoc($response)){
		echo "<tr>
				<td class='col-xs-2' align = 'center'>{$row['GuestId']}</td>
				<td align = 'center'><u><a class='pointer' data-toggle='modal' data-target='#myModals$i'><font color='black'>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</font></a></u></td>
				<td align='center'>{$row['RoomsReserved']}</td>
				<td class='col-xs-1' align = 'center'>{$row['NumberOfAdult']}</td>
				<td align = 'center'>{$row['CheckInDate']}</td>
				<td align = 'center'>{$row['CheckOutDate']}</td>
				<td align = 'center'>{$row['Status']}</td>
				<td align = 'center'>


             <div class='modal fade' id='myModals$i' role='dialog'>
    <div class='modal-dialog'>
    
      
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>{$row['GuestFName']} info</h4>
        </div>
        <div class='modal-body'>
    <div>
    <div class='table-responsive'>
    <table class='table'>
    <tr>
    <td>Name: {$row['GuestLName']}, {$row['GuestFName']} {$row['GuestMName']}</td>
    <td>Email: {$row['Email']}</td>
    </tr>
    <tr>
    <td colspan='2'>Address: {$row['Address']}</td>
    </tr>
     <tr>
    <td>Contact Number: {$row['ContactNumber']}</td>
    <td>Gender: {$row['Gender']}</td>
    </tr>
    <tr>
    <td colspan='2' align='center'><font size='5'>Previous Reservations</font></td>
    </tr>

    </table>
    </div>
    </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>


            <a href='#myModal$i' data-placement='bottom' class='btn btn-outline-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-edit' style ='font-size:13px;'></i></a>

   <div class='modal fade' id='myModal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Checked-in</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
        <div>
    <div class='table-responsive'>
    <table class='table'>
        
        <form method='POST' action='UpdateCheck-in.php'>";
        $result = mysqli_query($conn, "SELECT * FROM reservation r join billing b on r.ReservationID = b.ReservationID where r.ReservationID = '{$row['ReservationID']}'") or die ("error");
        $rows=mysqli_fetch_array($result);
    echo "<tr>
    <input class = 'form-control' type='hidden' name='fdoname' value='$name' readonly />
            <th><input class = 'form-control' type='text' name='guestid' value='{$row['GuestId']}' readonly /></th>
            <td><input class = 'form-control' type='text' name='name' value='{$row['GuestFName']} {$row['GuestLName']}' readonly /></td>
        </tr>
        <tr>
            <th>RoomNumber(s)</th>
            <td><input class = 'form-control' type='text' name='roomid' value='{$row['RoomsReserved']}' readonly /></td>
            <td><input class = 'form-control' type='hidden' name='reservationid' value='{$row['ReservationID']}' readonly /></td>
        </tr>
        <tr>
          <td>Balance</td>
          <td><input class = 'form-control' type='button' value='{$rows['Balance']}' readonly/></td>
        </tr>
        <tr>
          <td>Payment</td>
          <td><input class = 'form-control' type='text' name='amountentered' onkeypress='return restrictCharacters(this, event, integerOnly);' /></td>
      </tr>
        <tr>
            <th align = 'center'>
              Change Status
            </th>
            <td>
            <select  class='form-control'  name = 'status'>
            <option value = 'Checked-in'>Checked-in</option>
          <option value = 'Checked-out'>Check-out</option>
            </select>
            </td>
        </tr>
        </table>
        </div>
        </div>
       </div>
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
    <a href='#areyousure$i' data-toggle='modal' class='btn btn-success' >Confirm</a>
        </div>
      </div>
    </div>
  </div>
  <div class='modal fade' id='areyousure$i' role='dialog' style='z-index: 9998'>
            <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='far fa-question-circle'></i> Are you sure?</h4>
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
      <td align= 'center'>
              <form method ='Post' action='getdate.php'>
                <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <input type='hidden' name='checkIn' value ='{$row['CheckInDate']}'>
                <input type='hidden' name='checkOut' value ='{$row['CheckOutDate']}'>
                <button type='submit' name='modify' class ='btn btn-info' style='font-size: 11px;'>Modify Room</button>
              </form></td>

                



		</tr>

 

  


    ";
			$i++;
	}
	echo "
  </tbody>"; ?>
        </table>
              </div>
            </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
 <?php

  mysqli_close($conn);

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

