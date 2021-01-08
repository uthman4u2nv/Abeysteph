<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
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
                  <tr><td><?php if($row['nseregno'] !=$regNo){ echo $row['nseregno'];} $regNo=$row['nseregno'];?></td><td><?php if($names !=$name){ echo $names;} $name=$names;?>  </td><td><?php echo $row['description']?></td><td><?php echo number_format($row['amount'],2)?></td><td><?php echo anchor('welcome/deleteItem/'.$row['id'],'Delete Item',$delete)?></tr>
              <?php } ?>
                  <tr><td colspan='3' align='right'></td><td><strong>TOTAL</strong></td><td><strong><?php echo number_format($totalAmount,2);?> </strong></td></tr>
              </table>
              <?php }else {?>
              <pre><span>Cart Empty</span></pre>
<?php } ?>
          </div>
          

      </div>
</div>

