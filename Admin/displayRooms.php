<!DOCTYPE html>
<head>
  <title></title>

    
</head>

<body>

<?php
  include ('addupdaterooms.php');

  include('dbconn.php');

  $query = "SELECT * 
  from room join roomtype 
  on room.RoomID = roomtype.RoomID";

  $response = mysqli_query($conn, $query) or die ("No connection"); ?>

  <div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Rooms</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 15px;">

  
  <?php

  echo "<thead>
  <tr>
    <td align = 'center'>RoomNumber</td>
    <td align = 'center'>RoomType</td>
    <td align = 'center'>RoomRate</td>
    <td align = 'center'>RoomCapacity</td>
    <td align = 'center'>RoomStatus</td>
    <td align = 'cente'>Action</td>
    </tr>
    </thead>
    <tbody>";
  $i=1;

  while ($row = mysqli_fetch_assoc($response)){
  	
    echo "<tr>
      <td align = 'center'>{$row['RoomID']}</td>
      <td align = 'center'>{$row['RoomType']}</td>
      <td align = 'center'>{$row['RoomRate']}</td>
      <td align = 'center'>{$row['RoomCapacity']}</td>
      <td align = 'center'>{$row['RoomStatus']}</td>
      <td align = 'center'>
      <a href='#myModal$i' style='width: 50px;' data-placement='bottom' class='btn btn-outline-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-edit' style ='font-size:13px;'></i></a>
  
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
       <th>Room Photo:</th>
       <td><img src='upload/".$row['RoomPhoto']."' width= '350px' height= '250px'></td>
    </tr>
    <tr>
      <th>RoomNumber:</th>
      <td><input class = 'form-control' type='text' name='roomid' value='{$row['RoomID']}' readonly /></td>
    </tr>
    <tr>
      <th>RoomType:</th>
      <td><input class = 'form-control' type='text' name='roomtype' value='{$row['RoomType']}' readonly/></td>
    </tr>
    <tr>
      <th>RoomRate:</th>
      <td><input class = 'form-control' type='text' name='roomrate' value='{$row['RoomRate']}' readonly/></td>
    </tr>
    <tr>
      <th>RoomCapacity:</th>
      <td><input class = 'form-control' type='text' name='roomcapacity' value='{$row['RoomCapacity']}' readonly/></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><input class = 'form-control' type='text' name='description' value='{$row['Description']}' readonly/></td>
    </tr>
    <tr>
      <th>RoomStatus:</th>
      <td>
        <select  class='form-control'  name = 'roomstatus'>
        <option value = '{$row['RoomStatus']}' selected hidden>{$row['RoomStatus']}</option>
          <option value = 'Occupied'>Occupied</option>
          <option value = 'Unoccupied'>Unoccupied</option>
          <option value = 'Undermaintenance'>Undermaintenance</option>
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
              
      <a href='#modal$i' style='width: 50px;' data-placement='bottom' class='btn btn-outline-danger btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-trash' style ='font-size:13px;'></i></a>
  <div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>

        <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                <form method = 'POST' action = 'DeleteRooms.php'>
                <input class = 'form-control' type='hidden' name='roomid' value='{$row['RoomID']}' readonly />
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