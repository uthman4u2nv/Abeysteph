<script>
//$(document).ready(function(){
    // alert('I have read the requirements and am applying for the category of Fellowship By Application'); 

//});
</script>
<div class="jumbotron" style="border:1px solid; margin:10px;">
    <div class="row" style="border-radius: 0 !important;">
        <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
            <div style="padding: 5px; background-color: #0073b7; color: #fff;"><h5><strong>Confirm Your Details</strong></h5></div>
            <?php
            $form = array('data-toggle' => "validator", 'autocomplete' => "off", 'id' => "signupform", 'role' => "form", 'method' => "POST");
            echo form_open('welcome/insertApply', $form);
            ?>

            <br />   
            
            <div class="row">
                <div style="padding: 5px; background-color: #0073b7; width: 200px; margin-left:20px; margin-bottom: 10px; color: #fff;"><strong>Personal Profile</strong></div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Title</label>
                    <div class="form-group">
                       <?php echo $title; ?>
                        <input type="hidden" name="title" value="<?php echo $title; ?>" />

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Surname</label>
                    <div class="form-group">
                        <?php echo $surname; ?>
                        <input value="<?php echo $surname; ?>" type="hidden"
                               name="surname"
                               id="surname"
                               class="form-control"
                               placeholder="Enter Surname"
                               required>
                        
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>First Name</label>
                    <div class="form-group">
                        <?php echo $firstname; ?>
                        <input value="<?php echo $firstname; ?>"
                               name="firstname"
                               id="surname"
                               class="form-control"
                               placeholder="Enter First Name"
                               type="hidden">
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Other Names</label>
                    <div class="form-group">
                        <?php echo $othernames; ?>
                        <input value="<?php echo $othernames; ?>" name="othernames"
                               id="othernames"
                               class="form-control" type="hidden"
                               >
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Sex</label>
                    <div class="form-group">
                        <?php echo $sex; ?>
                        <input type="hidden" name="sex" value="<?php echo $sex; ?>" />
                        

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Nationality</label>
                    <div class="form-group">
                        <?php 
                        foreach($countries as $c){
                            if($c['nationalityID']==$nat){
                                echo $c['nationalityName'];
                            }
                        }
                        ?>
                        <input type="hidden" name="nat" value="<?php echo $nat; ?>" />
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Date of Birth</label>
                    <div class="form-group">
                        <?php echo $dob; ?>
                        <input value="<?php echo $dob; ?>"
                               name="dob"
                               id="dob"
                               class="form-control"
                               type="hidden"
                               >
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Place of Birth</label>
                    <div class="form-group">
                        <?php echo $place; ?>
                        <input value="<?php echo $place; ?>" name="place" type="hidden"
                               id="place"
                               class="form-control"
                                                              required>
                        
                    </div>
                </div>
            </div>
            
                
                <!--<div class="col-xs-12">-->
                <label>Home Address</label>
                    <div class="form-group">
                        <?php echo $home; ?>
                        <input type="hidden" name="home" value="<?php echo $home; ?>" />
                        
                        
                    </div>
                <!--</div>-->


            
            
                <label>Email</label>
            <div class="form-group">
                <?php echo $email; ?>
                <input value="<?php echo $email; ?>"
                       name="email"
                       id="email"
                       type="hidden"
                       class="form-control"                     
                       >
                

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Phone</label>
                    <div class="form-group">
                        <?php echo $phone; ?>
                        <input name="phone"
                               id="phone"
                               type="hidden"
                               class="form-control"
                                 value="<?php echo $phone; ?>"                             required>
                        

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Maiden Name</label>
                    <div class="form-group">
                        <?php echo $maiden; ?>
                        <input name="maiden"
                               id="maiden"
                               type="hidden"
                               class="form-control"
                               value="<?php echo $maiden; ?>"
                               
                               />
                        
                    </div>
                </div>
            </div>
                <div style="padding: 5px; background-color: #0073b7; width: 200px; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Identity</strong></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Identity Type</label>
                    <div class="form-group">
                        <input type="hidden" name="identity" value="<?php echo $identity; ?>" />
                               
                            <?php
                            foreach ($identitys as $i) {
                             if($i['identityID']==$identity)  {
                                 echo $i['identityName'];
                             }
                            }
                             ?>
                            
                        
                        

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Identity Card No</label>
                    <div class="form-group">
                        <?php echo $identityNo; ?>
                        <input name="identityNo"
                               id="identityNo"
                               type="hidden"
                               class="form-control"
                               value="<?php echo $identityNo; ?>"
                               id="identityNo"
                                />
                        

                    </div>
                </div>
                
            </div>       
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Date Issued</label>
                    <div class="form-group">
                        <?php echo $idIssue; ?>
                        <input value="<?php echo $idIssue; ?>"
                               type="hidden"
                               name="idIssue"
                               id="idIssue"
                               class="form-control"
                               />
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Expiry date</label>
                    <div class="form-group">
                        <?php echo $idExpiry; ?>
                        <input value="<?php echo $idExpiry; ?>" name="idExpiry"
                               id="idExpiry"
                               class="form-control"
                               type="hidden"
                               required>
                        
                    </div>
                </div>
            </div>
            


            
        </div>
        <div class="col-sm-6">
            <div style="padding: 5px; background-color: #0073b7; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Employment Details</strong></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Employment Type</label>
                    <div class="form-group">
                        <input type="hidden" name="employment" value="<?php echo $employment; ?>" />
                               
                            
                            <?php
                            foreach ($employments as $e) {
                               if($e['employmentTypeID']==$employment){
                                   echo $e['employmentTypeName'];
                               }
                            } ?>
                            
                        </select>
                        

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Employer</label>
                    <div class="form-group">
                        <?php echo $employer; ?>
                        <input name="employer"
                               id="employer"
                               type="hidden"
                               class="form-control"
                               value="<?php echo $employer; ?>"
                               id="employer"
                                />
                        

                    </div>
                </div>
                
            </div>  
            <label>Employers Address</label>
            <div class="form-group">
                <?php echo $employerAddress; ?>
                <input type="hidden" name="employerAddress" value="<?php echo $employerAddress; ?>" />
                    </div>
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Employer Phone</label>
                    <div class="form-group">
                        <?php echo $employerPhone; ?>
                        <input value="<?php echo $employerPhone; ?>"
                               name="employerPhone"
                               id="employerPhone"
                               class="form-control"
                               type="hidden"
                               >
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Employer Email</label>
                    <div class="form-group">
                        <?php echo $employerEmail; ?>
                        <input value="<?php echo $employerEmail; ?>" name="employerEmail"
                               id="employerEmail"
                               class="form-control"
                               placeholder="Employer Email"
                               type="hidden">
                        
                    </div>
                </div>
            </div>
            <div style="padding: 5px; width: 200px; background-color: #0073b7; margin-left:0px; margin-bottom: 10px; color: #fff;"><strong>Next of Kin</strong></div>
            <label>Next of Kin</label>
            <div class="form-group">
                <?php echo $nok; ?>
                        <input name="nok"
                               id="nok"
                               type="hidden"
                               class="form-control"
                               value="<?php echo $nok; ?>"
                               required />
                        

                    </div>
            <label>NoK Address</label>
            <div class="form-group">
                <?php echo $nokAddress; ?>
                <input type="hidden" name="nokAddress" value="<?php echo $nokAddress; ?>" />
                        
                        
                    </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Nok Phone</label>
                    <div class="form-group">
                        <?php echo $nokPhone; ?>
                        <input value="<?php echo $nokPhone; ?>"
                               name="nokPhone"
                               type="hidden"
                               id="nokPhone"
                               
                               />
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>No of Dependent</label>
                    <div class="form-group">
                        <?php echo $dependent; ?>
                        <input value="<?php echo $dependent; ?>" name="dependent"
                               id="dependent"
                               class="form-control"
                               placeholder="Number of Dependent"
                               type="hidden"
                               value="<?php echo $dependent; ?>" />
                        
                    </div>
                </div>
            </div>
            
            
            <div class="form-group">
                
                <br /><br /><input type="hidden" name="agree" value="<?php echo $agree; ?>"  />
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <?php 
                $img=array('src'=>'application/views/uploads/'.$passport.".jpg",'width'=>'200','height'=>'200');
                //echo img('application/views/uploads/'.$passport.".jpg"); 
                echo img($img);
                ?>
                <input type="hidden" name="passport" value="<?php echo $passport; ?>" />
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Membership Categories</label>
                    <div class="form-group">
                        <input type="hidden" name="category" value="<?php echo $category; ?>" />
                        <?php
                        foreach($categories as $cc){
                          if($cc['id']==$category){
                              echo $cc['name'];
                          }  
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                <label>Contribution Type</label>
                    <div class="form-group">
                        <input type="hidden" name="contType" value="<?php echo $contType; ?>" />
                        <?php
                        foreach($contributionFees as $ccc){
                          if($ccc['id']==$contType){
                              echo $ccc['feeName']."----".number_format($ccc['amount'],2);
                          }  
                        }
                        ?>
                </div>
            </div>
            </div>
            
            <hr class="colorgraph">
            <div class="row">
                <div class="col-sm-6"><input type="button" value="Back" onclick="window.back();" class="btn btn-info btn-block btn-lg" style="background: #0073b7 !important;" tabindex="9"></div><div class="col-sm-6"><input type="submit" value="Register" class="btn btn-info btn-block btn-lg" style="background: #0073b7 !important;" tabindex="10"></div>


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
    frmvalidator.addValidation("passport", "req", "Select Passport to Upload");
    </script>