<?php
if(empty($details)){
    echo "<pre><span>No records found</span></pre>";
}else{
    foreach($details as $row){}
?>
<form action="addToCart" name="form1" method="post">
<table cellspacing="0" border="0" cellpadding="10" width="100%">
    <tr><td colspan="4"><strong>Personal Details</strong></td></tr>
    <tr><td>Last Name</td><td><strong><?=$row['lastname']?></strong></td><td> First Name</td><td><strong><?=$row['firstname']?></strong></td></tr>
    <tr><td> Middle Name</td><td><strong><?=$row['middlename']?></strong></td><td>NSE Reg No</td><td><strong><?=$row['nseregno']?></strong></td></tr>
    <tr><td> Phone No</td><td><strong><?=$row['mobilephone']?></strong></td><td>Email</td><td><strong><?=$row['email']?></strong></td></tr>
    
    
</table><hr>
<table width="100%">
    <?php
    $total=$row['prev_out']+$row['annualsub']+$row['abujaneclevy']+$row['buildinglevy']+$row['benevolentfund']+$row['internationallevy']+$row['otherlevy']+$row['welfarepremium']+$row['enrollment']+$row['material']+$row['processingfee']+$row['wecsi']
    ?>
    <?php
    //$form=array('name'=>'form1','id'=>'form1','role'=>'form');
    //echo form_open('welcome/addToCart',$form);
    ?>
    
    <input type="hidden" name="nseregno" id="nseregno" value="<?=$row['nseregno']?>" />
    <tr><td colspan="2"><strong>Financial Details</strong></td></tr>
    <?php if($row['prev_out']>0){?><tr><td><input type="checkbox" checked="checked" name="item[]" value="1" /> Previous Outstanding</td><td><?=number_format($row['prev_out'],2)?></td></tr><?php }?>
    <?php if($row['annualsub']>0){?><tr><td><input type="checkbox" checked="checked" name="item[]" value="2"  /> Annual Subscription</td><td><?=number_format($row['annualsub'],2)?></td></tr><?php }?>
    <?php if($row['abujaneclevy']>0){?><tr><td><input type="checkbox" checked="checked" name="item[]" value="3" /> Abuja NEC Levy</td><td><?=number_format($row['abujaneclevy'],2)?></td></tr><?php }?>
    <?php if($row['buildinglevy']>0){?><tr><td><input type="checkbox" checked="checked" name="item[]" value="9" /> Building Levy</td><td><?=number_format($row['buildinglevy'],2)?></td></tr><?php }?>
    <?php if($row['benevolentfund']>0){?><tr><td><input type="checkbox" checked="checked" name="item[]" value="4" /> Benevolent Fund</td><td><?=number_format($row['benevolentfund'],2)?></td></tr><?php }?>
    <?php if($row['internationallevy']>0){?><tr><td><input type="checkbox" checked="checked" name="item[]" value="5" /> International Levy</td><td><?=number_format($row['internationallevy'],2)?></td></tr><?php }?>
    <?php if($row['otherlevy']>0){?><tr><td><input type="checkbox" name="item[]" checked="checked" value="6" /> Other Levy(Special)</td><td><?=number_format($row['otherlevy'],2)?></td></tr><?php }?>
    <?php if($row['welfarepremium']>0){?><tr><td><input type="checkbox" name="item[]" checked="checked" value="7" /> Welfare Premium</td><td><?=number_format($row['welfarepremium'],2)?></td></tr><?php }?>
    <?php if($row['enrollment']>0){?><tr><td><tr><td colspan="2"><input type="submit" name="submit" value="Add To cart" class="btn btn-default" /></td></tr><input type="checkbox" name="item[]" checked="checked" value="11" /> Enrollment</td><td><?=number_format($row['enrollment'],2)?></td></tr><?php }?>
    <?php if($row['material']>0){?><tr><td><input type="checkbox" name="item[]" checked="checked" value="10" /> Material</td><td><?=number_format($row['material'],2)?></td></tr><?php }?>
    <?php if($row['processingfee']>0){?><tr><td><input type="checkbox" name="item[]" checked="checked" value="12" /> Processing Fee</td><td><?=number_format($row['processingfee'],2)?></td></tr><?php }?>
    <?php if($row['wecsi']>0){?><tr><td><input type="checkbox" name="item[]" checked="checked" value="13" /> WECSI</td><td><?=number_format($row['wecsi'],2)?></td></tr><?php }?>
    <tr><td><strong>TOTAL</strong></td><td><strong><?=number_format($total,2)?></strong></td></tr>
           <?php
   if($total !=0){ ?>
    
    <tr><td colspan="2"><input type="submit" name="submit" value="Add To cart" class="btn btn-default" /></td></tr>
    
   <?php  } else {?>
    <tr><td><input type="checkbox" name="item[]" checked="checked" value="8" disabled="disabled" />Pay Advance</td><td><input type="text" name="advance" size="15" /></td></tr>
    <tr><td colspan="2"><input type="submit" name="submit" value="Add To cart" class="btn btn-default" /></td></tr>
    
</table>
   <?php } } ?>
</form>