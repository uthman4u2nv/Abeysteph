<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<a class="list-group-item active">Large Format Staff</a>
<?php
if(!empty($largeformatstaff)){ ?>
	<table class="table table-stripped">
	<tr><td>#</td><td>Surname</td><td>Other Names</td><td>Username</td><td>Balance</td><td>Add Stock</td><td>Stock History</td></tr>
	<?php
	$sno=0;
	foreach($largeformatstaff as $l){
		$sno++;?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $l['surname'];?></td>
		<td><?php echo $l['othernames'];?></td>
		<td><?php echo $l['username'];?></td>
		<td><?php echo $l['stockbalance'];?></td>
		<td><?php echo anchor_popup('welcome/addstock/'.$l['id'],'Add New Stock',array('weight'=>400,'height'=>400));?></td>
		<td><?php echo anchor_popup('welcome/stockhistory/'.$l['id'],'Stock History',array('weight'=>400,'height'=>400));?></td>
	<?php } ?>
	</table>
	
<?php }else{echo "No large format staff found";} ?>
</div>