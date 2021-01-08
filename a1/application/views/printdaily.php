<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <div id="mydiv" style='margin-top:0px !important; font-size:10px !important;'>
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
			  <tr><td>#</td><td>Date</td><td>Name</td><td>Job Type</td><td>Qty</td><td>Order #</td><!--<td>Qty</td>--><td>Total Amount</td><td>Advance</td><td>Balance</td><td>Description</td></tr>
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
				  				  <td><?php echo $row['name']; ?></td>
								   <td><?php echo $row['qty']; ?></td>
				  <td><?php echo $row['order_no']; ?></td>
				 
				  <td><?php echo number_format($row['total_cost'],2); ?></td>
				  <td><?php echo number_format($t=$row['amount_paid'],2); ?></td>
				   <td><?php echo number_format($row['total_cost']-$row['amount_paid'],2); ?></td>
				  <td><?php echo $row['description']; ?></td>
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
			  <tr><td colspan="5"> <p><a class="btn btn-primary" onclick="printDiv('mydiv')">PRINT ALL</a></tr>
			  </table>
			  
			  <?php
		  }
		  ?>
		  </div>
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
	