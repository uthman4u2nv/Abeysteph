<?php
if(empty($_SESSION['surname']) || empty($_SESSION['othernames'])){
    echo "session timeout, redirecting to the home page";
    header("refresh: 2; url=application");
    exit();
}
?>
<div class="jumbotron" style="border:1px solid; margin:10px;">
    <div class="row" style="border-radius: 0 !important;">
        <div style=" margin: 5px; padding: 5px; border: 1px solid; background: #005702; color: #FFF;">Payment For Fellowship By Direct Application</div>
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
            <?php
            
            foreach($fees as $row){
               $amount= $row['amount'];
            }
            ?>
            <table class="table-bordered" width="60%">
                <tr>
                    <td>1.</td>
                    <td align="center" style="padding: 5px;"><strong><?php echo $row['name']; ?></strong></td>
                    <td align="center"><strong>N<?php echo number_format($row['amount'],2); ?></strong></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td align="center" style="padding: 5px;"><strong>TRANSACTION COST</strong></td>
                    <td align="center"><strong><?php 
                    $msc=$amount*0.0125;
                    echo number_format($msc,2);
                    $total=$amount+$msc;
                    ?></strong></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="padding: 5px;"><strong>TOTAL</strong></td>
                    <td align="center"><strong><?php echo number_format($total,2);?></strong></td>
                </tr>
            </table><br />
            <table>
                <tr>
                    <td align="right"><?php
                   // $form=array('target'=>'_new');
           // echo form_open('welcome/payVisa',$form);
            ?>
            <form method="POST" action="http://162.144.67.26/ups.php">
<input name="price" type="hidden" value="<?php echo $total; ?>"/>
<input name="transRefNo" type="hidden" value="<?php echo $_SESSION['trnxId']; ?>" />
<input name="description" type="hidden" value="Fellowship By Application" />
<input type="Submit" value="Pay With Visa" />
</form>
            </td>
                    <td colspan="2">
                </tr>
                <tr><td><?php 
                
                $img=array('width'=>'180','src'=>'images/visamaster.jpg');
                $img2=array('width'=>'180','src'=>'images/quickteller.jpg');
                echo img($img); ?></td><td></td></tr>
            </table>
           
            
            
            
        </div>
             
        
                
        
        
    </div>
</div>
