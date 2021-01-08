<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Upload Student List</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
              <?php echo $msg; ?>  
            </div>
            <?php } ?>
            <pre><span><strong>Instructions</strong></span></pre>
            <li class="list-group-item"><?php echo anchor_popup('../samplecsv.csv','Click to Download the sample format',array('width'=>400,'height'=>600)); ?></li>
            <li class="list-group-item">Upload your list in Microsoft Excel csv format</li>
            <li class="list-group-item">Upload your list without the headings, headings are just used as a guide for the expected values for all columns</li>
            
            <?php
            echo form_open_multipart('welcome/upload2');
            ?>
            <div class="input-group" style="margin-bottom: 10px !important">
                <span class="input-group-addon">Student List</span>
                <input type="file" name="list" class="form-control" required />
            </div>
            <div class="input-group">
                
                <input type="submit" class="btn btn-primary" required />
            </div>
            <?php echo form_close(); ?>
        </div>
        
    </div>
</div>