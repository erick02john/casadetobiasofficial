
<?php
session_start();
include("../dbconn.php");
include ('../scriptvalidation.php');

$type = $_SESSION['UserType'];

if(!empty($_SESSION['Username'])){
if($type != 'Frontdesk'){
     echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../__login.php';
        </SCRIPT>");}
}else{
  echo ("<script language='JavaScript'>
        window.alert('Please Log In')
        window.location.href='../__login.php';
        </SCRIPT>");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Front desk Module</title>

    <!-- Bootstrap -->
    <link rel= "stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>s
    <link rel="stylesheet" href="../bootstrap/css/jquery.growl.css">
 -->

	<link rel="stylesheet" href="../bootstrap/css/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">
    <link rel="stylesheet" href="../bootstrap/css/animate.css">
    <link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/jquery.growl.css">

        <style>

body {
    background-color: #E5E4E2;
    font-family: "Century Gothic", sans-serif;
}

.sidenav {
    height: 100%;
    width: 220px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #BCC6CC;
    overflow-x: hidden;
    padding-top: 20px;
    margin-top: 80px;
    text-align: right;                                    

}

.sidenav a {
	height: 70px;
	margin-top: 20px;
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 18px;
    color: #666362;
    display: block;
    
    margin-right: 25px;
}

.sidenav a:hover {
    background-color: #98AFC7;
    margin-right: 0px;
    color: #000;
}

.main {
    margin-left: 250px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 40px;}
}



</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="height: 100px;">
      <div class="container">
          <div class = "navbar-header">
            <button type = "button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style=" color:#fff; font-size: 24px; font-family: OCR A Std, monospace; margin-top: 10px;">Rosario Resort and Hotel</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" style="margin-top: 10px;">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="Profile.php">Profile</a></li>
                <li><a href="../Admin/logout.php" class="view btn-sm active" data-toggle="modal" ><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Log Out</a></li>                       
              </ul>
            </li>
          </ul>
       </div>
          
      </div>
    </div>

    <br><br><br><br><br>

	<div class="container-fluid">
		<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="sidenav">
			<ul class="nav nav-sidebar">
            <li><a class="active" href="Reserved.php">Reserved <span class="sr-only">(current)</span></a></li>
            <li><a href="Check-in.php">Checked-in</a></li>
            <li><a href="Check-out.php">Checked-out</a></li>
           
            <li><a href="Billing.php">Billing</a></li>
            <li><a href="Rooms.php">Rooms</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Facilities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Swimming Pool</a></li>
                  <li><a href="#">Function Hall</a></li>
                  <li><a href="#">Restaurant</a></li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</div>
    </div>
        
          <main role="main" class="col-xs-8 col-sm-auto col-sm-12 pt-3">
         
        
          <br><br>
         <div class="container">
          <button style="margin-left: 50px; height: 60px; width: 200px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Room</button>

  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Rooms</h4>
        </div>

        <div class="modal-body">
          <div>
              <div class="table-responsive">
                  <table class="display table" style="border: none;">
                    <form method = "POST" action="AddRooms.php">
                      <tr>
                        <th>RoomNumber:</th>
                        <td><input class="formcontrol" type="text" name="roomnumber" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off"/></td>
                      </tr>
                      <tr>
                        <th>RoomType:</th>
                        <td><input class='formcontrol' type="text" name="roomtype" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off"/></td>
                      </tr>
                      <tr>
                        <th>RoomRate:</th>
                        <td><input class="formcontrol" type="text" name="roomrate"></td>
                      </tr>
                      <tr>
                        <th>RoomCapacity:</th>
                        <td><input class="formcontrol" type="text" name="roomcapacity" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" /></td>
                      </tr>
                  </table>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="add" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>

 <button style="margin-left: 50px; height: 60px; width: 200px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModals">Update Room</button>

 <div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Rooms</h4>
        </div>

        <div class="modal-body">
          <div>
              <div class="table-responsive">
                  <table class="display table" style="border: none;">
                    <form method = "POST" action="updateRooms.php">
                      <tr>
                        <th>RoomType:</th>
                        <td>
                          <select  class='form-control'  name = 'roomtype'>
        				  <option value = 'Presidential(Queen Sized-Bed)'>Presidential(Queen Sized-Bed)</option>
        				  <option value = 'Presidential(Twin Sized-Bed)'>Presidential(Twin Sized-Bed)</option>
        				  <option value = 'Superior(Queen Sized-Bed)'>Superior(Queen Sized-Bed)</option>
        				  <option value = 'Superior(Twin Sized-Bed)'>Superior(Twin Sized-Bed)</option>
            			</select>
                        </td>
                      </tr>
                      <tr>
                        <th>RoomRate:</th>
                        <td><input class="formcontrol" type="text" name="roomrate"></td>
                      </tr>
                      <tr>
                        <th>RoomCapacity:</th>
                        <td><input class="formcontrol" type="text" name="roomcapacity" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" /></td>
                      </tr>
                  </table>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="updateRooms" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>

 </div>


<div class="tableposition" style="margin-top:20px; margin-left: 240px;">
          <?php include 'displayRooms.php'; ?> </div>

          


        

        
   
  </body>
</html>