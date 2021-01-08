<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-body">
 <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#new" role="tab" data-toggle="tab">New Job Order</a></li>
  <li role="presentation"><a href="#all" role="tab" data-toggle="tab">All Job Orders</a></li>
  
  
</ul>
<div class="tab-content">
                        <div class="tab-pane active" id="new">
						<div class="panel panel-primary">
						<div class="panel panel-heading">Add New Order</div>
						<div class="panel panel-body">
						<div class="col-md-6">
						<?php
						if(!empty($msg)){
							?>
							<div class="alert alert-success"><?php echo $msg; ?></div>
							<?php
						}
						?>
						<?php echo form_open('welcome/addJobOrder'); ?>
						<?php
						if(empty($_SESSION['order_no'])){
							?>
						<div class="input-group" style="margin-bottom:10px !important">						
						<span class="input-group-addon">Customer Name</span>
						<input type="text" name="custName" class="form-control" required />
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Customer Phone</span>
						<input type="number" name="custPhone" class="form-control" required />
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Job Type</span>
						<select name="jobType" required class="form-control">
						<option value="">Select Job Type</option>
						<?php
						foreach($job as $j){
							?>
							<option value="<?php echo $j['id']; ?>"><?php echo $j['name']; ?></option>
							<?php
						}
						?>
						</select>
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Designer</span>
						<select name="designer"  class="form-control">
						<option value="">Select Designer</option>
						<?php
						foreach($designer as $d){
							?>
							<option value="<?php echo $d['id']; ?>"><?php echo $d['surname']." ".$d['othernames']; ?></option>
							<?php
						}
						?>
						</select>
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Cashier</span>
						<select name="cashier"  class="form-control">
						<option value="">Select Cashier</option>
						<?php
						foreach($cashier as $cx){
							?>
							<option value="<?php echo $cx['id']; ?>"><?php echo $cx['surname']." ".$cx['othernames']; ?></option>
							<?php
						}
						?>
						</select>
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Description</span>
						<textarea name="desc" class="form-control" required></textarea>
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Quantity</span>
						<input type="number" name="qty" class="form-control" required />
						</div>
						<!--<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Total Cost</span>
						<input type="number" name="totalCost" class="form-control" required />
						</div>-->
						<?php }else{?>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Job Type</span>
						<select name="jobType" required class="form-control">
						<option value="">Select Job Type</option>
						<?php
						foreach($job as $j){
							?>
							<option value="<?php echo $j['id']; ?>"><?php echo $j['name']; ?></option>
							<?php
						}
						?>
						</select>
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Description</span>
						<textarea name="desc" class="form-control" required></textarea>
						</div>
						<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Quantity</span>
						<input type="number" name="qty" class="form-control" required />
						</div>
						<!--<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Total Cost</span>
						<input type="number" name="totalCost" class="form-control" required />
						</div>-->
						<?php } ?>
						<!--<div class="input-group" style="margin-bottom:10px !important">
						<span class="input-group-addon">Advance Paid</span>
						<input type="number" name="advance" class="form-control" required />
						</div>-->
						
						<span id="balance" style="display:none;">Customer Phone</span>
						
						<div class="input-group" style="margin-bottom:10px !important">
						
						<input type="submit" class="btn btn-success" value="Add Job Order" />
						</div>
						<?php echo form_close(); ?>
						</div><!--End col-md-6 -->
						<div class="col-md-6">
						<a class="list-group-item active">Job Order Basket</a>
						<?php
						if(!empty($tmpOrders)){
							foreach($tmpOrders as $e){}
							?>
							
							<li class="list-group-item">Customer Name: <?php echo $e['cust_name']; ?> </li>
							<li class="list-group-item">Customer Phone: <?php echo $e['cust_phone']; ?></li>
							<table class="table table-striped">
							<tr><td>#</td><td>Description</td><td>Qty</td><td>Amount</td><td></td></tr>
							<?php
							$sno=0;
							$tot=0;
							foreach($tmpOrders as $t){
								$sno++;
								$tot+=$t['total_amount'];
								?>
								<tr>
								<td><?php echo $sno; ?></td>
								<td><?php echo $t['description']; ?></td>
								<td><?php echo $t['qty']; ?></td>
								<td><?php echo number_format($t['total_amount'],2); ?></td>
								<td><?php echo anchor_popup('welcome/deleteJobOrderItem/'.$t['id'],'Delete',array('width'=>400,'height'=>400)); ?></td>
								</tr>
								<?php
							}
							?>
							<tr><td colspan="3" align="right"><strong>TOTAL</strong></td><td><?php echo number_format($tot,2); ?></td></tr>
							<tr>
							<td colspan="3" align="right"><?php echo form_open('welcome/insertJobOrder'); ?>
							<input type="hidden" name="order_no" value="<?php echo $_SESSION['order_no']; ?>" />
							<input type="submit" value="Process Job Order" class="btn btn-success" />
							<?php echo form_close(); ?>
							</td>
							<td>
							<?php echo form_open('welcome/deleteJobOrder'); ?>
							<input type="hidden" name="order_no" value="<?php echo $_SESSION['order_no']; ?>" />
							<input type="submit" value="Cancel Job" class="btn btn-danger" />
							<?php echo form_close(); ?>
							</td>
							</tr>
							</table>
							
							<?php
						}else{
							echo "No Job Order Added to cart";
						}
						?>
						</div>
						</div>
						</div>
						</div>
						<div class="tab-pane" id="all">
						<div class="panel panel-success">
						<div class="panel panel-heading"><strong>All Jobs</strong></div>
						<div class="panel panel-body">
						<div class="row" style="margin-bottom:10px !important">
						<?php
						echo form_open('welcome/searchJobOrder'); ?>
						<div class="col-md-4"><input type="date" name="from" class="form-control" required /></div>
						<div class="col-md-4"><input type="date" name="to" class="form-control" required /></div>
						<div class="col-md-4"><input type="submit" value="Search" class="btn btn-submit"  /></div>
						<?php echo form_close(); ?>
						</div>
						<?php
						
						if(!empty($jobOrders)){
							$sno=0;
							?>
							<table class="table table-striped">
							<tr><td>#</td><td>Customer Name</td><td>Phone</td><td>Order No</td><td>Job Type</td><td>Total Cost</td><td>Advance</td><td>Status</td></tr>
							<?php
							foreach($jobOrders as $jo){
								$sno++;
								?>
								<tr><td><?php echo $sno; ?></td><td><?php echo $jo['cust_name']; ?></td><td><?php echo $jo['cust_phone']; ?></td><td><?php echo $jo['order_no']; ?></td>
								<td><?php echo $jo['name']; ?></td>
								<td><?php echo number_format($jo['total_amount'],2); ?></td>
								<td><?php echo number_format($jo['advance'],2); ?></td>
								<td><?php if($jo['remarks']=='Ordered'){echo "Paid";}else{echo "Pending Payment";} ?></td>
								
								<?php
							}
							?>
							</table>
							<?php
						}else{
							echo "<pre><span>No Job Found</span></pre>";
							
						}
						?>
						</div>
						</div>
						</div>
						</div>
						</div>
</div>
</div>

<script>
$(document).ready(function(){
	alert('Yes');
})
</script>