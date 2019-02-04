<a href='#myModal$i' data-placement='bottom' class='btn btn-info btn-sm' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-edit large'></i></a>
	
	<div class='modal fade' id='myModal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Edit Rooms</h4>
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>

		<table class='table'>
		<form method = 'Post' action='updateRooms.php'>
		<tr>
			<th>RoomNumber:</th>
			<td><input class = 'formcontrol' type='text' name='roomid' value='{$row['RoomID']}' readonly /></td>
		</tr>
		<tr>
			<th>RoomType:</th>
			<td><input class = 'formcontrol' type='text' name='roomtype' value='{$row['RoomType']}' readonly/></td>
		</tr>
		<tr>
			<th>RoomRate:</th>
			<td><input class = 'formcontrol' type='text' name='roomrate' value='{$row['RoomRate']}'/></td>
		</tr>
		<tr>
			<th>RoomCapacity:</th>
			<td><input class = 'formcontrol' type='text' name='roomcapacity' value='{$row['RoomCapacity']}'/></td>
		</tr>
		<tr>
			<th>RoomStatus:</th>
			<td>
				<select  class='form-control'  name = 'roomstatus'>
				<option value = '{$row['RoomStatus']}' selected hidden>{$row['RoomStatus']}</option>
     			<option value = 'Occupied'>Occupied</option>
     			<option value = 'Unoccupied'>Unoccupied</option>
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
									<h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> update Room {$row['RoomID']}?</h4>
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
              
			<a href='#modal$i' data-placement='bottom' class='btn btn-danger btn-sm' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-trash large'></i></a>
	<div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>

        <div class='modal-dialog modal-sm'>
							<div class='modal-content'>
								<div class='modal-body'>
								<form method = 'POST' action = 'DeleteRooms.php'>
								<input class = 'formcontrol' type='hidden' name='roomid' value='{$row['RoomID']}' readonly />
									<button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
									<h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Delete Room {$row['RoomID']}?</h4>
								</div>
								<div class='modal-footer'>
										<a class='btn btn-default' data-dismiss='modal'>NO</a>
										<input type='submit' class='btn btn-warning' name='delete' value='YES' />
										</form>
									</div>
								</div>
							</div>
						</div>

        </div>
        </div>
        </div>