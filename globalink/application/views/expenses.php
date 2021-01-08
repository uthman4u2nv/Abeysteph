<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">              
                
                <div style="padding: 10px;">
                    <div class="panel panel-default">
        <div class="panel-heading"><strong>Expenses</strong></div>
        <div class="panel panel-body">
            <?php
           if(!empty($msg)&& $msg=='1'){ ?>
            <div class='alert alert-success'>Expenses Added</div>
          <?php }
           elseif(!empty($msg)&& $msg=='2'){ ?>
            <div class="alert alert-success">Expenses Deleted</div>
          <?php }
           ?>
                    <?php
                    $form=array('name'=>'form1');
                    echo form_open('welcome/searchExpenses',$form);
                    ?>
            <div class="panel panel-default">
                <div class="panel panel-heading">Search</div>
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                    <div class="panel panel-heading">Add Expenses</div>
                    <div class="panel panel-body">
                    <?php
                    echo form_open('welcome/addExpenses');
                    ?>
					<div class="input-group" style="margin-bottom: 10px !important;">
                        <span class="input-group-addon">Date</span>
                        <input type="date" required class="form-control" name="date" />
                              
                    </div>
					 <div class="input-group" style="margin-bottom: 10px !important;">
                        <span class="input-group-addon">Job Order No</span>
                        <input type="text" required class="form-control" name="jobNo" />
                              
                    </div>
                    <div class="input-group" style="margin-bottom: 10px !important;">
                        <span class="input-group-addon">Issued To</span>
                        <input type="text" required class="form-control" name="expensesName" />
                              
                    </div>
                    <div class="input-group" style="margin-bottom: 10px !important;">
                        <span class="input-group-addon">Expenses Description</span>
                        <textarea class="form-control" rows="5" name='expensesDesc'></textarea>
                              
                    </div>
                    <div class="input-group" style="margin-bottom: 10px !important;">
                        <span class="input-group-addon">Expenses Amount</span>
                        <input type="number" required class="form-control" name="expensesAmt" />
                              
                    </div>
                    <div class="input-group" style="margin-bottom: 10px !important;">
                        
                        <input type="submit" required class="btn btn-primary" value="Add Expenses" />
                              
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                    <div class="panel panel-heading">Daily Expenses</div>
                    <div class="panel panel-body">
                    <?php
                    if(!empty($expenses)){ ?>
                    <table class="table table-striped">
                        <tr><td>S/No</td><td>Job No</td><td>Expenses</td><td>N</td><td></td></tr>
                        <?php
                        $sno=0;
                        $total=0;
                        foreach($expenses as $e){ $sno++;
                        $total+=$e['expensesAmt'];
                                ?>
                        <tr><td><?php echo $sno; ?></td><td><?php echo $e['jobNo']; ?></td><td><?php echo $e['expenses']; ?></td><td><?php echo number_format($e['expensesAmt'],2); ?></td><td><?php echo anchor('welcome/deleteExp/'.$e['expensesID'],'<i class="glyphicon glyphicon-trash"><i>'); ?></td></tr>
                        <?php } ?>
                        <tr><td colspan="3" align="right">TOTAL</td><td><?php echo number_format($total,2); ?></td></tr>
                    </table>
                   
                        
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
<script  type="text/javascript">
 /*var frmvalidator = new Validator("form1");
  frmvalidator.addValidation("from","req","Select Date From");
  frmvalidator.addValidation("to","req","Select Date To");*/
  </script>

  <script>
      $(document).ready(function(){
         $("#from").datepick({dateFormat: 'yyyy-mm-dd'}); 
         $("#to").datepick({dateFormat: 'yyyy-mm-dd'}); 
      });
      </script>
      <?php
      function returnProductName($products,$code){
          $name='';
          foreach($products as $row){
              if($row['code']==$code){
                  $name=$row['name'];
              }
          }
          return $name;
      }
      function returnProductPrice($products,$code){
          $price='';
          foreach($products as $row){
              if($row['code']==$code){
                  $price=$row['price'];
              }
          }
          return $price;
      }
      
      ?>