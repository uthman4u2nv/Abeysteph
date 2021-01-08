<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<div class="panel panel-default">
<div class="panel-heading">Add DI Count</div>
<div class="panel-body">
<?php
echo form_open('welcome/insertDICount');?>


<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Date</span>
<input type="date" name="date" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Job Type</span>
<select name="type" class="form-control" required>
<?php
foreach($products as $p){
	?>
	<option value="<?php echo $p['id'];?>"><?php echo $p['name'];?></option>
<?php } ?>
</option>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Qty</span>
<input type="number" name="qty" required class="form-control" />
</div>
<div class="input-group">
<input type="submit" class="btn btn-success" value="Add Count" />
</div>
<?php echo form_close();?>
<hr />
<?php
if(!empty($dicounts)){ ?>
<table class="table table-striped">
<tr><td>#</td><td>Date</td><td>Product Name</td><td>Qty</td><td></td></tr>
<?php
$sno=0;
foreach($dicounts as $d){
	$sno++;
	?>
	<tr>
	<td><?php echo $sno;?></td>
	<td><?php echo $d['countDate'];?></td>
	<td><?php echo $d['name'];?></td>
	<td><?php echo $d['countQty'];?></td>
	<td><?php echo anchor_popup('welcome/deletedicount/'.$d['countID'],'Delete',array('class'=>'btn btn-danger','width'=>400,'height'=>600));?>
	</tr>
<?php } ?>
</table>
<?php }else echo "No record found"; ?>

</div>
</div>
</div>