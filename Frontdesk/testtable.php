<!DOCTYPE html>
<html lang="en" >

<head>
 

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  color: #5e5d52;

}

a {
  color: #337aa8;
}
a:hover, a:focus {
  color: #4b8ab2;
}

.containert {
  margin: 5% 3%;

}
@media (min-width: 48em) {
  .containert {
    margin: 2%;
  }
}
@media (min-width: 75em) {
  .containert {
    margin: 2em auto;
    max-width: 75em;
  }
}

.responsive-table {
  width: 105%;
  margin-bottom: 1.5em;
}
@media (min-width: 48em) {
  .responsive-table {
    font-size: .9em;
  }
}
@media (min-width: 62em) {
  .responsive-table {
    font-size: 1em;
  }
}
.responsive-table thead {
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  /* IE6, IE7 */
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}
@media (min-width: 48em) {
  .responsive-table thead {
    position: relative;
    clip: auto;
    height: auto;
    width: auto;
    overflow: auto;
  }
}
.responsive-table thead th {
  background-color: #003366;
  border: 1px solid #003366;
  font-weight: normal;
  text-align: center;
  color: white;
}
.responsive-table thead th: first-of-type {
  text-align: left;
}
.responsive-table tbody,
.responsive-table tr,
.responsive-table th,
.responsive-table td {
  display: block;
  padding: 0;
  text-align: left;
  white-space: normal;
}
@media (min-width: 48em) {
  .responsive-table tr {
    display: table-row;
  }
}
.responsive-table th,
.responsive-table td {
  padding: .5em;
  vertical-align: middle;
}
@media (min-width: 30em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em .5em;
  }
}
@media (min-width: 48em) {
  .responsive-table th,
  .responsive-table td {
    display: table-cell;
    padding: .5em;
  }
}
@media (min-width: 62em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em .5em;
  }
}
@media (min-width: 75em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em;
  }
}
.responsive-table caption {
  margin-bottom: 1em;
  font-size: 1em;
  font-weight: bold;
  text-align: center;
}
@media (min-width: 48em) {
  .responsive-table caption {
    font-size: 1.5em;
  }
}
.responsive-table tfoot {
  font-size: .8em;
  font-style: italic;
}
@media (min-width: 62em) {
  .responsive-table tfoot {
    font-size: .9em;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody {
    display: table-row-group;
    background-color: #fff;
  }
}
.responsive-table tbody tr {
  margin-bottom: 1em;
  border: 2px solid #003366;
}
@media (min-width: 48em) {
  .responsive-table tbody tr {
    display: table-row;
    border-width: 1px;
  }
}
.responsive-table tbody tr:last-of-type {
  margin-bottom: 0;
}
@media (min-width: 48em) {
  .responsive-table tbody tr:nth-of-type(even) {
    background-color: rgba(94, 93, 82, 0.1);
  }
}
.responsive-table tbody th[scope="row"] {
  background-color: #1d96b2;
  color: white;
}
@media (min-width: 48em) {
  .responsive-table tbody th[scope="row"] {
    background-color: transparent;
    color: #5e5d52;
    text-align: center;
  }
}
.responsive-table tbody td {
  text-align: center;
}
@media (min-width: 30em) {
  .responsive-table tbody td {
    border-bottom: 1px solid #003366;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody td {
    text-align: center;
  }
}
.responsive-table tbody td[data-type=currency] {
  text-align: center;
}
.responsive-table tbody td[data-title]:before {
  content: attr(data-title);
  float: left;
  font-size: .8em;
  color: rgba(94, 93, 82, 0.75);
}
@media (min-width: 30em) {
  .responsive-table tbody td[data-title]:before {
    font-size: .9em;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody td[data-title]:before {
    content: none;
  }
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<?php
include('dbconn.php');

  $query = "SELECT * 
  from Room join RoomType 
  on Room.RoomID = RoomType.RoomID";

  $response = mysqli_query($conn, $query) or die ("No connection");
   ?>


<div class="containert">
  <table class="responsive-table">
    <caption>Rooms</caption>
    <thead>
      <tr>
        <th scope="col">RoomNumber</th>
        <th scope="col">RoomType</th>
        <th scope="col">RoomRate</th>
        <th scope="col">RoomCapacity</th>
        <th scope="col">RoomStatus</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <!-- <tfoot>
      <tr>
        <td colspan="7">Sources: <a href="http://en.wikipedia.org/wiki/List_of_highest-grossing_animated_films" rel="external">Wikipedia</a> &amp; <a href="http://www.boxofficemojo.com/genres/chart/?id=animation.htm" rel="external">Box Office Mojo</a>. Data is current as of August 25, 2016.</td>
      </tr>
    </tfoot> -->

    <?php $i=1;

  while ($row = mysqli_fetch_assoc($response)){ ?>
    <tbody>
      <tr>
        <th scope="row"><?php echo"{$row['RoomID']}"; ?></th>
        <td data-title="RoomType"><?php echo"{$row['RoomType']}"; ?></td>
        <td data-title="RoomRate"><?php echo"{$row['RoomRate']}"; ?></td>
        <td data-title="RoomCapacity" data-type="currency"><?php echo"{$row['RoomCapacity']}"; ?></td>
        <td data-title="RoomStatus" data-type="currency"><?php echo"{$row['RoomStatus']}"; ?></td>
        <td data-title="Action" data-type="currency"><?php 
          echo "<a href='#myModal$i' data-placement='bottom' class='btn btn-info btn-sm' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-edit large'></i></a>
  
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

              </td>

      </tr> </tbody>";
      $i++;
  }
         ?>
  </table>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

 



</body>
</html>