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
    </script>
    </head>
    <body>
        <div id="mydiv" style='margin-top:0px !important;'>
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
foreach($enquiries as $t){}
   ?>
            <table width="80%" id="content22" class="table table-striped" border='0' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td><strong>Date</strong></td><td colspan="4"><strong><?php $h=date("h"); echo $t['date']; ?>; Invoice #: <?php echo $t['enqNo']; ?></strong></td></tr>
                <tr><td><strong>Customer Name</strong></td><td colspan="4"><strong><?php echo $t['enqName']; ?></strong></td></tr>
				<tr><td><strong>Customer Phone</strong></td><td colspan='3'><strong><?php echo $t['enqPhone']; ?></strong></td></tr>
				</table>

          
				<table width="80%" id="content23" class="table table-striped" border='2' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td class="col-sm-2">#</td><td class="col-sm-4"><strong>Description</strong></td><td class="col-sm-3"><strong>N</strong></td></tr>
 <?php
 $sno=0;
 $total=0;
 foreach($enquiries as $row){
	 $sno++;
	 $total+=$row['enqAmount'];
	 ?>
	 <tr><td><?php echo $sno; ?></td><td><?php echo $row['enqItem']; ?></td><td><?php echo number_format($row['enqAmount'],2); ?></td></tr>
	 <?php
 }
 ?>
    
	 <tr><td></td><td><strong>Total</strong></td><td><strong><?php echo number_format($total,2); ?></strong></td></tr>

   
         
		 
    
    
            </table>
			<center>
        
        
        <h6 style="margin-top:0px !important; font-size:9px !important;">Thank you for coming</h6>
    <img src="<?php echo base_url().'welcome/set_barcode/'. $t['enqNo'];?>" height="50" />
    </center>
	<hr />
	
	


          
				
			
	
	
        </div>
		<p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT </a> | <?php if($_SESSION['roles']==7){ ?><?php echo anchor('welcome/customer','Return Home',array('class'=>'btn btn-success')); ?><?php } else{?><?php echo anchor('welcome/customer','Return Home',array('class'=>'btn btn-success')); ?><?php } ?></p>
        
    
  
        
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