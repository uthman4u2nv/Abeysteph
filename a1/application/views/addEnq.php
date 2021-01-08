<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Customer Care</div>
<div class="panel panel-body">
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg; ?></div>
	<?php
}
?>
<div class="row">
<div class="col-md-6">
<?php
if(empty($_SESSION['enq'])){ ?>
<?php echo form_open('welcome/insertEnq'); ?>
<div class="input-group" style="margin-top:10px !important">
<span class="input-group-addon">Customer Name</span>
<input type="text" name="name" required class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important">
<span class="input-group-addon">Customer Phone</span>
<input type="number" name="phone" required class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important">
<span class="input-group-addon">Item</span>
<input type="text" name="item" required class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important">
<span class="input-group-addon">Amount</span>
<input type="number" name="amount" required class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important">

<input type="submit" class="btn btn-submit" value="Add Enq" />
</div>
<?php echo form_close(); ?>
<?php }else{
	echo form_open('welcome/insertEnq2'); ?>
<div class="input-group" style="margin-top:10px !important">
<span class="input-group-addon">Item</span>
<input type="text" name="item" required class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important">
<span class="input-group-addon">Amount</span>
<input type="number" name="amount" required class="form-control" />
</div>	
<div class="input-group" style="margin-top:10px !important">

<input type="submit" class="btn btn-submit" value="Add Item" />
</div>

<?php echo form_close(); } ?>
</div>
<div class="col-md-6">
<?php
if(!empty($_SESSION['enq'])){
	?>
	<li class="list-group-item">Customer Name: <?php echo $_SESSION['custName']; ?></li>
	<li class="list-group-item">Customer Phone: <?php echo $_SESSION['custPhone']; ?></li>
	<table class="table table-striped">
	<tr><td>#</td><td>Item</td><td>Amount</td></tr>
	<?php
	$sno=0;
	foreach($_SESSION['enq'] as $row){
		$sno++;
		?>
		<tr><td><?php echo $sno; ?></td><td><?php echo $row['enqItem']; ?></td><td><?php echo number_format($row['enqAmount'],2); ?></td></tr>
		<?php
	}
	?>
	<tr>
	<td><?php echo form_open('welcome/enterEnq'); ?>
	<input type="hidden" name="enqNo" value="<?php echo $_SESSION['enqNo']; ?>" />
	<input type="submit" value="Process Enquiry" class="btn btn-success" />
	<?php echo form_close(); ?>
	</td>
	<td><?php echo form_open('welcome/deleteEnq'); ?>
	<input type="hidden" name="enqNo" value="<?php echo $_SESSION['enqNo']; ?>" />
	<input type="submit" value="Cancel Enquiry" class="btn btn-danger" />
	<?php echo form_close(); ?>
	</td>
	</table>
	<?php
}else{
	echo "No Enquiries Added";
}
?>
</div>
</div>

</div>
</div>
</div>
