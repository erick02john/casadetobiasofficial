<!doctype html>
<head>
	<title></title>

</head>
<link rel="stylesheet" type="text/css" href="../css/table.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="../bootstrap/css/animate.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.growl.css">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" />

		

		<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap/js/jquery.growl.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>

<body>

<?php
	include('dbconn.php');

	$query = "SELECT * FROM guest";

	$response = mysqli_query($conn, $query) or die ("No connection");

	echo "<table>";
	echo "<tr>
		<td align = 'center'>GuestID</td>
		<td align = 'center'>First Name</td>
		<td align = 'center'>Midlle Name</td>
		<td align = 'center'>Last Name</td>
		<td align = 'center'>Address</td>
		<td align = 'center'>Gender</td>
		<td align = 'center'>Contact Number</td>
		<td align = 'center'>Email</td>
		<td align = 'center'>Username</td>
		<td align = 'center'>Password</td>
		</tr>";

	while ($row = mysqli_fetch_assoc($response)){
		echo "<tr>
			<td align = 'center'>{$row['GuestId']}</td>
			<td align = 'center'>{$row['GuestFName']}</td>
			<td align = 'center'>{$row['GuestMName']}</td>
			<td align = 'center'>{$row['GuestLName']}</td>
			<td align = 'center'>{$row['Address']}</td>
			<td align = 'center'>{$row['Gender']}</td>
			<td align = 'center'>{$row['ContactNumber']}</td>
			<td align = 'center'>{$row['Email']}</td>
			<td align = 'center'>{$row['Username']}</td>
			<td align = 'center'>{$row['Password']}</td>
			<td>"?>
			<?php $i= 1;?>

							<a href="#changeStatus<?php echo $i;?>" class="open-edituser" data-placement="bottom" data-original-title="Edit" data-toggle="modal"><i class="glyphicon glyphicon-edit large"></i></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							
						
					<div class="modal fade" id="changeStatus<?php echo $i;?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header alert alert-info">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h3><b>Billing</b></h3>
								</div>
								<div>
								<div class="table-responsive">
									<table class="table">
										<h1>Walk-in</h1>
     <form method="Post">
     Roomtype: <br>
    <input name = "room" type = "radio" value="Presidential">Presidential
    <input name="room" type="radio" value="Superior">Superior
    <br>
    <input name = "type" type = "submit" value="(Queen Sized-Bed)">
    <input name="type" type="submit" value="(Twin Sized-Bed)">
  </form>
    <form method="Post" action = "Check-in_Registration.php">
    <input type = "text" class = "arg" name = "lastName" placeholder = "Last Name">
    <input type = "text" class = "arg" name = "firstName" placeholder = "First Name">
    <input type = "text" class = "arg" name = "middleName" placeholder = "Middle Name">
    <br>
    Gender: <br>
    <input name = "gender" type = "radio" value="male">
    Male<input name="gender" type="radio" value="female">
    Female
    <br>
    <input type = "text" name = "address" placeholder = "Address">
    <input type = "number" name = "telephone" placeholder = "phoneNo.">
    <input type = "email" name = "email" placeholder = "E-mail">
    <br>
    Rooms:
      <?php
      include 'dbconn.php';
     
      if(isset($_POST['type'])){
         $room = $_POST['room'];
      $type = $_POST['type'];
      $roomtype = "$room$type";
        echo "<input type ='text' value='$roomtype' readonly>";
      $roomNumber = mysqli_query($conn, "SELECT * FROM room r join roomtype rt on r.roomID = rt.roomID");
      echo "<select name = 'RoomNumber'>";
      while($row = mysqli_fetch_assoc($roomNumber)){
        
          if($row['RoomStatus'] == "Unoccupied" and $row['RoomType'] == $roomtype){
          echo "<option value = '{$row['RoomID']}' >{$row['RoomID']}</option>";
        }
      }
      
    echo "</select>";
  }
    ?>
    <br>
    <input type = "text" class = "arg" name = "NumberofAdult" placeholder = "Number of  Adult">
    <input type = "text" class = "arg" name = "NumberofChild" placeholder = "Number of  Child">
    <input type = "date" class = "arg" name = "Check-outDate" placeholder = "Check-outDate">
      <br>
    <select name = "amountpaid">
      <option value = "Partial">Partial</option>
      <option value = "Full">Full</option>
      <option value = "UponCheck-out">UponCheck-out</option>
        </select>
    <br>
    <input type = "submit" name = "register" value = "Check-in">
    </form>
											
									</table>
								</div>
								</div>
								<div class="modal-footer">
									<a class="btn btn-default" data-dismiss="modal"/>Cancel</a>
									<a href="#areyousure<?php echo $i;?>" data-toggle="modal" class="btn btn-success" >Confirm</a>
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="modal fade" id="areyousure<?php echo $i;?>" role="dialog" style="z-index: 9998;">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
									<h4 align="center"><i class="glyphicon glyphicon-question-sign"></i> Are you sure?</h4>
								</div>
								<div class="modal-footer">
									
										<a class="btn btn-default" data-dismiss="modal">NO</a>
										<input type="submit" class="btn btn-warning" name="update" value="YES" />
									</form>
								</div>
							</div>
						</div>
					</div>
					</td>
					</td>
				</tr>
					<?php  $i++;  ?>	
		
			</table>
		</div>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>
</div>		<?php				
			echo "</td>";
			echo "</tr>"
;
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>