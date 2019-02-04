<?php 
//if(isset($_POST['print'])){
	include "../pdf/fpdf.php";
	include "dbconn.php";
	$pdf=new FPDF();

	$pdf->AddPage();
	//getting post
	$date = date("Y-m-d");
	$billingID = $_POST['bid'];
	$reservationID =$_POST['rid'];
	//total amount
	$amount = mysqli_query($conn, "SELECT * from billing where BillingID = '$billingID'");
	//amenity
	$ame = mysqli_query($conn, "SELECT * from amenity where ReservationID = '$reservationID'") or die("nght");
	//guest
	$queryres = mysqli_query($conn, "SELECT * from reservation where ReservationID = '$reservationID'") or die ("res");
	$res = mysqli_fetch_array($queryres);
    $gid = $res['GuestID'];
    $queryres = mysqli_query($conn, "SELECT * from guest where GuestID = '$gid'") or die ("res");
	$res = mysqli_fetch_array($queryres);
    $guestname = $res['GuestLName'] . ", " . $res['GuestFName'] . " " . $res['GuestMName'];
    $address = $res['Address'];
    $contact = $res['ContactNumber'];

	$bID= $_POST['bid'];
	$resID = $_POST['rid'];
	//night
	$nightq = mysqli_query($conn, "SELECT * from reservation where ReservationID = '$resID'") or die("nght");
	//roomprice
	$pstpq = mysqli_query($conn, "SELECT SUM(roomrate) as psPrice from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Presidential(Queen Sized-Bed)'") or die ("error");
	$pdtpq = mysqli_query($conn, "SELECT SUM(roomrate) as pdPrice from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Presidential(Twin Sized-Bed)'") or die ("error");
	$sstpq = mysqli_query($conn, "SELECT SUM(roomrate) as ssPrice from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Superior(Queen Sized-Bed)'") or die ("error");
	$sdtpq = mysqli_query($conn, "SELECT SUM(roomrate) as sdPrice from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Superior(Twin Sized-Bed)'") or die ("error");
	//roomcount
	$ps = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Presidential(Queen Sized-Bed)'") or die ("error");
	$pd = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Presidential(Twin Sized-Bed)'") or die ("error");
	$ss = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Superior(Queen Sized-Bed)'") or die ("error");
	$sd = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = 'Superior(Twin Sized-Bed)'") or die ("error");
	$tgq = mysqli_query($conn, "SELECT * from reservation where ReservationID = '$resID'") or die ("error");

	//bil 
	$bill = mysqli_fetch_array($amount);
    $billing = $bill['TotalAmount'];
	//nightcont
	$night = mysqli_fetch_array($nightq);
	$checkin = strtotime($night['CheckInDate']);
	$checkout = strtotime($night['CheckOutDate']);
	$nightcon = abs($checkout - $checkin);
	$nightcount = ($nightcon/86400);
	//roomcount
	$countPs = mysqli_num_rows($ps);
	$countPd = mysqli_num_rows($pd);
	$countSs = mysqli_num_rows($ss);
	$countSd = mysqli_num_rows($sd);
	//roomprice
	$pstp = mysqli_fetch_array($pstpq);
    $psPrice = $pstp['psPrice'];
    $pdtp = mysqli_fetch_array($pdtpq);
    $pdPrice = $pdtp['pdPrice'];
    $sstp = mysqli_fetch_array($sstpq);
    $ssPrice = $sstp['ssPrice'];
    $sdtp = mysqli_fetch_array($sdtpq);
    $sdPrice = $sdtp['sdPrice'];
    $tg = mysqli_fetch_array($tgq);
  if($tg['NumberOfAdult'] > 2){
    $tgCount = $tg['NumberOfAdult'] - (($countPs * 2)+($countPd * 2)+($countSs * 2)+($countSd * 2));
    $tgPrice = $tgCount * 800.00;
}else{
	$tgPrice=0;
	$tgCount=0;
}
    //roomtotal
    $totalps = $psPrice * $nightcount;
    $totalpd = $pdPrice * $nightcount;
    $totalss = $ssPrice * $nightcount;
    $totalsd = $sdPrice * $nightcount;
    $totalg = $tgPrice * $nightcount;

   $total = ($psPrice + $pdPrice + $ssPrice + $sdPrice + $tgPrice) * $nightcount;





//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5, 'Rosario Resort and Hotel',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'National Highway, Brgy Quilib',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Rosario Batangas Philippines',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$date,0,1);//end of line

$pdf->Cell(130 ,5,'(043) 740 4898',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,$billingID,0,1);//end of line

$pdf->Cell(130 ,5,'(043) 740 4698',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,$gid,0,1);//end of line

$pdf->Cell(130 ,5,' ',0,0);
$pdf->Cell(29 ,5,'ReservationID',0,0);
$pdf->Cell(30 ,5,$reservationID,0,1);//end of line

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

//Numbers are right-aligned so we give 'R' after new line parameter
 if($countPs > 0){
 	$pdf->Cell(80 ,5,'Presidential(Queen Sized-Bed)',1,0);
 	$pdf->Cell(15 ,5,$countPs,1,0,'C');
$pdf->Cell(25 ,5,$nightcount,1,0,'C');
$pdf->Cell(34 ,5,$psPrice,1,0,'C');
	$pdf->Cell(34 ,5,$totalps,1,1,'R');//end of line
		  }
 if($countPd > 0){
 	$pdf->Cell(80 ,5,'Presidential(Twin Sized-Bed)',1,0);
 	$pdf->Cell(15 ,5,$countPd,1,0,'C');
$pdf->Cell(25 ,5,$nightcount,1,0,'C');
$pdf->Cell(34 ,5,$pdPrice,1,0,'C');
	$pdf->Cell(34 ,5,$totalpd,1,1,'R');//end of line
	}
	   if($countSs > 0){
	   	$pdf->Cell(80 ,5,'Superior(Queen Sized-Bed)',1,0);
	   	$pdf->Cell(15 ,5,$countSs,1,0, 'C');
		$pdf->Cell(25 ,5,$nightcount,1,0,'C');
		$pdf->Cell(34 ,5,$ssPrice,1,0,'C');
		$pdf->Cell(34 ,5,$totalss,1,1,'R');//end of line
		  }
		   if($countSd > 0){
		   	$pdf->Cell(80 ,5,'Superior(Twin Sized-Bed)',1,0);
		   	$pdf->Cell(15 ,5,$countSd,1,0, 'C');
			$pdf->Cell(25 ,5,$nightcount,1,0,'C');
			$pdf->Cell(34 ,5,$sdPrice,1,0,'C');
			$pdf->Cell(34 ,5,$totalsd,1,1,'R');//end of PDF_lineto(p, x, y)
		  }
		  //extraguest
		  if($tgCount >= 1){
		    $pdf->Cell(80 ,5,'ExtraGuest',1,0);
		   	$pdf->Cell(15 ,5,$tgCount,1,0, 'C');
			$pdf->Cell(25 ,5,$nightcount,1,0,'C');
			$pdf->Cell(34 ,5,$tgPrice,1,0,'C');
			$pdf->Cell(34 ,5,$totalg,1,1,'R');//end of PDF_lineto(p, x, y)
}	  		

			$amenitys = 0;
		  $amenityss = 0;
		while($amenity = mysqli_fetch_array($ame)){
			$amenitys = ($amenity['AmenityPrice'] * $amenity['Quantity']);
			$amenityss += $amenitys;
			$pdf->Cell(80 ,5,$amenity['Description'],1,0);
		   	$pdf->Cell(15 ,5,$amenity['Quantity'],1,0, 'C');
			$pdf->Cell(25 ,5,' ',1,0,'C');
			$pdf->Cell(34 ,5,$amenity['AmenityPrice'],1,0,'C');
			$pdf->Cell(34 ,5,$amenitys,1,1,'R');
		   
		}
		$total += $amenityss;
//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(20 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'P',1,0);
$pdf->Cell(34 ,5,$total,1,1,'R');//end of line

 if($billing < $total){
		  	$dp = $total - $billing;
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(20 ,5,'Dcnt Amt',0,0);
$pdf->Cell(4 ,5,'P',1,0);
$pdf->Cell(34 ,5,$dp,1,1,'R');
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(20 ,5,'Dcntd Price:',0,0);
$pdf->Cell(4 ,5,'P',1,0);
$pdf->Cell(34 ,5,$billing,1,1,'R');


}

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Taxable',0,0);
// $pdf->Cell(4 ,5,'$',1,0);
// $pdf->Cell(30 ,5,'0',1,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Tax Rate',0,0);
// $pdf->Cell(4 ,5,'$',1,0);
// $pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Total Due',0,0);
// $pdf->Cell(4 ,5,'$',1,0);
// $pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line
	$pdf->Output();
//}
?>