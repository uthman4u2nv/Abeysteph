<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row" style="border-radius: 0 !important;">
        <div class="col-sm-6" style="border-right:1px solid; padding-left:0px;">
            <?php
            foreach($profile as $row){}
            $form = array('data-toggle' => "validator", 'autocomplete' => "off", 'id' => "signupform", 'role' => "form", 'method' => "POST");
            echo form_open_multipart('welcome/updateProfile', $form);
            
            ?>

            <br />         
            <div class="row">
                <div style="padding: 5px; background-color: #0073b7; width: 200px; margin-left:20px; margin-bottom: 10px; margin-top: -20px; color: #fff;"><strong>Personal Profile</strong></div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select name="title" id="title" class="form-control">
                            <option value="">Select Title/Prefix</option>
                            <option value="Prof."<?php if($row['title']=='Prof'){echo "selected";}?>>Prof.</option>
                            <option value="Dr." <?php if($row['title']=='Dr.'){echo "selected";}?>>Dr.</option>
                            <option value="Mr." <?php if($row['title']=='Mr.'){echo "selected";}?>>Mr.</option>
                            <option value="Mrs." <?php if($row['title']=='Mrs.'){echo "selected";}?>>Mrs.</option>
                            <option value="Miss." <?php if($row['title']=='Miss.'){echo "selected";}?>>Miss.</option>
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('title'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="<?php echo $row['lastname']; ?>"
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
                        <input value="<?php echo $row['firstname']; ?>"
                               name="firstname"
                               id="firstname"
                               class="form-control"
                               placeholder="Enter First Name"
                               required>
                        <div class="help-block with-errors"><?php echo form_error('firstname'); ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="<?php echo $row['othernames']; ?>" name="othernames"
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
                            <option value="Male" <?php if($row['gender']=="Male"){echo "selected";} ?>>Male</option>
                            <option value="Female" <?php if($row['gender']=="Female"){echo "selected";} ?>>Female</option>
                            
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
                                <option value="<?php echo $c['nationalityID']; ?>" <?php if($c['nationalityID']==$row['nationalityID']){echo "selected"; } ?>><?php echo $c['nationalityName']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('nat'); ?></div>

                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="<?php echo $row['birthDate']; ?>"
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
                        <input value="<?php echo $row['birthPlace']; ?>" name="place"
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
                        <textarea name="home" id="home" placeholder="Address" class="form-control" rows="3"><?php echo $row['homeAddress']; ?></textarea>
                        <div class="help-block with-errors"><?php echo form_error('home'); ?></div>
                    </div>
                <!--</div>-->


            
            

            <div class="form-group">
                <input value="<?php echo $row['emailAddress']; ?>"
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
                        <input value="<?php echo $row['phoneNumber']; ?>" name="phone"
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
                        <input value="<?php echo $row['maidenName']; ?>" name="maiden"
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
                                <option value="<?php echo $i['identityID']; ?>" <?php if($i['identityID']==$row['identityID']){echo "selected"; }?> ><?php echo $i['identityName']; ?></option>
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
                               value="<?php echo $row['identityNumber']; ?>"
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
                        <input value="<?php echo $row['identityDateIssued']; ?>"
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
                        <input value="<?php echo $row['identityDateExpired']; ?>" name="idExpiry"
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
                            foreach($employmentDetails as $em){} 
                            foreach ($employment as $e) {
                                ?>
                                <option value="<?php echo $e['employmentTypeID']; ?>" <?php if($e['employmentTypeID']==$em['employmentTypeID']){echo "selected";}?> ><?php echo $e['employmentTypeName']; ?></option>
                            <?php } ?>
                            
                        </select>
                        <div class="help-block with-errors"><?php echo form_error('employment'); ?></div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input name="employer" value="<?php echo $em['employerName']; ?>"
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
                        <textarea name="employerAddress" id="home" placeholder="Employer Address" class="form-control" rows="3"><?php echo $em['employerAddress']; ?></textarea>
                        <div class="help-block with-errors"><?php echo form_error('employerAddress'); ?></div>
                    </div>
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="<?php echo $em['employerPhoneNumber']; ?>"
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
                        <input value="<?php echo $em['employerEmailAddress']; ?>" name="employerEmail"
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
                <input name="nok" value="<?php echo $row['nextOfKinName']; ?>"
                               id="nok"
                               type="text"
                               class="form-control"
                               placeholder="Next of Kin"
                               required />
                        <div class="help-block with-errors"><?php echo form_error('nok'); ?></div>

                    </div>
            <div class="form-group">
                        <textarea name="nokAddress" id="home" placeholder="Nok Address" class="form-control" rows="3"><?php echo $row['nextOfKinAddress']; ?></textarea>
                        <div class="help-block with-errors"><?php echo form_error('nokAddress'); ?></div>
                    </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input value="<?php echo $row['nextOfKinPhone']; ?>"
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
                        <input value="<?php echo $row['dependantNumber']; ?>" name="dependent"
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
                    
            <?php
            $atts=array('width'=>'600','height'=>'600');
            echo anchor_popup('welcome/changePassport','Change Passport',$atts); ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    
                </div>
            </div>
            
            
            <hr class="colorgraph">
            <div class="row">
                <div class="col-sm-6"></div><div class="col-sm-6"><input type="submit" value="Update Profile" class="btn btn-info btn-block btn-lg" style="background: #0073b7 !important;" tabindex="10"></div>


            </div>
            <?php echo form_close(); ?>
        </div>

    </div>
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
    
    
    
    </script>
