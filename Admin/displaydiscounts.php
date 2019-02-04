<!DOCTYPE html>
<head>
  <title></title>

    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

  </head>
<body>
<?php
include ('../scriptvalidation.php');
include 'addDiscount.php';
	include('dbconn.php');
	$query = "SELECT *
	from discount";

	$response = mysqli_query($conn, $query) or die ("No connection"); ?>

  <div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Discounts</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 13.5px;">

  
  <?php
	echo "<thead>
			<tr>
				<td align='center'>DiscountID</td>
        <td align='center'>DiscountType</td>
        <td align='center'>DiscountPercent</td>
        <td align='center'>Action</td>
			</tr>
		 </thead>
		 <tbody>";
			$i=1;
	while ($row = mysqli_fetch_assoc($response)){
	   echo "<tr>
				<td align='center'>{$row['DiscountID']}</td>
        <td align='center'>{$row['DiscountType']}</td>
        <td align='center'>{$row['DiscountPercent']}</td>
				<td align = 'center'>
           
             <a href='#myModal$i' data-placement='bottom' class='btn btn-outline-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-edit' style ='font-size:13px;'></i></a>

   <div class='modal fade' id='myModal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Edit Discount</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>
		<table class='table'>
        
        <form method='POST' action='updatediscount.php'>
       <tr>
       <td><input class = 'form-control' type='hidden' name='did' value='{$row['DiscountID']}' readonly/></td>
       </tr>
       <tr>
       <td>Discount Type</td>
       <td><input class = 'form-control' type='text' name='dt' value='{$row['DiscountType']}'></td>
       </tr>
       <tr>
       <td>Discount Pecent</td>
       <td><input class = 'form-control' type='text' name='dp' value='{$row['DiscountPercent']}'></td>
       </tr>
        </table>
        </div>
        </div>
       </div>
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
		<a href='#areyousure$i' data-toggle='modal' class='btn btn-success' >Confirm</a>
        </div>
      </div>
    </div>
  </div>
  <div class='modal fade' id='areyousure$i' role='dialog' style='z-index: 9998'>
						<div class='modal-dialog modal-sm'>
							<div class='modal-content'>
								<div class='modal-body'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
									<h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Are you sure?</h4>
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
<a href='#modal$i'  data-placement='bottom' class='btn btn-outline-danger btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-trash' style ='font-size:13px;'></i></a>


  <div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
<br><br><br><br><br><br><br><br>
        <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                
                <form method = 'POST' action = 'updatediscount.php'>
                <input class = 'form-control' type='hidden' name='did' value='{$row['DiscountID']}' readonly />
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='fa fa-question'></i> Delete Discount {$row['DiscountType']}?</h4>
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
			</tr>
			</td>";
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

