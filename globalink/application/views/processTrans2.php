<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">Process Transaction</div>
<div class="panel panel-body">
<?php
if(empty($trans)){
	echo "No Transaction Found";
}else {
foreach($trans as $row){}
?>
<li class="list-group-item">Customer Name: <?php echo $row['cust_name']; ?></li>
<li class="list-group-item">Customer Phone: <?php echo $row['cust_phone']; ?></li>
<li class="list-group-item">Order No: <?php echo $row['order_no']; ?></li>
<li class="list-group-item">Date: <?php echo $row['date']; ?></li>
<li class="list-group-item">Dept: <?php echo returnDeptName($depts,$row['dept']); ?></li>
<li class="list-group-item">Description: <?php echo $row['description']; ?></li>
<li class="list-group-item">Total Cost: <?php echo number_format($row['total_amount'],2); ?></li>
<li class="list-group-item">Total Paid: <?php echo number_format($row['advance'],2); ?></li>
<li class="list-group-item">Balance: <?php echo number_format($row['balance'],2); ?></li>
<?php echo form_open('welcome/processTrans22'); ?>
<?php
if($row['balance']>0){
	?>
	<div class="input-group" style="margin-bottom:10px !important; margin-top:10px !important;">
<span class="input-group-addon">Payment Method</span>
<select name="method" class="form-control" required>
<option value="">Select Payment Method</option>
<?php
foreach($method as $m){
	?>
	<option value="<?php echo $m['methodID']; ?>"><?php echo $m['methodName']; ?></option>
<?php } ?>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important;">
<span class="input-group-addon">Amount Paid<span>
<input type="number" required name="amount" class="form-control" max="<?php echo $row['balance']; ?>" />
</div>
<?php } ?>
<div class="input-group" style="margin-bottom:10px !important;">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']; ?>" />
<?php
if($row['balance']>0){
	?>
<input type="submit" class="btn btn-primary" value="Process Transaction" />
<?php } ?>
</div>
<?php echo form_close(); } ?>
</div>
</div>
</div>

<?php
		function returnDeptName($depts,$id){
			$name="";
			foreach($depts as $row){
				if($row['id']==$id){
					$name=$row['name'];
				}
			}
			return $name;
		}
		?>