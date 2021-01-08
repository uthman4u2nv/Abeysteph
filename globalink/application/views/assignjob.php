<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php
if($msg){
	?>
	<div class="alert alert-success">
	<?php echo $msg; ?>
	</div>
<?php } ?>
<a class="list-group-item active">Assign Job</a>
<?php echo form_open('welcome/insertassignjob');
//print_r($jobdetails);
foreach($jobdetails as $j){}
?>
<li class="list-group-item">Job Name: <strong><?php echo $j['cust_name'];?></strong></li>
<li class="list-group-item">Job Description: <strong><?php echo $j['description'];?></strong></li>
<li class="list-group-item">Size: <strong><?php echo $j['s1']." X ".$j['s2'];?></strong></li>
<li class="list-group-item">Qty: <strong><?php echo $j['qty'];?></strong></li>
<div class="input-group" style="margin-bottom: 10px !important">
<span class="input-group-addon">Assign to</span>
<select name="assignedTo" required class="form-control">
<option value="">Select Operator</option>
<?php
foreach($largeformatstaff as $l){
	?>
	<option value="<?php echo $l['id'];?>"><?php echo $l['surname']." ".$l['othernames'];?></option>
<?php } ?>
</select>
</div>
<div class="input-group" style="margin-bottom: 10px !important">

<input type="hidden"  name="id" value="<?php echo $id;?>" class="form-control" />
<input type="hidden"  name="size" value="<?php echo $j['s1']*$j['s2'];?>" class="form-control" />
<input type="hidden"  name="order_no" value="<?php echo $j['order_no'];?>" class="form-control" />
<input type="submit" class="btn btn-success" value="Assign Job" />
</div>

<?php echo form_close();?>
</div>