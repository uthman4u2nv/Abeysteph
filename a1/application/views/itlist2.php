<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">
            Search
        </div>
        <div class="panel panel-body">
            <?php
            echo form_open('welcome/search');
            ?>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">
                    School
                </span>
                <select name="school" class="form-control" required>
                    <option value="">Select School</option>
                    <?php foreach($schools as $row){ ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    
                        <?php } 
    ?>
                </select>
                        
                
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">From</span>
                <input type="date" required name="from" class="form-control" />
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">To</span>
                <input type="date" required name="to" class="form-control" />
            </div>
            
            <div class="input-group" style="margin-bottom: 10px !important;">
                
                <input type="submit" value="Search" class="btn btn-primary" />
            </div>
        </div>
    </div>
    <hr />
    <div class="panel panel-default">
        <div class="panel panel-heading">Search Result</div>
        <div class="panel panel-body">
            <?php
            if(empty($result)){ ?>
            <pre><span>No result found</span></pre>
            <?php }else{ ?>
            <table class="table table-striped">
                <tr><td>S/No</td><td>Student Name</td><td>School</td><td>Organisation</td></tr>
                <?php
                $sno=0;
                foreach($result as $rw){
                    $sno++; ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $rw['surname']. " ".$rw['othernames']; ?></td><td><?php echo $rw['name']; ?></td><td><?php echo $rw['orgName']; ?></td></tr>
                
                <?php } ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>