<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading"><strong>School Officers</strong></div>
        <div class="panel panel-body">
            <pre><span><?php echo anchor_popup('welcome/addNewSchoolOfficer','Add Supervisor',array('width'=>400,'height'=>600)); ?></span></pre>
            <?php
            if(!empty($officers)){ ?>
            
            <pre><span>Number of School Officer: <?php echo count($officers); ?></span></pre>
            <table class="table table-striped">
                <tr><td>S/No</td><td>Name</td><td>Email</td><td>Phone</td><td></td><td></td><td></td></tr>
             <?php
             $sno=0;
             foreach($officers as $row){ $sno++; ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['officerName']; ?></td><td><?php echo $row['officerEmail']; ?></td><td><?php echo $row['officerPhone']; ?></td><td><?php echo anchor_popup('welcome/viewSchoolOfficer/'.$row['officerID'],'View',array('width'=>400,'height'=>600)); ?></td><td><?php echo anchor_popup('welcome/editSchoolOfficer/'.$row['officerID'],'Edit',array('width'=>400,'height'=>600)); ?></td><td><?php echo anchor('welcome/viewStudents/'.$row['id'],'Send Email'); ?></td></tr>
             <?php } ?>
    </table>  
            <?php } else{ echo "<pre><span>No School Officer Found</span></pre>"; } ?>
        </div>
    </div>
    
</div>