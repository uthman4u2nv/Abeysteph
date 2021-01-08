<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel-heading">Machine Operator</div>
<div class="panel-body">

<table class="table table-striped">
<tr><td>Stock Balance</td><td><strong><?php echo $StockBalance;?></td></tr>
</table>
<?php
if(!empty($StockHistory)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Date</td><td>Order No</td><td>Job Name</td><td>In</td><td>Out</td><td>Balance</td></tr>
	<?php
	//print_r($StockHistory);
	$sno=0;
	$bal=0;
	$ini=0;
	foreach($StockHistory as $row){ $sno++;?>
	<tr>
	<td><?php echo $sno;?></td>
	<td><?php echo $row['order_no'];?></td>
	<td><?php echo $row['stockDate'];?></td>
	<td><?php echo $row['cust_name'];?></td>
	<td><?php if($row['In']>0){ $bal=$ini+$row['In']; echo $row['In']; $ini=$bal;}?></td>
	<td><?php if($row['Out']>0){ $bal=$ini-$row['Out']; echo $row['Out'];$ini=$bal;}?></td>
	<td><?php echo $bal;?></td>
	</tr>
	<?php } ?>
	</table>
<?php }else{ echo "No Stock History Found";} ?>
</div>
</div>

</div>
