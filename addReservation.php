<?php
session_start();

include ('dbconn.php');
	//guest table
	$GID = date('Y') . "-" . rand(999,99999);
	$fname = $_SESSION['firstName'];
	$mname = $_SESSION['middleName'];
	$lname = $_SESSION['lastName'];
	$address = $_SESSION['address'];
	$gender = $_SESSION['gender'];
	$mnum = $_SESSION['mobNum'];
	$email = $_SESSION['email'];
	$password = md5($_SESSION['password']);

	//reservation table
	$ResID = rand(9,9999);
	$adult = $_SESSION['adult'];
	$addadult = $_SESSION['adultadd'];
	$CheckInDate = $_SESSION['from'];
	$CheckOutDate = $_SESSION['to'];
	$RevDate = date('Y-m-d');

    $numdays = abs(strtotime($CheckInDate) - strtotime($RevDate))/86400;
	if ($numdays > 7) {
	$ExpirationDate = date('Y-m-d', strtotime($RevDate. ' + 7 days'));
	}else{
		$ExpirationDate = $CheckOutDate;
	}

	$ttlgst = $addadult + 	$adult;

$ctr = 0;
$record = mysqli_query($conn, "SELECT Distinct RoomType FROM roomtype");
$roomcount = mysqli_num_rows($record);
while($row=mysqli_fetch_assoc($record)){
 	$counter[] = $row['RoomType'];
}

while($ctr < $roomcount){
	$data = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = '$counter[$ctr]'");

	$countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = '$counter[$ctr]'  AND
              ((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
            or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");


			$presDrow = mysqli_num_rows($countpsreserved);
			$totalpdrow = mysqli_num_rows($data);
			$presDcount = $totalpdrow - $presDrow;

	if($_SESSION['roomcount'][$ctr] > $presDcount){

    	 echo ("<script language='JavaScript'>
        window.alert('The rooms are already taken')
        window.location.href='selectroom.php';
        </SCRIPT>");
    }
	$ctr++;
}





	$guest = mysqli_query($conn, "INSERT INTO guest (GuestId, GuestFName, GuestMName, GuestLName, Address, Gender, ContactNumber, Email, Password) VALUES ('$GID', '$fname', '$mname', '$lname', '$address', '$gender', '$mnum', '$email', '$password')");
	$strrms = "";


	$rec = mysqli_query($conn, "SELECT Distinct RoomType from roomtype");
	$roomcount = mysqli_num_rows($rec);
	$ctr=0;
	while($ctr < $roomcount){

		$rr=$_SESSION['roomcount'][$ctr];
		$rrs=$_SESSION['roomtype'][$ctr];
		$rrt=$_SESSION['roomtotal'][$ctr];
		if($rr > 0){
			$counterps = 0;
			$roomSinglePre = mysqli_query($conn, "SELECT RoomID FROM roomtype WHERE RoomType = '$rrs'");
			while($counterps < $rr){
				while ($rmsp = mysqli_fetch_assoc($roomSinglePre)){
					if ($counterps < $rr){
						$pSemp = mysqli_query($conn, "SELECT * from roominventory where RoomID = '{$rmsp['RoomID']}' AND (Status = 'Reserved' or Status = 'Pending') AND
							((CheckInDate >= '$CheckInDate' and CheckInDate < '$CheckOutDate' )
						or (CheckOutDate > '$CheckInDate'and CheckOutDate < '$CheckOutDate' ) or (CheckOutDate >= '$CheckOutDate')and(CheckInDate < '$CheckInDate'))");
						$countps = mysqli_num_rows($pSemp);

							if($countps == 0){
								$availps = $rmsp['RoomID'];
								$strrms = $strrms." ".$availps;
	 							mysqli_query($conn, "INSERT INTO roominventory (ReservationID, RoomID, CheckInDate, CheckOutDate, Status) VALUES ('$ResID', '$availps', '$CheckInDate', '$CheckOutDate', 'Pending')");
 								$counterps++;
	 						} else {
	 							echo "skip";
	 						}
					}else{
						break;
					}
				}
			}
		}
	$ctr++;
	}



	$reservation = mysqli_query($conn, "INSERT INTO reservation (ReservationID, GuestID, RoomsReserved, NumberOfAdult, ReservationDate, CheckInDate, CheckOutDate, ExpirationDate, Status)
		VALUES('$ResID', '$GID', '$strrms', '$ttlgst', '$RevDate', '$CheckInDate', '$CheckOutDate', '$ExpirationDate', 'Pending')") or die("error reservation");

	//billing table
	$TotalAmount = $_SESSION['totalroom'];
	$ModeOfPayment = $_SESSION['modeofpayment'];
	$payment = $_SESSION['payment'];



	if ($ModeOfPayment == 'Paypal'){
		$TotalAmount = $_SESSION['amount'];
		$paidamount = $_SESSION['paidamount'];
		$balance = '0.00';
		if ($payment == 'Down Payment'){
			$balance = $TotalAmount - $paidamount;
			$billingstatus = 'Pending';
		} else {
			$billingstatus = 'Fully Paid';
		}


		$billing = mysqli_query($conn, "INSERT INTO billing (ReservationID, TotalAmount, PaidAmount, Balance, BillingStatus, ModeOfPayment)
		VALUES('$ResID','$TotalAmount', '$paidamount', '$balance', '$billingstatus', '$ModeOfPayment')");

		mysqli_query($conn, "UPDATE reservation SET Status = 'Reserved' WHERE ReservationID = '$ResID'");

		mysqli_query($conn, "UPDATE roominventory SET Status = 'Reserved' WHERE ReservationID = '$ResID'");


	} else {
		$billing = mysqli_query($conn, "INSERT INTO billing (ReservationID, TotalAmount, PaidAmount, Balance, BillingStatus, ModeOfPayment)
		VALUES('$ResID','$TotalAmount', '0.00', '$TotalAmount', 'Pending', '$ModeOfPayment')");
	}

	$rmstring = $_SESSION['rmspName']." ".$_SESSION['rmdpName']." ".$_SESSION['rmssName']." ".$_SESSION['rmdsName'];
	$amount = number_format($TotalAmount);
	$date = date('Y-m-d');
	$ttlrms = $_SESSION['ttlrms'];
	$to = $email;
	$subject = "Casa de Tobias Mountain Resort Reservation";
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

                                                                            Thank you for booking with us, here are the complete details of your reservation/s.<br><br>

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
																				<td width='40%'>Hotel Address: </td><td width='60%'>Alibungbungan, Nagcarlan, Laguna</td>
																			</tr>
																			<tr>
																				<td width='40%'>Hotel Phone: </td><td width='60%'>(043) 749 4613</td>
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
                                                                               <td width='60%'>Casa de Tobias Mountain Resort Bank Account: </td>
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
                                                                        <div>Copyright © 2018 <span style='color:#828282;'>Casa de Tobias Mountain Resort Resort</span></a>. All&nbsp;rights&nbsp;reserved.</div>
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

if($ModeOfPayment == 'Paypal'){
	mysqli_close($conn);

	print ("<script language='JavaScript'>
	window.location.href='localhost/casadetibiasofficial/Guest/index.php';
	</SCRIPT>");
	$_SESSION['guestid'] = $GID;
 	$_SESSION['Email'] = $email;


}else{
	mysqli_close($conn);

	print ("<script language='JavaScript'>
	window.location.href='Guest/index.php';
	</SCRIPT>");
	$_SESSION['guestid'] = $GID;
 	$_SESSION['Email'] = $email;

}



?>
