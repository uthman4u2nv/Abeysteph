<?php
ini_set('display_errors',1);
ini_set('max_execution_time', 200);
header('refresh: 180; url=sendSMS.php');
require_once("smsLive247.php");
echo "User ID:".returnuSERid()."<br />";

mysql_connect("localhost","root","@ajagbe@")or die('Invalid credentials');
mysql_select_db("globalink211016")or die('Cannot connect to server');
$date=date('Y-m-d');
$sql=mysql_query("SELECT * FROM sms WHERE smsDate='$date' AND smsStatus='0'");
while ($row=mysql_fetch_array($sql)){
	$smsID=$row['smsID'];
	$phone=$row['smsPhone'];
	$message=$row['smsMsg'];
	
	$phone2=substr($phone,1);
	$phone3="+234".$phone2;
	
	$update=send2($message,$phone3);
	echo $phone." ".$update."<br />";
	
	//update sms status
	$up=mysql_query("UPDATE sms SET smsStatus='$update' WHERE smsID='$smsID'");
	
}
if($up){
	echo "SMS Status updated";
}

//http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=xxx&subacct=
//xxx&subacctpwd=xxx&message=xxx&sender=xxx&sendto=xxx&msgtype=0


function send2($message,$phone){
	$status=0;
	$UserObj = new SMSSiteAdmin; //create an SMS_Admin object
		//create the SMS object
		$newSMS = array('Message'=>$message,
						'MessageType'=>'TEXT',			//TEXT or FLASH
						'MessageID'=>0,					//0 = new message
						'MessageFolder'=>'SENT_FOLDER',	//required
						'DeliveryEmail'=>'',			//optional
						'Destination'=>array('string'=>$phone),//explode(",", $_POST['txtTo'])
						'CallBack'=>'ABEYSTEPH');			//SenderID: max 11 chars
		
		//call the SendSMS method
		$res = $UserObj->SendSMS(returnuSERid(), $newSMS);
		
		if ($res['SendSMSResult']['ErrorCode'] == 0) { //no error
			
			$SMSError = ($res['SendSMSResult']['ErrorMessage']
			. " " . $res['SendSMSResult']['ExtraMessage']);
			$status=$SMSError;
			
		}
		else {//error occured somewhere, display the error
		
			$SMSError = ($res['SendSMSResult']['ErrorMessage']
			. " " . $res['SendSMSResult']['ExtraMessage']);
			$status=$SMSError;;
		}
}

function returnuSERid(){
	$UserObj = new SMSSiteAdmin; //create an SMS_Admin object
	$userID="";
		//call the login method
		$res = $UserObj->Login(SMSLiveResellerEmail.":".SMSLiveSubAccountName, $_POST['txtPassword']);
		
		if ($res['LoginResult']['ErrorCode'] == 0) { //no error
			
			session_start();
			//IMPORTANT: save the user token in a session variable for future calls
			$_SESSION['user_token'] = $res['LoginResult']['ExtraMessage'];
			$userID=$res['LoginResult']['ExtraMessage'];
			//logged in now, redirect browser
			//header("Location: Console.php");
		}
		else {//error occured somewhere, display the error
		
			$SMSError = ($res['LoginResult']['ErrorMessage']
			. " " . $res['LoginResult']['ExtraMessage']);
			$userID=$res['LoginResult']['ExtraMessage'];
		}
		return $userID;
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

        /*if ($f = fopen($url, "r")) {
            $answer = fgets($f, 255);
            if (substr($answer, 0, 1) == "+") {
                return 1;
            } else {
                return 2;
//echo "an error has occurred: [$answer].";
            }
        } else {
            return 0;*/
//echo "Error: URL could not be opened.";
//return file_get_contents($url);
$fp = pfsockopen($url, 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.example.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
        }
		}
		//return connectWebService($url);
		

function connectWebService($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); //get the code of request
    curl_close($ch);

    if($httpCode == 400) 
       return 'No donuts for you.';

    if($httpCode == 200) //is ok?
       return $output;
}
?>