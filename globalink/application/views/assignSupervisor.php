
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Assign Supervisor</div>
        <div class="panel panel-body">
            <?php
            if(!empty($msg)){ ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>
            <?php } ?>
            <?php echo form_open('welcome/assignSupervisor2'); ?>
            <div class="input-group" style="margin-bottom: 10px !important">
                <span class="input-group-addon">Supervisor</span>
                <select name="supervisor" required class="form-control">
                    <option value="">Supervisor</option>
                    <?php
                    foreach($supervisor as $s){ ?>
                    <option value="<?php echo $s['officerID']; ?>"><?php echo $s['officerName']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <hr />
            <table class="table table-striped">
                <tr><td><input type="checkbox" value="1" id="check" /></td><td>Names</td><td>Faculty</td><td>Dept</td><td>Course</td></tr>
                <?php foreach($students as $row){ ?>
                <tr><td><input type="checkbox" value="<?php echo $row['id']; ?>" name="student[]" /></td><td><?php echo $row['surname']." ".$row['othernames']; ?></td><td><?php echo $row['faculty']; ?></td><td><?php echo $row['dept']; ?></td><td><?php echo $row['course']; ?></td></tr>
                <?php } ?>
            </table>
            
            <div class="input-group">
                <input type="submit" class="btn btn-submit" value="Assign Supervisor" />
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    /*$(document).ready(function(){
    $('.check:button').toggle(function(){
        $('input:checkbox').attr('checked','checked');
        $(this).val('uncheck all');
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('check all');        
    })
})*/
    </script>