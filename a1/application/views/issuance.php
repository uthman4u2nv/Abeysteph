<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">

<div class="panel-heading">
Plates Issuance History
</div>
<div class="panel-body">
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg;?></div>
<?php } ?>
	
<?php echo form_open('welcome/addissuance');?>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Date Issued</span>
<input type="date" class="form-control" required name="date" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Product</span>
<select class="form-control" required name="product">
<option>--Select Product--</option>
<?php foreach($jobType as $p){
	?>
	<option value="<?php echo $p['id'];?>"><?php echo $p['name'];?></option>
<?php } ?>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Qty</span>
<input type="number" class="form-control" required name="qty" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<input type="submit" class="btn btn-success" value="Add Plates Issuance" />
</div>
<?php echo form_close();?>
<hr />
<?php
if(!empty($issuance)){ ?>
<table class="table table-striped">
<tr>
<th>#</th>
<th>Issued Date</th>
<th>Product</th>
<th>Qty</th>
<th>Issued By</th>
<th></th>
</tr>
<?php
$sno=0;
foreach($issuance as $row){
	$sno++;	
	?>
	<tr>
	<td><?php echo $sno;?></td>
	<td><?php echo $row['issueDate'];?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['issuedQty'];?></td>
	<td><?php echo $row['username'];?></td>
	<td><?php echo anchor('welcome/deleteissuance/'.$row['issueID'],'Remove',array('class'=>'btn btn-danger'));?></td>
	</tr>
<?php } ?>
</table>
<?php }else{ echo "No records found";} ?>

</div>
</div>