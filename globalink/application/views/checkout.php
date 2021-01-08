<div class="jumbotron" style="border:1px solid; ">
    <div class="row">
          
          <div class="col-sm-6" >
              <div style="padding: 10px; border: 1px solid; color: #FFF; background: #00620C; margin-bottom: 10px;"><strong>Check Out</strong></div>
              <table cellspacing="10" style="padding: 5px;"cellpadding="0" width="100%" height="100%">
                  <tr><td><strong>S/No</strong></td><td align="center"><strong>Description</strong></td><td><strong>Amount</strong></td></tr>
                  <tr><td>1</td><td>Bulk Payments of members due</td><td><?php echo number_format($amount,2); ?></td><td><?php echo anchor('welcome/viewCart','View Breakdown');?></td></tr>
                  
                  
              </table>
              
              <?php
              $img=array('src'=>'images/unified.jpg',"width"=>'250');
              $form=array("name"=>"form1","id"=>"form1","role"=>'form');
              echo form_open('welcome/processCheckOut',$form);
              ?>
              <!--<input type="radio" name="ups" disabled="true" checked="checked" /><?php echo img($img); ?>-->
              <br><button type="submit" class="btn btn-primary">Make Payment</button>
              <?php echo form_close();?>
                  
              
              
          </div>
        <div class="col-sm-6" >
            <div style="padding: 10px; border: 1px solid; color: #FFF; background: #00620C; margin-bottom: 10px;"><strong>Payment Instructions</strong></div>
            <p>You can make payments as follows:</p>
            <ol>
                <li>Please kindly confirm the items you are paying for</li>
                <li>Click on the button labelled "Make Payments" on the left</li>
                
            </ol>
        </div>

      </div>
</div>
<style>
tr:nth-child(even) {background: #CCC;}
tr:nth-child(odd) {background: #FFF;}
</style>
