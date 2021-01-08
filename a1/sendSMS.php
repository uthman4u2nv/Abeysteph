<?php
header('refresh: 20; url=sendSMS.php');


mysql_connect("localhost","root","@ajagbe@");
mysql_select_db("globalink211016");
$date=date('Y-m-d');
$sql=mysql_query("SELECT * FROM sms WHERE smsDate='$date' AND smsStatus='0'");
while ($row=mysql_fetch_array($sql)){
	$smsID=$row['smsID'];
	$phone=$row['smsPhone'];
	$message=$row['smsMsg'];
	
	$update=sendSMS($phone, $message);
	
	//update sms status
	$up=mysql_query("UPDATE sms SET smsStatus='$update' WHERE smsID='$smsID'");
	
}
if($up){
	echo "SMS Status updated";
}





function sendSMS($phone, $message) {
	$phone=substr($phone,1);
	$phone="+234".$phone;
        $owneremail = "uthman4u2nv@gmail.com";
        $subacct = "ABEYSTEPH";
        $subacctpwd = "@ajagbe@";
//$sendto="08032518766"; /* destination number */
        $sender = "ABEYSTEPH"; /* sender id */
//$message=$_GET['msg']; /* message to be sent */
//sendto=08057071234&
//$message="Your Job #".$order_no." is now been processed,AMT:N".$amount." Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
        $msgtype = 0;
		
		
        $url = "http://www.smslive247.com/http/index.aspx?"
                . "cmd=sendquickmsg"
                . "&owneremail=" . UrlEncode($owneremail)
                . "&subacct=" . UrlEncode($subacct)
                . "&subacctpwd=" . UrlEncode($subacctpwd)
                . "&message=" . UrlEncode($message)
                . "&sendto=" . UrlEncode($phone)
                . "&msgtype=" . UrlEncode($msgtype);

        if ($f = @fopen($url, "r")) {
            $answer = fgets($f, 255);
            if (substr($answer, 0, 1) == "+") {
                return 1;
            } else {
                return 2;
//echo "an error has occurred: [$answer].";
            }
        } else {
            return 0;
//echo "Error: URL could not be opened.";
        }
}
?>