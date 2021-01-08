<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">Brought Forward</div>
<div class="panel panel-body">
<?php echo anchor_popup('welcome/addSales','Add Sales',array('width'=>400,'height'=>600,'class'=>'btn btn-success')); ?>
<hr />
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg; ?></div>
<?php } ?>
<?php
if(empty($loadSales)){
	echo "No Sales Found";
}else{
	$sno=0;
	?>
	
	<div id="mydiv">
	<table class="table table-striped table-bordered">
	<tr><td>#</td><td>Sales Date</td><td>Job Order No</td><td>Desc</td><td>Payment Method</td><td>Amount</td><td></td></tr>
	<?php
	$tot=0;
	foreach($loadSales as $row){
		$sno++;
		$tot+=$row['salesAmount'];
		?>
		<tr>
		<td><?php echo $sno; ?></td>
		<td><?php echo $row['salesDate']; ?></td>
		<td><?php echo $row['salesOrderNo']; ?></td>
		<td><?php echo $row['salesDescription']; ?></td>
		<td><?php echo $row['methodName']; ?></td>
		<td><?php echo number_format($row['salesAmount'],2); ?></td>
		<td><?php echo anchor_popup('welcome/deleteSales/'.$row['salesID'],'Delete',array('width'=>400,'height'=>600)); ?></td>
		
		</tr>
		<?php
	}
	?>
	<tr><td colspan="5"><strong>TOTAL</strong></td><td><strong><?php echo number_format($tot,2); ?></strong></td></tr>
	</table>
	</div>
	<p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT MY SALES</a>
	<?php
}
?>
</div>
</div>
</div>
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