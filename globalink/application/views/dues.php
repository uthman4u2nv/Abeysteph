<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row" style="border-radius: 0 !important; margin: 10px !important;">
        <div class="col-sm-6" style="padding-left:0px;">
            <?php foreach($dues as $row){} ?>
            <table class="table table-striped">
                <tr><td>S/No</td><td><strong>Item</strong></td><td><strong>Amount</strong></td></tr>
                <tr><td>1</td><td>Previous Outstanding</td><td><?php echo $row['prev_out']; ?></td></tr>
                <tr><td>2</td><td>Annual Subscription</td><td><?php echo $row['annualsub']; ?></td></tr>
                <tr><td></td><td><strong>TOTAL</strong></td><td><strong><?php 
                $total=$row['prev_out']+$row['annualsub'];
                echo number_format($total,2);
                if($total>0){
                
                ?>
                    <?php echo form_open('welcome/paydues'); ?>
                        <input type="hidden" name="amount" value="<?php echo $total; ?>" />
                        <input type="submit" name="submit" value="Pay Dues" />
                <?php echo form_close(); } ?>
                        
                    
                        </strong>   </td></tr>
                
            </table>
            
            
        </div>
    </div>
</div>