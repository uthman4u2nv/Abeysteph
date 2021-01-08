<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Assigned Students</div>
<div class="panel panel-body">
<?php
if(empty($students)){
	echo "No Student Assigned";
}else{ ?>
<table class="table table-striped">
<tr><td>S/No</td><td>Name</td><td>Sex</td><td>Phone</td><td>Matric No</td><td>Faculty</td><td>Course</td><td>Department</td><td>Organisation</td><td></td></tr>
<?php
$sno=0;
foreach($students as $row){
	$sno++;
?>	
<tr><td><?php echo $sno; ?></td><td><?php echo $row['surname']." ".$row['othernames']; ?></td><td><?php echo $row['sex']; ?></td><td><?php echo $row['phone']; ?></td><td><?php echo $row['matric']; ?></td><td><?php echo $row['faculty']; ?></td><td><?php echo $row['course']; ?></td><td><?php echo $row['dept']; ?></td><td><?php echo $row['orgName']; ?></td><td><?php echo anchor('welcome/viewLogBook/'.$row['app_num'],'View Log Book'); ?></td></tr>
	<?php
}
?>
</table>
<?php } ?>
</div>
</div>
</div>