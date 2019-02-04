<?php
    include ('scriptvalidation.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
        <link href="css/regstyle.css"  rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        </style>
        <style type="text/css">
            body {
                background:#ebebe0;
            }

        </style>
      
    </head>
    <body>
        <div class="top-content">
                <div class="container">
                        <div class="col-sm-5 col-centered col-sm-5-reg">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left" style="margin-top:8px;">
                                        <h3><b>Sign up</b></h3>
                                        <p>Please complete all fields below to get instant access:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                <div class="label_hr">
                                </div>
                                </div>
                        <div class="form-bottom">
                        <form role="form" action="insertguest.php" method="post" class="reg-form">
                            <div class="form-group">
                                <div id="tang" class="pull-left">
                                    <label class="note"><b>First Name</b></label>
                                    <input maxlength="50" type="text" id= "fname" name="fname" required class="form-control" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/><br>
                                </div>
                                <div id="ina" class="pull-right">
                                    <label class="note"><b>Middle Name</b></label>
                                    <input maxlength="50" type="text" id= "mname" name="mname" class="form-control" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/><br>
                                </div>
                                <br>
                                <div id="tang" class="pull-left">
                                    <label class="note"><b>Last Name</b></label>
                                    <input maxlength="50" type="text" id= "lname" name="lname" required class="form-control" onkeypress="return restrictCharacters(this, event, alphaOnly);" autocomplete="off" REQUIRED/><br>
                                </div>
                                <div id="ina" class="pull-right">
                                    <label class="note"><b>Contact Number</b></label>
                                    <input maxlength="30" type="text" id= "number" name="number" class="form-control" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off" REQUIRED/><br>
                                </div>
                               
                                <div id="tang" class="pull-left">
                                    <label class="note"><b>Address</b></label>
                                    <textarea maxlength="200" rows="4" cols="150" name="address" class="form-control" REQUIRED/></textarea><br>
                                </div>
                                <div id="ina" class="pull-right">
                                <div class="radios">
                                    <label class="note"><b>Gender</b></label><br><br>
                                    <input id="reg_how1" type="radio" name="gender" value="Female" REQUIRED/><label>Female</label><br>
                                    <input id="reg_how2" type="radio" name="gender" value="Male" REQUIRED/><label>Male</label><br>
                                    
                                </div>
                            </div>


                                <br>

                               
                                <div class="clearfix"></div>
                                <div id="tang" class="pull-left">
                                    <label class="note"><b>Email Address</b></label>
                                    <input required maxlength="40" type="email" name="email" class="form-control" REQUIRED/><br>
                                </div>
                                <div id="ina" class="pull-right">
                                    <label class="note"><b>Password</b></label>
                                    <input required maxlength="40" type="password" id="password" name="password" class="form-control" onkeyup='check();' REQUIRED/><br>
                                </div>
                                <div id="tang" class="pull-left">
                                    <label class="note"><b>Confirm Password</b></label>
                                    <input required maxlength="40" type="password" id="confirmnpassword" name="repassword" class="form-control" onkeyup='check();' REQUIRED/><br>
                                </div>
                                 <div id="ina" class="pull-right">
                                    <br>
                                <span style="font-size: 14px;" id='message'></span><br>
                                </div><br>
                                


                                
                            </div>
                                        <button type="submit" class="btn btn-lg btn-green btn-reg" name="add">Sign me up</button>
                                        <div class="text-center already"><a href="Guest/_log-in.php" class="lg"><b>Already have an account? Login</b></a></div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
        </div>

 <!--Passsword Validation Script -->
 <script type="text/javascript"> 
 var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirmnpassword').value) {
    if (document.getElementById('password').value == "" && document.getElementById('confirmnpassword').value == ""){
    	document.getElementById('message').innerHTML = '';
	return false;
    }
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passsword Matched!';
  } else {
  if (document.getElementById('password').value == "" && document.getElementById('confirmnpassword').value == ""){
  	document.getElementById('message').innerHTML = '';
	return false;
    }
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passsword does not match!';
  }
 
}
</script>

    </body>
</html>