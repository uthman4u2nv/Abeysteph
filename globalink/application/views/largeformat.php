<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php //print_r($jobs);?>
<a class="list-group-item active">Large Format jobs</a>
<?php
if(!empty($jobs)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Order No</td><td>Date</td><td>Name</td><td>Description</td><td>Qty</td><td>Size</td>
	<td>Assigned To</td><td>Assign</td>
	</tr>
	<?php
	$sno=0;
	foreach($jobs as $j){ $sno++;
		?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $j['order_no'];?></td>
		<td><?php echo $j['date'];?></td>
		<td><?php echo $j['cust_name'];?></td>
		<td><?php echo $j['description'];?></td>
		<td><?php echo $j['qty'];?></td>
		<td><?php echo $j['s1']." X ".$j['s2'];?></td>
		<td><?php echo $name=getjobassignedto($stockhistory,$j['id'],$j['order_no']);?></td>
		<td><?php echo anchor_popup('welcome/assignjob/'.$j['id']."/".$j['order_no'],'Assign/Reassign Job',array('width'=>600,'height'=>600));?><?php //} ?></td>
		</tr>
	<?php } ?>
	</table>
<?php }else{echo "No jobs found";}?>
</div>

<?php
function getjobassignedto($stockhistory,$jobID,$orderNo){
	$name="";
	$orderNo="";
	$jobID="";
	foreach($stockhistory as $s){
		if($s['orderNo']==$orderNo && $s['jobID']=$jobID){
			$name=$s['surname']." ".$s['othernames']." OrderNo".$orderNo." ".$jobID;
			
		}
	}
	return $name;
}