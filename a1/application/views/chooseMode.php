<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/start/jquery-ui.css"
    rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(function () {
        $("#dialog").dialog({
        		width: "800px",
            title: "Enrollment Procedures",
            buttons: {
                Close: function () {
                    $(this).dialog('close');
                }
            }
        });
        $("#refundClick").click(function(){
        	$("#refund").dialog({
        		width: "800px",
            title: "Refund/Return/Cancellation Policy",
            buttons: {
                Close: function () {
                    $(this).dialog('close');
                }
            }
        });
        	});
        	$("#privacyClick").click(function(){
        	$("#privacy").dialog({
        		width: "800px",
            title: "Privacy Statement",
            buttons: {
                Close: function () {
                    $(this).dialog('close');
                }
            }
        });
        	});
    });
</script>
<div class="jumbotron" style="border:1px solid; ">
    <div class="row">
          
          <div class="col-sm-6" >
              <div style="padding: 10px; border: 1px solid; color: #FFF; background: #00620C; margin-bottom: 10px;"><strong>Choose Payment Method</strong></div>
              <table cellspacing="10" style="padding: 5px;"cellpadding="0" width="100%" height="100%">
                  <tr><td><strong>S/No</strong></td><td align="center"><strong>Description</strong></td><td><strong>Amount</strong></td></tr>
                  <tr><td>1</td><td>Bulk Payments of members due</td><td><?php echo number_format($_SESSION['amount'],2); ?></td></tr>
                  
                  
              </table>
              <br><br><span>Select any of the payment choice listed below, Select Paychoice with Unified Payment if you use VISA ATM card </span>
              <br><br><a href="Javascript:;" id="upsShow">Pay With Visa</a><br /><br />
              <div id="ups" style="display: none;">
              <?php
              $img=array('src'=>'images/unified.jpg',"width"=>'250');
              //$form=array("name"=>"form1","id"=>"form1","role"=>'form');
              //echo form_open('welcome/processCheckOut',$form);
              ?>
              <!--<input type="radio" name="ups" disabled="true" checked="checked" />-->
                  <?php echo img($img); ?>
                <form method="POST" target="_new" action="http://162.144.67.26/ups.php">
<input name="price" type="hidden" value="<?php echo $_SESSION['amount']; ?>"/>
<input name="transRefNo" type="hidden" value="<?php echo $_SESSION['transid']; ?>" />
<input name="description" type="hidden" value="Payment of Dues" />
<input type="Submit" value="Pay With Visa" class="btn btn-primary" />
</form>  
                  
              <!--<br><button type="submit" class="btn btn-primary">Pay Using Unified Payment System</button>-->
              
              </div>
             <a href="Javascript:;" id="quickShow">Paychoice With Quickteller</a>
             <div id="quickteller" style="display: none;">
                  <?php
            $DevID = "UPPER-DES34K56L";
		$MerchantID = '9';
		$MerchantCode = 'NSE';
	  
	  if(empty($member_email)){
		$email='info@nse.org.ng';	  	
	  	}
	  	else{
		$email=$member_email;	  		
	  		}  
	  
	  
	  $_SESSION['phone']=$phone;
	  $TransactionID = '3061' . rand(1000000, 10000000);
	  //$TransactionID=$TRXNREF
	  //$amount=$balance;
          $salt = "$DevID|$MerchantID|$MerchantCode|$TransactionID";
          $MAC = hash('sha512', $salt);
	  $_SESSION['amount']=$amount;
	  $_SESSION['names']=$surname." ".$firstname." ".$othernames;
	  $total_amount=$amount+300;
	  $_SESSION['MyTransType']='single';
	   $date=date('M d, Y');
	   $dyear=date('Y');
	   //insertTrxn($valid_user,$total_amount,$TRXNREF,$dyear);
	   //updateTrxn($valid_user,$TRXNREF)
	  $xml_string = <<<XML
<?xml version="1.0"  encoding="UTF-8"?>
<BranchCollectRequest>
    <MerchantDetails>
        <Merchant DevID="$DevID" MerchantID="$MerchantID" MerchantCode="$MerchantCode" />
    </MerchantDetails>

    <TransactionDetails>
        <Transaction TransactionID="$TransactionID" MAC="$MAC" TotalAmount="$total_amount" CustomerID="$valid_user" CustomerSurname="$surname" CustomerFirstname="$firstname" CustomerOthernames="$othernames"  CustomerEmail="$email"  CustomerGSM="2348032518766" UpdateURL="http://www.nse.org.ng/updatepay.php" UpdateURLThirdParty="http://www.nse.org.ng/updatePay3rd.php" />
    </TransactionDetails>

    <ItemDetails ItemDescription="Total" InstallmentID="675178" Split="false" ItemCode="NSE01" ExpiryDate="2025-10-22 03:00:25">
        <Item ItemName="Dues." ItemAmount="$amount" />
        <Item ItemName="Transaction Cost" ItemAmount="300.0000" />
    </ItemDetails>

    <CustomFieldDetails>
        <CustomField CustomFieldLabel="Bill Generated By" CustomFieldValue="Abuja" />
        <CustomField CustomFieldLabel="Bill Generated On" CustomFieldValue="$date" />
    </CustomFieldDetails>

    <CollectionBankDetails>
        <CollectionBank CBankID="8" />
    </CollectionBankDetails>

    <BankAccounts>
        <BankDetails BankID="8">
            
            
            <AccountDetails AccountID="408" AccountName="Nigerian Society Of Engineers" AccountNo="3552108250" SplitAmount="$amount" />
            <AccountDetails AccountID="409" AccountName="Upperlink Limited" AccountNo="0992000267" SplitAmount="200.0000" />
            <AccountDetails AccountID="410" AccountName="Ecobank Nigeria Income Account" AccountNo="ECO0000000" SplitAmount="100.0000" />
        </BankDetails>
    </BankAccounts>

</BranchCollectRequest>
XML;
	  ?>

      
      </td>
  </tr>
</table>
<p><img src="http://www.nse.org.ng/payment/images/quickteller.jpg" /></p>
<form action="http://www.paychoice.com.ng/nse-pay-75839/nse-pay-jhuhia46dtcniz8k2.php" method="post" target="_new">      
      <input type="hidden" value="<?=htmlentities($xml_string)?>" name="xml_string" />
      <input type="submit" name="submit" class="btn btn-primary" value="Pay with Quickteller" />
      
              
      </form>
              </div>
              
          </div>
        <div class="col-sm-6" >
            <div style="padding: 10px; border: 1px solid; text-align: justify; color: #FFF; background: #00620C; margin-bottom: 10px;"><strong>Payment Instructions</strong></div>
             <ol>
                <li>Click on the either of the links on the left to select your payment option</li>
                <li>Selecting Pay Using Unified Payment System gives you the option of using VISA Card </li>
                <li>Selecting Paychoice Using Quickteller gives you the option of using your MasterCard and Verve card and making payments of ATM, Quickteller </li>
             </ol>
            <a href="Javascript:;" id="upsMore">Payment Instruction for Unified Payment System</a>
            <div id="upsShowMore" style="display: none;">
            <strong>NOTE: If you are using Internet Explorer browser kindly uncheck support for Use of SSL2.0 by following the steps listed belowground
                <ol>
                    <li>Click on Tools option on the menu bar</li>
                    <li>Select Internet Options</li>
                    <li>Click Advanced tab </li>
                    <li>Scroll down to Security option and uncheck Use SSL 2.0</li>
                    
                </ol>
            </strong>
                <?php
                $atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
                
                
                echo anchor_popup('welcome/enrollmentProcedure','Click Here To Read Card Enrollment Procedures',$atts);
                ?>
            </div>
            <?php
            echo img('images/visamaster.jpg');
            ?>
            <p>Services Provided By Unified Payment System</p>
            <p></p>
            <p><strong><h4><a href="Javascript:;" id="refundClick">Refund Policy</a> | <a href="Javascript:;" id="privacyClick">Privacy Statement</a> </h4> </p>
        </div>

      </div>
</div>
<div id="privacy" style="display: none;">
<strong><h3>Privacy and Security</h3></strong>
<p>
We do not give your personal information, cardholders details to third parties.
We view protection of users' privacy as a very important principle. We understand clearly that you and
your Information are one of our most important assets. We do not store your card details on our computers.
</p>

</div>
<div id="refund" style="display: none;">
<strong>REFUND POLICY</strong><br><br>

Nigerian Society of Engineers wants to ensure your satisfaction with your account. If, for any reason, you are not satisfied, please contact us info@nse.org.ng Provide us with a brief explanation of the nature of your dissatisfaction and we will move quickly to process your refund.


<p>The following reasons warrant a 100% refund:</p>
<ol>
<li>The listed membership due and the actual amount of NSE debited varies.</li>
 </ol>
 <br /><br />
 
<strong>Reasons that your account will not be refunded:</strong>
<ol>
<li>Intention to defraud NSE by making a false claim of failed transactions.</li>
<li>An excessive request for refunds after a refund has already been made to an account. This may result in future denials of refunds.
Computer hardware and/or software failure (e.g., computer crash), including Internet connection, of the NSE member. NSE refuses to accept fault for customer hardware/software issues and will not honor refunds associated with these issues.</li>
 
<li>You also acknowledge and agree that where refunds are issued to your Payment Method, NSE’s issuance of a refund is only confirmation that Upperlink has submitted your refund to the Payment Method charged at the time of the original sale, and that NSE has absolutely no control over when the refund will be applied towards your Payment Method’s available balance.  You further acknowledge and agree that the payment provider and/or individual issuing bank associated with your Payment Method establish and regulate the time frames for posting your refund, and that such refund posting time frames may range from five (5) business days to a full billing cycle, or longer.</li>

<li>In the event a refund is issued to your Payment Method and the payment provider, payment processor or individual issuing bank associated with your Payment Method imposes any limitations on refunds, including but not limited to, limitations as to the timing of the refund or the number of refunds allowed, then NSE, in its sole and absolute discretion, reserves the right to issue the refund either (i) in the form of an in-store credit; or (ii) via refund to your originating account, through a reversal of the transaction.  NSE also has the right, but not the obligation, to offer an in-store credit for customers seeking refunds, even if there are no limitations on refunds imposed by the Payment Method.  For the avoidance of doubt, any and all refunds processed via the issuance of either in-store credits or a reversal are solely within NSE’s discretion and are not available at customer request.</li>
  
  </ol>




</div>

<div id="dialog" style="display: none;">
<h3><strong>Enrollment Procedures</strong></h3>
<p><strong>Enroll Your Card for Verified By Visa</strong></p>

This site is protected with Verified by Visa (VbV), Visa Password-Protected Identity 

Checking Service, and requires that the card is enrolled to participate in the VbV 

program. If your Visa Card issued by Nigerian Banks is not enrolled, kindly follow the 

steps outlined below.
<ol>

    <li>Locate the nearest VISA/VPAY enabled ATM.</li>

    <li>Insert your card and punch in your PIN.</li>

    <li>Select the PIN change option.</li>

    <li>Select Internet PIN (i-PIN) change option.</li>

    <li>Insert any four - six digits of your choice as your i-PIN.</li>

    <li>Re-entered the digits entered in step 5</li>
<li>If you have done the above correctly, a message is displayed that your PIN was 

changed successfully. This means your card is now enrolled in the VbV program 

and you have an Internet PIN (i-PIN) which can be used for any internet related 

transaction.</li>

<li>Note the the word "i-PIN", "Password" and "VbV Code" are the same.</li>

<li>You can now visit your favourite VbV enabled site to shop securely.</li>

</ol>
<strong>Important</strong><br>

Please note that this is only for internet related transactions and it does not change 

your regular PIN on ATM and POS.

<br><br>
<h3><strong>Enroll Your Master Card for MasterCard Secure Code </strong></h3><br>
This site is a MasterCard SecureCode (MCSC) participating Merchantâs website. MCSC is 

designed to enable you (cardholder) make safer internet purchase transactions by 

authenticating your identity at the time of purchase in order to protect you from 

unauthorized usage of your MasterCard. MasterCard SecureCode password is strictly for online transactions and it is different 

from your regular Personal Identification Number (PIN) used for ATM and POS 

transactions.
<ol>

Please follow the steps below to obtain and use your MasterCard SecureCode:

<li>Click on the Continue button below to proceed to the next page.</li>

<li>Enter your MasterCard card details such as Card Number, CVV2, Name on card, Expiry date and click OK </li>

<li>You will be redirected to your bankâs website, kindly follow the process to 
    completion as advised by your bank</li>

<li>The next time you make purchase on the website of a participating Merchant, 

simply enter the MCSC Password and any Secret Questions (if any) you created if 

required by your bank.</li>
</ol>

<br><strong>Important</strong><br>

The activation process is determined by your bank. Should you encounter any problem, 

please contact your bank<br><br>

<img src='images/visamaster.jpg' />






</div>

<style>
tr:nth-child(even) {background: #CCC;}
tr:nth-child(odd) {background: #FFF;}
</style>
<script type="text/javascript">
$(document).ready(function(){
   $("#upsShow").click(function(){
      $("#ups").toggle(1000);
      $("#quickteller").hide();
   }); 
   $("#quickShow").click(function(){
      $("#ups").hide();
      $("#quickteller").toggle(1000);
   }); 
   $("#upsMore").click(function(){
      $("#upsShowMore").toggle(1000);
   });
});
</script>
