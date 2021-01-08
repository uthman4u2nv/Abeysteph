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
<a class="list-group-item active">Stock History</a>
<?php
foreach($staff as $s){}
?>
<li class="list-group-item">Staff Name: <strong><?php echo $s['surname']." ".$s['othernames'];?></strong></li>
<li class="list-group-item">Stock Balance: <strong><?php echo $s['stockbalance'];?></strong></li>
<hr />
<?php
if($stock){
	?>
	<table class="table table-striped">
	<tr><td></td><td>Date</td><td>Order No</td><td>In</td><td>Out</td></tr>
	<?php
	$sno=0;
	foreach($stock as $st){ $sno++;
		?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $st['stockDate'];?></td>
		<td><?php echo $st['orderNo'];?></td>
	<td><?php if($st['In']>0){echo $st['In'];}?></td>
	<td><?php if($st['Out']>0){echo $st['Out'];}?></td>
		</tr>
	<?php } ?>
	</table>
<?php }else{
	echo "No stock history";
}
?>
</div>

</div>