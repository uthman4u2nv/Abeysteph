<script type="text/javascript" src="<?=base_url('js/jquery-1.11.js')?>" ></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-sm-8">
    <?php 
    $form=array('name'=>'form1','id'=>'form1');
    echo form_open('welcome/applyMortgage',$form);
    ?>
            <table class="table stripped" width='100%'>
                <tr><td>Surname</td><td><?php echo $_SESSION['surname']; ?></td></tr>
                <tr><td>Other Names</td><td><?php echo $_SESSION['othernames']; ?></td></tr>
                <tr><td>Coop Number</td><td><?php echo $row['coopNo']; ?></td></tr>
                <tr><td>Category</td><td><?php echo $row['category']; ?></td></tr>
                <tr><td>Date Registered</td><td><?php echo $row['dateRegister']; ?></td></tr>
                
            </table>
            <table class="table stripped">
                <tr><td colspan="6">Requirements</td></tr>
                <tr><td colspan="3">Min. No of Years with EHC</td><td colspan='3'>Amount Contributed</td></tr>
            </table>
                   
</div>
        
    
        <?php echo form_close(); ?>
    </div>
</div>
