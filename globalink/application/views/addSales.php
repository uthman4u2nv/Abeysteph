<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
	<?php
	if(!empty($msg)){
		?>
		<div class="alert alert-success"><?php echo $msg; ?></div>
		<?php
	}
	?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Add Sales</div>
<div class="panel panel-body">
<?php echo form_open('welcome/insertSales'); ?>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Payment Method</span>
<select name="salesMethod" class="form-control" required>
<option value="">Select Payment Method</option>
<?php
foreach($method as $m){
	 if($m['methodID']!=1){?>
	
	<option value="<?php echo $m['methodID']; ?>"><?php echo $m['methodName']; ?></option>
	
	<?php }} ?>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Description</span>
<input type="text" required name="salesDescription" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Job Order No</span>
<input type="text" required name="salesOrderNo" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Amount</span>
<input type="number" required name="salesAmount" class="form-control" />
</div>

<div class="input-group" style="margin-top:10px !important;">

<input type="submit" value="Add Sales" class="btn btn-default" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>