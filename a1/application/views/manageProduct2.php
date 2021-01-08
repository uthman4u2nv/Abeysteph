<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading"><strong>Manage Product</strong></div>
<div class="panel panel-body">
<p><?php echo anchor_popup('welcome/addProduct2','Add Product',array('width'=>400,'height'=>600,'class'=>'btn btn-success')); ?></p>
<?php
if(!empty($products)){
	?>
	<div class="table-responsive">
	<table class="table table-condensed table-bordered table-striped">
	<thead><td>S/No</td><td>Product Name</td><td>Action</td></thead>
	<tbody>
	<?php
	$sno=0;
	foreach($products as $row){
		$sno++;
		?>
		<tr><td><?php echo $sno; ?></td><td><?php echo $row['name']; ?></td><td><?php echo anchor_popup('welcome/editProduct2/'.$row['id'],'Edit Product',array('width'=>400,'height'=>600)); ?></td></tr>
	<?php } ?>
	</tbody>
	</table>
	</div>
<?php }else{ echo "No Product found"; } ?> 
</div>
</div>
</div>