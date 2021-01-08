<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">              
                
                <div style="padding: 10px;">
                    <div class="panel panel-default">
        <div class="panel-heading"><strong>Search Expenses Breakdown</strong></div>
        <div class="panel panel-body">
          
                    <?php
                    $form=array('name'=>'form1');
                    echo form_open('welcome/expensesbrk',$form);
                    ?>
            <div class="panel panel-primary">
                <div class="panel panel-heading"><strong>Search</strong></div>
                <div class="panel panel-body">
                   <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Job Order No</span>
            <input type="text" name="orderNo" class="form-control" />
        </div>   
                   
                    <div class="input-group" style="margin-bottom: 10px !important">
                        <input type="hidden" name="search" value="11" />
                        <input type="submit" value="Search" class="btn btn-primary" />
        </div>   
                </div>
            </div>
            <?php echo form_close(); ?>
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                    <div class="panel panel-heading"><strong>Expenses Breakdown</strong></div>
                    <div class="panel panel-body">
                    <?php
                    if(!empty($jobs)){ ?>
					<div id="mydiv">
                    <table class="table table-striped">
                        <tr><td>S/No</td><td>Job Order No</td><td>Expenses Name</td><td>Expenses Desc</td><td>Amount</td></tr>
                        <?php
                        $sno=0;
                        $total=0;
                        foreach($jobs as $e){ $sno++;
                        $total+=$e['expensesAmt'];
                                ?>
                        <tr>
						<td><?php echo $sno; ?></td>
						<td><?php echo $e['jobNo']; ?></td>
						<td><?php echo $e['expenses']; ?></td>
						<td><?php echo $e['expensesDesc']; ?></td>
						<td><strong><?php echo number_format($e['expensesAmt'],2); ?></strong></td></tr>
                        <?php } ?>
                        <tr><td colspan="4" align="right">TOTAL</td><td><strong><?php echo number_format($total,2); ?></strong></td></tr>
                    </table>
                   </div>
				   <p><a class="btn btn-primary" onclick="printDiv('mydiv')">PRINT</a> </p>
                        
                   <?php }else{
                        echo "No expenses found";
                    }
                    ?>
                </div>
                    </div>
                </div>
            </div>
                   
                    
                   
                    </div>
                </div>
                </div>
</div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
		<script>
		function printDiv(divName)
    {
        var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
	</script>

