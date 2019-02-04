 <?php 
 	include 'dbconn.php';
            $numOfGuest = 0;
               $query = mysqli_query($conn,"SELECT SUM(NumberOfAdult) As totalNum FROM reservation WHERE Status = 'Checked-in'") or die(mysqli_error());
                  
                  $row = mysqli_fetch_array($query);
                  $numOfGuest = $row['totalNum'];
                  if ($numOfGuest == NULL){
                    $numOfGuest = 0;
                  }
                   echo "$numOfGuest Total Number of Guest!";           
            ?>