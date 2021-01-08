<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-default">
<div class="panel panel-body">
 <ul class="nav nav-tabs">
   <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">All Job Orders</a></li>
  <!--<li role="presentation" class="actiive"><a href="#new" role="tab" data-toggle="tab">New Job Order</a></li>-->

  
  
</ul>
<div class="tab-content">
<div class="tab-pane" id="new"></div>
                        
						<div class="tab-pane active" id="all">
						<div class="panel panel-success">
						<div class="panel panel-heading"><strong>All Jobs</strong></div>
						<div class="panel panel-body">
						<div class="row" style="margin-bottom:10px !important">
						<?php
						echo form_open('welcome/searchJobOrderFM'); ?>
						<div class="col-md-4"><input type="date" name="from" class="form-control" required /></div>
						<div class="col-md-4"><input type="date" name="to" class="form-control" required /></div>
						<div class="col-md-4"><input type="submit" value="Search" class="btn btn-submit"  /></div>
						<?php echo form_close(); ?>
						</div>
						<?php
						//print_r($jobOrders);
						if(!empty($jobOrders)){
							$sno=0;
							?>
							<table class="table table-striped">
							<tr><td>#</td><td>Customer Name</td><td>Phone</td><td>Order No</td><td>Job Type</td><td>Total Cost</td><td>Advance</td><td>Status</td><td>Job Status</td><td></td></tr>
							<?php
							foreach($jobOrders as $jo){
								$sno++;
								?>
								<tr><td><?php echo $sno; ?></td><td><?php echo $jo['cust_name']; ?></td><td><?php echo $jo['cust_phone']; ?></td><td><?php echo $jo['order_no']; ?></td>
								<td><?php echo $jo['name']; ?></td>
								<td><?php echo number_format($jo['total_amount'],2); ?></td>
								<td><?php echo number_format($jo['advance'],2); ?></td>
								<td><?php if($jo['remarks']=='Ordered'){echo "Paid";}else{echo "Pending Payment";} ?></td>
								<td>
								<?php if($jo['jobStatus']=='1'){echo "<span class='label label-default'>Awaiting Customer Design</span>";}elseif($jo['jobStatus']=='2'){echo "<span class='label label-primary'>Awaiting Design Approval</span>";}elseif($jo['jobStatus']=='3'){echo "<span class='label label-danger'>Machine Not Working</span>";}elseif($jo['jobStatus']=='4'){echo "<span class='label label-warning'>Mobilization</span>";}elseif($jo['jobStatus']=='5'){echo "<span class='label label-success'>In Process with Designer</span>";}elseif($jo['jobStatus']=='7'){echo "<span class='label label-success'>Completed</span>";}elseif($jo['jobStatus']=='6'){echo "<span class='label label-success'>Delivered</span>";}elseif($jo['jobStatus']=='8'){echo "<span class='label label-info'>Awaiting MD's Clearance</span>";}  ?>
								</td>
								<td><?php echo anchor_popup('welcome/changestatus/'.$jo['order_no'],'Change Job Status',array('width'=>400,'height'=>600,'class'=>'btn btn-info'));?></td>
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