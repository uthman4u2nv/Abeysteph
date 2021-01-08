<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Deductions</div>
<div class="panel panel-body">
<?php echo anchor('welcome/payrollStaff','Back to PayrollStaff',array('class'=>'btn btn-success')); ?>
<?php foreach($staff as $row){} //print_r($staff) ?>

<table class="table table-bordered table-striped">
<tr><td>Name</td><td><strong><?php echo $row['name']; ?></strong></td></tr>
<tr><td>Bank Name</td><td><strong><?php echo $row['bankName']; ?></strong></td></tr>
<tr><td>Account Name</td><td><strong><?php echo $row['accountName']; ?></strong></td></tr>
<tr><td>Account No</td><td><strong><?php echo $row['accountNo']; ?></strong></td></tr>
<tr><td>Salary</td><td><strong>N<?php echo number_format($row['salary'],2); ?></strong></td></tr>
</table>
<?php echo anchor_popup('welcome/addDeductions/'.$row['staffID'],'Add Deductions',array('class'=>'btn btn-success','width'=>400,'height'=>400)); ?>
<hr />
<?php

?>
<table class="table table-bordered">
<tr><td>#</td><td>Item</td><td>Month</td><td>Year</td><td>Amount</td><td>Edit</td></tr>
<?php
$sno=0;
if(!empty($recurrent)){
foreach($recurrent as $r){
	$sno++;
	?>
	<tr><td><?php echo $sno; ?></td><td><?php echo $r['item']; ?> </td><td><?php echo $r['month']; ?></td><td><?php echo $r['year']; ?></td><td><?php echo number_format($r['amount'],2); ?></td><td><?php echo anchor_popup('welcome/editDeduction/'.$r['deductionID']."/".$r['staffID'],'Edit',array('width'=>400,'height'=>400)); ?></td></tr>
	<?php
}}
?>
<?php
//print_r($deductionss);
if(!empty($deductionss)){
$sn=$sno;
foreach($deductionss as $d){
	$sn++;
	?>
	<tr><td><?php echo $sn; ?></td><td><?php echo $d['item']; ?> </td><td><?php echo $d['month']; ?></td><td><?php echo $d['year']; ?></td><td><?php echo number_format($d['amount'],2); ?></td><td><?php echo anchor_popup('welcome/editDeduction/'.$d['deductionID']."/".$d['staffID'],'Edit',array('width'=>400,'height'=>400)); ?></td></tr>
	<?php
}}else{
	echo "No deductions Found";
}
?>
</table>
<?php	

?>
</div>
</div>
</div>