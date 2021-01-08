<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Auditor</div>
<div class="panel panel-body">

<li class="list-group-item"><strong>Search Result:<?php echo $from."-".$to; ?></strong></li>
<li class="list-group-item"><strong>Dept:<?php echo $deptName; ?></strong></li>
<?php echo form_open('welcome/searchJobs'); ?>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">From</span>
<input type="date" name="from" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">To</span>
<input type="date" name="to" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Dept</span>
<select name="dept" required class="form-control">
<option value="">Dept</option>
<?php
foreach($dept as $d){
	?>
	<option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
<?php } ?>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important">

<input type="submit" value="Search" class="btn btn-success" />
</div>
<?php echo form_close(); ?>
<hr />
<?php
if(!empty($result)){
	?>
	<div id="mydiv" style='margin-top:0px !important;'>
	<table class="table table-striped table-bordered">
	<tr><td>#</td><td>Customer Name</td><td>Order No</td><td>Job Type</td><td>Qty</td><td>Difference</td><td>Date</td><td>Amount</td><td>Advance Paid</td><td>Balance</td><td>Status</td><td></td></tr>
	<?php
	$sno=0;
	foreach($result as $row){
		$sno++;
		?>
		<tr>
		<td><?php echo $sno; ?></td>
		<td><?php echo $row['cust_name']; ?></td>
		<td><?php echo $row['order_no']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['qty']; ?></td>
		<td><?php echo $row['difference']; ?></td>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo number_format($row['total_amount'],2); ?></td>
		<td><?php echo number_format($row['advance'],2); ?></td>
		<td><?php echo number_format($row['balance'],2); ?></td>
		<td><?php if($row['auditorRemark']==1){echo "Checked&Certified";}else{echo "Not Checked or Certified";} ?></td>
		<td><?php echo anchor_popup('welcome/auditorEdit/'.$row['order_no'],'Enter Remark',array('width'=>400,'height'=>400)); ?>
		</tr>
		<?php
	}
	?>
	</table>
	</div>
	<p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT </a></p>
	<?php
}
else{
	echo "No Result Found";
}
?>
</div>
</div>
</div>
<script>
      function onLoad(){
        window.print();
    }
    function printDiv(divName)
    {
        var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
    </script>
