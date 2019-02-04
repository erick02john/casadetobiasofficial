<!DOCTYPE html>
<html>
<head>
    <title></title>
     <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
 include 'dbconn.php';
        $bid = $_POST['bid'];
        $rid = $_POST['rid'];
            $type = $_POST['amenitytype'];
            $description = $_POST['description'];
            $quan = $_POST['quantity'];
            $price = $_POST['price'];
            if($price < 0){
                 echo ("<script language='JavaScript'>
                 alert('Enter a much bigger value');
                 </SCRIPT>");
            }else{
            $query = mysqli_query($conn, "SELECT * FROM billing where BillingID = '$bid'") or die("select");
           
            $row = mysqli_fetch_assoc($query);
            $totalAmount = $row['TotalAmount'];
            $balance = $row['Balance'];

            mysqli_query($conn, "INSERT INTO amenity (ReservationID, AmenityType, Quantity, AmenityPrice, Description) VALUES ('$rid', '$type', '$quan', '$price', '$description')") or die("insert");
            $totalPrice = $price * $quan;
            $tbalance = $balance + $totalPrice;
            $tAmount = $totalAmount + $totalPrice;
            mysqli_query($conn, "UPDATE billing SET TotalAmount = '$tAmount', Balance = '$tbalance', BillingStatus = 'Pending' where BillingID = '$bid'") or die ("no connection update");
             //amenity
    $ame = mysqli_query($conn, "SELECT * from amenity where ReservationID = '$rid'")or die("nght"); 
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
        while($amenity = mysqli_fetch_array($ame)){
            $amenitys = ($amenity['AmenityPrice'] * $amenity['Quantity']);
            echo "
          <tr>
          <td>{$amenity['Description']}</td>
          <td>{$amenity['Quantity']}</td>
          <td></td>
          <td>{$amenity['AmenityPrice']}</td>
          <td>$amenitys</td>
          </tr>"; 
        }
        echo"</table>";

            ?>
            <div class="panel-body">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Success! <a href="#" class="alert-link"></a>.
                            </div><?php
    mysqli_close($conn);
}
?>
</body>
</html>

