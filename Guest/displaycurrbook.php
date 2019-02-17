
  <?php include 'dbconn.php';

      $query = mysqli_query($conn, "SELECT * FROM reservation r JOIN guest g ON r.GuestID = g.GuestId join billing b on r.ReservationID = b.ReservationID WHERE r.GuestId = '$guestid' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in')") or die("asdfsd");
?>
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Booking Details</h1>
    </div>         <!-- /.col-lg-12 -->
</div>
                                </thead>
    <div class="row">
              <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reservation Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <th>Reservation ID</th>
                <th>GuestName</th>
                <th>Number of Guest</th>
                <th>Check in Date</th>
                <th>Check out Date</th>
                <th>Amount Paid</th>
                <th>Balance</th>
                <th>Reservation Status</th>
                <th colspan="6">Action</th>
              </thead>
              <tbody><?php
              $i=1;
      while ($row = mysqli_fetch_array($query)) {
        echo "<tr>
                <td align= 'center'>{$row['ReservationID']}</td>
                <td align= 'center'>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</td>
                <td align= 'center'>{$row['NumberOfAdult']}</td>
                <td align= 'center'>{$row['CheckInDate']}</td>
                <td align= 'center'>{$row['CheckOutDate']}</td>
                <td align= 'center'>{$row['PaidAmount']}</td>
                <td align= 'center'>{$row['Balance']}</td>
                <td align= 'center'>{$row['Status']}</td>";
          if($row['Status'] == 'Pending'){
                echo "<td align= 'center'>
                <form method ='Post' action='photo/index.php'>
                 <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <button type='submit' name='upload' class ='btn btn-info' style='font-size: 11px;'>Upload</button>";
          echo "</form></td>";
           } if($row['Status'] == 'Reserved' || $row['Status'] == 'Pending'){
          echo "<td align= 'center'>
                <form method ='Post' action='container.php'>
                <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <button type='submit' name='resched' class ='btn btn-info' style='font-size: 11px;'>Reschedule</button>";

          echo "</form></a></td>
                <td align= 'center'>
                <form method ='Post' action='getdate.php'>
                <input type='hidden' name='resID' value ='{$row['ReservationID']}'>
                <input type='hidden' name='checkIn' value ='{$row['CheckInDate']}'>
                <input type='hidden' name='checkOut' value ='{$row['CheckOutDate']}'>
                <button type='submit' name='modify' class ='btn btn-info' style='font-size: 11px;'>Modify Room</button>";

          echo "</form></td>";

}else {
  echo "<td align= 'center' colspan = '3'>";
}
echo "<td>";
      echo "<a href='#modal$i' data-placement='bottom' class='btn btn-info btn-sm' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-print large'></i></a>

<div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Review</h4>
        </div>
        <div class='modal-body'>
        <div>
    <div class='table-responsive'>
    <form method = 'Post' target='_blank' action='../admin/samplepdf.php'>
    <input class = 'form-control' type='hidden' name='bid' value='{$row['BillingID']}' readonly/>
    <input class = 'form-control' type='hidden' name='rid' value='{$row['ReservationID']}' readonly/>
    "; ?> <?php include '../Admin/displayRecit.php' ?> <?php echo"
    </div>
    </div>
    </div>

        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
        <input type='submit' class='btn btn-warning' name='print' value='Print' />
        </form>
        </div>
      </div>
    </div>
  </div>
</div>";


          echo "</td> </tr>";
          $i++;

        }
        ?>
                        </tbody>
                        </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
