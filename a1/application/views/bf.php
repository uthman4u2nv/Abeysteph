<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">Brought Forward</div>
<div class="panel panel-body">
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg; ?></div>
<?php } ?>
<?php
if(empty($bf)){
	echo "No brought Forward Found";
}else{
	$sno=0;
	?>
	<p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT BROUGHT FORWARD</a>
	<div id="mydiv">
	<table class="table table-striped table-bordered">
	<tr><td>#</td><td>Date</td><td>Customer Name</td><td>Phone</td><td>Order No</td><td>Job Type</td><td>Amount</td><td>Advance Paid</td><td>Balance</td><td>Treat BF</td><td></td></tr>
	<?php
	foreach($bf as $row){
		$sno++;
		?>
		<tr>
		<td><?php echo $sno; ?></td>
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['cust_name']; ?></td>
		<td><?php echo $row['cust_phone']; ?></td>
		<td><?php echo $row['order_no']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo number_format($row['total_amount'],2); ?></td>
		<td><?php echo number_format($row['advance'],2); ?></td>
		<td><?php echo number_format($row['balance'],2); ?></td>
		<td><?php echo anchor('welcome/treatBF/'.$row['order_no'],'Treat'); ?></td>
		<?php
		if($_SESSION['adminID']==21){?>
		<td><?php echo anchor('welcome/delBF/'.$row['order_no'],'Delete'); ?></td>
		<?php } ?>
		</tr>
		<?php
	}
	?>
	</table>
	</div>
	<p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT BROUGHT FORWARD</a>
	<?php
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