<?php
	 include 'dbconn.php';
// $amountpaid = 400.00;
// $bal = mysqli_query($conn, "SELECT * FROM billing where BillingID = '22'");
// $row = mysqli_fetch_assoc($bal);
// 	$balance = $row['Balance'];
// 	$ap = $row['PaidAmount'];

// //$totalbalance = 300.00 - $amountpaid;
// echo $ap . "-" . $balance . "=";
//echo $totalbalance;
/*	 $ResID = rand(1,9);
	 echo "$ResID";
	 mysqli_query($conn, "INSERT into test (id, name) VALUES ($ResID, 'dave')") or die("error");*/
// $update = mysqli_query($conn, "UPDATE billing SET Balance = '22800.00', PaidAmount = '0.00',  BillingStatus = 'Pending' where BillingID = '22'") or die ("no connection update");
	// $counter = 0;
	// $counts = 2;
	// $strrms = "";
	// $ResID = rand(9,999);
	// $roomSinglePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Presidential(Single)'");
	// while($counter < $counts){
	// while ($rmsp = mysqli_fetch_assoc($roomSinglePre)){
	// if ($counter < $counts){
	// 	$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmsp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending') AND 
	// 						((CheckInDate >= '2018-01-23' and CheckInDate < '2018-01-25' )
	// 					or (CheckOutDate >= '2018-01-23'and CheckOutDate < '2018-01-25' ))");
	// 	$count = mysqli_num_rows($pSemp);

	// if($count == 0){
	//  echo "hii";
	// 	$avail = $rmsp['RoomID'];
	// 	$strrms = $strrms." ".$avail;
	//  	 mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$ResID', '$avail', '2018-01-23', '2018-01-24', 'Pending')");
 // 	$counter++;
	//  } else {
	//  	echo "error";
	//  }
	// }else{
	// 	break;
	// }

	
	// }
	
// }
// echo "string";
// echo "$strrms";

	// $pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmsp['RoomID']}' AND Status = ' ' AND 
	// 						((CheckInDate >= '2018-01-23' and CheckInDate < '2018-01-24' )
	// 					or (CheckOutDate >= '2018-01-23'and CheckOutDate < '2018-01-24' ))");
	// $count = mysqli_num_rows($pSemp);
	// echo $count;
	// while ($row = mysqli_fetch_assoc($pSemp)){
	// 	echo "<tr>
	// 		<td align = 'center'>{$row['roominid']}</td>
	// 		<td align = 'center'>{$row['RoomID']}</td>
	// 		<td align = 'center'>{$row['CheckInDate']}</td>
	// 		<td align = 'center'>{$row['CheckOutDate']}</td>
	// 		<td align = 'center'>{$row['Status']}</td>
 //            <tr>";
 //        }
 //            	echo "</table>";
	/* $date = date('2018-02-15');
	 $date1 = date('2018-02-11');
	 $timediff = abs(strtotime($date) - strtotime($date1));
	 $numdays = $timediff/86400;
	 echo "$numdays";*/
	//mysqli_close($conn);

	/* $str1 = 'dave';
	 $str2 = ' ';
	 $str3 = 'baho';

	 $string = $str1.$str2.$str3;
	 echo $string;*/
// 	 $now = date('Y-m-d');
// $date = date('Y-m-d', strtotime($now. ' + 1 year')); 
// $stat = mysqli_query($conn, "SELECT * FROM room r JOIN roominventory ri ON r.RoomID = ri.RoomID WHERE ri.RoomID = '303' and (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND ((CheckInDate >= '$now' and CheckInDate < '$date' )
//             or (CheckOutDate >= '$now' and CheckOutDate < '$date' ) or (CheckOutDate >= '$date')and(CheckInDate < '$now'))");
//     $statcnt = mysqli_num_rows($stat); 

//     echo "$statcnt";
	 


?>