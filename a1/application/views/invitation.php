<script>
$(document).ready(function(){
   alert('I have read the requirements and am applying for the category of Fellowship By Application'); 
    
});
</script>
<div class="jumbotron" style="border:1px solid; margin:10px;">
    <div class="row" style="border-radius: 0 !important;">
        <div class="col-sm-6" style="border-right:1px solid; padding-left:40px;">
            <div style="padding: 5px; background-color: #005702; color: #fff;"><h5><strong>Fellowship By Direct Application</strong></h5></div>
            <form data-toggle="validator" autocomplete="off" id="signupform" role="form" onsubmit="return signup()"   action="https://domains.upperlink.ng/users/user/create_profile" method="POST">
                                         <br />         
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input value=""
                                               name="surname"
                                               class="form-control"
                                               placeholder="Enter Surname"
                                               required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input value="" name="othernames"
                                               class="form-control"
                                               placeholder="Enter Othernames"
                                               required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group">
                                <textarea name="home" placeholder="Home Address" class="form-control" rows="3"></textarea>
                                <div class="help-block with-errors"></div>
                                </div>
                            </div>
                                <div class="col-xs-12">
                                <div class="form-group">
                                <textarea name="postal" placeholder="Postal Address" class="form-control" rows="3"></textarea>
                                <div class="help-block with-errors"></div>
                                </div>
                            </div>
                                
                            </div>

                            <div class="form-group">
                                <input value=""
                                       name="email"
                                       type="email"
                                       class="form-control"
                                       placeholder="Enter email"
                                       required>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input name="phone"
                                               id="phone"
                                               type="number"
                                               class="form-control"
                                               placeholder="Enter Phone Number"

                                               data-minlength="11"
                                               required>
                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input name="field"
                                               type="text"
                                               id="field"
                                               class="form-control"
                                               required
                                               placeholder="Field of Engineering">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input value=""
                                       name="qual"
                                       class="form-control"
                                       placeholder="Enter Qualification">
                                <div class="help-block with-errors"></div>
                            </div>
                                         <div class="form-group">
                                <textarea name="acad_qual" placeholder="Academic & Professional QualificationAddress" class="form-control" rows="3"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label>Graduation Year</label>
                                    <select name="grad_year" class="form-control">
                                        <option value="">Select Grad. Year</option>
                                        <?php
                                        for($i=1940; $i<=1990; $i++){?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Year of Election</label>
                                       <select name="grad_year" class="form-control">
                                        <option value="">Select Election Year</option>
                                        <?php
                                        for($i=1940; $i<=2000; $i++){?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <? } ?>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input value=""
                                               name="nseregno"
                                               type="number"
                                               class="form-control"
                                               data-country="countries_states2"
                                               placeholder="NSE Reg. No"
                                               required> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input value=""
                                               name="coren"
                                               type="text"
                                               class="form-control"
                                               placeholder="COREN No"
                                               >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
<div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label>Branch</label>
                                    <select name="branch" class="form-control">
                                        <option value="">Select Branch</option>
                                        <?php
                                        foreach($branches as $br){?>
                                        <option value="<?php echo $br['branchid']; ?>"><?php echo $br['branch_name']?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Division</label>
                                       <select name="division" class="form-control">
                                        <option value="">Select Division</option>
                                        <?php
                                        foreach($division as $dv){?>
                                        <option value="<?php echo $dv['id']; ?>"><?php echo $dv['name']; ?></option>
                                        <? } ?>
                                    </select>
                                    </div>
                                </div>
                            </div>

                           
                            


                            <div class="form-group">
                                
                                <img src="https://domains.upperlink.ng/font/captcha.png" alt=""/>  
                            </div>



                            <div class="form-group">
                                <input value=""  name="user_captcha" type="text" class="form-control" placeholder="Enter the text above here">
                                <div class="help-block with-errors"></div>
                            </div>




                            

                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-info btn-block btn-lg" tabindex="7"></div>
                                
                            </div>
                        </form>

        </div>
        <div class="col-sm-6">
            <div style="padding: 5px; background-color: #005702; color: #fff;"><h5><strong>INSTRUCTIONS</strong></h5></div>
            <div style="margin-top: 10px;"><span>All fields are compulsory and must be filled</span> </div>
        </div>
        
    </div>
</div>