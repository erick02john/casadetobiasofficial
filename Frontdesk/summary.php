<?php 

session_start();
include ('../scriptvalidation.php');

$addpS = 0;
$addpD = 0;
$addsS = 0;
$addsD = 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel= "stylesheet" href="../css/mystyle.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</head>
<body>

<div class="row">
    
    
    <center><h2>Summary</h2></center>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <div style="background-color: #ccc; width: 450px" class ="container">
                    <!-- <div class="well" > -->
                     
                        <h3 style="text-align:center;">Guest Detail</h3>
                        <font size="4">Name: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['firstName']." ".$_SESSION['middleName']." ".$_SESSION['lastName']."</font>"; ?></label><br />
                        <font size="4">Address: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['address']."</font>";?></label><br />
                        <font size="4">Email: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['email']."</font>";?></label><br />
                        <font size="4">Mobile No: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['contactNum']."</font>";?></label><br />
                        <font size="4">Guest(s): </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['adult']."</font>";?></label><br />
                        <?php if ($_SESSION['adultadd'] != ' '){ ?>
                        <font size="4">Additional number of Guest(s): </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['adultadd']."</font>";?></label><br />
                           <?php } ?>




                        <h3 style="text-align:center;">Room Details</h3><br>
                        <font size="4">Check-in Date: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['from']."</font>";?></label><br />
                        <font size="4">Check-out Date: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['to']."</font>";?></label><br />
                        <font size="4">Nights: </font><label><?php echo "<font color = '#4e8975'>".$_SESSION['totalnights']."</font>";?></label><br />
                        <font size="4">Rooms to Reserve:</font><br /><font color = '#4e8975'>
                        <?php 
                            if($_SESSION['presSNum'] == ' '){
                                
                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>" . $_SESSION['presSNum']."x" ." ". $_SESSION['rmspName'] . " = " .'&#8369;'. number_format($_SESSION['presSReservedTotal']) . " Per night</label><br />";
                                $addpS = $_SESSION['presSReservedTotal'];
                            }
                            if($_SESSION['presDNum'] == ' '){
                                
                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>" .  $_SESSION['presDNum']."x"  ." " . $_SESSION['rmdpName']. " = " . '&#8369;'.number_format($_SESSION['presDReservedTotal'])." Per night</label><br />";
                                $addpD = $_SESSION['presDReservedTotal'];
                            }
                            if($_SESSION['supSNum'] == ' '){
                                
                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>"  . $_SESSION['supSNum']."x". " " . $_SESSION['rmssName'] . " = " .'&#8369;'. number_format($_SESSION['supSReservedTotal'])." Per night</label><br />";
                                $addsS = $_SESSION['supSReservedTotal'];
                            }
                            if($_SESSION['supDNum'] == ' '){
                                
                            }else{
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>"  . $_SESSION['supDNum']."x". " " . $_SESSION['rmdsName'] . " = " .'&#8369;'. number_format($_SESSION['supDReservedTotal'])." Per night</label><br />";
                                $addsD = $_SESSION['supDReservedTotal'];
                            }
                            
                        ?>
                        </font><font size="3">&nbsp;&nbsp;--------------------------------------------------------------------</font><br />
                        
                        <?php
                        $nights = $_SESSION['totalnights'];
                        $total = ($addpS + $addpD + $addsS + $addsD) * $nights; 
                       
                        echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = '#4e8975'>"."&#8369;" .number_format($total). " For "."$nights night/s</font></label><br /><br />";

                        $addRate = $_SESSION['adultadd'] * 800 * $nights; ?>
                        
                        <?php 
                        if($_SESSION['adultadd'] != ' ')
                            echo "<font size='4'>Additional Guest:</font><br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><font color = '#4e8975'>".$_SESSION['adultadd']." x &#8369;800.00 = ".'&#8369;'.number_format($addRate)." For $nights night</font></label><br><br>";
                            

                        $ttotal = $total + $addRate ;  
                        $_SESSION['totalroom'] = $ttotal; 
                        echo "<font size='5'>Total Room Payment:  <label></font>";
                        echo "<font size='4' color='#4E8975'>".'&#8369;'.number_format($ttotal). " For " . $nights . " Night/s </font>";?></label><br />
                        
                       <br><br><br>
                <div align="right">
        
                    <a href="#confirm" class="btn btn-success" value="Confirm"  data-toggle="modal">Confirm</a>
                </div>
                <div class="modal fade" id="confirm" >
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel"><span aria-hidden="true">&times;</span></button>
                                    <h4 align="center"><i class="glyphicon glyphicon-question-sign"></i>&nbsp;Confirm Registration? </h4>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="Check-in_Registration.php" name="submitval" id="submitval" class="once">
                                        <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        
                                        <input type="submit" class="btn btn-success" id="reserve" name="reserve" value="Reserve" ondblclick="this.disabled=true;" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>

    </body>
</html>