<?php
include 'dbconn.php';
            $date = date('Y-m-d');
              $query = mysqli_query($conn,"SELECT * FROM reservation WHERE Status = 'Reserved' AND ReservationDate = '$date'") or die(mysqli_error());
                  
                $newres = mysqli_num_rows($query);
            ?>
            