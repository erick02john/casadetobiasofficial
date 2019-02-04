
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Deposit Receipt</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
  <style>
	.custwell{
		background: red;
		color: white;
	}
	body{
		background:#ebebe0;
	}
	@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** upload MODAL ******/
.uploadmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
  margin-top: 100px;
  height: 300px;
}



.uploadmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}


.uploadmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.uploadmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 


  </style>
  </head>
  
  <body>


<script src="bootstrap/js/bootstrap.min.js"></script>

<?php

include '../dbconn.php';
session_start();
  if(isset($_POST['upload'])){

    $resID = $_POST['resID'];
    $_SESSION['resID'] = $resID;
    
  echo "<div class='modal-dialog'>
        <div class='uploadmodal-container'>
          <form action='index.php' method='post' enctype='multipart/form-data'>
            <input type='file' name='file' />
            <button type='submit' name='submit'>Submit</button>
          </form>";
  }
  
  if(isset($_POST['submit']))
  {  
  include '../dbconn.php';
  $resID = $_SESSION['resID'];
	
	
 	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 
 	$folder="upload/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="UPDATE Reservation SET Photo = '$file' WHERE ReservationID = '$resID'";
 mysqli_query($conn, $sql) or die ("errorimage"); 

 $sql="SELECT * FROM Reservation WHERE ReservationID = '$resID'";
 		$result_set=mysqli_query($conn, $sql) or die("error");
 		while($row=mysqli_fetch_array($result_set))
 		{
         echo "<img src='upload/".$row['Photo']."' width= '200px' height= '200px'>"; 
 		}
 	mysqli_close($conn);

 	echo "<form action ='../Reservationinfo.php'>
 			<input type='submit' value ='Done'></form>";
}
  

if(isset($_POST['resched'])){
  include '../rescheduledate.php';
}

  echo "</div></div>";
?>

   
</body>
</html>
