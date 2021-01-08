<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading"><strong>Add Product</strong></div>
<div class="panel panel-body">
<?php
if(!empty($msg)){
	?>
	<div class="alert alert-success">
	<?php echo $msg; ?>
	</div>
<?php } ?>
<?php
echo form_open('welcome/insertNewProduct'); ?>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Product Name</span>
<input type="text" name="name" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Product Price</span>
<input type="number" name="price" required class="form-control" />
</div>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Set/Pieces</span>
<select name="status" required class="form-control">
<option>Select Product Type</option>
<option value="1">SET</option>
<option value="0">PIECES</option>
</select>
</div>
<div class="input-group" style="margin-bottom:10px !important">

<input type="submit" value="Add Product" class="btn btn-success" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>