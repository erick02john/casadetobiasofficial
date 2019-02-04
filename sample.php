<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Reservation</title>

<style>

#topheader .navbar-nav li > a {
  text-transform: capitalize;
  color: #333;
  -webkit-transition: background-color .2s, color .2s;
  transition: background-color .2s, color .2s;
}
#topheader .navbar-nav li > a:hover, #topheader .navbar-nav li > a:focus {
  background-color: #333;
  color: #fff;
}

#topheader .navbar-nav li.active > a {
  background-color: #333;
  color: #fff;
}




</style>
</head>
<body>


<div id="topheader">
  <nav class="navbar navbar-default">
		<div class="container-fluid">
			 <div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#">Brand</a>
			 </div>
			 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
						<li class="active"><a href="#home">home<span class="sr-only">(current)</span></a></li>
						<li><a href="#page1">page 1</a></li>
						<li><a href="#page2">page 2</a></li>
						<li><a href="#page3">page 3</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
				  </ul>
			 </div>
		</div>
  </nav>
</div>
<script type="text/javascript">
	$( '#topheader .navbar-nav a' ).on( 'click', function () {
	$( '#topheader .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});


</script>

</body>
</html>