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
	
	<?php foreach($deduction as $row){} foreach($staff as $s){} ?>
	<li class="list-group-item">Name:<?php echo $s['name']; ?></li>
	<li class="list-group-item">Phone:<?php echo $s['phone']; ?></li>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Edit Deduction</div>
<div class="panel panel-body">
<?php echo form_open('welcome/updateDeductions'); ?>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Item</span>
<input type="hidden" name="deductionID" value="<?php echo $row['deductionID']; ?>" />
<input type="text" required name="item" value="<?php echo $row['item']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Amount</span>
<input type="number" required name="amount" value="<?php echo $row['amount']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Recurrent Deduction</span>
<select name="recurrent" class="form-control" required>
<option value="1" <?php if($row['recurrent']==1){echo "selected";} ?>>Recurrent</option>
<option value="0" <?php if($row['recurrent']==0){echo "selected";} ?>>Non Recurrent</option>
</select>

</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Status</span>
<select name="status" class="form-control" required>
<option value="1" <?php if($row['status']==1){echo "selected";} ?>>Active</option>
<option value="0" <?php if($row['status']==0){echo "selected";} ?>>Inactive</option>
</select>

</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Month</span>
<select name="month" class="form-control" required>
<?php
for($i=1;$i<=12;$i++){
	?>
	<option value="<?php echo $i; ?>" <?php if($i==$row['month']){echo "selected";}?>><?php echo $i; ?></option>
	<?php
}
?>
</select>

</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Year</span>
<select name="year" class="form-control" required>
<?php
for($y=2016;$y<=date('Y');$y++){
	?>
	<option value="<?php echo $y; ?>" <?php if($y==$row['year']){echo "selected";}?>><?php echo $y; ?></option>
	<?php
}
?>
</select>

</div>







<div class="input-group" style="margin-top:10px !important;">

<input type="submit" value="Update Deduction" class="btn btn-default" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>