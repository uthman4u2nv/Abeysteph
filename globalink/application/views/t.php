<div id="mydiv">
		<a class="list-group-item active"><strong>RECEIPT</strong></a>
            <center>
            <table id="header" style="margin-top:0px !important; font-size:11px !important;">
                <!--<tr><td colspan="2" align="center"><?php 
            //echo img('images/log.png');
            ?></td></tr>-->
    <!--<tr><td colspan="2" align="center"><strong>LA-LEXIS FROZEN FOOD</strong></td></tr>-->
    <tr><td colspan="2" align="center"><strong>ABEYSTEPH GLOBALINK LIMITED</strong></td></tr>
    <tr><td colspan="2"align="center"><strong>Murg Plaza, Garki Area 10, Abuja</strong></td></tr>
    <tr><td colspan="2" align="center"><strong><span class="fa fa-mobile-phone"></span>: +234 8067346328</strong></td></tr>
    <tr><td colspan="2" align="center"><strong><span class="fa fa-envelope"></span>: abeysteph@yahoo.ca</strong></td></tr>
    <tr><td colspan="2" align="center"></td></tr>
    
</table>
</center>
<?php
foreach($trans22 as $t){}
   ?>
            <table width="80%" id="content22" class="table table-striped" border='0' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td><strong>Date</strong></td><td colspan="4"><strong><?php $h=date("h"); echo $t['time']; ?>; Invoice #: <?php echo $t['order_no']; ?></strong></td></tr>
                <tr><td><strong>Name</strong></td><td colspan="4"><strong><?php echo $t['cust_name']; ?></strong></td></tr>
				<tr><td><strong>Phone</strong></td><td colspan="4"><strong><?php echo $t['cust_phone']; ?></strong></td></tr>
				<tr><td><strong>Staff</strong></td><td colspan='3'><strong><?php echo $_SESSION['name']; ?></strong></td></tr>
				</table>

          
				<table width="80%" id="content23" class="table" style="margin-top:0px !important; font-size:11px !important;">
                <tr><td>#</td><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>N</strong></td></tr>
 
    <!--<tr><td>1.</td><td align="left"><?php echo $t['description'];?></td><td><?php echo $t['qty']; ?></td><td align="left"><?php echo number_format($t['total_amount'],2);?></td></tr>-->
       <?php
	   $sno=0;
	   $tot=0;
	   foreach($trans as $r){
		   $sno++;
		   $tot+=$r['total_amount'];
		   ?>
		   <tr><td><?php echo $sno; ?></td><td><?php echo $r['description']; ?></td><td><?php echo $r['qty']; ?></td><td><?php echo number_format($r['total_amount'],2); ?></td></tr>
	   <?php } ?>
	   <?php
    ?>
	 <tr><td></td><td></td><td><strong>Total</strong></td><td><strong><?php echo number_format($tot,2); ?></strong></td></tr>

   
         <tr><td></td><td></td><td><strong>Paid</strong></td><td><strong><?php echo number_format($t['advance'],2); ?></strong></td></tr>
         <tr><td></td><td></td><td><strong>Outstanding Balance</strong></td><td><strong><?php echo number_format($t['balance'],2); ?></strong></td></tr>
		 
    
    
            </table>
			<center>
        
        
        <h6 style="margin-top:0px !important; font-size:10px !important;"><strong>For Enquiries&Pricing: 08067346328,08170000006;<p>Job Confirmation: 08167930124</p></strong></h6>
    <img src="<?php echo base_url().'welcome/set_barcode/'. $t['order_no'];?>" height="50" />
    </center>
	<hr />
	<a class="list-group-item active"><strong>CASHIER'S COPY: <strong><?php echo $numb; ?></strong></strong></a>
	<center>
            <table id="header" style="margin-top:0px !important; font-size:11px !important;">
                <!--<tr><td colspan="2" align="center"><?php 
            //echo img('images/log.png');
            ?></td></tr>-->
    <!--<tr><td colspan="2" align="center"><strong>LA-LEXIS FROZEN FOOD</strong></td></tr>-->
    <tr><td colspan="2" align="center"><strong>ABEYSTEPH GLOBALINK LIMITED</strong></td></tr>
    <tr><td colspan="2"align="center"><strong>Murg Plaza, Garki Area 10, Abuja</strong></td></tr>
    <tr><td colspan="2" align="center"><strong><span class="fa fa-mobile-phone"></span>: +234 8067346328</strong></td></tr>
    <tr><td colspan="2" align="center"><strong><span class="fa fa-envelope"></span>: abeysteph@yahoo.ca</strong></td></tr>
    <tr><td colspan="2" align="center"></td></tr>
    
</table>
</center>
<?php
foreach($trans22 as $t){}
   ?>
   
            <table width="80%" id="content22" class="table table-striped" border='0' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td><strong>Date</strong></td><td colspan="4"><strong><?php $h=date("h"); echo $t['time']; ?>; Invoice #: <?php echo $t['order_no']; ?></strong></td></tr>
                <tr><td><strong>Name</strong></td><td colspan="4"><strong><?php echo $t['cust_name']; ?></strong></td></tr>
				<tr><td><strong>Phone</strong></td><td colspan="4"><strong><?php echo $t['cust_phone']; ?></strong></td></tr>
				<tr><td><strong>Staff</strong></td><td colspan='3'><strong><?php echo $_SESSION['name']; ?></strong></td></tr>
				</table>

          
				<table width="80%" id="content23" class="table"  style="margin-top:0px !important; font-size:11px !important;">
                <tr><td>#</td><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>N</strong></td></tr>
 
    <!--<tr><td>1.</td><td align="left" wrap="yes"><?php echo $t['description'];?></td><td><?php echo $t['qty']; ?></td><td align="left"><?php echo number_format($t['total_amount'],2);?></td></tr>-->
       <?php
	   $sno=0;
	   $tot=0;
	   foreach($trans as $rr){
		   $sno++;
		   $tot+=$rr['total_amount'];
		   ?>
		   <tr><td><?php echo $sno; ?></td><td><?php echo $rr['description']; ?></td><td><?php echo $rr['qty']; ?></td><td><?php echo number_format($rr['total_amount'],2); ?></td></tr>
	   <?php } ?>
	   <?php
    ?>
	 <tr><td></td><td></td><td><strong>Total</strong></td><td><strong><?php echo number_format($tot,2); ?></strong></td></tr>

   
         <tr><td></td><td></td><td><strong>Paid</strong></td><td><strong><?php echo number_format($t['advance'],2); ?></strong></td></tr>
         <tr><td></td><td></td><td><strong>Outstanding Balance</strong></td><td><strong><?php echo number_format($t['balance'],2); ?></strong></td></tr>
		 
    
    
            </table>
			<center>
        <hr />
        
        <h6 style="margin-top:0px !important; font-size:10px !important;"><strong>For Enquiries&Pricing: 08067346328,08170000006;<p>Job Confirmation: 08167930124</p></strong></h6>
    <img src="<?php echo base_url().'welcome/set_barcode/'. $t['order_no'];?>" height="50" />
    </center>
	<a class="list-group-item active"><strong>PRODUCTION COPY: <strong><?php echo $numb; ?></strong></strong></a>
	<center>
            <table id="header" style="margin-top:0px !important; font-size:11px !important;">
                <!--<tr><td colspan="2" align="center"><?php 
            //echo img('images/log.png');
            ?></td></tr>-->
    <!--<tr><td colspan="2" align="center"><strong>LA-LEXIS FROZEN FOOD</strong></td></tr>-->
    <tr><td colspan="2" align="center"><strong>ABEYSTEPH GLOBALINK LIMITED</strong></td></tr>
    <tr><td colspan="2"align="center"><strong>Murg Plaza, Garki Area 10, Abuja</strong></td></tr>
    <tr><td colspan="2" align="center"><strong><span class="fa fa-mobile-phone"></span>: +234 8067346328</strong></td></tr>
    <tr><td colspan="2" align="center"><strong><span class="fa fa-envelope"></span>: abeysteph@yahoo.ca</strong></td></tr>
    <tr><td colspan="2" align="center"></td></tr>
    
</table>
</center>
<?php
foreach($trans22 as $t){}
   ?>
   
            <table width="80%" id="content22" class="table table-striped" border='0' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td><strong>Date</strong></td><td colspan="4"><strong><?php $h=date("h"); echo $t['time']; ?>; Invoice #: <?php echo $t['order_no']; ?></strong></td></tr>
                <tr><td><strong>Name</strong></td><td colspan="4"><strong><?php echo $t['cust_name']; ?></strong></td></tr>
				
				<tr><td><strong>Staff</strong></td><td colspan='3'><strong><?php echo $_SESSION['name']; ?></strong></td></tr>
				</table>

          
				<table width="80%" id="content23" class="table"  style="margin-top:0px !important; font-size:11px !important;">
                <tr><td>#</td><td><strong>Description</strong></td><td><strong>Qty</strong></td><!--<td><strong>N</strong></td>--></tr>
 
    <!--<tr><td>1.</td><td align="left" wrap="yes"><?php echo $t['description'];?></td><td><?php echo $t['qty']; ?></td><td align="left"><?php echo number_format($t['total_amount'],2);?></td></tr>-->
       <?php
	   $sno=0;
	   $tot=0;
	   foreach($trans as $rr){
		   $sno++;
		   $tot+=$rr['total_amount'];
		   ?>
		   <tr><td><?php echo $sno; ?></td><td><?php echo $rr['description']; ?></td><td><?php echo $rr['qty']; ?></td><!--<td><?php echo number_format($rr['total_amount'],2); ?></td>--></tr>
	   <?php } ?>
	   <?php
    ?>
	 <!--<tr><td></td><td></td><td><strong>Total</strong></td><td><strong><?php echo number_format($tot,2); ?></strong></td></tr>-->
<!--
   
         <tr><td></td><td></td><td><strong>Paid</strong></td><td><strong><?php echo number_format($t['advance'],2); ?></strong></td></tr>
         <tr><td></td><td></td><td><strong>Outstanding Balance</strong></td><td><strong><?php echo number_format($t['balance'],2); ?></strong></td></tr>
		 -->
    
    
            </table>
			<!--<center>
        
        
        <h6 style="margin-top:0px !important; font-size:10px !important;"><strong>For Enquiries&Pricing: 08067346328,08170000006;<p>Job Confirmation: 08167930124</p></strong></h6>
    <img src="<?php echo base_url().'welcome/set_barcode/'. $t['order_no'];?>" height="50" />
    </center>-->
	
	
	
        </div>
		<p><input type="button" class="btn btn-primary" onclick="printDiv('#mydiv')" value="PRINT RECEIPT"> | <?php if($_SESSION['roles']==3){ ?><?php echo anchor('welcome/cashier','Return Home',array('class'=>'btn btn-success')); ?><?php } else{?><?php echo anchor('welcome/home','Return Home',array('class'=>'btn btn-success')); ?><?php } ?></p>