<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h4>Home</h4>
		  <div id="mydiv" style='margin-top:0px !important; font-size:10px !important;'>
		   <div class="row" style="margin:10px !important;">
		   <div class="col-md-9">
		   <a class="list-group-item active" style="margin-bottom:5px !important;">Search Transactions</a>
		  <?php echo form_open('welcome/searchTransSuper'); ?>
		  <div class="col-sm-3">
		  <div class="input-group" style="margin-bottom:10px !important">
		  <span class="input-group-addon">From</span>
		  <input type="date" required class="form-control" name="from" />
		  </div>
		   <div class="input-group" style="margin-bottom:10px !important">
		  <span class="input-group-addon">To</span>
		  <input type="date" required class="form-control" name="to" />
		  </div>

		  </div>
		  <div class="col-sm-3">
		  <select name="cashier" class="form-control">
		  <option value="">Cashier</option>
		  <?php
		  foreach($cashStaff as $cs){
			  ?>
			  <option value="<?php echo $cs['id']; ?>"><?php echo $cs['surname']." ".$cs['othernames']; ?></option>
			  <?php
		  }
		  ?>
		  </select>
		  
		  </div>
		  <div class="col-sm-3">
		  <select name="dept" class="form-control">
		  <option value="">Dept</option>
		  <?php
		  foreach($dept as $d){
			  ?>
			  <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
			  <?php
		  }
		  ?>
		  </select>
		  </div>
		  <div class="row">
		  <div class="col-sm-3" style="margin-top:40px !important;"><input type="submit" value="Search Transaction" class="btn btn-primary" /></div>
		  <?php echo form_close(); ?>
		  </div>
		  </div>
		  <div class="col-md-3">
		  <a class="list-group-item active">Search By Job Order</a>
		  <?php echo form_open('welcome/searchJOrder'); ?>
		  <div class="input-group" style="margin-bottom:5px">
		  <span class="input-group-addon">Job Order #</span>
		  <input type="text" required name="order_no" class="form-control" />
		  </div>
		  <div class="input-group" style="margin-bottom:5px">
		   <input type="submit" value="Search" class="btn btn-danger" />
		  </div>
		  <?php echo form_close(); ?>
		  </div>
		  </div>
          <div class="panel panel-primary">
		  <div class="panel panel-heading">All Transactions(<?php echo date('Y-m-d'); ?>)</div>
		  <div class="panel panel-body">
		 
		  <?php
		  if(empty($trans)){
			  echo "No Transaction Found";
		  }
		  else{
			  ?>
			  
			  <table class="table table-bordered">
			  <tr><td>#</td><td>Date</td><td>Name</td><td>Dept</td><!--<td>Job Type</td>--><td>Order #</td><!--<td>Qty</td>--><td>Total Amount</td><td>Advance</td><td>Balance</td><td>Cashier</td></tr>
			  <?php
			  $sno=0;
			  $totalAmount=0;
			  $totalAdvance=0;
			  $totalBalance=0;
			  $tot=0;
			  $t=0;
			  $tt=0;
			  foreach($trans as $row){
				  $sno++;
				  $totalAmount+=$row['total_cost'];
				  $totalBalance+=$row['balance'];
				  $totalAdvance+=$row['amount_paid'];
				  $tot+=$row['amount_paid'];
				  ?>
				  <tr>
				  <td><?php echo $sno; ?></td>
				  <td><?php echo $row['date']; ?></td>
				  <td><?php echo $row['cust_name']; ?></td>
				  <td><?php echo returnDeptName($dept,$row['dept']); ?></td>
				  <!--<td><?php echo $row['name']; ?></td>-->
				  <td><?php echo $row['order_no']; ?></td>
				  <!--<td><?php echo $row['qty']; ?></td>-->
				  <td><?php echo number_format($row['total_cost'],2); ?></td>
				  <td><?php echo number_format($t=$row['amount_paid'],2); ?></td>
				   <td><?php echo number_format($row['total_cost']-$row['amount_paid'],2); ?></td>
				  <td><?php echo $row['surname']." ".$row['othernames']; ?></td>
				  </tr>
				  <?php
				  $tt+=$t;
			  }
			  ?>
			  <tr>
			  <td colspan="5" align="right"><strong>TOTAL</strong></td>
			  <td><strong><?php echo number_format($totalAmount,2); ?></strong></td>
			  <td><strong><?php echo number_format($tt,2); ?></strong></td>
			  <td><strong><?php echo number_format(returnTotalC($trans)-returnTotalReceived($trans),2); ?></strong></td>
			  </tr>
			  <tr><td colspan="5"><?php echo anchor('welcome/printdaily','Print Daily',array('width'=>400,'height'=>600,'class'=>'btn btn-success')); ?></td></tr>
			  </table>
			  
			  <?php
		  }
		  ?>
		  <!--Balance of Payment-->
		  <br /><a class="list-group-item active">Balance Paid Up Today(Date:<?php echo date('Y-m-d'); ?>)</a>
		  <?php
		  if(empty($trans24)){
			  echo "No Balance Paid Today";
		  }
		  else{
			  ?>
			  
		  <table class="table table-bordered">
			  <tr><td>#</td><td>Date</td><td>Name</td><td>Dept</td><!--<td>Job Type</td>--><td>Order #</td><!--<td>Qty</td>--><td>Total Amount</td><td>Advance</td><td>Balance</td><td>Cashier</td></tr>
			  <?php
			  $sno=0;
			  $totalAmount=0;
			  $totalAdvance=0;
			  $totalBalance=0;
			  $tot=0;
			  $t=0;
			  $tt=0;
			  foreach($trans24 as $row){
				  $sno++;
				  $totalAmount+=$row['total_cost'];
				  $totalBalance+=$row['balance'];
				  $totalAdvance+=$row['amount_paid'];
				  $tot+=$row['amount_paid'];
				  ?>
				  <tr>
				  <td><?php echo $sno; ?></td>
				  <td><?php echo $row['date']; ?></td>
				  <td><?php echo $row['cust_name']; ?></td>
				  <td><?php echo returnDeptName($dept,$row['dept']); ?></td>
				  <!--<td><?php echo $row['name']; ?></td>-->
				  <td><?php echo $row['order_no']; ?></td>
				  <!--<td><?php echo $row['qty']; ?></td>-->
				  <td><?php echo number_format($row['total_cost'],2); ?></td>
				  <td><?php echo number_format($t=$row['amount_paid'],2); ?></td>
				   <td><?php echo number_format($row['total_cost']-$row['amount_paid'],2); ?></td>
				  <td><?php echo $row['surname']." ".$row['othernames']; ?></td>
				  </tr>
				  <?php
				  $tt+=$t;
			  }
			  ?>
			  <tr>
			  <td colspan="5" align="right"><strong>TOTAL</strong></td>
			  <td><strong><?php echo number_format($totalAmount,2); ?></strong></td>
			  <td><strong><?php echo number_format($tt,2); ?></strong></td>
			  <td><strong><?php echo number_format(returnTotalC($trans)-returnTotalReceived($trans),2); ?></strong></td>
			  </tr>
			  </table>
		  <?Php } ?>
		  <!--End Payment Balance-->
		  <div id="mydiv2" style='margin-top:0px !important;'>
		  <div class="row" style="margin-top:10px !important;">
		   <div class="col-lg-4">
		   <?php $k=0;
		   foreach($kordSet as $kk){
			   $k+=$kk['qty'];
		   } echo $k; ?>
		  <a class="list-group-item active">Plates Analysis: <?php echo date('Y-m-d'); ?></a>
		  <table class="table table-bordered">
		  <tr><td>#</td><td>Job Type</td><td>Quantity</td><td>Plates Used</td><<!--td>Price</td><td>Amount</td>--></tr>
		  <?php
		  $sno=0;
		  $t=0;
		  foreach($jobType as $b){
			$sno++;
?>			
<tr><td><?php echo $sno; ?></td><td><?php echo $b['name']; ?></td><td><?php echo countJobType($break,$b['id']); ?></td><td><?php if(($b['id']==3) || ($b['id']==2)|| ($b['id']==8)|| ($b['id']==11)|| ($b['id']==4)|| ($b['id']==13)){ echo $t=countJobType($break,$b['id'])*4; }else{ echo $t=countJobType($break,$b['id'])*1;} ?></td><!--<td><?php echo number_format($b['price'],2);?></td><td><?php echo number_format($a=$b['price']*$t,2);?></td>--></tr>
	<?php $tit+=$t;	$aa+=$a;  }
?>		  <tr><td colspan="3"><strong>TOTAL</strong></td><td><?php echo $tit; ?></td><!--<td></td><td>N<?php echo number_format($aa,2); ?></td>--></tr>
</table>
 
  <table class="table table-bordered">
  <tr><td>
  <a class="list-group-item active">Plates All Time Analysis:</a><br />
 
		  <table class="table table-bordered">
		  <tr><td>#</td><td>Job Type</td><td>Quantity</td><td>Plates Used</td><td>Price</td><td>Amount</td></tr>
		  <?php
		  $sno=0;
		  $t=0;
		  $a=0;
		  foreach($jobType as $b){
			$sno++;
?>			
<!--<tr><td><?php echo $sno; ?></td><td><?php echo $b['name']; ?></td><td><?php echo $e=countJobType($break22,$b['id']); ?></td><td><?php if(($b['id']==3)  || ($b['id']==2)|| ($b['id']==8)|| ($b['id']==11)|| ($b['id']==4)|| ($b['id']==13)){ echo $tx=countJobType($break22,$b['id'])*4; }else{ echo $tx=countJobType($break22,$b['id'])*1;} ?></td><td><?php echo number_format($b['price'],2);?></td><td><?php echo number_format($a=$b['price']*$e,2);?></td></tr>-->
	<tr><td><?php echo $sno; ?></td><td><?php echo $b['name']; ?></td><td><?php echo $e=countJobType($break22,$b['id']); ?></td><td><?php if(($b['status']==1)){ echo $tx=countJobType($break22,$b['id'])*4; }else{ echo $tx=countJobType($break22,$b['id'])*1;} ?></td><td><?php echo number_format($b['price'],2);?></td><td><?php echo number_format($a=$b['price']*$e,2);?></td></tr>
	<?php $titx+=$tx; $aa+=$a;	  }
?>		  <tr><td colspan="3"><strong>TOTAL</strong></td><td><?php echo $titx-73;//minus 73 due to reconcillation ?></td><td></td><td>N<?php echo number_format($aa,2); ?></td></tr>
</table></td><td class="col-lg-10">

<a class="list-group-item active">Plates Issuance All Time Analysis:</a><br />
<?php
if(!empty($issuance)){
	?>
	<table class="table table-striped" width="100%">
	<tr><th>#</th><th>Name</th><th>Qty</th></tr>
	<?php
	$n=0;
	foreach($issuance as $is){
		$n++;?>
		<tr><td><?php echo $n;?></td><td><?php echo $is['name'];?></td><td><?php echo $is['qty'];?></td></tr>
	<?php } ?>
	</table>
<?php }else{ echo "No Issuance records";}?>
</td></tr>
</table>

		  </div>
		  <div class="col-lg-4">
		  <a class="list-group-item active">Cashier Breakdown</a>
		  <table class="table table-bordered">
		  <tr><td>#</td><td><strong>Name</strong></td><td><strong>Dept</strong></td><td><strong>Total Cost</strong></td><td><strong>Amount Received</strong></td><td><strong>Balance</strong></td></tr>
		   <?php
		   $n=0;
		   $totalAmt=0;
		   $d=0;
		   $dd=0;
		   $cc=0;
		   $xx=0;
		  foreach($cashStaff as $c){
			  $n++;
			  $totalAmt+=$c['amt'];
			  ?>
			  <tr><td><?php echo $n; ?></td><td><?php echo $c['surname']." ".$c['othernames']; ?></td><td><?php echo returnDeptName($dept,$c['dept']); ?></td><td>N<?php echo number_format($ccc=returnTotalCost($trans,$c['id']),2); ?></td><td>N<?php echo number_format($d=returnBalance($trans,$c['id']),2); ?></td><td>N<?php echo number_format($d=returnBalance333($trans,$c['id']),2); ?></td></tr>
		  <?php $dd+=$d; 
		  $cc+=$ccc;
		  $xx+=$x;
		  } ?>
		  <tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>N<?php echo number_format(returnTotalC($trans),2); ?></strong></td><td><strong>N<?php echo number_format(returnTotalReceived($trans),2); ?></strong></td><td><strong><?php echo number_format(returnTotalC($trans)-returnTotalReceived($trans),2); ?></strong></td></tr>
		  </table>
		 
			  
		  </div>
		  <div class="col-lg-4">
		  <a class="list-group-item active">BF Breakdown</a>
		  <table class="table table-bordered">
		  <tr><td>#</td><td><strong>Name</strong></td><td><strong>Dept</strong></td><td><strong>Amount</strong></td></tr>
		   <?php
		   $n=0;
		   $totalBf=0;
		  foreach($bf as $b){
			  $n++;
			  $totalBf+=$b['amt'];
			  ?>
			  <tr><td><?php echo $n; ?></td><td><?php echo $b['surname']." ".$b['othernames']; ?></td><td><?php echo returnDeptName($dept,$b['dept']); ?></td><td>N<?php echo number_format($b['amt'],2); ?></td></tr>
		  <?php } ?>
		  <tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong><?php echo number_format($totalBf,2); ?></strong></td></tr>
		  </table>
		  <li class="list-group-item"><strong>GRAND TOTAL:N<?php echo number_format($totalBf+returnTotalReceived($trans),2); ?></strong></li>
		  </div>
		  </div>
		  <div class="row">
		  <a class="list-group-item active">BF Entries</a>
		  <?php
		  if(!empty($bfManagerEntry))
		  {
			  ?>
			  <table class="table table-bordered">
			  <tr><td>#</td><td>Cust Name</td><td>BF Manager</td><td>Dept</td><td>Amount</td></tr>
			  <?php
			  $sn=0;
			  foreach($bfManagerEntry as $bf){
				  $sn++;
				  ?>
				  <tr><td><?php echo $sn; ?></td><td><?php echo $bf['cust_name']; ?></td><td><?php echo $bf['surname']." ".$bf['othernames']; ?></td><td><?php echo  $bf['name'] ; ?></td><td><?php echo number_format($bf['amount_paid'],2); ?></td></tr>
				  <?php
			  }
			  ?>
			  </table>
			  <?php
			  
		  }else{
			  echo "No Brought Forward Treated";
		  }
		  ?>
		  </div>
		  </div>
		  
		  </div>
			  <p><a class="btn btn-primary" onclick="printDiv('mydiv')">PRINT ALL</a>&nbsp;|&nbsp;<a class="btn btn-primary" onclick="printDiv('mydiv2')">PRINT BREAKDOWN</a>
		  </div>
		  </div>
          
          
        </div>
		<?php
		function returnDeptName($depts,$id){
			$name="";
			foreach($depts as $row){
				if($row['id']==$id){
					$name=$row['name'];
				}
			}
			return $name;
		}
		function returnBalance($trans,$id){
			$bal=0;
			foreach($trans as $row){
				if($row['entered_by']==$id){
					$bal+=$row['amount_paid'];
				}
			}
			return $bal;
			
		}
		function returnBalance333($trans,$id){
			$bal=0;
			foreach($trans as $row){
				if($row['entered_by']==$id){
					$bal+=$row['balance'];
				}
			}
			return $bal;
			
		}
		function returnTotalReceived($trans){
			$bal=0;
			foreach($trans as $row){
				//if($row['entered_by']==$id){
					$bal+=$row['advance'];
				//}
			}
			return $bal;
			
		}
		function returnTotalC($trans){
			$bal=0;
			foreach($trans as $row){
				//if($row['entered_by']==$id){
					$bal+=$row['total_amount'];
				//}
			}
			return $bal;
			
		}
		function returnTotalCost($trans,$id){
			$bal=0;
			foreach($trans as $row){
				if($row['entered_by']==$id){
					$bal+=$row['total_amount'];
				}
			}
			return $bal;
			
		}
		function b($trans,$id){
			
		}
		function countJobType($break,$id){
			$qty=0;
			foreach($break as $b){
				if($b['job_type']==$id){
					$qty+=$b['qty'];
				}
			}
			return $qty;
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
	
      