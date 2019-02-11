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
    <title>Book Now - Select Date</title>



    <link rel="stylesheet" type="text/css" href="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.css">
    <script src="../bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="../bootstrap/js/jquery.growl.js"></script>
    <script src="../bootstrap/js/dataTables.min.js"></script>
    <script src="../bootstrap/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://www.hasseb.fi/bookingcalendar/demo/jquery-ui.js"></script>

    <link rel="stylesheet" type="text/css" href="../backext/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../backext/css/admin.css">


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="./css/prettify-1.0.css" rel="stylesheet">
    <link href="./css/base.css" rel="stylesheet">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="../js/modernizr-2.6.2.min.js"></script>
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">




</head>
<body>

 <div class="wrap">
<?php include('navlinksguest.php') ?>
    <br><br><br>

    <div class="container">
      <?php include '../crumbcontainerdate.php'; ?>
          <h1>Reserve Date</h1>

       <div class="lognav">

     <form action="datepickerform.php" method="POST">
      <center><h3>Please select your <strong>Check-in</strong> and <strong>Check-out</strong> dates to confirm.</h3></center> <br><br>

      <div class="col-md-6 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="from" name="Check-inDate" placeholder="Check-IN Date" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />
        </div>
      </div>

      <div class="col-md-6 date">
        <div class="form-group">
          <input type='text' class="form-control input-lg" id="to" name="Check-outDate" placeholder="Check-Out Date" onkeypress="return restrictCharacters(this, event, dateOnly);" readonly />

        </div>
      </div>
      <div align="right">

        <a><button type="submit" class="btn btn-lg btn-cust btn-right" name="next" id="nextbtn"  style="background-color: #728FCE; color: #fff;">NEXT</button></a>
      </div>

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
