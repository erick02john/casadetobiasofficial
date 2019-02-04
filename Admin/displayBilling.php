<!DOCTYPE html>
<head>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 		<!-- Latest minified bootstrap css -->
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>
<body>
	<?php
include 'dbconn.php';
include ('../scriptvalidation.php');


	$query = mysqli_query($conn, "SELECT * FROM billing b JOIN reservation r ON b.ReservationID = r.ReservationID join guest g on r.GuestID = g.GuestID");
	$discount = mysqli_query($conn, "SELECT * FROM discount") or die ("error"); ?>

	<div class="card mb-3">
            <div class="card-header" style="font-size: 22px;">
              <i class="fas fa-table"></i>
              Billing</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">

	
	<?php
	echo "<thead>
			<tr>
				<td align = 'center'>BillingID</td>
				<td align = 'center'>Guest Name</td>
				<td align = 'center'>Total Amount</td>
				<td align = 'center'>Paid Amount</td>
				<td align = 'center'>Balance</td>
				<td align = 'center'>Billing Status</td>
				<td align = 'center'>Reservation Status</td>
				<td align = 'center'>Action</td>
			</tr>
		  </thead>
		  <tbody>";
		 $i=1;
	while($row = mysqli_fetch_array($query)){
		echo"<tr>
				<td align = 'center'>{$row['BillingID']}</td>
				<td align = 'center'>{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}</td>
				<td align = 'center'>{$row['TotalAmount']}</td>
				<td align = 'center'>{$row['PaidAmount']}</td>
				<td align = 'center'>{$row['Balance']}</td>
				<td align = 'center'>{$row['BillingStatus']}</td>
				<td align = 'center'>{$row['Status']}</td>
				<td align = 'center'>

			<a href='#myModal$i' data-placement='bottom' class='btn btn-outline-warning btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-edit' style ='font-size:13px;'></i></a>
	
	<div class='modal fade' id='myModal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>{$row['GuestFName']}'s Billing</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>

		<table class='table'>
		<form method = 'Post' action='updatebilling.php'>
		<tr>
			<th>BillingID:</th>
			<td><input class = 'form-control' type='text' name='billingid' align='middle' value='{$row['BillingID']}' readonly /></td>
		</tr>
		<tr>
		
		<th>Guest Name:</th>
			<td><input class = 'form-control' type='text' name='name' value='{$row['GuestFName']} {$row['GuestMName']} {$row['GuestLName']}' readonly/></td>
		</tr>
		<tr>
			<th>TotalAmount:</th>
			<td><input class = 'form-control' type='text' name='totalamount' value='{$row['TotalAmount']}' readonly/></td>
		</tr>
		<tr>
			<th>PaidAmount:</th>
			<td><input class = 'form-control' type='text' name='paidamount' value='{$row['PaidAmount']}' readonly/></td>
		</tr>
		<tr>
			<th>Balance:</th>
			<td><input class = 'form-control' type='text' name='balance' value='{$row['Balance']}' readonly/></td>
		</tr>
		<tr>
			<th>BillingStatus:</th>
			<td><input class = 'form-control' type='text' name='billingstatus' value='{$row['BillingStatus']}' readonly/></td>
		</tr>
		<tr>
			<th>ModeOfPayment:</th>
			<td><input class = 'form-control' type='text' name='modeofpayment' value='{$row['ModeOfPayment']}' readonly/></td>
		</tr>
		<tr>
			<th>EnterAmount:</th>
			<td><input class = 'form-control' type='text' name='amountentered' maxlength='13' onkeypress='return restrictCharacters(this, event, integerOnly);' /></td>
		</tr>
			<tr>
			<td>

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
									<h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> update Billing {$row['GuestFName']}?</h4>
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
              
			<a href='#modal$i' data-placement='bottom' class='btn btn-outline-info btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-print' style ='font-size:13px;'></i></a>

<div class='modal fade' id='modal$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Billing Statement</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>
		<form method = 'Post' target='_blank' action='../Admin/samplepdf.php'>
		<input class = 'form-control' type='hidden' name='bid' value='{$row['BillingID']}' readonly/>
		<input class = 'form-control' type='hidden' name='rid' value='{$row['ReservationID']}' readonly/>
		"; ?> <?php include 'displayRecit.php' ?> <?php echo"
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
</div>
			<a href='#modalss$i' data-placement='bottom' class='btn btn-outline-primary btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-plus' style ='font-size:13px;'></i></a>

<div class='modal fade' id='modalss$i' role='dialog' >
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Add Amenity</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
        
        <div>
        <div id='msg$i'></div>
		<div class='table-responsive'>
		<table class='table'>
		<form id='amn$i'>
		<input id='bid$i' class = 'form-control' type='hidden' name='bid' value='{$row['BillingID']}' readonly/>
		<input id = 'rid$i' class = 'form-control' type='hidden' name='rid' value='{$row['ReservationID']}' readonly/>
		<tr>
		<th>Amenity Type</th>
		<th>Description</th>
		<th>Quantity</th>
		<th>Price</th>
		</tr>
		<tr>
		<td><select id='amenitytype$i' class = 'form-control' name='amenitytype' REQUIRED>
		<option value = ''></option>
		<option value = 'Toiletries'>Toiletries</option>
		<option value = 'Bar'>Bar</option>
		<option value = 'Restaurant'>Restaurant</option>
		<option value = 'Swimmingpool'>Swimmingpool</option>
		<option value = 'Others'>Others</option>
		</select></td>
		<td><input id='description$i' class = 'form-control' type='text' name='description' REQUIRED/></td>
		<td><input id='quantity$i' class = 'form-control' type='text' name='quantity' maxlength='3' onkeypress='return restrictCharacters(this, event, phoneOnly);' REQUIRED/></td>
		<td><input id='price$i' class = 'form-control' type='text' name='price' maxlength='10' onkeypress='return restrictCharacters(this, event, integerOnly);' REQUIRED/></td>
		</tr>
		</table>
		</div>
		</div>
		</div>							
       	<script>
    $('#amn$i').submit( function sbmt(){
    	var bid = document.getElementById('bid$i').value;
        var rid = document.getElementById('rid$i').value;
        var amenitytype = document.getElementById('amenitytype$i').value;
        var description = document.getElementById('description$i').value;
        var quantity = document.getElementById('quantity$i').value;
        var price = document.getElementById('price$i').value;
        var dataString = 'amenitytype=' + amenitytype + '&description=' + description + '&quantity=' + quantity + '&price=' + price + '&bid=' + bid + '&rid=' + rid;
        $.ajax({
            type:'post',
            url:'addAmenity.php',
            data:dataString,
            cache:false,
            success: function(html){
            	 $('#msg$i').html(html);
                    $('#amenitytype$i').val('');
                    $('#description$i').val('');
                    $('#quantity$i').val('');
                    $('#price$i').val('');
                   
            }
        });
        return false;
    });
</script>

        <div class='modal-footer'>
        <a class='btn btn-default' id='modalss$i' data-dismiss='modal'/>Cancel</a>
        <input type='submit' class='btn btn-warning' name='Add' value='Add' />
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<a href='#modalsss$i' data-placement='bottom' class='btn btn-outline-danger btn-sm' data-original-title='Edit' data-toggle='modal'><i class='fa fa-tags' style ='font-size:13px;'></i></a>

<div class='modal fade' id='modalsss$i' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Discount</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
        <div>
		<div class='table-responsive'>
		
		<form method = 'Post' action='discount.php'>
		<input class = 'form-control' type='hidden' name='bid' value='{$row['BillingID']}' readonly/>
		<input class = 'form-control' type='hidden' name='rid' value='{$row['ReservationID']}' readonly/>
		"; include 'displaydiscount.php'; 
		echo"
		</div>
		</div>
		</div>							
       	
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
        <input type='submit' class='btn btn-warning' name='discount' value='Add' />
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

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
</body>
</html>