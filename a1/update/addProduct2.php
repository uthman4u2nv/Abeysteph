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
echo form_open('welcome/insertNewProduct2'); ?>
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">Product Name</span>
<input type="text" name="name" required class="form-control" />
</div>


<div class="input-group" style="margin-bottom:10px !important">

<input type="submit" value="Add Product" class="btn btn-success" />
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>