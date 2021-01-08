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
	<?php foreach($staff as $row){} //print_r($staff) ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Edit Payroll Staff</div>
<div class="panel panel-body">
<?php echo form_open('welcome/updatePayrollStaff'); ?>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Title</span>
<input type="hidden" value="<?php echo $row['staffID']; ?>" name="staffID" />
<select name="title" class="form-control" required>
<option value="Mr." <?php if($row['title']=='Mr.'){echo "selected";} ?>>Mr.</option>
<option value="Mrs." <?php if($row['title']=='Mrs.'){echo "selected";} ?>>Mrs.</option>
<option value="Miss" <?php if($row['title']=='Miss'){echo "selected";} ?>>Miss</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Name</span>
<input type="text" required name="name" value="<?php echo $row['name']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Date of Birth</span>
<input type="date" required name="dob" value="<?php echo $row['dob']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Phone</span>
<input type="number" required name="phone" value="<?php echo $row['phone']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Email</span>
<input type="email" required name="email" value="<?php echo $row['email']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Sex</span>
<select name="sex" required class="form-control">
<option value="Male" <?php if($row['sex']=='Male'){echo "selected";} ?>>Male</option>
<option value="Female" <?php if($row['sex']=='Female'){echo "selected";} ?>>Female</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Address</span>
<textarea name="address" class="form-control" required>
<?php echo $row['address']; ?>
</textarea>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Bank</span>
<select name="bank" class="form-control" required>
<option value="">Bank</option>
<?php
foreach($bank as $b){
	?>
	<option value="<?php echo $b['bankID']; ?>" <?php if($row['bank']==$b['bankID']){echo "selected";} ?>><?php echo $b['bankName']; ?></option>
	<?php
}
?>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Account Name</span>
<input type="text" required name="accountName" value="<?php echo $row['accountName']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Account No</span>
<input type="number" required name="accountNo" value="<?php echo $row['accountNo']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Salary</span>
<input type="number" required name="salary" value="<?php echo $row['salary']; ?>" class="form-control" />
</div>



<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Username</span>
<input type="text" required name="username" value="<?php echo $row['username']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Password</span>
<input type="password" required name="password"  class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Status</span>
<select name="status" required class="form-control">
<option value="1" <?php if($row['status']=='1'){echo "selected";} ?>>Active</option>
<option value="0" <?php if($row['status']=='0'){echo "selected";} ?>>Inactive</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">

<input type="submit" value="Update Staff" class="btn btn-default" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>