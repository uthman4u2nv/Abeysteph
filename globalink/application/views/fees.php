<?php
if(empty($_SESSION['surname']) || empty($_SESSION['othernames'])){
    echo "session timeout, redirecting to the home page";
    header("refresh: 2; url=application");
    exit();
}
?>
<div class="jumbotron" style="border:1px solid; margin:10px;">
    <div class="row" style="border-radius: 0 !important;">
        <div style=" margin: 5px; padding: 5px; border: 1px solid; background: #0073b7; color: #FFF;">Payment For Conference Registration</div>
        <div align="center">
            <span><strong>Find below your payment details. </strong></span><br /><br />
            <table class="table-bordered" width="60%">
                <tr><td colspan="4" style="padding: 5px;"><strong>Payment Details</strong></td></tr>
                <tr>
                    <td style="padding: 5px;">Surname</td>
                    <td><strong><?php echo $surname; ?></strong></td>
                    <td>Other Names</td>
                    <td><strong><?php echo $othernames; ?></strong></td>
                </tr>
                   <tr>
                    <td style="padding: 5px;">Email</td>
                    <td><strong><?php echo $email; ?></strong></td>
                    <td>Phone</td>
                    <td><strong><?php echo $phone; ?></strong></td>
                </tr>
                
            </table>
            <br />
            <table class="table-bordered" width="60%">
                <tr><td align="center"><strong>S/No</strong></td><td align="center"><strong>Name</strong></td><td align="center"><strong>Amount</strong></td></tr>
            <?php
            $sno=0;
            $total=0;
            foreach($fees as $row){
               $amount= $row['amount'];
               $total+=$row['amount'];
           $sno++;
            ?>
            
                <tr>
                    <td><?php echo $sno; ?></td>
                    <td align="center" style="padding: 5px;"><strong><?php echo $row['name']; ?></strong></td>
                    <td align="left"><strong>N<?php echo number_format($row['amount'],2); ?></strong></td>
                </tr>
            <?php } ?>
                <tr><td></td><td align="center"><strong>TOTAL</strong></td><td align="left"><strong>N<?php echo number_format($total,2);?></strong></td></tr>
            </table><br />
            <table align="center">
                <tr>
                     <td><?php
            echo form_open('welcome/payment',$form);
            ?>
            <input name="price" type="hidden" value="<?php echo $total; ?>"/>
            
            <input type="Submit" value="Make Payment" class="btn btn-default" />
            <?php echo form_close(); ?></td>
                    
                </tr>
                <tr><td><?php 
                     
                $img2=array('width'=>'180','src'=>'images/remita.jpg');
                 ?><?php echo img($img2); ?></td></tr>
            </table>
            
            
            
            
        </div>
             
        
                
        
        
    </div>
</div>
