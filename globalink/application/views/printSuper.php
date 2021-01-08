<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">All Jobs</div>
<div class="panel panel-body">
<?php
header('refresh: 60; url='.base_url().'welcome/printSuper');
?>

<hr />
<li class="list-group-item"><strong>Date: <?php echo date('Y-m-d'); ?></strong></li>
<?php
if(!$jobs){
	echo "No Job found<br />";
	
}
else{
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Date</td><td>Customer Name</td><td>Order No</td><td>Machine Operator</td><td></td></tr>
	<?php
	$sno=0;
	$totalSales=0;
	$totalBalance=0;
	$cashAtHand=0;
	foreach($jobs as $row){
		$totalSales+=$row['total_amount'];
		$sno++;
		?>
		<tr>
		<td><?php echo $sno; ?></td>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['cust_name']; ?></td>
		<td><?php echo $row['order_no']; ?></td>
		
		<td><?php echo $row['surname'].' '.$row['othernames']; ?></td>
		<td>
		<?php
		//echo $row['print_status'];
		if($row['print_status']=="0"){
			?>
			<span class="label label-danger">Not Printed</span>
		<?php }elseif($row['print_status']=="1"){ ?>
		<span class="label label-info">Printing</span>
		<?php }elseif($row['print_status']=="2"){ ?>
		<span class="label label-success">Printed</span>
		<?php } ?>
		</td>
		
		<td><?php echo anchor_popup('welcome/editPrint/'.$row['order_no'],'Edit',array('height'=>400,'width'=>400,'class'=>'btn btn-default btn-flat')); ?></td>
		
		</tr>
		<?php
		
	}
	?>
	</table>
	
	<?php
}
?>
</div>
</div>
</div>