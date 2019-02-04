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
    		font-size: 17px;

    	}
    </style>
</head>

<body>

<?php
  include('dbconn.php');

  $query = "SELECT * 
  from room join roomtype 
  on room.RoomID = roomtype.RoomID";

  $response = mysqli_query($conn, $query) or die ("No connection");

  echo "<div class='table-responsive'>
		<table id='myTable' class='display table' width='100%'>";
  echo "<thead>
  			<tr>
    			<td align = 'center'>RoomNumber</td>
    			<td align = 'center'>RoomType</td>
    			<td align = 'center'>RoomRate</td>
    			<td align = 'center'>RoomCapacity</td>
    			<td align = 'center'>RoomStatus</td>
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