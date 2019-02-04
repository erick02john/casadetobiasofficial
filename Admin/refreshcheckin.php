<?php
              include 'dbconn.php';
              $date = date('Y-m-d');
              $data = mysqli_query($conn, "SELECT * FROM reservation WHERE CheckInDate = '$date' AND Status = 'Reserved'");	
              $numCheckin = mysqli_num_rows($data);
             echo "$numCheckin Schedule to Check-in!";
            ?>	