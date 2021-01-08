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
	<?php
	foreach($staff as $row){}
	?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Add New Staff</div>
<div class="panel panel-body">
<?php echo form_open('welcome/updateStaff'); ?>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Title</span>
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<select name="title" class="form-control" required>
<option value="Mr." <?php if($row['title']=='Mr.'){echo "selected";} ?>>Mr.</option>
<option value="Mrs." <?php if($row['title']=='Mrs.'){echo "selected";} ?>>Mrs.</option>
<option value="Miss" <?php if($row['title']=='Miss'){echo "selected";} ?>>Miss</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Surname</span>
<input type="text" required name="surname" value="<?php echo $row['surname']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Othernames</span>
<input type="text" required name="othernames" value="<?php echo $row['othernames']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Sex</span>
<select name="sex" required class="form-control">
<option value="Male" <?php if($row['sex']=='Male'){echo "selected";} ?>>Male</option>
<option value="Female" <?php if($row['sex']=='Female'){echo "selected";} ?>>Female</option>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Role</span>
<select name="usertype" required class="form-control">
<option value="">Role</option>
<?php
foreach($usertype as $u){
	?>
	<option value="<?php echo $u['id']; ?>" <?php if($row['user_type']==$u['id']){echo "selected";} ?>><?php echo $u['name']; ?> </option>
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
	<option value="<?php echo $d['id']; ?>" <?php if($row['dept']==$d['id']){echo "selected";} ?>><?php echo $d['name']; ?> </option>
	<?php
}
?>
</select>
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Username</span>
<input type="text" required name="username" value="<?php echo $row['username']; ?>" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">
<span class="input-group-addon">Password</span>
<input type="password" required  name="password" class="form-control" />
</div>
<div class="input-group" style="margin-top:10px !important;">

<input type="submit" value="Update Staff" class="btn btn-default" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>