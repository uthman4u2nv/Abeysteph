
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading"><strong><h3>Design Placement Letter</h3></strong></div>
        <div class="panel panel-body">
            <fieldset>
                <legend>Set Letter Head</legend>
                <?php
            $school=$_SESSION['school'];
            if(file_exists("./uploads/$school.jpg")){ // echo img('passport/'.$memberNo.".jpg",array('width'=>'147','height'=>'174')); ?>
               
               <img src="<?php echo base_url('uploads/'.$school.'.jpg'); ?>"  />
           <?php }
            else{
                echo "<pre><span>No Letter Head photo found,upload letter</span></pre><br />";
                echo "Letter head requirements: Maximum Size: 500kb, dimension: 800px X 111px";
            }
            ?>
                    <?php
                
                
                echo form_open_multipart('welcome/insertLetterHead');
                
                ?>
               <div class="input-group" style="margin-bottom: 10px !important;margin-top: 10px !important;">
                    <span class="input-group-addon">Upload Letter Head</span>
                    <input type="file" name="head" class="form-control" required="required" />
                </div>
                    <div class="input-group" style="margin-bottom: 10px !important;">
                        <input type="submit" class="btn btn-primary" value="Insert/Upload Letter Head" />
                    </div>
             <?php echo form_close(); ?>
            </fieldset>
            <hr />
              <fieldset>
                <legend>Design Letter Body</legend>
                <?php
                if(!empty($msg)){ ?>
                <div class="alert alert-success">
                    <?php echo $msg; ?>
                </div>
                <?php } ?>
                <?php
                if(!empty($placement)){
                    foreach($placement as $row){} ?>
                <?php echo form_open('welcome/updateplacementletter'); ?>
                   <div class="input-group" style="margin-bottom: 10px !important;">
                    <span class="input-group-addon">Date(to appear on letter)</span>
                    <input type="date" class="form-control" name="date" value="<?php echo $row['placementDate']; ?>" />
                </div>
                <div class="input-group" style="margin-bottom: 10px !important;">
                    <span class="input-group-addon">Reference No(To appear on letter)</span>
                    <input type="text" class="form-control" name="ref" value="<?php echo $row['placementRef']; ?>" />
                </div>
                <div class="input-group" style="margin-bottom: 10px !important;">
                    <span class="input-group-addon">Letter Body</span>
                    <textarea name="body" class="form-control" required rows="5">
                        <?php echo $row['placementBody']; ?>
                    </textarea>
                </div>
                <div class="input-group" style="margin-bottom: 10px !important;">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary" />
                </div>
                <?php echo form_close(); ?>
               <?php }else{ ?>
                      <?php echo form_open('welcome/insertplacementletter'); ?>
                 <div class="input-group" style="margin-bottom: 10px !important;">
                    <span class="input-group-addon">Date(to appear on letter)</span>
                    <input type="date" class="form-control" name="date" />
                </div>
                <div class="input-group" style="margin-bottom: 10px !important;">
                    <span class="input-group-addon">Reference No(To appear on letter)</span>
                    <input type="text" class="form-control" name="ref" />
                </div>
                <div class="input-group" style="margin-bottom: 10px !important;">
                    <span class="input-group-addon">Letter Body</span>
                    <textarea name="body" class="form-control" required rows="5">
                        
                    </textarea>
                </div>
                <div class="input-group" style="margin-bottom: 10px !important;">
                    <input type="submit" name="submit" value="Insert" class="btn btn-primary" />
                </div>
                <?php echo form_close(); ?> 
               <?php } ?>
            </fieldset>
        </div>
             
    </div>
</div>

<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>