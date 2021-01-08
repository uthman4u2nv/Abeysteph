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
	echo form_open('welcome/updateProduct2'); 
	foreach($product as $row){}
	?>
	<div class="input-group" style="margin-bottom:10px !important;">
	<span class="input-group-addon">Product Name</span>
	<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
	<input type="text" name="name" value="<?php echo $row['name']; ?>" required class="form-control" />
	</div>
	
	
	<div class="input-group" style="margin-bottom:10px !important;">
	
	<input type="submit" value="Update Product" class="btn btn-primary" />
	</div>
	<?php echo form_close(); ?>
	</div>
	</div>
	
	