<div style="margin: 20px;">
<?php
$form=array('name'=>'uploadPhoto','id'=>'uploadPhoto');
echo form_open_multipart('welcome/uploadPassport',$form);
?>
    <input type="file" name="passport" id="passport" class="form-control" size="40" /><br />
<input type="submit" value="Upload Passport" class="btn btn-default" />
<?php echo form_close(); ?>
</div>
<script  type="text/javascript">
    var frmvalidator = new Validator("uploadPhoto");
    frmvalidator.addValidation("passport", "req", "Select Passport");
    </script>
    