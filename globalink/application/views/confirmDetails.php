<div class="jumbotron" style="border:1px solid; margin:10px;">
      <div class="row">
      <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
            
        <div id="show-register">
            <?
                  $form=array('role'=>'form','autocomplete'=>"false", 'name'=>'reg-form','id'=>'reg-form');
                  echo form_open('welcome/insertRegDetails',$form);
                  ?>
      
        <fieldset>
        <legend style="padding:10px;border:1px solid;">Confirm Details</legend>
        <div class="form-group">
    <label for="comp-name">Company Name:</label>
    <?=$compName?>
    <input type="hidden" value='<?=$compName?>' name="comp-name" class="form-control" id="comp-name"  />
  </div>
  <div class="form-group">
    <label for="comp-address">Address:</label>
    <?=$compAddress?>
<input type="hidden" value='<?=$compAddress?>' name="comp-address" class="form-control" id="comp-address"  />
  </div>
  <div class="form-group">
    <label for="comp-email">Email Address:</label>
    <?=$compEmail?>
    <input type="hidden" value='<?=$compEmail?>' name="comp-email" class="form-control" id="comp-email" placeholder="Enter email" />
    
    </div>
        
  <div class="form-group" >
    <label for="comp-phone">Phone Number:</label>
    <?=$compPhone?>
    <input type="hidden" value='<?=$compPhone?>' name="comp-phone" class="form-control" id="comp-phone" placeholder="Enter Phone" />
  </div>
  <div class="form-group">
    <label for="contact">Contact Person:</label>
    <?=$contact?>
    <input type="hidden" value='<?=$contact?>' name="contact" class="form-control" id="contact" placeholder="Contact Person" />
  <input type="hidden" value='<?=$password?>' name="comp-password" class="form-control" id="comp-password" placeholder="Password" />
  </div>
  <!--<div class="form-group">
     <label for="comp-password">Password</label>
    
  </div>-->
  
  
  <button type="button" onclick="history.back()" class="btn btn-default">&lt;&lt;Back</button> <button type="submit" class="btn btn-default">Submit</button> 
  </fieldset>
  </form>

      </div>
            

        </div>
        <div class="col-sm-6" >
                <legend style="padding:10px;border:1px solid;">Instructions</legend>
              <span>Please kindly confirm your details before clicking on Submit. <br><br>Click on Back to make corrections. <br><br>If you have created a profile earlier, login in above</span>
        </div>
        </div>
      </div>
<script  type="text/javascript">
 var frmvalidator = new Validator("login-form");
  frmvalidator.addValidation("login-email","req","Enter Email");
    frmvalidator.addValidation("login-email","email","Enter a valid email address");
    frmvalidator.addValidation("login-pass","req","Enter Password");
   </script>
      