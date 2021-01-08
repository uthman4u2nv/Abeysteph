<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row">

<div class="col-lg-12">
<?php
echo form_open('welcome/addmachinecount');?>
<div class="row" style="margin-top:10px !important;">
<div class="col-sm-6">
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">From</span>
<input type="date" name="from" required class="form-control" />
</div></div>
<div class="col-sm-6">
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">To</span>
<input type="date" name="to" required class="form-control" />
</div></div></div>
<div class="row">
<div class="col-sm-12"><input type="submit" class="btn btn-success" value="Search" /></div>
</div>
<?php echo form_close();?>
<hr />
<p>Search:<h3><?php echo $search;?></h3></p>
<a class="list-group-item active">Jobs Pending</a>
<?php
if(!empty($jobs)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Date</td><td>Cust Name</td><td>Job type</td><td>Description</td><td>Qty</td><td></td></tr>
	<?php
	$sno=0;
	foreach($jobs as $l){
		$sno++;?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $l['date'];?></td>
		<td><?php echo $l['cust_name'];?></td>
		<td><?php echo $l['name'];?></td>
		<td><?php echo $l['description'];?></td>
		<td><?php echo $l['qty'];?></td>
		<td><?php echo anchor('welcome/updatestatus/'.$l['id'],'Add to Machine Count');?></td>
		</tr>
	<?php } ?>
	</table>
<?php }else{ echo "No Job Found";} ?>
</div>
</div>
</div>