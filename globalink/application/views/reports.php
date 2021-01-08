<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row">

<div class="col-lg-12">
<?php
echo form_open('welcome/reports');?>
<div class="row" style="margin-top:10px !important;">
<div class="col-sm-6">
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">From</span>
<input type="date" name="from" required class="form-control" />
</div></div>
<div class="col-sm-6">
<div class="input-group" style="margin-bottom:10px !important">
<span class="input-group-addon">To</span>
<input type="date" name="to" required class="form-control" />
</div></div></div>
<div class="row">
<div class="col-sm-12"><input type="submit" class="btn btn-success" value="Search" /></div>
</div>
<?php echo form_close();?>
<hr />
<p>Search:<h3><?php echo $search;?></h3></p>
<a class="list-group-item active">Large Format</a>
<?php
if(!empty($largeformat)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Job type</td><td>Total Size</td></tr>
	<?php
	$sno=0;
	foreach($largeformat as $l){
		$sno++;?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $l['name'];?></td>
		<td><?php echo $l['qty'];?></td>
		</tr>
	<?php } ?>
	</table>
<?php }else{ echo "No Job Found";} ?>
<hr />
<a class="list-group-item active">Digital Printing</a>
<div class="row">

<div class="col-lg-6">
<a class="list-group-item active" style="margin-top:10px !important">DI Count</a>
<?php
if(!empty($di)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Job type</td><td>Total Qty</td></tr>
	<?php
	$sno=0;
	foreach($di as $l){
		$sno++;$totQty+=$l['qty'];?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $l['name'];?></td>
		<td><?php echo $l['qty'];?></td>
		</tr>
	<?php } ?>
	<tr><td colspan="2">TOTAL</td><td><?php echo number_format($totQty,2);?></td></tr>
	</table>
<?php }else{ echo "No D.I Job Found";} ?>

</div>
<div class="col-lg-6">
<a class="list-group-item active" style="margin-top:10px !important">All Time DI Count</a>
<?php
if(!empty($dicount)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Job type</td><td>Total Qty</td></tr>
	<?php
	$sno=0;
	$totDIQty=0;
	foreach($dicount as $d){
		$sno++;$totDIQty+=$d['qty'];?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $d['name'];?></td>
		<td><?php echo $d['qty'];?></td>
		</tr>
	<?php } ?>
	<tr><td colspan="2">TOTAL</td><td><?php echo number_format($totDIQty,2);?></td></tr>
	</table>
<?php }else{ echo "No D.I Job Found";} ?>

</div>
</div>

<hr />
<a class="list-group-item active">General Printing</a>
<?php
if(!empty($genprinting)){
	?>
	<table class="table table-striped">
	<tr><td>#</td><td>Job type</td><td>Total Qty</td></tr>
	<?php
	$sno=0;
	$totQty=0;
	foreach($genprinting as $l){
		$sno++;
		$totQty+=$l['qty'];
		
		?>
		<tr>
		<td><?php echo $sno;?></td>
		<td><?php echo $l['name'];?></td>
		<td><?php echo $l['qty'];?></td>
		</tr>
	<?php } ?>
	<tr><td colspan="2">TOTAL</td><td><?php echo number_format($totQty,2);?></td></tr>
	</table>
<?php }else{ echo "No General Printing Job Found";} ?>
</div>
</div>
</div>