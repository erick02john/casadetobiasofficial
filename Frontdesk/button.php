<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>SAMPLE BUTTON</title>
   </head>
   <body>

  <?php
  include 'dbconn.php';
    echo"<form method='post'> 
    Roomtype: <br>
    <input name = 'room' type = 'radio' value='Presidential'>Presidential
    <input name='room' type='radio' value='Superior'>Superior
    <br>
  <input type='button' name='type' value='(Single)' onclick='display()'>
  <input type='button' name='type' value='(Double)'><br><br>
</form>
<script>
	
function display() {
    

      btn.addEventListener('click', display);
      if (btn.value == '(Single') ";
      $room = $_POST['room'];
      $type = $_POST['type'];
      $roomtype = "$room$type";
        echo "Rooms: <input type ='text' value='$roomtype' readonly>";
      $roomNumber = mysqli_query($conn, "SELECT * FROM room r join roomtype rt on r.roomID = rt.roomID");
      echo "<select name = 'RoomNumber'>";
      while($row = mysqli_fetch_assoc($roomNumber)){
        
          if($row['RoomStatus'] == "Unoccupied" and $row['RoomType'] == $roomtype){
          echo "<option value = '{$row['RoomID']}' >{$row['RoomID']}</option>";
        }

  }

echo "}";
?>
</script>
</body>
</html>