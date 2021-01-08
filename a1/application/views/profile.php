<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Edit Profile</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
            <?php echo form_open('welcome/updateMyProfile'); 
			//print_r($profile);
			foreach($profile as $r){}
			?>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Surname</span>
                <input type="text" required name="surname" class="form-control" value="<?php echo $r['surname']; ?>" />
                       
            </div>
			  <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Othernames</span>
                <input type="text" required name="othernames" class="form-control" value="<?php echo $r['othernames']; ?>" />
                       
            </div>
              <div class="input-group" style="margin-bottom: 10px !important;">
			  <span class="input-group-addon">Sex</span>
                <select name="sex" required class="form-control">
				<option value="">Select Sex</option>
				<option value="Male" <?php if($r['sex']=='Male'){echo "selected";} ?>>Male</option>
				<option value="Female" <?php if($r['sex']=='Female'){echo "selected";} ?>>Female</option>
				</select>
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Username</span>
                <input type="text" required name="username" class="form-control" value="<?php echo $r['username']; ?>" />
                       
            </div>
            <div class="input-group" style="margin-bottom: 10px !important;">
                <span class="input-group-addon">Password</span>
                <input type="password" required name="password" class="form-control" value="" />
                       
            </div>
			
            <div class="input-group">
			<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                <input type="submit" value="Update Profile" class="btn btn-primary" />
                       
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>