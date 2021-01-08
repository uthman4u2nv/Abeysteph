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
                    <td align="center"><strong>N<?php echo number_format($row['amount'],2); ?></strong></td>
                </tr>
            <?php } ?>
                <tr>
                    <td colspan="2" align="center" style="padding: 5px;"><strong>TOTAL</strong></td>
                    <td align="center"><strong>N<?php echo number_format($total,2);?></strong></td>
                </tr>
            </table><br />
            <table>
                <tr>
                    <td align="right">
	  
            </td>
                    <td colspan="2">
                       
                        <form action="https://{server}/remita/ecomm/init.reg" name="SubmitRemitaForm"
method="POST">
<input name="merchantId" value="<?php echo $merchantId; ?>" type="hidden">
<input name="serviceTypeId" value="<?php echo $serviceTypeId; ?>" type="hidden">
<input name="orderId" value="<?php echo $orderId; ?>" type="hidden">
<input name="hash" value="<?php echo $hash; ?>" type="hidden">
<input name="payerName" value="<?php echo $surname." ".$othernames; ?>" type="hidden">
<input name="payerEmail" value="<?php echo $email; ?>" type="hidden">
<input name="payerPhone" value="<?php echo $phone; ?>" type="hidden">
<input name="amt" value="<?php echo $total; ?>" type="hidden">
<input name="responseurl" value="<?php echo $responseurl; ?>" type="hidden">
<input type ="submit" name="submit_btn" value="Pay Via Remita"></td>
</form>

                </tr>
                <tr><td><?php 
                
                $img=array('width'=>'180','src'=>'images/visamaster.jpg');
                $img2=array('width'=>'180','src'=>'images/remita.jpg');
                echo img($img2); ?></td><td></td></tr>
            </table>
           
            
            
            
        </div>
             
        
                
        
        
    </div>
</div>
