<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Payslips</div>
<div class="panel panel-body">

<?php	
echo form_open('welcome/generatePayroll2'); ?>
<table class="table table-striped">
<tr>
<td>Month</td>
<td><select name="month" class="form-control" required><option value="">Select Month</option>
<?php 
for($i=1; $i<=12; $i++){
	?>
	<option value="<?php echo $i; ?>" <?php if($i==date('m')){echo "selected";} ?>><?php echo $i; ?></option>
<?php } ?></td></tr>
<tr>
<td>Year</td>
<td><select name="year" class="form-control" required><option value="">Select Year</option>
<?php 
for($y=2016; $y<=date('Y'); $y++){
	?>
	<option value="<?php echo $y; ?>" <?php if($y==date('Y')){echo "selected";} ?>><?php echo $y; ?></option>
<?php } ?></td></tr>
<tr><td colspan="2"><input type="submit" value="Generate Payroll" class="btn btn-success" /></td></tr>
</table>
<?php echo form_close(); ?>
<hr />
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#payslip" role="tab" data-toggle="tab">Payslips</a></li>
  <li role="presentation"><a href="#schedule" role="tab" data-toggle="tab">Salary Schedule</a></li>
  
  
</ul>
<div class="tab-content">
                        <div class="tab-pane active" id="payslip">
<?php
foreach($staff as $row){
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
<?php
	}
?>
</div>
<a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT PAYSLIP</a>
</div>
<div class="tab-pane" id="schedule">
<!-- Schedule -->
	<div id="mydiv2" style='margin-top:0px !important;'>
	<table class="table table-bordered table-striped">
		<tr><td colspan="6" align="center"><strong>ABEYSTEPH GLOBALINK LIMITED</strong><br/><strong>Murg plaza, Area 10, Garki, Abuja</strong></td></tr>
		<tr><td colspan="6" align="center"><strong>SALARY SCHEDULE </strong><br/><strong><?php echo $from."-".$to; ?></strong></td></tr>
	<tr><td>#</td><td>Staff Name</td><td>Bank</td><td>Account Name</td><td>Account No</td><td>Amount</td></tr>
	<?php
	$no=0;
foreach($staff as $row){
	$no++;
	?>
	<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['bankName']; ?></td>
	<td><?php echo $row['accountName']; ?></td>
	<td><?php echo $row['accountNo']; ?></td>
	<td>
	<?php
	$am=0;
	$am2=0;
	$totAmt=0;
	foreach($payslip as $p){
		if($row['staffID']==$p['staffID']){
			?>
			<?php if($p['type']==1){ $am+=$p['amount'];} ?><?php if($p['type']==0){ $am2+=$p['amount'];} ?>
			<?php
			$totAmt+=$am-$am2;	
		}
	
	}
	
	?>
	<?php echo number_format($am-$am2,2);  ?></td>
	</tr>
	
<?php

	}
?>
<!--<tr><td colspan="5" align="right"><strong>TOTAL</strong></td><td><strong><?php echo number_format($totAmt,2); ?></strong></td></tr>-->
</table>
</div>
<a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv2')">PRINT SCHEDULE</a>

</div>
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