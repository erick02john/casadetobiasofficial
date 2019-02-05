<?php include '../scriptvalidation.php';
	include 'dbconn.php'; ?>

<div class="modal fade" id="addroom" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Rooms</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div>
              <div class="table-responsive">
                  <table class="display table" style="border: none;">
                    <form method = "POST" action="AddRooms.php" enctype="multipart/form-data">
                      <tr>
                      	<th>Room Photo: </th>
                      	<td><input type='file' name='file' /></td>
                      </tr>
                      <tr>
                        <th>RoomNumber:</th>
                        <td><input class="form-control" type="text" name="roomnumber" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off"/></td>
                      </tr>
                      <tr>
                        <th>RoomType:</th>
                        <td>
                          <select  class='form-control'  name = 'roomtype'>
                      <option value = 'Presidential(Queen Sized-Bed)'>Small Kubo House</option>
                    <option value = 'Presidential(Twin Sized-Bed)'>Big Kubo House</option>
                    <option value = 'Superior(Queen Sized-Bed)'>Clubhouse Dormitory</option>
                    </select>
                        </td>
                      </tr>
                  </table>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="add" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>



 <div class="modal fade" id="updateroom" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Rooms</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div>
              <div class="table-responsive">
                  <table class="display table" style="border: none;">
                    <form method = "POST" action="updateRooms.php" enctype="multipart/form-data">
                      <tr>
                      	<th>Room Photo: </th>
                      	<td><input type='file' name='file' /></td>
                      </tr>
                      <tr>
                        <th>RoomType:</th>
                        <td>
                          <select  class='form-control'  name = 'roomtype'>
														<option value = 'Presidential(Queen Sized-Bed)'>Small Kubo House</option>
			                    <option value = 'Presidential(Twin Sized-Bed)'>Big Kubo House</option>
			                    <option value = 'Superior(Queen Sized-Bed)'>Clubhouse Dormitory</option>
                    </select>
                        </td>
                      </tr>
                      <tr>
                        <th>RoomRate:</th>
                        <td><input class="form-control" type="text" name="roomrate" onkeypress="return restrictCharacters(this, event, integerOnly);"></td>
                      </tr>
                      <tr>
                        <th>RoomCapacity:</th>
                        <td><input class="form-control" type="text" name="roomcapacity" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" /></td>
                      </tr>
                      <tr>
                        <th>Description:</th>
                        <td><input class = "form-control" type="text" name="description" autocomplete="off" /></td>
                      </tr>
                  </table>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="updateRooms" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>


 <div class="modal fade" id="addroomtype" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Room Type</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div>
              <div class="table-responsive">
                  <table class="display table" style="border: none;">
                    <form method = "POST" action="addroomtype.php" enctype="multipart/form-data">
                      <tr>
                      	<th>Room Photo: </th>
                      	<td><input type='file' name='file' /></td>
                      </tr>
                      <tr>
                        <th>RoomNumber:</th>
                        <td><input class="form-control" type="text" name="roomnumber" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" REQUIRED/></td>
                      </tr>
                      <tr>
                        <th>RoomType:</th>
                        <td><input class="form-control" type="text" name="roomtype" REQUIRED></td>
                      </tr>
                      </tr>
                      <tr>
                        <th>RoomRate:</th>
                        <td><input class="form-control" type="text" name="roomrate" onkeypress='return restrictCharacters(this, event, integerOnly);' REQUIRED></td>
                      </tr>
                      <tr>
                        <th>RoomCapacity:</th>
                        <td><input class="form-control" type="text" name="roomcapacity" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" /></td>
                      </tr>
                      <tr>
                        <th>Description:</th>
                        <td><input class = "form-control" type="text" name="description" autocomplete="off" /></td>
                      </tr>
                  </table>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="addroomtype" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>
