 <?php
 		include 'dbconn.php';
      $message = mysqli_query($conn, "SELECT * from Reservation where Status = 'Pending' AND Photo IS NOT NULL");
      $count = mysqli_num_rows($message);
       echo "$count New Messages!";
    
?>