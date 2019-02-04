<?php
 include 'dbconn.php';
 if(isset($_POST['cancel'])){
 print ("<script language='JavaScript'>
    window.location.href='Billing.php';
    </SCRIPT>");
 }
 		$bid = $_POST['bid'];
 		$rid = $_POST['rid'];
            $type = $_POST['amenitytype'];
            $description = $_POST['description'];
            $quan = $_POST['quantity'];
            $price = $_POST['price'];

            $query = mysqli_query($conn, "SELECT * FROM billing where BillingID = '$bid'") or die("select");
            $row = mysqli_fetch_assoc($query);
            $totalAmount = $row['TotalAmount'];
            $balance = $row['Balance'];

            mysqli_query($conn, "INSERT INTO amenity (ReservationID, AmenityType, Quantity, AmenityPrice, Description) VALUES ('$rid', '$type', '$quan', '$price', '$description')") or die("insert");
            $totalPrice = $price * $quan;
            $tbalance = $balance + $totalPrice;
            $tAmount = $totalAmount + $totalPrice;
            mysqli_query($conn, "UPDATE billing SET TotalAmount = '$tAmount', Balance = '$tbalance', BillingStatus = 'Pending' where BillingID = '$bid'") or die ("no connection update");

    mysqli_close($conn);
    print ("<script language='JavaScript'>
    window.location.href='Billing.php';
    </SCRIPT>");
?>