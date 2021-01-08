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
<div class="panel panel-primary">
<div class="panel panel-heading">Job Details</div>
<div class="panel panel-body">
<?php echo form_open('welcome/auditorUpdate'); ?>
<?php
foreach($job as $row){}
?>
<li class="list-group-item">Customer Name:<?php echo $row['cust_name']; ?></li>
<li class="list-group-item">Job Order #:<?php echo $row['order_no']; ?></li>
<li class="list-group-item">Job Type:<?php echo $row['name']; ?></li>
<li class="list-group-item">Amount:<?php echo number_format($row['total_amount'],2); ?></li>
<li class="list-group-item">Advance:<?php echo number_format($row['advance'],2); ?></li>
<li class="list-group-item">Balance:<?php echo number_format($row['balance'],2); ?></li>
<li class="list-group-item">Qty:<?php echo number_format($row['qty'],2); ?></li>
<li class="list-group-item">Difference:<?php echo number_format($row['difference'],2); ?></li>
<li class="list-group-item">Status:<?php if ($row['auditorRemark']==1){ echo "Checked and Certfied";}else{ echo "Not Checked and Certified";}; ?></li>
<hr />
<div class="input-group" style="margin-bottom:10px !important;">
<span class="input-group-addon">Difference</span>
<input type="number" required name="difference" class="form-control" value="<?php echo $row['difference'];?>" />
</div>
<div class="input-group" style="margin-bottom:10px !important;">
<span class="input-group-addon">Remark</span>
<input type="hidden" name="order_no" value="<?php echo $row['order_no']; ?>" />
<select name="remark" class="form-control" required>
<option value="1" <?php if($row['auditorRemark']==1){echo "selected";} ?>>Checked and Certified</option>
<option value="0" <?php if($row['auditorRemark']==0){echo "selected";} ?>>Not Checked and Not Certified</option>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important;">

<input type="submit" class="btn btn-success" value="Update Job" />
</div>
<?php echo form_close(); ?>





<?php echo form_close(); ?>
</div>
</div>
</div>