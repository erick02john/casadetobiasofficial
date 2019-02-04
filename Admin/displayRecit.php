<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$bID= $row['BillingID'];
	$resID = $row['ReservationID'];
	//total amount
	$amount = mysqli_query($conn, "SELECT * from billing where BillingID = '$bID'");
 $record = mysqli_query($conn, "SELECT DISTINCT RoomType FROM roomtype");
//amenity
	$ame = mysqli_query($conn, "SELECT * from amenity where ReservationID = '$resID'") or die("nght");
//night
	$res = mysqli_query($conn, "SELECT * from reservation where ReservationID = $resID") or die("nght");
	//night
	$ress = mysqli_query($conn, "SELECT * from reservation where ReservationID = $resID") or die("nght");
//nightcont
	$night = mysqli_fetch_array($res);
	$checkin = strtotime($night['CheckInDate']);
	$checkout = strtotime($night['CheckOutDate']);
	$nightcon = abs($checkout - $checkin);
	$nightcount = ($nightcon/86400);
	$guest = mysqli_fetch_array($ress);


	$bill = mysqli_fetch_array($amount);
    $billing = $bill['TotalAmount'];
   
	echo "<div class='table-responsive'>
	<table class='display table' width='100%'>";
	echo "<tr>
		  <th>Availed</th>
		  <th>Qty.</th>
		  <th>No. of nights</th>
		  <th>Price</th>
		  <th>Total Price</th>
		  </tr>
		  ";
		  $tgCount=0;
		  $totalRoomBill=0;
	while($rec=mysqli_fetch_assoc($record)){
		$ps = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = $resID and Roomtype = '{$rec['RoomType']}'") or die ("error");
		$pstp = mysqli_fetch_array($ps);
    	$price = $pstp['RoomRate'];
		$count = mysqli_num_rows($ps);
		$total = $price * $count * $nightcount;
		$totalRoomBill+=$total;
		if($count > 0){
			echo "<tr>
					<td>{$rec['RoomType']}</td>
				  	<td>$count</td>
		  		  	<td>$nightcount</td>
		  		  	<td>$price</td>
		 		  	<td>$total</td>
		 		  </tr>";
		  }
    	$tgCount += $count*2;
    
	}
	  if($guest['NumberOfAdult'] > 2){
    	$totalgc=$guest['NumberOfAdult']-$tgCount;
    	$tgPrice = $totalgc * 800.00 * $nightcount;
		}else{
		$tgPrice=0;
		$tgCount=0;
	}
	 if($totalgc > 0){
		  echo "
		  <tr>
		  <td>Extraguest </td>
		  <td>$totalgc</td>
		  <td>$nightcount</td>
		  <td>800</td>
		  <td>$tgPrice</td>
		  </tr>";
		  
		}
	$amenitys = 0;
		  $amenityss = 0;
		while($amenity = mysqli_fetch_array($ame)){
			$amenitys = ($amenity['AmenityPrice'] * $amenity['Quantity']);
			$amenityss += $amenitys;
			echo "
		  <tr>
		  <td>{$amenity['Description']}</td>
		  <td>{$amenity['Quantity']}</td>
		  <td></td>
		  <td>{$amenity['AmenityPrice']}</td>
		  <td>$amenitys</td>
		  </tr>"; 
		}
		$totalRoomBill+=$amenityss;
		$totalBill=$totalRoomBill+$tgPrice;
	 echo "<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  		<th>SubTotal:</th>
		  		<th>$totalBill</th>
		  		</tr>";
 if($billing < $totalBill){
		  	$dp = $totalBill - $billing;
		  	 		echo "<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <th>Discount amount:</th>
		  <td>$dp</td>
		  </tr>";
		  		echo "<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <th>Discounted Price:</th>
		  <th>$billing</th>
		  </tr>";
		   }
echo"</table>
</div>";
?>

</body>
</html>