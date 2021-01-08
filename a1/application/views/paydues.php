<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row" style="border-radius: 0 !important; margin: 10px !important;">
        <div class="col-sm-10" style="padding-left:0px;">
           
            <table class="table table-striped">
                <tr><td></td><td><strong>Payment Details</strong></td><td><strong>Amount</strong></td></tr>
                   <tr><td></td><td><strong>Annual Dues Payment</strong></td><td><strong><?php 
                echo number_format($amount,2); 
                
                ?>
                    
                        
                    
                        </strong>   </td>
                
                </tr>
                <tr><td></td><td><strong>Transaction Charge</strong></td><td><strong>300.00</strong></td></tr>
                <tr><td></td><td><strong>Total Amount</strong></td><td><strong>N<?php 
                echo number_format($amount+300,2); 
                
                ?>
                    
                        
                    
                        </strong>   </td>
                
                </tr>
                <tr><td></td><td></td><td>
                <?php 
                $form=array("target"=>"_new");
                echo form_open('welcome/payonquickteller'); ?>
                        <input type="hidden" name="amount" value="<?php echo $amount+300; ?>" />
                        <input type="submit" name="submit" value="Pay On QuickTeller" />
                <?php echo form_close();  ?>
                    </td>
                </tr>
            </table>
             <strong><h3>Payment Instructions</h3></strong>
            <hr />
            <ol>
                <li><p>You can now make payments using your Interswitch Enabled ATM cards on the Quickteller platform</p></li>
                <li><p>After Successful payment your financial records will be automatically updated </p></li>
                <li><p>For further enquiries about how to make online payments or resolve payment issues, pls call: Yemi 08012345678</p></li>
                <li><p>Click on the button "Pay on QuickTeller" to proceed  </p></li>
                
            </ol>
            
        </div>
    </div>
</div>