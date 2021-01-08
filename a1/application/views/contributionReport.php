<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-sm-10">
            <table class="table stripped" width='100%'>
                <tr><td colspan="6"><strong><h3>Contribution Report</h3></strong></td></tr>
                <th>S/No</th>
                <th>Date</th>
                <th>Year</th>
                <th>Trans Name</th>
                <th>Payment Mode</th>
                <th>Amount</th>
                <?php 
                $sno=0;
                foreach($contribution as $row){
                    $sno++;
                    ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['transDate']; ?></td><td><?php echo $row['transYear']; ?></td><td><?php echo $row['transName']; ?></td><td><?php echo $row['paymentMode']; ?></td><td><?php echo number_format($row['transAmount'],2); ?></td></tr>
                <?php } ?>
            </table>
</div>
        
    </div>
</div>
