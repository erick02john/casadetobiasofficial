
<?php 
//index.php
include 'dbconn.php';
$date = date("M-d-y");
$result = mysqli_query($conn, "SELECT * from reservation where Status = 'Reserved'") or die ("query");
// $chart_data = '';
// $row = mysqli_fetch_array($result);

$count = mysqli_num_rows($result);
echo "$count";
 $chart_data .= "{ year:'".$date."', Pending:".$count."}, ";

//$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h3 align="center">Daily Report</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['Pending'],
 labels:['Pending'],
 hideHover:'auto',
 stacked:true
});
</script>

</body>
</html>
