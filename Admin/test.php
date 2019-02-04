<!-- <!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../backext/css/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<style type="text/css">
  li.one a:hover {
    background-color: #52697F;
    color: #003366;
  }

</style>

</head>
<body>
<script src="ext/js/jquery.min.js"></script>
<script src="ext/js/bootstrap.min.js"></script>
<script src = "ext/js/admin.js"></script>
<div class="wrap">
  <nav class="nav-bar navbar-inverse" role="navigation">
      <div id ="top-menu" class="container-fluid active">
          <a class="navbar-brand" href="index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; margin-left: 80px;">Rosario Resort and Hotel</a>
          <ul class="nav navbar-nav">        
              
              <li class="dropdown movable">
                  
                      <li><a href="../Admin/logout.php" class="view btn-sm active" data-toggle="modal"  style="font-size: 15px; margin-top: 13px;"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Log Out</a></li>
                  </ul>
              </li>
              
          </ul>
      </div>      
  </nav>

  <aside id="side-menu" class="aside" role="navigation">
    <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Transactions.php">Transactions</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Rooms.php">Rooms</a>
          </li>
      </ul>
      
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Billing.php">Billing</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">
          <li class="one">
            <a href="Accounts.php">Accounts</a>
          </li>
      </ul>
      <ul class="nav nav-list accordion">                    
          <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-globe"></i>Reports<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="Reserved.php">Daily Report</a></li>  
              <li><a href="Pending.php">Monthly Report</a></li>
              <li><a href="Pending.php">Yearly Report</a></li>
            </ul>
          </li>
      </ul>
  </aside>
  <div class="content">
    <div class="top-bar">       
      <a href="#menu" class="side-menu-link burger"> 
        <span class='burger_inside' id='bgrOne'></span>
        <span class='burger_inside' id='bgrTwo'></span>
        <span class='burger_inside' id='bgrThree'></span>
      </a>      
    </div>
    <section class="content-inner">
    <h2>Overview</h2>
    <div>
     <div class=" col-md-4 col-lg-4" style="margin-bottom:30px; width: 50%;"> 
        <div class="home_div" style="width:90%; border:1px solid #bbb;">
            <div class="text-left" style="margin-bottom:15px;border-bottom:1px solid #aaa;margin-top:00px;background:#243545;height:40px;padding-top:10px;">
                  <h5 style="margin-top:0px; color:#fff"><b>&nbsp;New Reservations</b></h5>
            </div>
              <div style="margin-left:10px;">
                <?php
                  //include('dbconn.php');
                 // $query = mysqli_query($conn,"SELECT * FROM Reservation Join Guest ON Reservation.GuestID = Guest.GuestID WHERE Status = 'Reserved'  ORDER BY CheckInDate ASC LIMIT 0, 9;") or die(mysqli_error());
                 // $i = 1;
                  
                 // while($row = mysqli_fetch_array($query)){
                ?>
                  <tr>
                    <td>
                      <?php //echo "<font size='3'> On <u>".$row['CheckInDate']."</u> <u>".$row['GuestFName']." ".$row['GuestMName']." ".$row['GuestLName']." </u> will be checking in at Room <u>".$row['RoomsReserved']."</u></font><br>";?>
                      </td>     
                  </tr>
                  
                <?php
                 // $i++;
                  //}
                ?>
          </div>
              </div>
                  <div class="height30 visible-xs"></div>
</div>       
</div>   
        
<div>
     <div class=" col-md-4 col-lg-4" style="margin-bottom:30px; width: 50%;"> 
        <div class="home_div" style="width:90%;margin-left:20px;border:1px solid #bbb;">
            <div class="text-left" style="margin-bottom:15px;border-bottom:1px solid #aaa;margin-top:00px;background:#003366;height:40px;padding-top:10px;">
                  <h5 style="margin-top:0px; color:#fff"><b>&nbsp;Number of Guest: Checked-in</b></h5>
            </div>
              <div style="margin-left:10px;">
                <?php
                  //include('dbconn.php');
                 // $query = mysqli_query($conn,"SELECT SUM(NumberOfAdult) As totalNum FROM Reservation WHERE Status = 'Checked-in'") or die(mysqli_error());
                  //$i = 1;
                  
                 // $row = mysqli_fetch_array($query);
                  //$numOfGuest = $row['totalNum'];
                    
                ?>
                  <tr>
                    <td>
                      <?php //echo "<font size='3'> Total Number of Guest:". $numOfGuest."</u> <u></font>";?>
                      </td>     
                  </tr>
                  
                <?php
                  //$i++;
                  
                ?>
          </div>
              </div>
                  <div class="height30 visible-xs"></div>
</div>       
      
    </section>
  </div>  
  
  </div>
  
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../backext/css/admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

//$input = "324a6b671d5a5099a80306785bf08d11";

//$new = md5("am199401");


//echo "$input <br> $new";
?>
</body>
</html> -->
<?php
 //include ('dbconn.php');
// $roomSinglePre = mysqli_query($conn, "SELECT * FROM roomtype WHERE RoomType = 'Presidential(Single)'");
// $countpsreserved = mysqli_query($conn, "SELECT * from roominventory ri join roomtype rt on ri.RoomID = rt.RoomID where (Status = 'Reserved' or Status = 'Pending' or Status = 'Checked-in') AND RoomType = 'Presidential(Single)'  AND 
//               ((CheckInDate >= '2018-02-14' and CheckInDate < '2018-02-15' )
//             or (CheckOutDate >= '2018-02-14'and CheckOutDate < '2018-02-15' ) or (CheckOutDate >= '2018-02-15')and(CheckInDate < '2018-02-14'))");
//             $presSrow = mysqli_num_rows($countpsreserved);
//             $totalpsrow = mysqli_num_rows($roomSinglePre);
//             $presScount = $totalpsrow - $presSrow;

//             echo $presScount;
// $a = md5(1234);
// echo $a;
// $countRooms

//   $querys = mysqli_query($conn, "SELECT DISTINCT RoomType from roomtype") or die ("error");

//     $ctr=0;

// $bid = $_POST['bid'];
// $rid = $_POST['rid'];
// $ctr=0;
// $i=0;
// while($array = mysqli_fetch_array($querys)){
// $ps = $_POST['count'.$ctr];
// $pd = $_POST['discount'.$ctr];
// if($ps !=0){
// echo"$ps $pd";

// }
// $ctr++;
// }
// $i;
// <script>
//       $(function () {
//         $('form').bind('click', function (event) {

// event.preventDefault();// using this page stop being refreshing 

//           $.ajax({
//             type: 'POST',
//             url: 'test.php',
//             data: $('form').serialize(),
//             success: function () {
//               alert('form was submitted');
//             }
//           });

//         });
//       });
//       </script>

    
      // $message = mysqli_query($conn, "SELECT * from Reservation where Status = 'Pending' AND Photo IS NOT NULL");
      // $count = mysqli_num_rows($message);
      //  echo "$count New Messages!";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>
  
<form method="post" name="form">
<ul><li>
<input id="name" name="name" type="text" />
</li><li>
<input id="username" name="username" type="text" />
</li><li>
<input id="password" name="password" type="password" />
</li><li>
<select id="gender" name="gender"> 
<option value="">Gender</option>
<option value="1">Male</option>
<option value="2">Female</option>
</select>
</li></ul>
<div >
<input type="submit" value="Submit" class="submit"/>
<span class="error" style="display:none"> Please Enter Valid Data</span>
<span class="success" style="display:none"> Registration Successfully</span>
</div></form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
</script>

 <script type="text/javascript" >
$(function() {
$(".submit").click(function() {
var name = $("#name").val();
var username = $("#username").val();
var password = $("#password").val();
var gender = $("#gender").val();
var dataString = 'name='+ name + '&username=' + username + '&password=' + password + '&gender=' + gender;

if(name=='' || username=='' || password=='' || gender=='')
{
$('.success').fadeOut(200).hide();
$('.error').fadeOut(200).show();
}
else
{
$.ajax({
type: "POST",
url: "testest.php",
data: dataString,
success: function(){
$('.success').fadeIn(200).show();
$('.error').fadeOut(200).hide();
}
});
}
return false;
});
});
</script>
 </body>
 </html>
 
