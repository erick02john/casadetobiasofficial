<?php
session_start();

include ('dbconn.php');
	//guest table
	$GID = $_SESSION['guestid'];

	$info = mysqli_query($conn, "SELECT * FROM guest WHERE GuestId = '$GID'") ;
	while ($row = mysqli_fetch_assoc($info)){
		$fname = $row['GuestFName'];
		$mname = $row['GuestMName'];
		$lname = $row['GuestLName'];
		$email = $row['Email'];
		$mnum = $row['ContactNumber'];
	}


	//reservation table
	$resID = $_SESSION['resID'];
	$adult = $_SESSION['adult'];
	$addadult = $_SESSION['adultadd'];
	$CheckInDate = $_SESSION['from'];
	$CheckOutDate = $_SESSION['to'];
	$ttlgst = $addadult + 	$adult;

	$result = mysqli_query($conn, "SELECT RoomID from roominventory Where ReservationID = '$resID'") or die("error result");

	while($row = mysqli_fetch_assoc($result)){
					$roomstat = $row['RoomID'];
					$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Unoccupied' where RoomID = '$roomstat'") or die("error room");
				}


	$strrms = "";
	$counterps = 0;

	$delete = mysqli_query($conn, "DELETE FROM roominventory WHERE ReservationID = '$resID'");


	$roomSinglePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Presidential(Queen Sized-Bed)'");
	while($counterps < $_SESSION['presSNum']){
	while ($rmsp = mysqli_fetch_assoc($roomSinglePre)){
	if ($counterps < $_SESSION['presSNum']){
		$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmsp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countps = mysqli_num_rows($pSemp);

	if($countps == 0){
		$availps = $rmsp['RoomID'];
		$strrms = $strrms." ".$availps;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availps', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$counterps++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}
}

	$counterpd = 0;

	$roomDoublePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Presidential(Twin Sized-Bed)'");
	while($counterpd < $_SESSION['presDNum']){
	while ($rmdp = mysqli_fetch_assoc($roomDoublePre)){
	if ($counterpd < $_SESSION['presDNum']){
		$pDemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmdp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countpd = mysqli_num_rows($pDemp);

	if($countpd == 0){
		$availpd = $rmdp['RoomID'];
		$strrms = $strrms." ".$availpd;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availpd', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$counterpd++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}
}


	$counterss = 0;

	$roomSingleSup = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Superior(Queen Sized-Bed)'");
	while($counterss < $_SESSION['supSNum']){
	while ($rmss = mysqli_fetch_assoc($roomSingleSup)){
	if ($counterss < $_SESSION['supSNum']){
		$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmss['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countss = mysqli_num_rows($pSemp);

	if($countss == 0){
		$availss = $rmss['RoomID'];
		$strrms = $strrms." ".$availss;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availss', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$counterss++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}
}


$countersd = 0;

	$roomDoubleSup = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = 'Superior(Twin Sized-Bed)'");
	while($countersd < $_SESSION['supDNum']){
	while ($rmds = mysqli_fetch_assoc($roomDoubleSup)){
	if ($countersd < $_SESSION['supDNum']){
		$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmds['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
		$countsd = mysqli_num_rows($pSemp);

	if($countsd == 0){
		$availsd = $rmds['RoomID'];
		$strrms = $strrms." ".$availsd;
	 	mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$resID', '$availsd', '$CheckInDate', '$CheckOutDate', 'Pending')");
 	$countersd++;
	 } else {
	 	echo "skip";
	 }
	}else{
		break;
	}
	}
}

	$result2 = mysqli_query($conn, "SELECT RoomID from roominventory Where ReservationID = '$resID'") or die("error result");
	while($row = mysqli_fetch_assoc($result2)){
					$roomstat = $row['RoomID'];
					$room = mysqli_query($conn, "UPDATE room SET RoomStatus = 'Occupied' where RoomID = '$roomstat'") or die("error room");
				}

	$reservation = mysqli_query($conn, "UPDATE reservation SET RoomsReserved = '$strrms',  NumberOfAdult = '$ttlgst' where ReservationID = '$resID'") or die("error reservation");

	//billing table
	$TotalAmount = $_SESSION['totalroom'];

	$bill = mysqli_query($conn, "SELECT * from billing where ReservationID = '$resID'");
	$row = mysqli_fetch_array($bill);
	$paidamount = $row['PaidAmount'];

	$totalbalance = $TotalAmount - $paidamount;
	$billing = mysqli_query($conn, "UPDATE billing set TotalAmount = '$TotalAmount', Balance = '$totalbalance' where ReservationID = '$resID'");


	$rmstring = $_SESSION['rmspName']." ".$_SESSION['rmdpName']." ".$_SESSION['rmssName']." ".$_SESSION['rmdsName'];

	$amount = number_format($TotalAmount);
	$date = date('Y-m-d');
	$ttlrms = $_SESSION['ttlrms'];
	$to = $email;
	$subject = "Casa de Tobias Mountain Resort Reservation Modification";
	$message = "
<td align='center' valign='top'>

	</table><table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='600'><tbody><tr><td align='center' valign='top'>

                                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#1362ac'><tbody><tr><td align='center' valign='top'>

                                            <table border='0' cellpadding='0' cellspacing='0' width='600' class='flexibleContainer'><tbody><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'>

                                                        <table border='0' bgcolor='#003366' width='100%' height = '50px'><tbody><tr><td align='left' valign='middle'>

                                                            <center><font style='font-family: Arial Black, Helvetica, sans-serif;' color= '#dfab21'>Casa de Tobias Mountain Resort</center>
                                                            </tr></tbody></table></td>
                                                </tr></tbody></table></td>
                                    </tr></tbody></table></td>
                        </tr><tr><td align='center' valign='top'>

                             </td>
                        </tr><tr><td align='center' valign='top'>

                                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tbody>
								<tr>
								<td valign='top'>




															<table align='left'border='0' cellpadding='0' cellspacing='0' class='flexibleContainer'><tbody><tr>
														<td align='center' valign='top' class='textContent'>
                                                                    <div  style='text-align:left;font-family:Helvetica, Arial, sans-serif;font-size:15px;margin-right: 10; margin-left:10;margin-bottom:0;margin-top:10px;color:#5F5F5F;line-height:135%;'>

                                                                        <a>Date: $date</a>
																		<p>
																			Good Day!<br><br>

                                                                            Thank you for booking with us, here are the complete details of your reservation/s modification.<br><br>

                                                                            Please retain this for your reference<br>
                                                                            Prices are in PHP<br>

																		</p>
																		<table  cellpadding='1' cellspacing='0' style='font-size: 17px;' width='100%'>
																			<tr>
																				<td width='40%'>Date of Booking: </td><td width='60%'>$RevDate</td>
																			</tr>
																			<tr>
																				<td width='40%'>Check-in Date: </td><td width='60%'>$CheckInDate</td>
																			</tr>
																			<tr>
																				<td width='40%'>Check-out Date: </td><td width='60%'>$CheckOutDate</td>
																			</tr>
																			<tr>
																				<td width='40%'>Hotel Address: </td><td width='60%'>Alibungbungan Nagcarlan Laguna</td>
																			</tr>
																			<tr>
																				<td width='40%'>Hotel Phone: </td><td width='60%'>(02) 794 3471</td>
																			</tr>
																			<tr>
																				<td width='40%'>Alternative Hotel Phone: </td><td width='60%'>(043)  4698 </td>
																			</tr>
                                                                        </table><br>
                                                                        <table  cellpadding='1' cellspacing='0' style='font-size: 17px;' width='100%'>
                                                                            <tr>
                                                                                <td width='40%'>Guest Name: </td><td width='60%'>$fname $mname $lname</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width='40%'>Guest Email: </td><td width='60%'>$email</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width='40%'>Guest Phone: </td><td width='60%'>$mnum</td>
                                                                            </tr>
                                                                        </table><br>
                                                                        <table  cellpadding='1' cellspacing='0' style='font-size: 17px;' width='100%'>
                                                                            <tr>
                                                                                <td width='40%'>Room: </td><td width='60%'>$rmstring</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width='40%'>Number of rooms reserved: </td><td width='60%'>$ttlrms</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width='40%'>Breakfast No. of PAX: </td><td width='60%'>$ttlgst</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width='40%'>Inclusive of use of pool for: </td><td width='60%'>$ttlgst</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width='40%'>Total Amount: </td><td width='60%'><b>&#8369; $amount</b></td>
                                                                            </tr>
																		</table><br><br>
																		<table  cellpadding='1' cellspacing='0' style='font-size: 17px;' width='100%'>
                                                                            <tr>
                                                                               <td width='60%'>Casa de Tobias Mountain Resort Account: </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>MR. COMMONWEALTH PROPERTIES INC. (MRCPI)</b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>7589-632669</b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>RCBC SAVINGS BANK</b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>PADRE GARCIA BRANCH</b></td>
                                                                            </tr>


																		</table>

																		<h4>Payment Policy:</h4>
																		<p>All bookings must be guaranteed at the time of reservation by cash, advance deposit or Paypal. Thank you.</p>


																		<p>
                                                                            We hope you find everything in order, please e-mail or call us should you have questions or clarifications.
                                                                        </p>

																		<p>Thank You!</p>

                                                                    </div>
                                                                </td>

                                                            </tr></tbody></table>

															</td>
                                                </td>
                                    </tr></tbody></table></td>
                        </tr>
                        </tr></tbody></table><table bgcolor='#E1E1E1' border='0' cellpadding='0' cellspacing='0' width='600'><tbody><tr><td align='center' valign='top'>

                               <!--  <table border='0' cellpadding='0' cellspacing='0' width='100%'><tbody><tr><td align='center' valign='top'>

                                            <table border='0' cellpadding='0' cellspacing='0' width='600' class='flexibleContainer'><tbody><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'>
                                                        <table border='0' cellpadding='40' cellspacing='0' width='100%'><tbody><tr><td valign='top' bgcolor='#E1E1E1'>
                                                                    <div style='font-family:Helvetica, Arial, sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;'>
                                                                        <div>Copyright © 2019 <span style='color:#828282;'>Casa de Tobias Mountain Resort Resort</span></a>. All&nbsp;rights&nbsp;reserved.</div>
                                                                    </div>
                                                                </td>
                                                            </tr></tbody></table></td>
                                                </tr></tbody></table></td>
                                    </tr></tbody></table></td>
                        </tr></tbody></table> --></td>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <casadetobiasmountainresort@gmail.com>' . "\r\n";
$headers .= 'Cc: casadetobiasmountainresort@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);



	print ("<script language='JavaScript'>
	window.location.href='Reservationinfo.php';
	</SCRIPT>");
	$_SESSION['guestid'] = $GID;

?>
