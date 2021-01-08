<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Add School Officer</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
            <?php echo form_open('welcome/insertSchoolOfficer'); ?>
            
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Name</span>
                <input type="text" name="officerName" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Email</span>
                <input type="email" required name="officerEmail" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Phone</span>
                <input type="number" required name="officerPhone" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Username</span>
                <input type="text" required name="officerUsername" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Password</span>
                <input readonly type="text" required name="officerPassword" value='<?php echo rand(1000000,10000000); ?>' class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Role</span>
                <select name='officerRole' required class="form-control">
                    
                    
                    
                    <option value="2">Supervisor</option>
                    
                </select>     
                <input type="hidden" name="officerSchool" value="<?php echo $_SESSION['school']; ?>" />
            </div>
            <div class="input-group">
                <input type="submit" value="Add School Officer" class="btn btn-primary" />
                       
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>