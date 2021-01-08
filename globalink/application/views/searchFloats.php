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
                    echo form_open('welcome/searchFloats',$form);
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
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                    <div class="panel panel-heading"><strong>Floats From: <?php echo $from; ?> To: <?php echo $to; ?></strong></div>
                    <div class="panel panel-body">
                    <?php
                    if(!empty($floats)){ ?>
					<div id="mydiv">
                    <table class="table table-striped">
                        <tr><td>S/No</td><td>Job Order No</td><td>Float</td><td>N</td></tr>
                        <?php
                        $sno=0;
                        $total=0;
                        foreach($floats as $e){ $sno++;
                        $total+=$e['floatAmt'];
                                ?>
                        <tr><td><?php echo $sno; ?></td><td><?php echo $e['floatNo']; ?></td><td><?php echo $e['floatName']; ?></td><td><strong><?php echo number_format($e['floatAmt'],2); ?></strong></td></tr>
                        <?php } ?>
                        <tr><td colspan="3" align="right">TOTAL</td><td><strong><?php echo number_format($total,2); ?></strong></td></tr>
                    </table>
                   </div>
				   <p><input type="button" class="btn btn-primary" onclick="printDiv('#mydiv')" value="PRINT"> </p>
                        
                   <?php }else{
                        echo "No floats found";
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
      
      ?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

