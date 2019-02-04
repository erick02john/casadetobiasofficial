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

	$query = mysqli_query($conn, "SELECT * From accounts") or die("error query"); ?>

	<div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Accounts</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">

	
	<?php
	echo "<thead>
			<tr>
				<td align = 'center'>UserID</td>
				<td align = 'center'>UserName</td>
				<td align = 'center'>FullName</td>
				<td align = 'center'>ContactNo</td>
				<td align = 'center'>UserType</td>
				<td align = 'center'>UserStatus</td>
				<td align = 'center'>Action</td>
			</tr>
		  </thead>
		  <tbody>";
	$i=1;
	while ($row = mysqli_fetch_assoc($query)){
		echo "<tr>
		<td align = 'center'>{$row['UserID']}</td>
		<td align = 'center'>{$row['Username']}</td>
		<td align = 'center'>{$row['FullName']}</td>
		<td align = 'center'>{$row['ContactNo']}</td>
		<td align = 'center'>{$row['UserType']}</td>
		<td align = 'center'>{$row['UserStatus']}</td>
		<td align = 'center'>
		<a href='#myModal$i' data-placement='bottom' class='btn btn-outline-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-edit' style ='font-size:13px;'></i></a>

   <div class='modal fade' id='myModal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          
          <h4 class='modal-title'>Edit Account</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
         <div>
		<div class='table-responsive'>

		<table class='table'>
		<form method = 'Post' action='updateAccounts.php'>
		<tr>
			<th>UserID:</th>
			<td><input class = 'form-control' type='text' name='userid' value='{$row['UserID']}' readonly /></td>
		</tr>
		<tr>
			<th>UserName:</th>
			<td><input class = 'form-control' type='text' name='username' value='{$row['Username']}'/></td>
		</tr>
		<tr>
			<th>Password:</th>
			<td><input class = 'form-control' type='password' name='password' value='{$row['Password']}'/></td>
		</tr>
		<tr>
			<th>FullName:</th>
			<td><input class = 'form-control' type='text' name='fullname' value='{$row['FullName']}'/></td>
		</tr>
		<tr>
			<th>ContactNo:</th>
			<td><input class = 'form-control' type='text' name='contactno' value='{$row['ContactNo']}'/></td>
		</tr>
		<tr>
			<th>UserType:</th>";

		if($row['UserType'] == 'Admin'){
			echo "<td><input class = 'form-control' type='text' name='usertype' value='{$row['UserType']}' readonly/></td>";
		}else{
			echo "<td>
				<select  class='form-control'  name = 'usertype'>
				<option value = '{$row['UserType']}' selected hidden>{$row['UserType']}</option>
     			<option value = 'Admin'>Admin</option>
     			<option value = 'Frontdesk'>Frontdesk</option>
        		</select>";
        	}
        	echo "</td>
		</tr>
		<tr>
			<th>UserStatus:</th>
			<td>
				<select  class='form-control'  name = 'userstatus'>
				<option value = '{$row['UserStatus']}' selected hidden>{$row['UserStatus']}</option>
     			<option value = 'Active'>Active</option>
     			<option value = 'Deactivated'>Deactivated</option>
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
									<h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Update Record {$row['FullName']}?</h4>
								</div>
								<div class='modal-footer'>
										<a class='btn btn-default' data-dismiss='modal'>NO</a>
										<input type='submit' class='btn btn-warning' name='update' value='YES' />
										</form>
									</div>
								</div>
							</div>
						</div>
</div>";
if($row['UserType'] == 'Admin'){
	echo "";
}else{

echo "<a href='#modal$i' data-placement='bottom' class='btn btn-outline-danger btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-trash' style ='font-size:13px;'></i></a>
	<div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>

        <div class='modal-dialog modal-sm'>
							<div class='modal-content'>
								<div class='modal-body'>
								<form method = 'POST' action = 'deleteAccounts.php'>
								<input class = 'form-control' type='hidden' name='userid' value='{$row['UserID']}' readonly />
									<button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
									<h4 align='center'><i class='fa fa-question'></i> Are you sure you want to Delete {$row['UserID']}?</h4>
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
        </div>";
}
		echo "</td>
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