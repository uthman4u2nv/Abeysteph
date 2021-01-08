<div class="jumbotron" style="border:1px solid; margin:10px;">
      <div class="row">
          <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
              <?php
                  $form=array('role'=>'form','autocomplete'=>"false", 'name'=>'regForm','id'=>'regForm');
                  echo form_open('welcome/confirmReg',$form);
                  ?>
                  
      
        <fieldset>
        <legend style="padding:10px;border:1px solid;">Register</legend>
        <div class="form-group">
            
    <label for="comp-name">Company Name</label>
    <input data-toggle="tooltip" data-placement="right" title="Company Name" type="text" value="<?=set_value('comp-name');?>" name="comp-name" class="form-control" id="comp-name" placeholder="Company Name" />
  <?php echo form_error('comp-name'); ?>
        </div>
  <div class="form-group">
      
    <label for="comp-address">Address</label>
    <textarea data-toggle="tooltip" data-placement="right" title="Company Address" name="comp-address" id="comp-address" class="form-control" rows="5" cols="30"><?=set_value('comp-address');?></textarea>
  <?php echo form_error('comp-address'); ?>
  </div>
  <div class="form-group">
      
    <label for="comp-email">Email Address</label>
    <input data-toggle="tooltip" data-placement="right" title="Company Email" type="email" name="comp-email" value="<?=set_value('comp-email');?>" class="form-control" id="comp-email" placeholder="Enter email" />
    <div id="loading"></div>
  <?php echo form_error('comp-email'); ?>  
  </div>
        
  <div class="form-group" >
      
    <label for="comp-phone">Phone Number</label>
    <input data-toggle="tooltip" data-placement="right" title="Company Phone" type="text" name="comp-phone" value="<?=set_value('comp-phone');?>" class="form-control" id="comp-phone" placeholder="Enter Phone" />
  <?php echo form_error('comp-phone'); ?>
  </div>
  <div class="form-group">
      <label for="contact">Contact Person</label>
    <input data-toggle="tooltip" data-placement="right" title="Contact" type="text" name="contact" value="<?=set_value('contact');?>" class="form-control" id="contact" placeholder="Contact Person" />
  <?php echo form_error('contact'); ?>
  </div>
  <div class="form-group">
    <label for="comp-password">Password</label>
    <input data-toggle="tooltip" data-placement="right" title=" Enter Password" type="password" name="comp-password" class="form-control" id="comp-password" placeholder="Password" />
  <?php echo form_error('comp-password'); ?>
  </div>
  <div class="form-group">
    <label for="conf-password">Confirm Password</label>
    <input data-toggle="tooltip" data-placement="right" title="Confirm Password" type="password" name="conf-password" class="form-control" id="conf-password" placeholder="Confirm Password" />
  <?php echo form_error('conf-password'); ?>
  </div>
   <div class="form-group">
   
   <div style="padding:5px; background: #00620C; color: #FFF; border:1px solid; width:100px;" id="captchaload" class="b"></div><!--<a href="Javascript:;" id="reloadCapt">Reload</a>--><br>
   <label for="captcha">Enter the numbers in the box below</label> 
   <input type="hidden" name="confirm-captcha" id="confirm-captcha"   /><input type="text" name="captcha" class="form-control" id="captcha"  />
  <?php echo form_error('captcha'); ?>  
  </div>
  
    <button type="submit" class="btn btn-default">Submit</button>
  </fieldset>
  </form>

          </div>
          <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
              <legend style="padding:10px;border:1px solid;">Instructions</legend>
              <span>Kindly fill the form to create a profile. <br><br>If you have created a profile earlier, login in above</span>
          </div>
          </div>
</div>
<script type="text/javascript">
 var frmvalidator = new Validator("regForm");
  frmvalidator.addValidation("comp-name","req","Enter Company Name");
  frmvalidator.addValidation("comp-address","req","Email address is required");
  frmvalidator.addValidation("comp-email","req","Enter Email");
    frmvalidator.addValidation("comp-email","email","Enter a valid email address");
    frmvalidator.addValidation("comp-phone","req","Enter Phone Number");
  frmvalidator.addValidation("comp-phone","numeric","Invalid Phone Number");
frmvalidator.addValidation("contact","req","Enter Contact Person");
frmvalidator.addValidation("password","req","Enter Password");
frmvalidator.addValidation("conf-password","eqelmnt=password","Password and Confirm Password do not match");
frmvalidator.addValidation("confirm-captcha","req","Enter Number shown above");  
</script>
   <script type="text/javascript">
       $(document).ready(function(){
          $("#comp-email").change(function(){
			  	$("#loading").html('<img src="<?=base_url('images/preload.gif')?>" />');
				$("#email_check").show();		
				var email=$("#comp-email").val();
				url=<?php echo "'" . site_url('welcome/checkEmail') . "'"; ?> + '/' + email;
				$.ajax({
					url:url,
					dataType:'text',
					type:'GET',
					success: function(data){
						$("#loading").empty();
						if(data>='1'){
					alert('Email already in use');
									document.getElementById('comp-email').value='';
									document.getElementById('comp-email').focus();			
							}
						
							
						},
					error: function(data){
						console.log(data);
						alert('Error '+data);
						alert('Error checking email');
						
						}
					});  	
			  	});
			  	//loads captcha
			  	//function loadCaptcha(){
			  	url2=<?php echo "'" . site_url('welcome/randomNum') . "'"; ?>;
			  	$.ajax({
					url:url2,
					dataType:'text',
					type:'GET',
					success: function(data){
							$("#captchaload").empty();
							$("#captchaload").append(data);	
							document.getElementById('confirm-captcha').value=data;	
							},
						error: function(data){
											
						}
							
						});
					
					
			 
       });
       </script>