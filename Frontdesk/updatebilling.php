<?php
include 'dbconn.php';
if(!empty($_POST)){
	if(!empty($_POST['amountentered'])){
$bID = $_POST['billingid'];
$GFN = $_POST['name'];
$totalA = $_POST['totalamount'];
$paidA = $_POST['paidamount'];
$balance = $_POST['balance'];
$billstat = $_POST['billingstatus'];
$modeOP = $_POST['modeofpayment'];
$amountentered = $_POST['amountentered'];

$query = mysqli_query($conn, "SELECT * FROM billing where BillingID = '$bID'");
$row = mysqli_fetch_assoc($query);
$pa = $row['PaidAmount'];
$balance = $row['Balance'];
if(isset($_POST['update'])){
	if($balance == 0){
	echo "<script language='JavaScript'>
				window.alert('Guest is already settled the account')
				window.location.href='Billing.php';
				</SCRIPT>";
	}elseif($amountentered > $balance){
		echo "<script language='JavaScript'>
				window.alert('Please Enter a much lesser value')
				window.location.href='Billing.php';
				</SCRIPT>";
	}elseif($amountentered <= 0){
		echo "<script language='JavaScript'>
				window.alert('Please Enter a much more value')
				window.location.href='Billing.php';
				</SCRIPT>";
		}else{
		if($balance > 0){
		$totalbalance = $balance - $amountentered;
		$totalamoutpaid = $amountentered + $pa;
			if($totalbalance == "0.00"){
				mysqli_query($conn, "UPDATE billing SET Balance = '$totalbalance', PaidAmount = '$totalamoutpaid', BillingStatus = 'Fully Paid' where BillingID = '$bID'") or die ("no connection update");	
				mysqli_close($conn);
				print ("<script language='JavaScript'>
				window.location.href='Billing.php';
				</SCRIPT>");
			}else{
		mysqli_query($conn, "UPDATE billing SET Balance = '$totalbalance', PaidAmount = '$totalamoutpaid' where BillingID = '$bID'") or die ("no connection update");

		mysqli_close($conn);
 		print ("<script language='JavaScript'>
		window.location.href='Billing.php';
		</SCRIPT>");
 	}
		}

}
}

	}else{
		print ("<script language='JavaScript'>
		window.location.href='Billing.php';
		</SCRIPT>");
	}
}

?>