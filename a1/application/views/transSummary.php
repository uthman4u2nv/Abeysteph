<?php
if(empty($transSummary)){
    echo "<pre><span>No Transactions</span></pre>";
}
else{
    ?>

<table border='0' cellspacing='0' cellpadding='10' width='100%' style="margin-bottom: 10px;">
    <tr><td><strong>Reg. No</strong></td><td><strong>Amount</strong></td><td></td></tr>
    <?php
    $atts='';
    $sno=0;
    foreach($transSummary as $row){
        $sno++;
    
    ?>
    <tr><td><?php echo $row['nseregno']?></td><td><?php echo number_format($row['amount'],2);?></td><td><?php echo anchor_popup('welcome/viewDetails/'.$row['nseregno'],'View Details',$atts)?></td></tr>
    <?php } ?>
    <tr><td colspan="3"></td></tr>
    <tr>
        <td colspan="3">
           </td>
    </tr>
</table>
     <?php
            $class=array('class'=>'b');
            ?>
            <?php echo anchor('welcome/viewCart', 'View Cart',$class);?> <?php echo anchor('welcome/checkOut', 'Check Out',$class);?> <?php echo anchor('welcome/emptyCart', 'Empty Cart',$class);?>
    
<?php } ?>
<style>
    .b{padding: 5px; border: 1px solid; border-radius: 5px; margin: 5px;}
    
</style>