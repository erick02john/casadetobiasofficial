<html lang="en">
    <head>
        <title>Forgot Password</title>
        <meta charset="UTF-8">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href=".bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

        <link rel="stylesheet" type="text/css" href="css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="css/website/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

        <style type="text/css">
            body {
                background:#ebebe0;
            }
                * {
        margin: 0;
    }

    html, body {
    height: 100%;
    font-family: arial;
    }
    .wrapper {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    margin: 0 auto -142px; /* the bottom margin is the negative value of the footer's height */
    }

    .topnav {
    overflow: hidden;
    background-color: #003366;
    }

    .topnav a {
    float: right;
    display: block;
    color: #dfab21;
    text-align: center;
    padding: 25px 15px;
    text-decoration: none;
    font-size: 20px;
    }

.topnav a:hover {
  background-color: transparent;
  color: black;
}

.navbar-brand:hover{
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: center;
  }

}
            .form-top {
                overflow: hidden;
                padding: 0 25px 15px 25px;
                background-color: #003366;
                -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0;
                text-align: left;
            }
            .form-box {

                box-shadow: 0px 1px 4px 0.3px #888888;
                background-color: #57AC57;
                margin-bottom: 50px;
            }
            .form-bottom{
                border: 1px solid #dfe3ee;
                border-top: 0px;
                height: auto;
                margin-bottom: 30px;
            }
            .form-bottom-ver{
                margin-bottom: 0px;
            }
            .form-top {
                overflow: hidden;
                padding: 0 25px 15px 25px;
                background-color: #003366;
                -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0;
                text-align: left;
            }
            .form-top-left {
                float: left;
                width: 75%;
                padding-top: 25px;
                color: #fff;
            }
            .form-top-left h3 {
                margin-top: 0;
            }

            .form-top-right {
                float: left;
                width: 25%;
                padding-top: 5px;
                font-size: 66px;
                color: #fff;
                line-height: 100px;
                text-align: right;
            }
            .form-bottom {
                padding: 25px 25px 30px 25px;
                background: #eee;
                -moz-border-radius: 0 0 4px 4px; -webkit-border-radius: 0 0 4px 4px; border-radius: 0 0 4px 4px;
                text-align: left;
            }
            .form-bottom form button.btn {
                width: 100%;
            }
            .form-bottom form .input-error {
                border-color: #19b9e7;
            }
            .login-verify{
                margin-top: 220px;
                margin-bottom: -100px;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .btn-blue {
                background-color: #3071a9;
                border-bottom: 2px solid #31708f;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                border-radius: 0;
                color: #ffffff;
            }
            .btn-blue:hover,
            .btn-blue:focus,
            .btn-orblue:active,
            .btn-blue.active,
            .open .dropdown-toggle.btn-blue {
                background-color: #31708f;
                color: #ffffff;
            }
            #login-remarks, #reg-remarks, #login-remarks1, #loginremarkss{
                text-align: left;
                color: red;
            }
            .note{
                text-decoration: none;
                font-weight: normal;
                margin-top: -10px;
            }


            /* FOOTER */
            .footer {
  padding: 30px;
  color: #eeeeee;
  background-color: black;
}

.row{
  text-align: center;
}

.grid {
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #222222;
   color: white;
   text-align: center;
}
.fa {
  padding: 20px;
  font-size: 15px;
  width: 25px;
  text-align: center;
  text-decoration: none;
  margin: 7px 4px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}
        </style>
    </head>


    <body>
<div id="wrapper">
    <div id="header">
      <div class="topnav" id="myTopnav">
        <a class="navbar-brand" href="../index.php" style="color:#dfab21; font-family: Arial Black, Helvetica, sans-serif; float: left;margin-left: 10px;">Casa de Tobias Mountain Resort</a>
  <a href="datepickerform.php" style=" font-size: 17px;">Reserve</a>
  <a href = "Guest/_log-in.php" style="cursor: pointer; font-size: 17px;">Log-In</a>

  <a href="contact.php" style=" font-size: 17px;">Contact</a>
  <a href="gallery.php" style=" font-size: 17px;">Gallery</a>
  <a href="rates.php" style=" font-size: 17px;">Rates</a>
  <a href="About.php" style=" font-size: 17px;">About</a>
  <a href="index.php" class="active" style=" font-size: 17px;">Home</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

        <div>


        <div class="container">

                    <div class="row" style="margin-top:50px;">
                        <div class="col-sm-5 login-verify">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Forgot Password</h3>
                                        <p>Please enter required information :</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-question"></i>
                                    </div>
                                </div>
                                <div class="form-bottom" style="margin-bottom:0px;">
                                    <form role="form" action="forgotsendmail.php" method="post" class="login-form" id="myform">
                                        <div>
                                            <div class="form-group"><br>
                                                <label class="note"><b>Registered Email Address :</b></label>
                                                <input maxlength="40" type="email" name="email" id="email" class="form-control"  required />
                                                <br>
                                                <br>

                                            </div>
                                            <div style="margin-top:-20px;">
                                            <label id="login-remarks" font-color="red" style="margin-left: 0px;"></label>
                                                <div style="float:right;width:45%;margin-left:0px;margin-right:0px;margin-top:-20px;">
                                                    <button type="submit" class="btn btn-lg btn-blue btn-forg" id="sendmail" name="sendmail" style="font-size:8pt;" formnovalidate >Email my Password
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
            </div></div>

    <!-- FOOTER -->
  <div class="grid">
  <a href="#" class="fa fa-facebook"></a>
  <a href="#" class="fa fa-google"></a>
</div>
    <div id="footer" class="footer">
      <div class="container">
        <div class="row">
            <h4>Contact Us</h4>
            <p><i class="fa fa-home fa-lg" aria-hidden="true"></i> Alibungbungan Nagcarlan Laguna </p>
            <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> casadetobiasmountainresort@gmail.com</p>
            <p><i class="fa fa-phone fa-lg" aria-hidden="true"></i> (043) 740 4813 </p>
            <p><i class="fa fa-globe fa-lg" aria-hidden="true"></i> website </p>
          </div>
        </div>
      </div>
</div>
  </div>


        <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

        </body>

         <script src="js/jquery.min.js" type="text/javascript"></script>
         <script src="js/bootstrap.min.js"  type="text/javascript"></script>

         <script src="js/modal.js"  type="text/javascript"></script>

    </body>
    </body>
</html>
