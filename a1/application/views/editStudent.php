<script>
        window.onunload = refreshParent;
        function refreshParent() {
            window.opener.location.reload();
            
        }
    </script>
<div class="main">
<div class="panel panel-default">
    <div class="panel panel-heading">Edit Student</div>
    <div class="panel panel-body">
        <?php
        foreach($student as $row){}
        ?>
        <div class="col-lg-12">
            <?php echo form_open('welcome/updateStudent'); ?>
        <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Surname</span>
            <input type="text" required class="form-control" name="surname" value="<?php echo $row['surname']; ?>" />
        </div>
        <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Othernames</span>
            <input type="text" required class="form-control" name="othernames" value="<?php echo $row['othernames']; ?>" />
        </div>
        <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Matric No</span>
            <input type="text" required class="form-control" name="matric" value="<?php echo $row['matric']; ?>" />
        </div>
        <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Faculty</span>
            <input type="text" required class="form-control" name="faculty" value="<?php echo $row['faculty']; ?>" />
        </div>
        <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Dept</span>
            <input type="text" required class="form-control" name="dept" value="<?php echo $row['dept']; ?>" />
        </div>
        <div class="input-group" style="margin-bottom: 10px !important">
            <span class="input-group-addon">Course</span>
            <input type="text" required class="form-control" name="course" value="<?php echo $row['course']; ?>" />
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
        </div>
            <div class="input-group" style="margin-bottom: 10px !important">
            
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>
    </div>
</div>
</div>
</div>