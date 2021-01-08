<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Customer Care</div>
<div class="panel panel-body">
<?php echo anchor('welcome/addEnq','Add Enquiry',array('class'=>'btn btn-success')); ?>
<li class="list-group-item"><strong>Date:<?php echo date('Y-m-d'); ?></strong></li>
<?php
if(!empty($enquiries)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Date</td><td>Enq No</td><td>Customer Name</td><td>treated By</td></tr>
	<?php
	$sno=0;
	foreach($enquiries as $row){
		$sno++;
		?>
		<tr><td><?php echo $sno; ?></td><td><?php echo $row['enqDate']; ?></td><td><?php echo $row['enqNo']; ?></td><td><?php echo $row['enqName']; ?></td><td><?php echo $row['surname']." ".$row['othernames']; ?></td><td><?php echo anchor_popup('welcome/viewEnquiry/'.$row['enqNo'],'View Enquiry',array('width'=>400,'height'=>400)); ?></td></tr>
		<?php
	}
	?>
	</table>
	<?php
}
else{
	echo "No enquiries made today";
}
?>
</div>
</div>
</div>
