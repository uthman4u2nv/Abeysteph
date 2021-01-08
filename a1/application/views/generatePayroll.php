<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Generate Payroll</div>
<div class="panel panel-body">

<?php	
echo form_open('welcome/generatePayroll2'); ?>
<table class="table table-striped">
<tr>
<td>Month</td>
<td><select name="month" class="form-control" required><option value="">Select Month</option>
<?php 
for($i=1; $i<=12; $i++){
	?>
	<option value="<?php echo $i; ?>" <?php if($i==date('m')){echo "selected";} ?>><?php echo $i; ?></option>
<?php } ?></td></tr>
<tr>
<td>Year</td>
<td><select name="year" class="form-control" required><option value="">Select Year</option>
<?php 
for($y=2016; $y<=date('Y'); $y++){
	?>
	<option value="<?php echo $y; ?>" <?php if($y==date('Y')){echo "selected";} ?>><?php echo $y; ?></option>
<?php } ?></td></tr>
<tr><td colspan="2"><input type="submit" value="Generate Payroll" class="btn btn-success" /></td></tr>
</table>
<?php echo form_close(); ?>
</div>
</div>
</div>