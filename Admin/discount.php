<?php
include 'dbconn.php';	
$bid = $_POST['bid'];
$rid = $_POST['rid'];

//night
$nightq = mysqli_query($conn, "SELECT * from reservation where ReservationID = '$rid'") or die("nght");
//select original price
$orP = mysqli_query($conn, "SELECT * from billing where BillingID = '$bid'");
//discount type query
$queryss = mysqli_query($conn, "SELECT DISTINCT RoomType from roomtype") or die ("error");

//nightcont
  $night = mysqli_fetch_array($nightq);
  $checkin = strtotime($night['CheckInDate']);
  $checkout = strtotime($night['CheckOutDate']);
  $nightcon = abs($checkout - $checkin);
  $nightcount = ($nightcon/86400);
//bip
$tar = mysqli_fetch_array($orP);
$totalAmount = $tar['TotalAmount'];
$Balance = $tar['Balance'];

$ctr=0;
while($arrays = mysqli_fetch_array($queryss)){
	$dt = $_POST['discount'.$ctr];
	$quan = $_POST['count'.$ctr];
	if($quan != 0){
	$dts = mysqli_query($conn, "SELECT * From discount where DiscountType = '$dt'");
	$rt = mysqli_query($conn, "SELECT * from roomtype rt join room r on rt.RoomID = r.RoomID join roominventory ri on r.RoomID = ri.RoomID where rt.Roomtype = '{$arrays['RoomType']}' and ri.ReservationID = '$rid'");
	$psp = mysqli_fetch_array($rt);
	$pS = $psp['RoomRate']; 
	$psdt = mysqli_fetch_array($dts);
	$dtps = $psdt['DiscountPercent'];
	$tAmount+=(($pS * $quan) * $dtps);
	}
	$ctr++;
}
$tAmount*=$nightcount;

$total= $totalAmount - $tAmount;
$totalBalance= $Balance - $tAmount;
mysqli_query($conn, "UPDATE billing SET TotalAmount = '$total', Balance = '$totalBalance' where BillingID = '$bid'") or die ("no connection update");

mysqli_close($conn);
    print ("<script language='JavaScript'>
    window.location.href='Billing.php';
    </SCRIPT>");
?>