<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-sm-8">
    <?php 
    foreach($profile as $row){}
    $form=array('name'=>'form1','id'=>'form1');
    echo form_open('welcome/applyMortgage',$form);
    ?>
            
            <table class="table stripped">
                <?php
                foreach($criteria as $cri){}
                ?>
                <tr><td><strong>Requirements</strong></td><td colspan="3"></td><td><strong>Status</strong></td></tr>
                <tr><td>Min. No of Years</td><td><?php echo $cri['years']; ?> Years</td><td>Years Spent</td><td>
                    <?php
                    $dateRegister=  date_create($row['dateRegister']);
                    $date=date_create(date('Y-m-d'));
                    $diff=date_diff($dateRegister,$date);
                    //echo $diff;
                    $diff2=$diff->format("%R%a");
                    echo round($diff2/365);
                    ?>
                        
                        
                        Years</td><td><?php
                        if($diff2 >=$cri['years']){
                            ?>
                        <div class="alert-success">Met</div>
                       <?php  }else{ ?>
                       
                            <div class="alert-danger"> Not Met</div>
                       <?php  } ?>
                        </td></tr>
                <tr><td>Total Contribution</td><td>N<?php echo number_format($cri['amount'],2); ?></td><td>Your Balance</td><td>
                    N<?php
                    echo number_format($balance,2);
                    ?>
                        
                        
                    </td><td>
                        <?php 
                        if($balance >=$cri['amount']){
                            ?>
                        <div class="alert-success">Met</div>
                       <?php  }else{ ?>
                       
                            <div class="alert-danger"> Not Met</div>
                       <?php  } ?>
                    </td></tr>
                
                
                
            </table>
                   
</div>
        <?php echo form_close(); ?>
    </div>
</div>
