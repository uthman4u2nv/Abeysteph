<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">Process Transaction</div>
<div class="panel panel-body">
<?php
foreach($trans as $row){}
?>
<li class="list-group-item">Customer Name: <?php echo $row['cust_name']; ?></li>
<li class="list-group-item">Customer Phone: <?php echo $row['cust_phone']; ?></li>
<li class="list-group-item">Order No: <?php echo $row['order_no']; ?></li>
<li class="list-group-item">Date: <?php echo $row['date']; ?></li>
<li class="list-group-item">Description: <?php echo $row['description']; ?></li>
<li class="list-group-item">Total Cost: <?php echo number_format($row['total_amount'],2); ?></li>
<?php echo form_open('welcome/processTrans2'); ?>
<div class="input-group" style="margin-bottom:10px !important;">
<span class="input-group-addon">Amount Paid<span>
<input type="number" required name="amount" class="form-control" max="<?php echo $row['total_amount']; ?>" />
</div>
<div class="input-group" style="margin-bottom:10px !important;">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']; ?>" />
<input type="submit" class="btn btn-primary" value="Process Transaction" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>