<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Edit School Officer</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>
            <?php }
            foreach($officer as $rw)
            {}            
            ?>
            <?php echo form_open('welcome/updateSchoolOfficer'); ?>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">School Name</span>
                <input type="hidden" value="<?php echo $_SESSION['school']; ?>" name="officerSchool" />
                
                <input type="hidden" name="id" value="<?php echo $rw['officerID']; ?>" />
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Name</span>
                <input type="text" name="officerName" class="form-control" value="<?php echo $rw['officerName']; ?>" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Email</span>
                <input type="email" required name="officerEmail" class="form-control" value="<?php echo $rw['officerEmail']; ?>" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Phone</span>
                <input type="number" required name="officerPhone" class="form-control" value="<?php echo $rw['officerPhone']; ?>" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Officer Username</span>
                <input type="text" required name="officerUsername" class="form-control" value="<?php echo $rw['officerUsername']; ?>" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Status</span>
                <select name="officerStatus" required class="form-control">
                    <option value="1" <?php if($rw['officerStatus']=='1'){echo "selected"; } ?>>Active</option>
                    <option value="0" <?php if($rw['officerStatus']=='0'){echo "selected"; } ?>>Inactive</option>
                </select>
                       
            </div>
            
            <div class="input-group">
                <input type="submit" value="Update School Officer" class="btn btn-primary" />
                       
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>