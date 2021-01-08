<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Staff</div>
<div class="panel panel-body">
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg; ?></div>
	<?php
}
?>
<?php
echo anchor_popup('welcome/addNewPayrollStaff','Add New Staff',array('width'=>400,'height'=>400,'class'=>'btn btn-success')); 
?>
<hr />
<?php
if(!empty($staff)){?>
<table class="table table-striped">
<tr><td>#</td><td>Name</td><td>Sex</td><td>Phone</td><td>Email</td><td>View</td><td>Edit</td><td>Deductions</td><td>View Payslip</td></tr>
<?php
$sno=0;
foreach($staff as $row){
	$sno++;
	?>
	<tr>
	<td><?php echo $sno; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['sex']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo anchor_popup('welcome/viewPayrollStaff/'.$row['staffID'],'View',array('width'=>400,'height'=>400)); ?></td>
	<td><?php echo anchor_popup('welcome/editPayrollStaff/'.$row['staffID'],'Edit',array('width'=>400,'height'=>400)); ?></td>
	<td><?php echo anchor('welcome/viewDeductions/'.$row['staffID'],'View',array('width'=>400,'height'=>400)); ?></td>
	<!--<td><?php echo anchor_popup('welcome/viewIncome/'.$row['staffID'],'View',array('width'=>400,'height'=>400)); ?></td>-->
	<td><?php echo anchor('welcome/viewPaySlip22/'.$row['staffID'],'View'); ?></td>
	</tr>
	<?php
}
?>
</table>
<?php }else{echo "No Staff Found";} ?>
</div>
</div>
</div>