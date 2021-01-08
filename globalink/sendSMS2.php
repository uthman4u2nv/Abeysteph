<?php
$owneremail = "uthman4u2nv@gmail.com";
        $subacct = "ABEYSTEPH";
        $subacctpwd = "@ajagbe@";
//$sendto="08032518766"; /* destination number */
        $sender = "ABEYSTEPH"; /* sender id */
//$message=$_GET['msg']; /* message to be sent */
$phone='+2347055586786';
$order_no="2345";
$amount=200;
$message="Your Job #".$order_no." is now been processed,AMT:N".$amount." Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
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
                echo '1';
            } else {
                echo '2';
echo "an error has occurred:". $answer."<br />";
echo $url;
            }
        } else {
            echo '0';
echo "Error: URL could not be opened.<br />";
echo $url;
        }
		?>