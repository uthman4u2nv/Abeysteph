<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Payslips</div>
<div class="panel panel-body">


                        <div class="tab-pane active" id="payslip">
<?php
foreach($staff as $row){}
	?>
	<div id="mydiv" style='margin-top:0px !important;'>
	<table class="table table-bordered table-striped">
	<tr><td colspan="4" align="center"><strong>ABEYSTEPH GLOBALINK LIMITED</strong><br/><strong>Murg plaza, Area 10, Garki, Abuja</strong></td></tr>
	<tr><td class="col-sm-2">Name</td><td class="col-sm-4"><?php echo $row['name']; ?></td><td></td></tr>
	<tr><td class="col-sm-2">Bank</td><td class="col-sm-4"><?php echo $row['bankName']; ?></td><td>Account No:</td><td><?php echo $row['accountNo']; ?></td></tr>
	<tr><td colspan="2" align="right"><strong>INCOME</strong></td><td colspan="2" align="left"><strong>DEDUCTIONS</strong></td></tr>
	<?php
	$am=0;
	$am2=0;
	foreach($payslip as $p){
		if($row['staffID']==$p['staffID']){
			?>
			<tr><td><?php echo $p['item']; ?></td><td align="right"><?php if($p['type']==1){ $am+=$p['amount'];echo number_format($p['amount'],2);} ?></td><td><?php if($p['type']==0){ $am2+=$p['amount'];echo number_format($p['amount'],2);} ?></td><td></td></tr>
			<?php
		}
	}
	?>
	<tr><td>TOTAL</td><td align="right"><strong><?php echo number_format($am,2); ?></strong></td><td><strong><?php echo number_format($am2,2); ?></strong></td><td></td></tr>
	<tr><td><strong><h4>TOTAL SALARY</h4></strong></td><td><strong><h4><?php echo number_format($am-$am2,2); ?></h4></strong></td></tr>
	</table>
	<hr />

</div>
<a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT PAYSLIP</a>
</div>


</div><!--Panel body end-->
</div>
</div>
<?php
function returnStaffName($staff,$staffID){
	$name='';
	foreach($staff as $row){
		if($row['staffID']==$staffID){
			$name="<tr><td>Name</td><td>".$row['name']."</td><td>Bank</td><td>".$row['bankName']."</td></tr>";
			$name.="<tr><td>Account Name</td><td>".$row['accountName']."</td><td>Account No</td><td>".$row['accountNo']."</td></tr>";
		}
	}
	return $name;
}
?>
<script>
      function onLoad(){
        window.print();
    }
    function printDiv(divName)
    {
        var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
    </script>