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
</div>