<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Add School</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
            <?php echo form_open('welcome/insertSchool'); ?>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">School Name</span>
                <input type="text" required name="name" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Address</span>
                <textarea required class="form-control" rows="4" cols="5" name="address"></textarea>
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Email</span>
                <input type="email" required name="email" class="form-control" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Phone</span>
                <input type="number" required name="phone" class="form-control" />
                       
            </div>
            <div class="input-group">
                <input type="submit" value="Add School" class="btn btn-primary" />
                       
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>