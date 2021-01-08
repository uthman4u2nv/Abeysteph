<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h4>Search Result</h4>
		   <div class="row" style="margin:10px !important;">
		   
		  <?php echo form_open('welcome/searchTransBF'); ?>
		  <div class="col-sm-4">
		  <div class="input-group" style="margin-bottom:10px !important">
		  <span class="input-group-addon">From</span>
		  <input type="date" class="form-control" name="from" />
		  </div>
		   <div class="input-group" style="margin-bottom:10px !important">
		  <span class="input-group-addon">To</span>
		  <input type="date" class="form-control" name="to" />
		  </div>

		  </div>
		  
		  <div class="col-sm-4">
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
		  <div class="col-sm-4" style="margin-top:40px !important;"><input type="submit" value="Search Transaction" class="btn btn-primary" /></div>
		  <?php echo form_close(); ?>
		  </div>
          <div class="panel panel-primary">
		  <div class="panel panel-heading">Search Result</div>
		  <div class="panel panel-body">
		  <?php
		  if(!empty($date)){
			  ?>
			  <li class="list-group-item"><?php echo $date; ?></li>
			  <?php
		  }
		  ?>
		   <?php
		  if(!empty($cashierName)){
			  ?>
			  <li class="list-group-item"><?php echo $cashierName; ?></li>
			  <?php
		  }
		  ?>
		   <?php
		  if(!empty($deptName)){
			  ?>
			  <li class="list-group-item"><strong><h4><?php echo $deptName; ?></h4></strong></li>
			  <?php
		  }
		  ?>
		 
		  <?php
		  if(empty($trans)){
			  echo "No Transaction Found";
		  }
		  else{
			  ?>
			  <div id="mydiv" style='margin-top:0px !important;'>
			  <table class="table table-striped">
			  <tr><td>#</td><td>Date</td><td>Name</td><td>Phone No</td><td>Dept</td><td>Job Type</td><td>Order #</td><td>Raised By</td><td>Date/Time Raised</td><td>Total Amount</td><td>Advance</td><td>Balance</td><!--<td>Cashier</td>--></tr>
			  <?php
			  $sno=0;
			  $totalAmount=0;
			  $totalAdvance=0;
			  $totalBalance=0;
			  foreach($trans as $row){
				  $sno++;
				  $totalAmount+=$row['total_amount'];
				  $totalBalance+=$row['balance'];
				  $totalAdvance+=$row['advance'];
				  ?>
				  <tr>
				  <td><?php echo $sno; ?></td>
				  <td><?php echo $row['date']; ?></td>
				  <td><?php echo $row['cust_name']; ?></td>
				  <td><?php echo $row['cust_phone']; ?></td>
				  <td><?php echo returnDeptName($dept,$row['dept']); ?></td>
				  <td><?php echo $row['name']; ?></td>
				  <td><?php echo $row['order_no']; ?></td>
				  <td><?php echo $row['surname']." ".$row['othernames']; ?></td>
				  <td><?php echo $row['time']; ?></td>
				  <td><?php echo number_format($row['total_amount'],2); ?></td>
				  <td><?php echo number_format($row['advance'],2); ?></td>
				  <td><?php echo number_format($row['balance'],2); ?></td>
				  <!--<td><?php echo $row['surname']." ".$row['othernames']; ?></td>-->
				   <td><?php echo anchor('welcome/clearbf/'.$row['order_no'],'Clear BF'); ?></td>
				  </tr>
				  <?php
			  }
			  ?>
			  <tr>
			  <td colspan="9" align="right"><strong>TOTAL</strong></td>
			  <td><strong><?php echo number_format($totalAmount,2); ?></strong></td>
			  <td><strong><?php echo number_format($totalAdvance,2); ?></strong></td>
			  <td><strong><?php echo number_format($totalBalance,2); ?></strong></td>
			  </tr>
			  </table>
			  <?php
		  }
		  ?>
		  </div>
		  <p><a href="Javascript:" class="btn btn-primary" onclick="printDiv('mydiv')">PRINT</a>
		  <!--<div class="row" style="margin-top:10px !important;">
		  <div class="col-lg-6">
		  <a class="list-group-item active">Cashier Breakdown</a>
		  <table class="table table-striped table-bordered">
		  <tr><td>#</td><td><strong>Name</strong></td><td><strong>Amount</strong></td></tr>
		   <?php
		   $n=0;
		   $totalAmt=0;
		  foreach($cashier as $c){
			  $n++;
			  $totalAmt+=$c['amt'];
			  ?>
			  <tr><td><?php echo $n; ?></td><td><?php echo $c['surname']." ".$c['othernames']; ?></td><td>N<?php echo number_format($c['amt'],2); ?></td></tr>
		  <?php } ?>
		  <tr><td></td><td><strong>TOTAL</strong></td><td><strong><?php echo number_format($totalAmt,2); ?></strong></td></tr>
		  </table>
		 
			  
		  </div>
		  <div class="col-lg-6">
		  <a class="list-group-item active">BF Breakdown</a>
		  <table class="table table-striped table-bordered">
		  <tr><td>#</td><td><strong>Name</strong></td><td><strong>Amount</strong></td></tr>
		   <?php
		   $n=0;
		   $totalBf=0;
		  foreach($bf as $b){
			  $n++;
			  $totalBf+=$b['amt'];
			  ?>
			  <tr><td><?php echo $n; ?></td><td><?php echo $b['surname']." ".$b['othernames']; ?></td><td>N<?php echo number_format($b['amt'],2); ?></td></tr>
		  <?php } ?>
		  <tr><td></td><td><strong>TOTAL</strong></td><td><strong><?php echo number_format($totalBf,2); ?></strong></td></tr>
		  </table>
		  </div>
		  </div>-->
		  
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
      