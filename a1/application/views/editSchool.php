<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Edit School</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
            <?php echo form_open('welcome/updateSchool');
            
    foreach($school as $row){} 
    
            
            ?>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">School Name</span>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" /><input value="<?php echo $row['name']; ?>" type="text" required name="name" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Address</span>
                <textarea required class="form-control" rows="4" cols="5" name="address"><?php echo $row['address']; ?></textarea>
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Email</span>
                <input type="email" required name="email" class="form-control" value="<?php echo $row['email']; ?>" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Phone</span>
                <input type="number" required name="phone" class="form-control" value="<?php echo $row['phone']; ?>" />
                       
            </div>
            
            <div class="input-group">
                <input type="submit" value="Update School" class="btn btn-primary" />
                       
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>