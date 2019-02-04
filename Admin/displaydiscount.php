
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$querys = mysqli_query($conn, "SELECT DISTINCT RoomType from roomtype") or die ("error");
echo "<div class='table-responsive'>
	  <table class='display table' width='100%'>
	<tr>
		<th>Room Type</th>
		<th>Quantity</th>
		<th>Discount Type</th>
		</tr>
		";
		$ctr=0;
	while($array = mysqli_fetch_array($querys)){
		 //$counter[]= str_replace(" ","*",$array['RoomType']);
		$q = mysqli_query($conn, "SELECT * from room r join roominventory ri on r.RoomID = ri.RoomID join roomtype rt on rt.RoomID = r.RoomID where ReservationID = '$resID' and Roomtype = '{$array['RoomType']}'") or die ("error");
			$countRooms = mysqli_num_rows($q);
			$discount = mysqli_query($conn, "SELECT * FROM discount") or die ("error");
		if($countRooms != 0){
		echo "<tr>
		<td><input class = 'form-control' type='text' name='' value='{$array['RoomType']}' readonly/></td>
		<td>
		<select class = 'form-control' name='count$ctr'>
		<option value = '0'>0</option>
		";
		for($x = 1; $x <= $countRooms; $x++){
		echo "<option value = '$x'>$x</option>";
		}
		echo"
		</select>
		</td>
		<td>
		<select class = 'form-control' name='discount$ctr'>
		"; while($rows = mysqli_fetch_array($discount)){
		 echo "<option value = '{$rows['DiscountType']}'>{$rows['DiscountType']}</option>";
		} 
		echo"
		</select>
		</td>
		</tr>";
	}else{
		echo "<input  type='hidden' name='count$ctr'  value='0' readonly/>
			  <input  type='hidden' name='discount$ctr'  value='0' readonly/>";
		}
		$ctr++;
	}
		
		echo"</table>
		  </div>";
?>
</body>
</html>




