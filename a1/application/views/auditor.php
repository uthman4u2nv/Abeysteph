<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Auditor</div>
<div class="panel panel-body">

<li class="list-group-item"><strong>Date:<?php echo date('Y-m-d'); ?></strong></li>
<?php echo form_open('welcome/searchJobs'); ?>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">From</span>
<input type="date" name="from" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">To</span>
<input type="date" name="to" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Dept</span>
<select name="dept" required class="form-control">
<option value="">Dept</option>
<?php
foreach($dept as $d){
	?>
	<option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
<?php } ?>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important">

<input type="submit" value="Search" class="btn btn-success" />
</div>
<?php echo form_close(); ?>
<hr />
</div>
</div>
</div>
