<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">View Log Book</div>
<div class="panel panel-body">
<?php echo anchor('welcome/assignedStudents','Back to Assigned Students',array('class'=>'btn btn-primary')); ?>
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg; ?></div>
	<?php
}
?>
<?php
if(!empty($logbook)){
	//print_r($logbook);
	?>
	<?php 
	$sno=0;
	foreach($logbook as $row){
		$sno++;
		?>
		<?php echo form_open('welcome/updateSupComment'); ?>
		<h3><strong><?php echo $sno; ?></strong></h3>
		<table class="table table-stripped">
		<tr><td>Name</td><td><?php echo $row['surname']." ".$row['othernames']; ?></td></tr>
		<tr><td>Matric No</td><td><?php echo $row['matric'] ?></td></tr>
		<tr><td>Department</td><td><?php echo $row['dept']; ?></td></tr>
		<tr><td>Course</td><td><?php echo $row['course']; ?></td></tr>
		<tr><td>Organisation</td><td><?php echo $row['orgName'] ?></td></tr>
		<tr><td colspan="2"><strong>Logbook Details</strong></td></tr>
		<tr><td>From</td><td><?php echo $row['from'] ?></td></tr>
		<tr><td>To</td><td><?php echo $row['to'] ?></td></tr>
		<tr><td>Description</td><td><?php echo $row['description'] ?></td></tr>
		<tr><td>Organisation Supervisor</td><td><?php echo $row['orgSup'] ?></td></tr>
		<tr><td>Supervisor</td><td><input type="hidden" name="id" value="<?php echo $row['logID']; ?>" /><input type="hidden" name="app_num" value="<?php echo $row['app_num']; ?>" /><textarea name="sup" class="form-control" required><?php echo $row['supComment'] ?></textarea></td></tr>
		<tr><td colspan="2"><input type="submit" value="Update Logbook" class="btn btn-submit" /></td></tr>
		</table>
		<?php echo form_close(); ?>
		<hr />
		<?php
	}
	?>
	<?php 
}else{
	echo "No Logbook Found";
}
?>
</div>
</div>
</div>