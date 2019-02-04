 	
	<script src="bootstrap/js/jquery-1.11.3.min.js"></script>
	<script src="bootstrap/js/jquery-ui.js"></script>
<style>
.crumb {
    padding: 0px;
	background: #D4D4D4;
	list-style: none; 
	overflow: hidden;
}
.crumb>li+li:before {
	padding: 0;
}
.crumb li { 
	float: left; 
}
.crumb li.active a {
	background: brown;                   /* fallback color */
	background: #003366; 
}
.crumb li.completed a {
	background: brown;                   /* fallback color */
	background: hsla(153, 57%, 51%, 1); 
}
.crumb li.active a:after {
	border-left: 30px solid #003366;
}
.crumb li.completed a:after {
	border-left: 30px solid hsla(153, 57%, 51%, 1);
} 

.crumb li a {
	color: white;
	text-decoration: none; 
	padding: 10px 0 10px 45px;
	position: relative; 
	display: block;
	float: left;
}
.crumb li a:after { 
	content: " "; 
	display: block; 
	width: 0; 
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid hsla(0, 0%, 83%, 1);
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	left: 100%;
	z-index: 2; 
}	
.crumb li a:before { 
	content: " "; 
	display: block; 
	width: 0; 
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid white;
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	margin-left: 1px;
	left: 100%;
	z-index: 1; 
}	
.crumb li:first-child a {
	padding-left: 15px;

}
.crumb li a:hover { background: #dfab21; }
.crumb li a:hover:after { border-left-color: #dfab21;   !important; }
</style>


	<div class="row">
		<ul class="crumb">
			<li class="active"><a href="rescheduledate.php">Select Dates</a></li>
			<li><a href="javascript:void(0);">Select Rooms</a></li>
			<li><a href="javascript:void(0);">Reservation Information</a></li>
			<li><a href="javascript:void(0);">Reservation Summary</a></li>
		</ul>
	</div>