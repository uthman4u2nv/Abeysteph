<div class="jumbotron" style="border:1px solid; ">
    <div class="row">
          
          <div class="col-sm-12" >
              <div style="padding: 10px; border: 1px solid; color: #FFF; background: #00620C; margin-bottom: 10px;"><strong>Cart</strong></div>
              <?php
              if(!empty($summary)){
              ?>
              <table width="100%">
                  <tr><td><strong>REG. NO</strong></td><td><strong>NAMES</strong></td><td><strong>ITEM NAME</strong></td><td><strong>AMOUNT</strong></td><td></td></tr>
              <?php
              $totalAmount=0;
              $name='';
              $regNo='';
              $delete=array('onClick'=>'confirm("Are you sure you want to delete")');
              foreach($summary as $row){
                  $names=$row['lastname']." ".$row['middlename']." ".$row['firstname'];
                  $totalAmount+=$row['amount'];
              ?>
                  <tr><td><?php if($row['nseregno'] !=$regNo){ echo $row['nseregno'];} $regNo=$row['nseregno'];?></td><td><?php if($names !=$name){ echo $names;} $name=$names;?>  </td><td><?php echo $row['description']?></td><td><?php echo number_format($row['amount'],2)?></td><td><a href="" onClick= "MM_openBrWindow('deleteItem/<?php echo $row['id']?>','','width=555,height=425,resizable=no,scrollbars=no')">Delete Item</a></tr>
              <?php } ?>
                  <tr><td colspan='3' align='right'></td><td><strong>TOTAL</strong></td><td><strong><?php echo number_format($totalAmount,2);?> </strong></td></tr>
              <?php
              echo form_open('welcome/checkOut');
              ?>
                  <tr><td colspan="5">
              <button type="submit">Check Out</button>
              <?php
              echo form_close();
              ?>
                      </td>
                  </tr>
              </table>
              <?php }else {?>
              <pre><span>Cart Empty</span></pre>
<?php } ?>
              
          </div>
          

      </div>
</div>
<style>
tr:nth-child(even) {background: #CCC;}
tr:nth-child(odd) {background: #FFF;}


</style>
<script type="text/javascript">
    function MM_openBrWindow(theURL,winName,features) { //v2.0
        window.confirm('Are you sure you want to delete');
        window.open(theURL,winName,features);
    }
</script>