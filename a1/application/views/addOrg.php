<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Register Company</div>
        <div class="panel panel-body">
		<?php
		if(!empty($msg)){
			?>
			<div class="alert alert-success"><?php echo $msg; ?></div>
		<?php } ?>
		<?php echo form_open('welcome/addOrg2'); ?>
            <div class="input-group" style="margin-bottom:10px !important">
			<span class="input-group-addon">Company Name</span>
			<input type="text" required name="name" class="form-control" />
			</div>
			<div class="input-group" style="margin-bottom:10px !important">
			<span class="input-group-addon">Company Address</span>
			<textarea name="address" row="5" col="30" class="form-control">
			</textarea>
			</div>
			<div class="input-group" style="margin-bottom:10px !important">
			<span class="input-group-addon">Company Email</span>
			<input type="email" required name="email" class="form-control" />
			</div>
			<div class="input-group" style="margin-bottom:10px !important">
			<span class="input-group-addon">Company Phone</span>
			<input type="text" required name="phone" class="form-control" />
			</div>
			<div class="input-group" style="margin-bottom:10px !important">
			<span class="input-group-addon">Company Speciality</span>
			<input type="hidden" name="school" value="<?php echo $_SESSION['school']; ?>" /><input type="text" required name="speciality" class="form-control" />
			</div>
        <div class="input-group" style="margin-bottom:10px !important">
			
			<input type="submit" name="submit" class="btn btn-primary" />
			</div>
			<?php echo form_close(); ?>
            
          
           
        </div>
        
    </div>
</div>