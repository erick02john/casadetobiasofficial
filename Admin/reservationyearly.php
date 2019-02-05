<?php include "../pdf/fpdf.php";
	include "dbconn.php";

class PDF extends FPDF {
		function Header(){
			$this->SetFont('Arial','B',14);
			$this->Cell(130 ,5, 'Casa de Tobias Mountain Resort',0,0);
				$this->Cell(59 ,5,'Reservation Report',0,0);//end of line
				$this->Cell(25 ,5,'',0,1);
			$this->SetFont('Arial','',12);
			$this->Cell(130 ,5,'Alibungbungan, Nagcarlan, Laguna',0,0);
			$this->Cell(20 ,5,'Date',0,0);
			$this->Cell(34 ,5,date("Y-m-d"),0,1);//end of line
			$this->Cell(25 ,5,'',0,0);
			$this->Cell(34 ,5,'',0,1);//end of line

			$this->Cell(130 ,5,'(043) 740 4898',0,0);
			$this->Cell(25 ,5,'',0,0);
			$this->Cell(34 ,5,'',0,1);//end of line
			$this->Cell(130 ,5,'(043) 740 4698',0,0);

			$this->Cell(59 ,5,'',0,1);//end of line
			//$this->Cell(59 ,5,$day.' ReservationReport',0,1);
		}
		function Footer(){
			$name = $_POST['id'];
			$this->SetFont('Arial','B',14);

			$this->Cell(130 ,5,'',0,1);//end of line
			$this->Cell(130,10, 'Prepared For: '.$name,0,1);

			$this->Cell(130,10, '_________________',0,1);
			$this->Cell(130,0, '          Signature',0,1);

			//$this->Cell(59 ,5,$day.' ReservationReport',0,1);
		}

	}
	$type = $_POST['year'];

			$date=date($type);


	if($_POST['status'] == 'All Reservation'){
			$status = "";
	}else{
		$status = $_POST['status'];
	}


	$querycount = mysqli_query($conn, "SELECT * FROM reservation where ReservationDate LIKE '%{$date}%' and Status LIKE '%{$status}%'") or die("error");
	$counts = mysqli_num_rows($querycount);

	$sum = 0;
	$sums = 0.0;
	$sumguest = 0;

    $query = mysqli_query($conn, "SELECT * FROM reservation r join billing b on r.ReservationID=b.ReservationID where ReservationDate LIKE '%{$date}%' and Status LIKE '%{$status}%'") or die("error");
		while($row = mysqli_fetch_array($query)){
				$roomcount = mysqli_query($conn, "SELECT * FROM roominventory where ReservationID = '{$row['ReservationID']}'");
				$count = mysqli_num_rows($roomcount);
				$sum+=$count;
				$sumguest += $row['NumberOfAdult'];
				$sums += $row['TotalAmount'];
		}

	$pdf=new PDF();
$datetoday = date("Y-m-d");
	$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
// $pdf->Cell(130 ,5, ' ',0,0);
// $pdf->Cell(59 ,5,$type.' ReservationReport',0,1);//end of line

//set font to arial, regular, 12pt


// $pdf->Cell(130 ,5,'National Highway, Brgy Quilib',0,0);
// $pdf->Cell(59 ,5,'',0,1);//end of line

// $pdf->Cell(25 ,5,'Date',0,0);
// $pdf->Cell(34 ,5,$datetoday,0,1);//end of line

// $pdf->Cell(130 ,5,'(043) 740 4898',0,0);
// $pdf->Cell(25 ,5,'Invoice #',0,0);
// $pdf->Cell(34 ,5,$billingID,0,1);//end of line

// $pdf->Cell(130 ,5,'(043) 740 4698',0,0);
// $pdf->Cell(25 ,5,'Customer ID',0,0);
// $pdf->Cell(34 ,5,$gid,0,1);//end of line

// $pdf->Cell(130 ,5,' ',0,0);
// $pdf->Cell(29 ,5,'ReservationID',0,0);
// $pdf->Cell(30 ,5,$reservationID,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(300 ,5,'Total number of '. $_POST['status'],0,1);//end of line
$pdf->Cell(300 ,5,"for the year " . $type . " : " . $counts,0,1);//end of line
//billing address
// $pdf->Cell(100 ,5,'Bill to',0,1);//end of line
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(300 ,5,'Total Rooms Reserved:		' . $sum,0,1);
$pdf->Cell(300 ,5,'Total Number Of Guest:		' . $sumguest,0,1);
$pdf->Cell(300 ,5,'Total Revenue Amount:		' . $sums,0,1);
// //add dummy cell at beginning of each line for indentation
// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,$guestname,0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,$address,0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,$contact,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',6);
	$pdf->Cell(25,5,'ReservationID',1,0,'C');
	$pdf->Cell(25,5,'GuestID',1,0,'C');
	$pdf->Cell(25,5,'RoomsReserved',1,0,'C');
	$pdf->Cell(20,5,'NumberOfGuest',1,0,'C');
	$pdf->Cell(25,5,'CheckInDate',1,0,'C');
	$pdf->Cell(25,5,'CheckOutDate',1,0,'C');
	$pdf->Cell(20,5,'Status',1,0,'C');
	$pdf->Cell(20,5,'TotalAmount',1,0,'C');
	$pdf->ln();

	$sum = 0;
	$sums = 0.0;
	$sumguest = 0;


	$query = mysqli_query($conn, "SELECT * FROM reservation r join billing b on r.ReservationID=b.ReservationID where ReservationDate LIKE '%{$date}%' and Status LIKE '%{$status}%'") or die("error");

    while($row = mysqli_fetch_array($query)){
	$pdf->Cell(25,5,$row['ReservationID'],1,0,'C');
	$pdf->Cell(25,5,$row['GuestID'],1,0,'C');
	$roomcount = mysqli_query($conn, "SELECT * FROM roominventory where ReservationID = '{$row['ReservationID']}'");
	$count = mysqli_num_rows($roomcount);
	$sum+=$count;
	$pdf->Cell(25,5,$count,1,0,'C');
	$pdf->Cell(20,5,$row['NumberOfAdult'],1,0,'C');
	$sumguest += $row['NumberOfAdult'];
	$pdf->Cell(25,5,$row['CheckInDate'],1,0,'C');
	$pdf->Cell(25,5,$row['CheckOutDate'],1,0,'C');
	$pdf->Cell(20,5,$row['Status'],1,0,'C');
	$pdf->Cell(20,5,$row['TotalAmount'],1,0,'C');
	$sums += $row['TotalAmount'];
	$pdf->ln();
	}
	$pdf->AddPage();
		$pdf->Output();

?>
