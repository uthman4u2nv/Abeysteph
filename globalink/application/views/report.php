<div class="jumbotron" style="border:1px solid; ">
    <div class="row">
        <div class="col-sm-12" >
            <?php
            if(empty($transaction)){
                echo "<pre><span>No Transaction Recorded</span></pre>";
            }
            else{
                ?>
            
            <table align="center" width="60%" style="margin:20px;">
                <?php
                $form=array('class'=>'form1');
                echo form_open('welcome/searchReport',$form);
                ?>
                <tr><td>From</td><td><input type="text" name="from" id="form" /></td></tr>
                <tr><td>To</td><td><input type="text" name="to" id="form" /></td></tr>
                <tr><td colspan="2"><input type="submit" value="Search" /></td></tr>
                
            </table>
            <table cellspacing="0" cellpadding="5" border="1" width="100%" style="padding: 10px;">
                <tr><td>S/No</td><td>NSE Reg No</td><td>Date</td><td>Transaction No</td><td>Amount</td><td>Status</td></tr>
                <?php
                $sno=0;
                foreach($transaction as $row ){
                    $amount=$row['amount_paid'];
                    $sno++;
                    ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['nseregno']?></td><td><?php echo $row['date_pay']?></td><td><?php echo $row['trans_no']?></td><td align="right"><?php echo number_format($amount,2); ?></td><td><?php echo $row['pay_status']?></td></tr>
               <?php } ?>
            </table>
            <?php }
            ?>
            
            
        </div>
    </div>
</div>
<style>
    .form{margin: 20px;}
    td{padding: 10px !important;}
</style>