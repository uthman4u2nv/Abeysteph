<?php
            if(empty($transaction)){
                echo "<pre><span>No Transaction Recorded</span></pre>";
            }
            else{
                ?>
            <table cellspacing="0" cellpadding="5" border="1" width="100%">
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