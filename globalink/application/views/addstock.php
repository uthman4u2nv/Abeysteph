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
<a class="list-group-item active">Add Stock</a>
<?php echo form_open('welcome/insertstaffstock');
foreach($staff as $s){}
?>
<li class="list-group-item">Staff Name: <strong><?php echo $s['surname']." ".$s['othernames'];?></strong></li>
<li class="list-group-item">Stock Balance: <strong><?php echo $s['stockbalance'];?></strong></li>
<div class="input-group" style="margin-bottom: 10px !important">
<span class="input-group-addon">Qty to Add</span>
<input type="number" step="any" required name="qty" class="form-control" />
</div>
<div class="input-group" style="margin-bottom: 10px !important">

<input type="hidden"  name="id" value="<?php echo $s['id'];?>" class="form-control" />
<input type="submit" class="btn btn-success" value="Add Stock" />
</div>

<?php echo form_close();?>
</div>