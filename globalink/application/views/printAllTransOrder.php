<html>
    <head>
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/morris/morris.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css" />
        <style>
            #header{font-size: 12px; font-family: Arial;}
            #content22{font-size: 11px;}
			#content23{font-size: 10px;}
            
        </style>
        <script src="<?php echo base_url('js/jquery-ui-1.10.3.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/raphael.js'); ?>" type="text/javascript"></script>
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
        <script src="<?php echo base_url('js/plugins/morris/morris.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/sparkline/jquery.sparkline.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/fullcalendar/fullcalendar.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/jqueryKnob/jquery.knob.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/AdminLTE/app.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/AdminLTE/dashboard.js'); ?>" type="text/javascript"></script>     
        <script src="<?php echo base_url('js/AdminLTE/demo.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/gen_validatorv4.js');?>" type="text/javascript"></script>
<script>
    function onLoad(){
        window.print();
    }
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }
	window.print();
    </script>
    </head>
    <body>
	
        <div id="mydiv"><?php
foreach($trans as $t){
   ?>
		<a class="list-group-item active"><strong>CASHIERS COPY</strong></a>
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

            <table width="80%" id="content22" class="table table-striped" border='0' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td><strong>Date</strong></td><td colspan="4"><strong><?php $h=date("h"); echo $t['time']; ?>; Invoice #: <?php echo $t['order_no']; ?></strong></td></tr>
                <tr><td><strong>Name</strong></td><td colspan="4"><strong><?php echo $t['cust_name']; ?></strong></td></tr>
				<tr><td><strong>Phone</strong></td><td colspan="4"><strong><?php echo $t['cust_phone']; ?></strong></td></tr>
				
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
			
	
<?php } ?>
	
        </div>
		<p><input type="button" class="btn btn-primary" onclick="printDiv('#mydiv')" value="PRINT RECEIPT"> | <?php if($_SESSION['roles']==3){ ?><?php echo anchor('welcome/cashier','Return Home',array('class'=>'btn btn-success')); ?><?php } else{?><?php echo anchor('welcome/home','Return Home',array('class'=>'btn btn-success')); ?><?php } ?></p>
	
	  <!--End General Printing-->  
    
  
        
    </body>

<script>
      function onLoad(){
        window.print();
    }
    function printDiv(divName)
    {
        var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
    </script>