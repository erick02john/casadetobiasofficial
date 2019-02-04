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
        width: 95%;
      }
    </style>
  </head>
<body>
<?php
  include('dbconn.php');
  $query = "SELECT *
  from guest g join reservation r
  on g.GuestId = r.GuestID where (Status = 'Checked-out' or Status = 'No Show') ORDER BY CheckInDate DESC";

  $response = mysqli_query($conn, $query) or die ("No connection");

  echo "<div class='table-responsive'>
    <table id='myTable' class='display table' width='100%'>";
  echo "<thead>
      <tr>
        <td class='col-xs-2' align = 'center'>GuestID</td>
        <td align = 'center'>Guest Name</td>
        <td align = 'center'>Room Number(s)</td>
        <td class='col-xs-1'align = 'center'>NumberOfAdult</td>
        <td align = 'center'>CheckInDate</td>
        <td align = 'center'>CheckOutDate</td>
        <td align = 'center'>Status</td>
      </tr>
     </thead>
     <tbody>";
      $i=1;
  while ($row = mysqli_fetch_assoc($response)){
     echo "<tr>

        <td class='col-xs-2' align = 'center'>{$row['GuestId']}</td>
        <td align = 'center'>{$row['GuestFName']} {$row['GuestLName']}</td>
        <td align='center'>{$row['RoomsReserved']}</td>
        <td class='col-xs-1' align = 'center'>{$row['NumberOfAdult']}</td>
        <td align = 'center'>{$row['CheckInDate']}</td>
        <td align = 'center'>{$row['CheckOutDate']}</td>
        <td align = 'center'>{$row['Status']}</td>
      </tr>
      ";
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

