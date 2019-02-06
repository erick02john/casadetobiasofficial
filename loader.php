<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Loading</title>

    <!-- Bootstrap -->
    <link rel= "stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style type="text/css">
    *{
    	box-sizing: header-box;
    }body{
    	margin:0;
    	padding:0;
    	background: white;
    }
 #myProgress {
  width: 506px;
  background-color:  grey;
  padding: 1px;
    margin: 50px auto;
}
.h1{
  position: fixed;
  top: 40%;
  left: 38%;
}
#myBar {
  width: 1%;
  height: 30px;
  background-color: navy;

  text-align: center;
  line-height: 30px;
  color: white;
}


    </style>

</head>

<body onload = "move()">
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div  class="h1">
	<h1 >Casa de Tobias Mountain Resort</h1>
	</div>
<div id="myProgress">
  <div id="myBar"></div>
</div>
<script>

function move() {
  var elem = document.getElementById("myBar");
  var width = 0;
  var id = setInterval(frame, 15);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
          window.open("Frontdesk/index.php", "_self");

    } else {
      width++;
      elem.style.width = width + '%';
      elem.innerHTML = width * 1  + '%';

    }
  }
}

</script>

</body>
</html>
