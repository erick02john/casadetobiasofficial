<?php
if (!empty($_POST)):
session_start();
  $username = ($_POST['username']);
  $password = ($_POST['password']);
  include('dbconn.php');



    $checkLoginName = mysqli_query($conn, "SELECT * FROM accounts WHERE Username ='$username' and Password ='$password'");
    $numrows = mysqli_num_rows($checkLoginName);
    if($numrows!=0){
        while($row = mysqli_fetch_assoc($checkLoginName)){
          $dbUsername = $row['Username'];
          $dbPassword = $row['Password'];
          $dbUserType = $row['UserType'];
          $dbUserStatus = $row['UserStatus'];
          $dbName = $row['FullName'];
        }
        if($username==$dbUsername&&$password==$dbPassword ){
          if($dbUserStatus != 'Deactivated'){
            if($dbUserType == 'Admin'){
                print ("<script language='JavaScript'>
                  window.location.href='Admin/index.php';
                  </SCRIPT>");
                  $_SESSION['Username'] = $dbUsername;
                  $_SESSION['Password'] = $dbPassword;
                  $_SESSION['UserType'] = $dbUserType;
                  $_SESSION['Name'] = $dbName;
                }
             else if($dbUserType == 'Frontdesk'){
                print ("<script language='JavaScript'>
                  window.location.href='Frontdesk/index.php';
                  </SCRIPT>");
                  $_SESSION['Username'] = $dbUsername;
                  $_SESSION['Password'] = $dbPassword;
                  $_SESSION['UserType'] = $dbUserType;
                  $_SESSION['Name'] = $dbName;
                }



          }else{

                print "<script language='JavaScript'>
                window.alert('Account is Disabled!')
                window.location.href='__login.php';
                </SCRIPT>";
            }


        }else{
          print "<script language='JavaScript'>
          window.alert('Incorrect Username or Password!')
          window.location.href='__login.php';
          </SCRIPT>";

        }
    }else{
      print ("<script language='JavaScript'>
        window.alert('Username and Password does not exists!')
        window.location.href='__login.php';
        </SCRIPT>");
    }

?>
<?php else:  ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Casa De Tobias Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="POST" action="__login.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="login" class="login loginmodal-submit" value="Login">
          </form>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
<?php endif; ?>
<script language="JavaScript">
  function callfunction(){
    print "<div class='alert alert-success'> <strong>Success!</strong> Indicates a successful or positive action."
    "</div>"

  }
</script>
