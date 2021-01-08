<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">All Jobs</div>
<div class="panel panel-body">
<?php
header('refresh: 60; url='.base_url().'index.php/welcome/cashier');
?>
<div class="row">
<div class="col-md-6"><?php
echo form_open('welcome/searchTransCashier');
?>
<a href="#" class="list-group-item active">Search Transaction(Job Order No)</a>
<div class="input-group" style="margin-bottom:10px !important; margin-top:10px !important">
<span class="input-group-addon">Job Order No</span>
<input type="text" name="order_no" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important;">

<input type="submit" value="Search"  class="btn btn-default btn-flat" />
</div>
<?php echo form_close(); ?></div>
<div class="col-md-6">
<?php
echo form_open('welcome/searchTransByDate');
?>
<a href="#" class="list-group-item active">Search Transaction(By Date)</a>
<div class="col-sm-6">
<div class="input-group" style="margin-bottom:5px !important; margin-top:10px !important">
<span class="input-group-addon">From</span>
<input type="date" name="from" required class="form-control" />
</div>
</div>
<div class="col-sm-6">
<div class="input-group" style="margin-bottom:5px !important; margin-top:10px !important">
<span class="input-group-addon">To</span>
<input type="date" name="to" required class="form-control" />
</div>
</div>

<div class="input-group" style="margin-bottom:10px !important;">
<input type="submit" value="Search"  class="btn btn-default btn-flat" />
</div>


<?php echo form_close(); ?>

</div>
</div>

<hr />
<li class="list-group-item"><strong>Date: <?php echo date('Y-m-d'); ?></strong></li>
<?php
if(!$jobs){
	echo "No Job found";
}
else{
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Customer Name</td><td>Phone</td><td>Order No</td><td>Date</td><td>Total Cost</td><td>Advance</td><td>Balance</td><td></td></tr>
	<?php
	$sno=0;
	$totalSales=0;
	$totalBalance=0;
	$cashAtHand=0;
	foreach($jobs as $row){
		$totalSales+=$row['total_amount'];
		$sno++;
		?>
		<tr>
		<td><?php echo $sno; ?></td>
		<td><?php echo $row['cust_name']; ?></td>
		<td><?php echo $row['cust_phone']; ?></td>
		<td><?php echo $row['order_no']; ?></td>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo number_format($row['total_amount'],2); ?></td>
		<td><?php echo number_format($row['advance'],2); ?></td>
		<td><?php echo number_format($row['balance'],2); ?></td>
		<td><?php if($row['advance']==0){echo anchor_popup('welcome/processTrans/'.$row['order_no'],'Process Transaction',array('height'=>400,'width'=>400,'class'=>'btn btn-default btn-flat'));}else{echo "";} ?></td>
		
		</tr>
		<?php
		if($row['advance']){
			$cashAtHand+=$row['advance'];
			$totalBalance+=$row['balance'];
			
		}
	}
	?>
	</table>
	<hr />
	<a href="#" class="list-group-item active"><strong>Breakdown</strong></a>
	<li class="list-group-item">Total Sales: <strong><?php echo number_format($totalSales,2); ?></strong></li>
	<li class="list-group-item">Total Outstanding Balance: <strong><?php echo number_format($totalBalance,2); ?></strong> </li>
	<li class="list-group-item">Cash at Hand: <strong> <?php echo number_format($cashAtHand,2); ?></strong></li>
	<?php
}
?>
</div>
</div>
</div>