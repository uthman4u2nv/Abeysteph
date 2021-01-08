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
<div class="panel panel-heading">Add New Staff</div>
<div class="panel panel-body">
<?php echo form_open('welcome/insertStaff'); ?>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Title</span>
<select name="title" class="form-control" required>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Miss">Miss</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Surname</span>
<input type="text" required name="surname" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Othernames</span>
<input type="text" required name="othernames" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Sex</span>
<select name="sex" required class="form-control">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Role</span>
<select name="usertype" required class="form-control">
<option value="">Role</option>
<?php
foreach($usertype as $u){
	?>
	<option value="<?php echo $u['id']; ?>"><?php echo $u['name']; ?> </option>
	<?php
}
?>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Department</span>
<select name="dept" required class="form-control">
<option value="">Department</option>
<?php
foreach($depts as $d){
	?>
	<option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?> </option>
	<?php
}
?>
</select>
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