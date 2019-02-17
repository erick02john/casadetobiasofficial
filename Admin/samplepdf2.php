<?php
//if(isset($_POST['print'])){
	include "../pdf/fpdf.php";
	include "dbconn.php";
	$pdf=new FPDF();

	$pdf->AddPage();
	//getting post
	$date = date("Y-m-d");
	$bID= $_POST['bid'];
	$resID = $_POST['rid'];
//guest
	$queryres = mysqli_query($conn, "SELECT * from reservation where ReservationID = '$resID'") or die ("res");
	$res = mysqli_fetch_array($queryres);
    $gid = $res['GuestID'];
    $queryres = mysqli_query($conn, "SELECT * from guest where GuestID = '$gid'") or die ("res");
	$res = mysqli_fetch_array($queryres);
    $guestname = $res['GuestLName'] . ", " . $res['GuestFName'] . " " . $res['GuestMName'];
    $address = $res['Address'];
    $contact = $res['ContactNumber'];

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


		  $tgCount=0;
		  $totalRoomBill=0;



echo"";

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5, 'Casa de Tobias Mountain Resort',0,0);
$pdf->Cell(59 ,5,'ACKNOWLEDGE RECEIPT',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Alibungbungan, Nagcarlan, Laguna',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Casa de Tobias Nagcarlan',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$date,0,1);//end of line

$pdf->Cell(130 ,5,'(043) 740 4898',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,$bID,0,1);//end of line

$pdf->Cell(130 ,5,'(043) 740 4698',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,$gid,0,1);//end of line

$pdf->Cell(130 ,5,' ',0,0);
$pdf->Cell(29 ,5,'BillingID',0,0);
$pdf->Cell(30 ,5,$bID,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$guestname,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$address,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$contact,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(80 ,5,'Description',1,0, 'C');
$pdf->Cell(15 ,5,'Qty.',1,0, 'C');
$pdf->Cell(25 ,5,'No. of night',1,0,'C');
$pdf->Cell(34 ,5,'Price',1,0,'C');
$pdf->Cell(34 ,5,'Amount',1,1,'C');//end of line

$pdf->SetFont('Arial','',12);

	while($rec=mysqli_fetch_assoc($record)){
		$ps = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = $resID and Roomtype = '{$rec['RoomType']}'") or die ("error");
		$pstp = mysqli_fetch_array($ps);
    	$price = $pstp['RoomRate'];
		$count = mysqli_num_rows($ps);
		$total = $price * $count * $nightcount;
		$totalRoomBill+=$total;
		if($count > 0){
	$pdf->Cell(80 ,5,$rec['RoomType'],1,0);
 	$pdf->Cell(15 ,5,$count,1,0,'C');
	$pdf->Cell(25 ,5,$nightcount,1,0,'C');
	$pdf->Cell(34 ,5,$price,1,0,'C');
	$pdf->Cell(34 ,5,number_format($total,2),1,1,'R');
		  }
    	$tgCount += $count*2;

	}

//Numbers are right-aligned so we give 'R' after new line parameter
	$totalgc = 0;
		  //extraguest
	  if($guest['NumberOfAdult'] > 2){
    	$totalgc=$guest['NumberOfAdult']-$tgCount;
    	$tgPrice = $totalgc * 800.00 * $nightcount;
		}else{
		$tgPrice=0;
		$tgCount=0;
	}
	 if($totalgc > 0){
		  $pdf->Cell(80 ,5,'ExtraGuest',1,0);
		   	$pdf->Cell(15 ,5,$totalgc,1,0, 'C');
			$pdf->Cell(25 ,5,$nightcount,1,0,'C');
			$pdf->Cell(34 ,5,800,1,0,'C');
			$pdf->Cell(34 ,5,$tgPrice,1,1,'R');
		}

		// 	$amenitys = 0;
		//   $amenityss = 0;
		// while($amenity = mysqli_fetch_array($ame)){
		// 	$amenitys = ($amenity['AmenityPrice'] * $amenity['Quantity']);
		// 	$amenityss += $amenitys;
		// 	echo "
		//   <tr>
		//   <td>{$amenity['Description']}</td>
		//   <td>{$amenity['Quantity']}</td>
		//   <td></td>
		//   <td>{$amenity['AmenityPrice']}</td>
		//   <td>$amenitys</td>
		//   </tr>";
		// }
			$amenitys = 0;
		  $amenityss = 0;
		while($amenity = mysqli_fetch_array($ame)){
			$amenitys = ($amenity['AmenityPrice'] * $amenity['Quantity']);
			$amenityss += $amenitys;
			$pdf->Cell(80 ,5,$amenity['Description'],1,0);
		   	$pdf->Cell(15 ,5,$amenity['Quantity'],1,0, 'C');
			$pdf->Cell(25 ,5,' ',1,0,'C');
			$pdf->Cell(34 ,5,$amenity['AmenityPrice'],1,0,'C');
			$pdf->Cell(34 ,5,number_format($amenitys,2),1,1,'R');

		}
		$totalRoomBill+=$amenityss;
		$totalBill=$totalRoomBill+$tgPrice;
		$vat = $totalRoomBill * .12;
	//summary


			$pdf->Cell(80 ,5,'VAT',1,0);
		   	$pdf->Cell(15 ,5,'',1,0, 'C');
			$pdf->Cell(25 ,5,' ',1,0,'C');
			$pdf->Cell(34 ,5,'PHP',1,0,'R');
			$pdf->Cell(34 ,5,number_format($vat,2),1,1,'R');
//end of line
$pdf->Cell(80 ,5,'Subtotal',1,0);
	$pdf->Cell(15 ,5,'',1,0, 'C');
$pdf->Cell(25 ,5,' ',1,0,'C');
$pdf->Cell(34 ,5,'PHP',1,0,'R');
$pdf->Cell(34 ,5,number_format($totalBill,2),1,1,'R');

 if($billing < $totalBill){
		  	$dp = $totalBill - $billing;

			$pdf->Cell(80 ,5,'Discount Amount',1,0);
		   	$pdf->Cell(15 ,5,'',1,0, 'C');
			$pdf->Cell(25 ,5,' ',1,0,'C');
			$pdf->Cell(34 ,5,'PHP',1,0,'R');
			$pdf->Cell(34 ,5,number_format($dp,2),1,1,'R');
			$pdf->Cell(80 ,5,'Discounted Price:',1,0);
		   	$pdf->Cell(15 ,5,'',1,0, 'C');
			$pdf->Cell(25 ,5,' ',1,0,'C');
			$pdf->Cell(34 ,5,'PHP',1,0,'R');
			$pdf->Cell(34 ,5,number_format($billing,2) ,1,'R');


		   }





$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(130,10, 'Prepared For: ',0,1);
$pdf->Cell(130,10, 'Prepared For: ',0,1);
$pdf->Cell(130,10, '_________________',0,1);
$pdf->Cell(130,0, '          Signature',0,1);//end of line

	$pdf->Output();
//}
?>
