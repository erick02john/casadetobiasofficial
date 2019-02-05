<?php
        include '../config.php';
                                        if (session_status() == PHP_SESSION_NONE) {
                                            session_start();
                                        }
                                        if (! empty($_SESSION['userid']))
                                        {
                                            if (($_SESSION['usertype'])==='stud'){
                                                if(($_SESSION['new'])==='0'){



$host = $host; //database location
$user = $usrname; //database username
$pass = $password; //database password
$server_ip = $server_ip;
// PayPal settings
$paypal_email = 'casadetobiasmountainresort@gmail.';
$return_url = 'http://'.$server_ip.'/otsms/student/payments.php';
$cancel_url = 'http://'.$server_ip.'/otsms/student/enrollment.php';
$notify_url = 'http://'.$server_ip.'/otsms/student/enrollment.php';


// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){


    if($_POST['captcha'] != $_SESSION['digit']){

        include 'enrollment.php';
        ?>
        <script>
            swal({
            title: "CAPTCHA code entered was incorrect!",
            type: "error",
            showCancelButton: false,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ok",
            closeOnConfirm: false
            },
            function(){
            window.location.replace("enrollment.php");
            });
        </script>
        <?php

    }

    $uid = $_POST['stud_id'];
    $stud_lesson = $_POST['stud_lesson'];
    $abc = $_POST['aaa'];

    $sql="SELECT * FROM tbl_module_info WHERE lesson_type='$abc' and archived='0'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);

    if($count==0){
        include 'enrollment.php';
        ?>
        <script>
            swal({
            title: "Unable to enroll. No available modules for this lesson!",
            type: "error",
            showCancelButton: false,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ok",
            closeOnConfirm: false
            },
            function(){
            window.location.replace("enrollment.php");
            });
        </script>
        <?php
    }

    $stud_subscription = $_POST['stud_subscription'];
    $stud_session = $_POST['stud_session'];

    $item_name = $_POST['stud_lesson'];
    $item_amount = $_POST['stud_price'];

    $querystring = '';

    // Firstly Append paypal account to querystring
    $querystring .= "?business=".urlencode($paypal_email)."&";

    // Append amount& currency (£) to quersytring so it cannot be edited in html

    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
    $querystring .= "item_name=".urlencode($item_name)."&";
    $querystring .= "amount=".urlencode($item_amount)."&";

    //loop for posted values and append to querystring
    foreach($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $querystring .= "$key=$value&";
    }

    // Append paypal return addresses
    $querystring .= "return=".urlencode(stripslashes($return_url))."&";
    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
    $querystring .= "notify_url=".urlencode($notify_url);

    // Append querystring with custom field
    //$querystring .= "&custom=".USERID;

    // Redirect to paypal IPN

    header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
    exit();
}

else {
    //Database Connection
    // assign posted variables to local variables
    $data['item_name']          = $_POST['item_name'];
    $data['item_number']        = $_POST['item_number'];
    $data['payment_status']     = $_POST['payment_status'];
    $data['payment_amount']     = $_POST['mc_gross'];
    $data['payment_currency']   = $_POST['mc_currency'];
    $data['txn_id']             = $_POST['txn_id'];
    $data['receiver_email']     = $_POST['receiver_email'];
    $data['payer_email']        = $_POST['payer_email'];
    $data['custom']             = $_POST['custom'];

    $custom = array();
    $custom = explode("-", $_POST['custom']);


    $date_of_activity= new DateTime('now', new DateTimeZone('GMT+08:00'));
    $date_of_activity = $date_of_activity->format('m-d-Y');
    $time_of_activity = date('g:i a', strtotime(date("h:i:sa")) + 60 * 60 * 6);

    $sql="SELECT * FROM tbl_lesson_info WHERE lesson_type='".$custom[1]."' and plan='".$custom[2]."' and sessions='".$custom[3]."'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
        if($count==1){
            while($row = mysql_fetch_array($result)){
                $les_no = $row['lesson_no'];
                $les_nol = $row['nooflessons'];
                $les_dis = $row['discount'];
                $les_price = $row['price'];
            }
        }

    $sql="SELECT * FROM tbl_stud_info WHERE id='".$custom[0]."'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
        if($count==1){
            while($row = mysql_fetch_array($result)){
                $fullname = $row['fname'];
            }
        }

            $initial = $les_price;
            $initial = number_format($initial, 2, '.', '');

            $semifinal = ($les_dis / 100) * $initial;
            $semifinal = number_format($semifinal, 2, '.', '');

            $final = $initial - $semifinal;
            $final = number_format($final, 2, '.', '');

    // Response from Paypal

    $date_of_activity1= new DateTime('now', new DateTimeZone('GMT+08:00'));
    $mo = $date_of_activity1->format('m');
    $yr = $date_of_activity1->format('Y');

    $sql = "insert into tbl_payments(txn_id, userid, payer_email, payer_name, lessonid,initamt,dis,tdis,totalamt,datepaid,timepaid,month,year) values('".$data['txn_id']."','".$custom[0]."','".$data['payer_email']."','".$fullname."','$les_no','$initial','$les_dis','$semifinal','$final','$date_of_activity','$time_of_activity','$mo','$yr')";
    mysql_query($sql);

    $sql4 = "UPDATE tbl_payments Set current='0' where txn_id<>'".$data['txn_id']."' and userid='".$custom[0]."'";
    mysql_query($sql4);

            if($custom[1]=='children'){
                $ltype="Children Sessions";
            }
            elseif($custom[1]=='business'){
                $ltype="Business English";
            }
            elseif($custom[1]=='exam'){
                $ltype="Exam Preparations";
            }
            elseif($custom[1]=='freetalk'){
                $ltype="Free-talking Sessions";
            }

            if($custom[2]=='3months'){
                $plan="3 months";
            }
            elseif($custom[2]=='weekly'){
                $plan="Weekly";
            }
            elseif($custom[2]=='monthly'){
                $plan="Monthly";
            }
            elseif($custom[2]=='perlesson'){
                $plan="Per Lesson";
            }

            if($custom[3]=='30min'){
                $sesar="30 minutes";
            }
            elseif($custom[3]=='1hr'){
                $sesar="1 hour";
            }

    $current_les_nol = '0';

    $sql1="SELECT * FROM tbl_stud_info where id='".$custom[0]."'";
    $result1=mysql_query($sql1);
    while($row = mysql_fetch_array($result1))
    {

        if(($row['lesson_number']=='1')&&($row['trial']=='1')){
            if($sesar=='1 hour'){
                $current_les_nol = '.5';
                $les_nol = $les_nol + $current_les_nol;
            }
            elseif($sesar=='30 minutes'){
                $current_les_nol = '1';
                $les_nol = $les_nol + $current_les_nol;
            }
        }
    }


    $sql = "UPDATE tbl_stud_info SET trial= '0', enrolled = '1',lesson_number = '$les_nol', lesson_taken='0', lesson='$ltype', enrollment_id='".$data['txn_id']."', subscription='$plan', session='$sesar' WHERE id = '".$custom[0]."'";
    mysql_query($sql);

    $sqlaudit = "INSERT INTO tbl_audittrail (date_act,time_act,userid,username,usertype,activity,remarks) VALUES ('$date_of_activity','$time_of_activity','".$custom[0]."','$fullname','stud','Enrollment','Transaction ID : ".$data['txn_id']."')";
    mysql_query($sqlaudit);


    $sql4 = "INSERT INTO tbl_notifications (date_act,time_act,userid,username,email,usertype,receiver,activity) VALUES ('$date_of_activity','$time_of_activity','".$custom[0]."','$fullname','".$data['payer_email']."','stud','mngt','Enrollment')";
    mysql_query($sql4);

    header('location:http://'.$server_ip.'/otsms/student/enrollment.php');
    exit();
    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
        $req .= "&$key=$value";
    }


    // post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

    $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

    if (!$fp) {
        // HTTP ERROR

    } else {
        fputs($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets ($fp, 1024);
            if (strcmp($res, "VERIFIED") == 0) {

                // Used for debugging
                // mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));

                // Validate payment (Check unique txnid &amp;amp;amp; correct price)
                $valid_txnid = check_txnid($data['txn_id']);
                $valid_price = check_price($data['payment_amount'], $data['item_number']);
                // PAYMENT VALIDATED &amp;amp;amp; VERIFIED!
                if ($valid_txnid && $valid_price) {

                    $orderid = updatePayments($data);

                    if ($orderid) {
                        // Payment has been made &amp;amp;amp; successfully inserted into the Database
                    } else {
                        // Error inserting into DB
                        // E-mail admin or alert user
                        // mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
                    }
                } else {
                    // Payment made but data has been changed
                    // E-mail admin or alert user
                }

            } else if (strcmp ($res, "INVALID") == 0) {

                // PAYMENT INVALID &amp;amp;amp; INVESTIGATE MANUALY!
                // E-mail admin or alert user

                // Used for debugging
                //@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response
data&"<pre>"&print_r($post, true)&"</pre>";
            }
        }
    fclose ($fp);
    }
}

}
                                                else{
                                                    header("location:setup.php");
                                                }
                                            }
                                            elseif (($_SESSION['usertype'])==='mngt'){
                                                    header("location:../management/index.php");
                                            }
                                            elseif (($_SESSION['usertype'])==='tchr'){
                                                if(($_SESSION['new'])==='0'){
                                                    header("location:../teacher/index.php");
                                                }
                                                else{
                                                    header("location:../setup.php");
                                                }
                                            }
                                        }

                                        else{

                                                    header("location:../index.php");



                                        }
    ?>
