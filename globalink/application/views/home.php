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
		  <div class="col-sm-3">
		  <select name="operator" class="form-control">
		  <option value="">Operator</option>
		  <?php
		  foreach($operator as $op){
			  ?>
			  <option value="<?php echo $op['id']; ?>"><?php echo $op['surname']." ".$op['othernames']; ?></option>
			  <?php
		  }
		  ?>
		  </select>
		  
		  </div>
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
			  <tr><td>#</td><td>Date</td><td>Name</td><td>Dept</td><td>Job Type</td><td>Order #</td><td>Date/Time Raised</td><td>Total Amount</td><td>Advance</td><td>Balance</td><td>Cashier</td><td></td></tr>
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
				  <td><?php echo $row['name']; ?></td>
				  <td><?php echo $row['order_no']; ?></td>
				  <td><?php echo $row['time']; ?></td>
				  <td><?php echo number_format($row['total_cost'],2); ?></td>
				  <td><?php echo number_format($t=$row['amount_paid'],2); ?></td>
				   <td><?php echo number_format($row['total_cost']-$row['amount_paid'],2); ?></td>
				  <td><?php echo $row['surname']." ".$row['othernames']; ?></td>
				  <td><?php echo anchor_popup('welcome/printTrans/'.$row['order_no'],'Print',array('height'=>400,'width'=>400,'class'=>'btn btn-small btn-primary')); ?></td>
				  </tr>
				  <?php
				  $tt+=$t;
			  }
			  ?>
			  <tr>
			  <td colspan="6" align="right"><strong>TOTAL</strong></td>
			  <td><strong><?php echo number_format($totalAmount,2); ?></strong></td>
			  <td><strong><?php echo number_format($tt,2); ?></strong></td>
			  <!--<td><strong><?php echo number_format($totalBalance,2); ?></strong></td>-->
			  </tr>
			  </table>
			  
			  <?php
		  }
		  ?>
		  <div id="mydiv2" style='margin-top:0px !important;'>
		  <div class="row" style="margin-top:10px !important;">
		  <div class="col-lg-6">
		  <a class="list-group-item active">Cashier Breakdown</a>
		  <table class="table table-bordered">
		  <tr><td>#</td><td><strong>Name</strong></td><td><strong>Dept</strong></td><td><strong>Amount</strong></td></tr>
		   <?php
		   $n=0;
		   $totalAmt=0;
		   $d=0;
		   $dd=0;
		  foreach($cashStaff as $c){
			  $n++;
			  $totalAmt+=$c['amt'];
			  ?>
			  <tr><td><?php echo $n; ?></td><td><?php echo $c['surname']." ".$c['othernames']; ?></td><td><?php echo returnDeptName($dept,$c['dept']); ?></td><td>N<?php echo number_format($d=returnBalance($trans,$c['id']),2); ?></td></tr>
		  <?php $dd+=$d; } ?>
		  <tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong><?php echo number_format($dd,2); ?></strong></td></tr>
		  </table>
		 
			  
		  </div>
		  <div class="col-lg-6">
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
		  <li class="list-group-item"><strong>GRAND TOTAL:N<?php echo number_format($totalBf+$dd,2); ?></strong></li>
		  <!-- Expenses -->
		  <hr /><a class="list-group-item active">Daily Expenses</a>
		  <?php
		  if(!empty($expenses)){
			  ?>
			  <table class="table table-striped table-bordered">
			  <tr><td>#</td><td>Expenses</td><td>Expenses Description</td><td>Expenses Amount</td></tr>
			  <?php
			  $n=0;
			  $nTot=0;
			  foreach($expenses as $e){
				  $n++;
				  $nTot+=$e['expensesAmt'];
				  ?>
				  <tr>
				  <td><?php echo $n; ?></td>
				  <td><?php echo $e['expenses']; ?></td>
				  <td><?php echo $e['expensesDesc']; ?></td>
				  <td><?php echo number_format($e['expensesAmt'],2); ?></td>
				  </tr>
			  <?php } ?>
			  <tr><td colspan="3" align="right"><strong>TOTAL</strong></td><td><strong><?php echo number_format($nTot,2); ?></strong></td></tr>
			  
			  
			  </table>
		  <?php }else{ echo "No expenses";} ?>
		  <!-- End Expenses-->
		  
		  
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
		  </div><hr />
		  <div class="row">
		  <div class="col-lg-4">
		  <a class="list-group-item active">Abeysteph</a>
		  <table class="table table-striped table-bordered">
		  <tr><td>Sales</td><td>POS</td><td>Transfer</td><td>Cheque</td></tr>
		  <tr><td><?php echo number_format($tot,2); ?></td><td><?php echo number_format(returnSalesByMethod($trans,$method=3)); ?></td><td><?php echo number_format(returnSalesByMethod($trans,$method=4)); ?><td><?php echo number_format(returnSalesByMethod($trans,$method=2)); ?></td></tr>
		  
		  </table>
		  
		  </div>
		  <div class="col-lg-4">
		  <a class="list-group-item active">A1</a>
		  <table class="table table-striped table-bordered">
		  <tr><td>Total Sales</td><td>Cash</td><td>POS</td><td>Transfer</td><td>Cheque</td></tr>
		  <tr><td><?php echo number_format($a1=loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=4)+loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=3)+loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=2)+loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=1),2); ?></td><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=1)); ?></td><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=3)); ?></td><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=4)); ?><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=2,$method=2)); ?></td></tr>
		  
		  </table>
		  </div>
		  
		  <div class="col-lg-4">
		  <a class="list-group-item active">AGL</a>
		  <table class="table table-striped table-bordered">
		  <tr><td>Total Sales</td><td>Cash</td><td>POS</td><td>Transfer</td><td>Cheque</td></tr>
		  <tr><td><?php echo number_format($agl=loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=4)+loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=3)+loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=2)+loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=1),2); ?></td><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=1)); ?></td><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=3)); ?></td><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=4)); ?><td><?php echo number_format(loadOtherOfficeSales($loadOtherOfficeSales,$office=3,$method=2)); ?></td></tr>
		  
		  </table>
		  </div>
		  </div>
		  
		  <hr />
		  <a class="list-group-item active">Breakdown</a>
		  <li class="list-group-item">Total Sales: <strong><?php echo number_format($tot+$a1+$agl,2); ?></strong></li>
		  <li class="list-group-item">Total Expenses:<strong><?php echo number_format($nTot,2); ?></strong></li>
		  <li class="list-group-item"><li>
		  </div>
		  
		  </div>
			  <p><a class="btn btn-primary" onclick="printDiv('mydiv')">PRINT ALL</a>&nbsp;|&nbsp;<a class="btn btn-primary" onclick="printDiv('mydiv2')">PRINT BREAKDOWN</a>
		  </div>
		  </div>
          
          
        </div>
		<?php
		function returnSalesByMethod($sales,$method){
			$tot=0;
			foreach($sales as $s){
				if($s['paymethod']==$method){
					$tot+=$s['amount_paid'];
				}
			}
			return $tot;
		}
		function loadOtherOfficeSales($loadOtherOfficeSales,$office,$method){
			$tot=0;
			foreach($loadOtherOfficeSales as $l){
				if(($l['salesStore']==$office )&& ($l['salesMethod']==$method) ){
					$tot+=$l['salesAmount'];
				}
			}
			return $tot;
		}
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
		function b($trans,$id){
			
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
	
      