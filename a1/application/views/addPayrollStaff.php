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
<div class="panel panel-heading">Add New Payroll Staff</div>
<div class="panel panel-body">
<?php echo form_open('welcome/insertPayrollStaff'); ?>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Title</span>
<select name="title" class="form-control" required>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Miss">Miss</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Name</span>
<input type="text" required name="name" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Date of Birth</span>
<input type="date" required name="dob" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Phone</span>
<input type="number" required name="phone" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Email</span>
<input type="email" required name="email" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Sex</span>
<select name="sex" required class="form-control">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Address</span>
<textarea name="address" class="form-control" required>
</textarea>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Bank</span>
<select name="bank" class="form-control" required>
<option value="">Bank</option>
<?php
foreach($bank as $b){
	?>
	<option value="<?php echo $b['bankID']; ?>"><?php echo $b['bankName']; ?></option>
	<?php
}
?>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Account Name</span>
<input type="text" required name="accountName" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Account No</span>
<input type="number" required name="accountNo" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Salary</span>
<input type="number" required name="salary" class="form-control" />
</div>



<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Username</span>
<input type="text" required name="username" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Password</span>
<input type="password" required name="password" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">

<input type="submit" value="Add Staff" class="btn btn-default" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>