<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Staff</div>
<div class="panel panel-body">
<?php
echo anchor('welcome/payrollStaff','Back to Staff',array('class'=>'btn btn-success')); 
?>
<table class="table table-striped">
<?php foreach($staff as $st){} ?>
<tr><td>Name</td><td><?php echo $st['name']; ?></td></tr>
<tr><td>Bank</td><td><?php echo $st['bankName']; ?></td></tr>
<tr><td>Account No</td><td><?php echo $st['accountNo']; ?></td></tr>
<tr><td>Salary</td><td><?php echo number_format($st['salary'],2); ?></td></tr>
</table>
<hr />
<?php 
foreach($staffPayslip as $row){
	?>
	<li class="list-group-item"><?php echo anchor_popup('welcome/printPaySlipStaff/'.$row['staffID']."/".$row['month']."/".$row['year'],'Print Payslip for '.$row['month']."-".$row['year'],array('width'=>800,'height'=>600)); ?></li>
	<?php
}
?>