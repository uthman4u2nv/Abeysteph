<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-heading">Printing Status</div>
<div class="panel panel-body">
<?php if(!empty($msg)){
	?>
	<div class="alert alert-success"><?php echo $msg; ?></div>
<?php } ?>
<?php

foreach($print as $row){}
?>
<li class="list-group-item">Customer Name: <?php echo $row['cust_name']; ?></li>
<li class="list-group-item">Customer Phone: <?php echo $row['cust_phone']; ?></li>
<li class="list-group-item">Order No: <?php echo $row['order_no']; ?></li>
<li class="list-group-item">Date: <?php echo $row['date']; ?></li>
<li class="list-group-item">Description: <?php echo $row['description']; ?></li>

<?php echo form_open('welcome/updatePrint'); ?>
<div class="input-group" style="margin-bottom:10px !important;">
<span class="input-group-addon">Machine Operator<span>
<select name="machine" required class="form-control">
<option value="">Select Machine Operator</option>
<?php
foreach($machine as $m){
	?>
	<option value="<?php echo $m['id']; ?>" <?php if($row['machine']==$m['id']){echo "selected";} ?>><?php echo $m['surname']." ".$m['othernames']; ?></option>
<?php } ?>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important;">
<span class="input-group-addon">Printing Status<span>
<select name="status" required class="form-control">
<!--<option value="">Status</option>
<option value="0" <?php if($row['print_status']=="0"){echo "selected";} ?>>Not Printed</option>
<option value="1 <?php if($row['print_status']=="1"){echo "selected";} ?>">Printing</option>-->
<option value="2" <?php if($row['print_status']=="2"){echo "selected";} ?>>Printed</option>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important;">
<input type="hidden" name="order_no" value="<?php echo $row['order_no']; ?>" />
<input type="submit" class="btn btn-primary" value="Update Print" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>