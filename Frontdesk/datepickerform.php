<?php 

include('../scriptvalidation.php');
if (!empty($_POST)):
session_start();


  if(!empty($_POST['Check-inDate']) && !empty($_POST['Check-outDate'])){
    $date = strtotime(date('m/d/Y'));
    $start = strtotime($_POST['Check-inDate']);
    $end = strtotime($_POST['Check-outDate']);
    
    if($start >= $date){
      
      $timediff = abs($end - $start);
      
      $out = $timediff/86400;
        if($out == 0){
           
          print ("<script language='JavaScript'>
                    window.alert('You shoud stay atleast 1 night')
                    window.location.href='datepickerform.php';
                    </SCRIPT>");
        }else{
          $_SESSION['from'] = $_POST['Check-inDate'];
          $_SESSION['to'] = $_POST['Check-outDate'];
          $_SESSION['totalnights'] = $out;
          print ("<script language='JavaScript'>
        window.location.href='selectroom.php';
        </SCRIPT>");
        

        }
    }else{
      print ("<script language='JavaScript'>
        window.alert('Please Select A Valid Date')
        window.location.href='datepickerform.php';
        </SCRIPT>");
    }
  }else{
    print ("<script language='JavaScript'>
    window.alert('Select Check-In and Check-Out Dates')
    window.location.href='datepickerform.php';
    </SCRIPT>");
  }
?>
<?php else: ?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Select Date</title>

    <link rel= "stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!--links for date picker -->
      <link rel="stylesheet" type="text/css" href="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.css">
      <script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
      <script src="../bootstrap/js/jquery.growl.js"></script>
      <script src="../bootstrap/js/dataTables.min.js"></script>
      <script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-1.10.2.js"></script>
      <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.js"></script>
    <style type="text/css">
      .container {
        margin-left: 20px;
        margin-right: 0;
  
        width: 1300px;
      }

      .form-control {
        width: 400px;
      }
    </style>
    </head>
  <body>
    <br><br>
    <div class="container">
      <div class="alert alert-info" style="width: 1280px; margin-bottom: 10px;">
          <h3><center>Walk-in</center></h3>
      </div>
          <form id="walkin" action="datepickerform.php" method="POST">
             
      <div class="col-md-4 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="from" name="Check-inDate" placeholder="Check-IN Date" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
        </div>
      </div>
      
      <div class="col-md-4 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="to" name="Check-outDate" placeholder="Check-Out Date" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
        </div>
      </div>
      
      <div class="col-md-4 date">
        <div align="right"> 
          <input type="submit" style='width: 150px; height: 40px;' class='btn btn-info' name="walkin" value="Walk-in">
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">

  $(document).ready(function(){

    $("#from").datepicker({
        minDate: 0,
        maxDate: "+365D",
        numberOfMonths: 1,
        onSelect: function(selected) {
          $("#to").datepicker("option","minDate", selected)
        }
    });
    $("#to").datepicker({
        minDate: 0,
        maxDate:"+365D",
        numberOfMonths: 1,
        onSelect: function(selected) {
           $("#from").datepicker("option", selecd)
        }
    }); 
});

   </script>

   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
   <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

   <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                shoeButtonPanel: true,
                showOn: "button",
                buttonImage: "Images/calendar.png",
                buttonImageOnly: true,
                buttonText: "Select date"
             });
        });

   </script>

        



</body>
</html>

<?php endif; ?>

