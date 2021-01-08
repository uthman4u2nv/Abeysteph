<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-sm-8">
            <table class="table table-responsive" width="100%">
                <tr><td>S/No</td><td>Application Date</td><td>Status</td></tr>
    <?php 
    $sno=0;
    foreach($application as $row){
        
    $sno++;
    ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['dateApplied'];?></td><td>
                    <?php
                    if($row['status']==0){
                        echo "Pending";
                    }
                    elseif($row['status']==1){
                        echo "Approved";
                    }
                    ?>
                        
                    </td></tr>
    <?php } ?>
    </table>
                   
</div>
       
    </div>
</div>
