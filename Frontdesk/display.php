<!doctype html>
<head>
	<title></title>

</head>
<link rel="stylesheet" type="text/css" href="../css/table.css">
 <script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="../bootstrap/js/jquery.growl.js"></script>
    <script src="../bootstrap/js/dataTables.min.js"></script>
    <script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>

   
<body>

<?php
	include('dbconn.php');

	$query = "SELECT * FROM Guest";
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
		<td align = 'center'></td>
		</tr>";
		
		 $i= 1;


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
			<td align = 'center'>{$row['Password']}
            <td align = 'center'>
           
             <a href='#myModal$i' data-placement='bottom' data-original-title='Edit' data-toggle='modal'><i class='glyphicon glyphicon-edit large'></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp

   <div class='modal fade' id='myModal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
        {$row['GuestId']}
       </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
			</tr>
			</td>";
			$i++;
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>