<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">              
                
                <div style="padding: 10px;">
                    <div class="panel panel-default">
        <div class="panel-heading"><strong>Floats</strong></div>
        <div class="panel panel-body">
            <?php
           if(!empty($msg)&& $msg=='1'){ ?>
            <div class='alert alert-success'>Floats Added</div>
          <?php }
           elseif(!empty($msg)&& $msg=='2'){ ?>
            <div class="alert alert-success">Floats Deleted</div>
          <?php }
           ?>
                    <?php
                    $form=array('name'=>'form1');
                    echo form_open('welcome/floatexp',$form);
                    ?>
            <div class="panel panel-primary">
                <div class="panel panel-heading"><strong>Search</strong></div>
                <div class="panel panel-body">
                   <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">From</span>
            <input type="date" name="from" class="form-control" />
        </div>   
                    <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">To</span>
            <input type="date" name="to" class="form-control" />
        </div>   
                    <div class="input-group" style="margin-bottom: 10px !important">
                        <input type="hidden" name="search" value="11" />
                        <input type="submit" value="Search" class="btn btn-primary" />
        </div>   
                </div>
            </div>
            <?php echo form_close(); ?>
            <div class="row" id="mydiv">
                
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                    <div class="panel panel-heading"><strong>Floats <?php echo $date;?></strong></div>
                    <div class="panel panel-body">
                    <?php
                    if(!empty($floats)){ ?>
					<div>
                    <table class="table table-striped">
                        <tr><td>S/No</td><td>Date</td><td>Ref No</td><td>Name</td><td>Desc</td><td>Dr</td><td>Cr</td><td>Balance</td></tr>
                        <?php
						$balance=0;
						$initialbalance=0;
                        $sno=0;
                        $total=0;
                        foreach($floats as $e){ $sno++;
                        $total+=$e['floatAmt'];
                                ?>
                        <tr><td><?php echo $sno; ?></td><td><?php echo $e['floatExpDate'];?></td><td><?php echo $e['floatRefNo']; ?></td><td><?php echo $e['floatExp'];?></td><td><?php echo $e['floatExpDesc']; ?></td><td><strong><?php if($e['floatExpDr']>0){echo number_format($e['floatExpDr'],2); $balance=$initialbalance-$e['floatExpDr'];
                   $initialbalance=$balance;} ?></strong></td>
						<td><strong><?php if($e['floatExpCr']>0){echo number_format($e['floatExpCr'],2);$balance=$initialbalance+$e['floatExpCr'];
                   $initialbalance=$balance; }?></strong></td>
						<td><strong><?php echo number_format($balance,2);?></strong></td>
						</tr>
                        <?php } ?>
                        
                    </table>
                   </div>
				   
				    
                        
                   <?php }else{
                        echo "No floats found";
                    }
                    ?>
                </div>
                    </div>
                </div>
				
            </div>
                   
                    <p><a class="btn btn-primary" onclick="printDiv('mydiv')">PRINT</a> </p>
                   
                    </div>
                </div>
                </div>
</div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
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

        
