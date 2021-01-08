<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
	<?php
	if(!empty($msg)){
		?>
		<div class="alert alert-success"><?php echo $msg; ?></div>
		<?php
	}
	?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel-heading">Change Job Status</div>
<div class="panel panel-body">
<?php 
foreach($joborder as $row){}
?>
<?php echo form_open('welcome/updatejobstatus');?>
<li class="list-group-item"><strong>Order No: <?php echo $row['order_no'];?></strong></li>
<li class="list-group-item"><strong>Job Name: <?php echo $row['cust_name'];?></strong></li>
<li class="list-group-item"><strong>Customer Phone: <?php echo $row['cust_phone'];?></strong></li>
<li class="list-group-item"><strong>Description: <?php echo $row['description'];?></strong></li>
<li class="list-group-item"><strong>Date: <?php echo $row['date']. " ".$row['time'];?></strong></li>
<li class="list-group-item"><strong>Total Amount: <?php echo number_format($row['total_amount'],2);?></strong></li>
<li class="list-group-item"><strong>Advance: <?php echo  number_format($row['advance'],2);?></strong></li>
<li class="list-group-item"><strong>Balance: <?php echo number_format($row['balance'],2);?></strong></li>
<li class="list-group-item"><select class="form-control" required name="status">
<option>Select Status</option>
<?php
foreach($status as $s){?>
<option value="<?php echo $s['jobStatusID'];?>" <?php if($row['jobStatus']==$s['jobStatusID']){echo "selected";}?>><?php echo $s['statusName'];?></option>
<?php } ?>

</select></li>
<li class="list-group-item"><input type="hidden" name="order_no" value="<?php echo $row['order_no'];?>" /><input type="submit" value="Update Status" class="btn btn-success" /></li>
<?php echo form_close();?>
</div>
</div>
</div>