<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Customer Care</div>
<div class="panel panel-body">
<?php
foreach($enquiries as $t){}
   ?>
            <table width="80%" id="content22" class="table table-striped" border='0' style="margin-top:0px !important; font-size:11px !important;">
                <tr><td><strong>Date</strong></td><td colspan="4"><strong><?php echo $t['enqDate']; echo $t['date']; ?>; Invoice #: <?php echo $t['enqNo']; ?></strong></td></tr>
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
</div>
</div>
</div>
