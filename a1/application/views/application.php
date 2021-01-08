<div class="jumbotron" style="border:1px solid; margin:10px;">
    <div class="row" style="border-radius: 0 !important;">
        <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
            <div style="padding: 5px; background-color: #0073b7; color: #fff;"><h5><strong>Online Application</strong></h5></div>
            <?php
            $form = array('data-toggle' => "validator", 'autocomplete' => "off", 'id' => "signupform", 'role' => "form", 'method' => "POST");
            echo form_open_multipart('welcome/confirmApply', $form);
            
            ?>

            <br />         
            <div class="row">
                <div style="padding: 5px; background-color: #0073b7; width: 200px; margin-left:20px; margin-bottom: 10px; color: #fff;"><strong>Personal Profile</strong></div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="title" id="title" class="form-control">
                            <option value="">Select Title/Prefix</option>
                            <option value="Prof.">Prof.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Miss.">Miss.</option>
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('title'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value=""
                               name="surname"
                               id="surname"
                               class="form-control"
                               placeholder="Enter Surname"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('surname'); ?></div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value=""
                               name="firstname"
                               id="surname"
                               class="form-control"
                               placeholder="Enter First Name"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('firstname'); ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="" name="othernames"
                               id="othernames"
                               class="form-control"
                               placeholder="Enter Othernames"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('othernames'); ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="sex" id="sex" class="form-control">
                            <option value="">Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('sex'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="nat" id="nat" class="form-control">
                            <option value="">Select Country</option>
                            <?php
                            foreach ($countries as $c) {
                                ?>
                                <option value="<?php echo $c['nationalityID']; ?>" <?php if($c['nationalityID']==156){echo "selected"; } ?>><?php echo $c['nationalityName']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('nat'); ?></div>

                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value=""
                               name="dob"
                               id="dob"
                               class="form-control"
                               placeholder="Date of Birth"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('dob'); ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="" name="place"
                               id="place"
                               class="form-control"
                               placeholder="Place of Birth"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('place'); ?></div>
                    </div>
                </div>
            </div>
            
                
                <!--<div class="col-xs-12">-->
                    <div class="form-group">
                        <textarea name="home" id="home" placeholder="Address" class="form-control" rows="3"></textarea>
                        <div class="help-block with-errors"><?php echo form_error('home'); ?></div>
                    </div>
                <!--</div>-->


            
            

            <div class="form-group">
                <input value=""
                       name="email"
                       id="email"
                       type="email"
                       class="form-control"
                       placeholder="Enter email"
                       required>
                <div class="help-block with-errors"><?php echo form_error('email'); ?></div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input name="phone"
                               id="phone"
                               type="number"
                               class="form-control"
                               placeholder="Mobile Phone Number"
                               data-minlength="11"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('phone'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input name="maiden"
                               id="maiden"
                               type="text"
                               class="form-control"
                               placeholder="Maiden Name(Optional)"
                               id="dob"
                                />
                        <div class="help-block with-errors"><?php echo form_error('maiden'); ?></div>
                    </div>
                </div>
            </div>
                <div style="padding: 5px; background-color: #0073b7; width: 200px; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Identity</strong></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="identity" id="identity" class="form-control">
                            <option value="">Mode of Identification</option>
                            <?php
                            foreach ($identity as $i) {
                                ?>
                                <option value="<?php echo $i['identityID']; ?>" ><?php echo $i['identityName']; ?></option>
                            <?php } ?>
                            
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('identity'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input name="identityNo"
                               id="identityNo"
                               type="text"
                               class="form-control"
                               placeholder="Identity No"
                               id="identityNo"
                               required />
                        <div class="help-block with-errors"><?php echo form_error('identityNo'); ?></div>

                    </div>
                </div>
                
            </div>       
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value=""
                               name="idIssue"
                               id="idIssue"
                               class="form-control"
                               placeholder="Date Issued"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('idIssue'); ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="" name="idExpiry"
                               id="idExpiry"
                               class="form-control"
                               placeholder="ID Expiry Date"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('idExpiry'); ?></div>
                    </div>
                </div>
            </div>
            


            
        </div>
        <div class="col-sm-6">
            <div style="padding: 5px; background-color: #0073b7; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Employment Details</strong></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="employment" id="employment" class="form-control">
                            <option value="">Employment Type</option>
                            <?php
                            foreach ($employment as $e) {
                                ?>
                                <option value="<?php echo $e['employmentTypeID']; ?>" ><?php echo $e['employmentTypeName']; ?></option>
                            <?php } ?>
                            
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('employment'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input name="employer"
                               id="employer"
                               type="text"
                               class="form-control"
                               placeholder="Employer"
                               id="employer"
                               required />
                        <div class="help-block with-errors"><?php echo form_error('employer'); ?></div>

                    </div>
                </div>
                
            </div>  
            <div class="form-group">
                        <textarea name="employerAddress" id="home" placeholder="Employer Address" class="form-control" rows="3"></textarea>
                        <div class="help-block with-errors"><?php echo form_error('employerAddress'); ?></div>
                    </div>
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value=""
                               name="employerPhone"
                               id="employerPhone"
                               class="form-control"
                               placeholder="Employer Phone"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('employerPhone'); ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="" name="employerEmail"
                               id="employerEmail"
                               class="form-control"
                               placeholder="Employer Email"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('employerEmail'); ?></div>
                    </div>
                </div>
            </div>
            <div style="padding: 5px; width: 200px; background-color: #0073b7; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Next of Kin</strong></div>
            <div class="form-group">
                        <input name="nok"
                               id="nok"
                               type="text"
                               class="form-control"
                               placeholder="Next of Kin"
                               required />
                        <div class="help-block with-errors"><?php echo form_error('nok'); ?></div>

                    </div>
            <div class="form-group">
                        <textarea name="nokAddress" id="home" placeholder="Nok Address" class="form-control" rows="3"></textarea>
                        <div class="help-block with-errors"><?php echo form_error('nokAddress'); ?></div>
                    </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value=""
                               name="nokPhone"
                               id="nokPhone"
                               class="form-control"
                               placeholder="Nok Phone"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('nokPhone'); ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="" name="dependent"
                               id="dependent"
                               class="form-control"
                               placeholder="Number of Dependent"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('dependent'); ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Select Passport Photograph</label>
            <div class="form-group">
                
                <input type="file" id="passport" name="passport" size="40" class="form-control" />
                <div id="dispPassport"></div>
            </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Membership</label>
                    <div class="form-group">
                        <select name="category" class="form-control" id="category">
                        <option value="">Select Membership Category</option>
                        <?php 
                        foreach($categories as $s){
                            ?>
                        <option value="<?php echo $s['id']; ?>"><?php echo $s['name'];?></option> 
                      <?php } ?>
                    </select>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Monthly Contribution Type</label>
            <div class="form-group">
                <select name="contType" id="contType" class="form-control">
                    <option value="">Select Contribution Type</option> 
                    
            <?php
        
        foreach($contributionFees as $cont){
            ?>
                    <option value="<?php echo $cont['id']; ?>"><?php echo $cont['feeName']; ?>---N<?php echo number_format($cont['amount'],2); ?></option>      
        <?php }
        ?>
                </select>  
                
            </div>
                </div>
            </div>
            <div style="padding: 5px; width: 200px; background-color: #0073b7; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Agreement</strong></div>
            <div class="form-group">
                <span>I, the undersigned applicant, warrant that the information supplied by me is true and correct.</span>
                <br /><br /><input type="radio" name="agree" value=""  /> No | <input type="radio" name="agree" value="1" id="agree"  /> Yes
            </div>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-sm-6"><input type="reset" value="Clear" class="btn btn-info btn-block btn-lg" style="background: #0073b7 !important;" tabindex="9"></div><div class="col-sm-6"><input type="submit" value="Register" class="btn btn-info btn-block btn-lg" style="background: #0073b7 !important;" tabindex="10"></div>


            </div>
            <?php echo form_close(); ?>
        </div>

    </div>--
</div>
<script  type="text/javascript">
    var frmvalidator = new Validator("signupform");
    frmvalidator.addValidation("title", "req", "Select Title");
    frmvalidator.addValidation("surname", "req", "Enter Surname");
    frmvalidator.addValidation("firstname", "req", "Enter First Name");
    frmvalidator.addValidation("sex", "req", "Select Sex");
    frmvalidator.addValidation("nat", "req", "Select Nationality");
    frmvalidator.addValidation("dob", "req", "Date of Birth");
    frmvalidator.addValidation("place", "req", "Select Place");
    frmvalidator.addValidation("home", "req", "Enter Home Address");
    frmvalidator.addValidation("email", "req", "Enter Email");
    frmvalidator.addValidation("email", "email", "Invalid Email");
    frmvalidator.addValidation("phone", "req", "Enter Phone");
    frmvalidator.addValidation("phone", "numeric", "Invalid Phone");
    frmvalidator.addValidation("identity", "req", "Select Identity Type");
    frmvalidator.addValidation("identityNo", "req", "Enter Identity No");
    frmvalidator.addValidation("idIssue", "req", "Select Date of Issue");
    frmvalidator.addValidation("idExpiry", "req", "Select Date of Expiry");
    frmvalidator.addValidation("employment", "req", "Select Employment Status");
    frmvalidator.addValidation("employer", "req", "Enter Employer Name");
    frmvalidator.addValidation("employerPhone", "req", "Enter Employer Phone");
    frmvalidator.addValidation("employerPhone", "numeric", "Invalid Employer Phone");
    frmvalidator.addValidation("employerEmail", "req", "Enter Employer Email ");
    frmvalidator.addValidation("employerEmail", "email", "Enter Valid Employer Email");
    frmvalidator.addValidation("nok", "req", "Enter Next of Kin");
    frmvalidator.addValidation("nokAddress", "req", "Enter Next of Kin Address");
    frmvalidator.addValidation("nokPhone", "req", "Enter NoK Phone");
    frmvalidator.addValidation("nokPhone", "numeric", "Enter valid NoK Phone");
    frmvalidator.addValidation("dependent", "req", "Enter No of Dependent");
    frmvalidator.addValidation("dependent", "numeric", "Ivalid Dependent Number");
    frmvalidator.addValidation("passport", "req", "Select Passport to Upload");
    frmvalidator.addValidation("category", "req", "Select Membership Category");
    frmvalidator.addValidation("contType", "req", "Select Contribution Type");
    frmvalidator.addValidation("agree", "req", "Agree");
    </script>
    <script>
        $(document).ready(function(){
            $("#email").change(function(){
               // alert('Email');
                var email=$("#email").val();
                dis_url = <?php echo "'" . site_url('welcome/checkEmail') . "'"; ?> + '/' + email;
                $.ajax({
                    url:dis_url,
                    dataType:'html',
                    type:'GET',                    
                    success: function(data){
                      if(data==1){
                          alert('Email has been used, enter another Email');
                          document.getElementById('email').value='';
                          $("#email").focus();
                      }
                    },
                    error: function(data){
                        alert('Error: '+data);
                    }
                });
            });

        });
        </script>