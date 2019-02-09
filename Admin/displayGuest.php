<!DOCTYPE html>
<!DOCTYPE html>
<head>
  <title></title>

    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

  </head>
<body>

<?php
	include 'addaccountmodal.php';
	include 'dbconn.php';

	$query = mysqli_query($conn, "SELECT * From guest") or die("error query"); ?>

	<div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Guest Accounts</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">


	<?php
	echo "<thead>
			<tr>
				<td align = 'center'>GuestID</td>
				<td align = 'center'>Name</td>
				<td align = 'center'>Email</td>
				<td align = 'center'>ContactNo</td>
			</tr>
		  </thead>
		  <tbody>";
	$i=1;
	while ($row = mysqli_fetch_assoc($query)){
		echo "<tr>
		<td align = 'center'>{$row['GuestId']}</td>
		<td align = 'center'>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</td>
		<td align = 'center'>{$row['Email']}</td>
		<td align = 'center'>{$row['ContactNumber']}</td>";
		echo "</td>
		</tr>";

		$i++;
	}
	echo "</tbody>"; ?>
 				</table>
              </div>
           	</div>
        <div class="card-footer small text-muted"></div>
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
