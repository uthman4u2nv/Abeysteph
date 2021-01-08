<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
	<div class="panel panel-primary">
	<?php
	if(!empty($msg)){
		?>
		<div class="alert alert-success"><?php echo $msg; ?></div>
		<?php
	}
	?>
	<div class="panel panel-heading"><strong>Edit Product</strong></div>
	<div class="panel panel-body">
	<?php
	echo form_open('welcome/updateProduct'); 
	foreach($product as $row){}
	?>
	<div class="input-group" style="margin-bottom:10px !important;">
	<span class="input-group-addon">Product Name</span>
	<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
	<input type="text" name="name" value="<?php echo $row['name']; ?>" required class="form-control" />
	</div>
	<div class="input-group" style="margin-bottom:10px !important;">
	<span class="input-group-addon">Product Price</span>
	<input type="number" name="price" value="<?php echo $row['price']; ?>" required class="form-control" />
	</div>
	<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Set/Pieces</span>
<select name="status" required class="form-control">
<option>Select Product Type</option>
<option value="1" <?php if($row['status']==1){echo "selected";}?>>SET</option>
<option value="0" <?php if($row['status']==0){echo "selected";}?>>PIECES</option>
</select>
</div>
	<div class="input-group" style="margin-bottom:10px !important;">
	
	<input type="submit" value="Update Product" class="btn btn-primary" />
	</div>
	<?php echo form_close(); ?>
	</div>
	</div>
	
	