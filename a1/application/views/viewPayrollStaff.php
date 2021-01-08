<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">View Payroll Staff</div>
<div class="panel panel-body">
<?php foreach($staff as $row){} //print_r($staff) ?>
<table class="table table-bordered table-striped">
<tr><td>Name</td><td><strong><?php echo $row['name']; ?></strong></td></tr>
<tr><td>Date of Birth</td><td><strong><?php echo $row['dob']; ?></strong></td></tr>
<tr><td>Phone</td><td><strong><?php echo $row['phone']; ?></strong></td></tr>
<tr><td>Email</td><td><strong><?php echo $row['email']; ?></strong></td></tr>
<tr><td>Sex</td><td><strong><?php echo $row['sex']; ?></strong></td></tr>
<tr><td>Address</td><td><strong><?php echo $row['address']; ?></strong></td></tr>
<tr><td>Bank Name</td><td><strong><?php echo $row['bankName']; ?></strong></td></tr>
<tr><td>Salary</td><td><strong><?php echo number_format($row['salary'],2); ?></strong></td></tr>
<tr><td>Account Name</td><td><strong><?php echo $row['accountName']; ?></strong></td></tr>
<tr><td>Account No</td><td><strong><?php echo $row['accountNo']; ?></strong></td></tr>
</table>
</div>
</div>
</div>