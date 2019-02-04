<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   

    <title>Santiago's Resort</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="../bootstrap/css/animate.css">
		<link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.growl.css">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" />

		

		<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap/js/jquery.growl.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/dataTables.min.js"></script>
		<script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>

  </head>
  <body>

  	<?php $i= 1;?>

							<a href="#changeStatus<?php echo $i;?>" class="open-edituser" data-placement="bottom" data-original-title="Edit" data-toggle="modal"><i class="glyphicon glyphicon-edit large"></i></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							
						
					<div class="modal fade" id="changeStatus<?php echo $i;?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header alert alert-info">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h3><b>Billing</b></h3>
								</div>
								<div>
								<div class="table-responsive">
									<table class="table">
										<form method="POST" action="Check-in_Registration.php">
											<tr>
												<th>
													Last Name: 
												</th>
												<td>
													<input class="form-control" name= lastName type="Text" name="billid">
												</td>
												
											</tr>
											<tr>
												<th>
													First Name: 
												</th>
												<td>
													<input class="form-control" type="Text" name="firstName" value="test">
												</td>
												
											</tr>
											<tr>
												<th>
													Middle Name: 
												</th>
												<td>
													<input class="form-control" type="Text" name="middleName" value="test">
												
											</tr>
											<tr>
												<th>
													Guest Name: 
												</th>
												<td>
													<input class="form-control" type="Text" name="gFullname"value="test">
												</td>
												
											</tr>
											<tr>
												<th>
													Total Amount: 
												</th>
												<td>
													<input class="form-control" type="Text" name="totalamount" value="test">
												</td>
												
											</tr>
											<tr>
												<th>
													Paid: 
												</th>
												<td>
													<input class="form-control" type="Text" name="paid" value="test">
												</td>
												
											</tr>
											
											<tr>
												<th>
													Balance: 
												</th>
												<td>
													<input class="form-control" type="Text" name="receivable" value="test">
												</td>
												
											</tr>
											
											<tr>
											<!--input type="hidden" name="refCode" value="<?php //echo $row['referenceCode']; ?>" /-->
											<!--input type='hidden' name='hidden' value="<?php// echo $row['referenceCode']; ?>" /-->
												
												<th>Status: </th>
												<td>
												<input class="form-control" type="Text" name="paystatus" value="test">
												</td>
											</tr>
											<tr>
												<th>
													Payment Amount: 
												</th>
												<td>
													<input class="form-control" type="Text" name="paymentamount" onkeypress="return restrictCharacters(this, event, digitsOnly);" autocomplete="off"/>
												</td>
												
											</tr>
											
									</table>
								</div>
								</div>
								<div class="modal-footer">
									<a class="btn btn-default" data-dismiss="modal"/>Cancel</a>
									<a href="#areyousure<?php echo $i;?>" data-toggle="modal" class="btn btn-success" >Confirm</a>
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="modal fade" id="areyousure<?php echo $i;?>" role="dialog" style="z-index: 9998;">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
									<h4 align="center"><i class="glyphicon glyphicon-question-sign"></i> Are you sure?</h4>
								</div>
								<div class="modal-footer">
									
										<a class="btn btn-default" data-dismiss="modal">NO</a>
										<input type="submit" class="btn btn-warning" name="update" value="YES" />
									</form>
								</div>
							</div>
						</div>
					</div>
					</td>
					</td>
				</tr>
					<?php  $i++;  ?>	
		
			</table>
		</div>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>
</div>


</body>
</html>