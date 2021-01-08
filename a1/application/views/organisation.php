<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading"><strong>Registered Organisation</strong></div>
        <div class="panel panel-body">
            <!--<pre><span><?php echo anchor_popup('welcome/addNewSchool','Add New Organisation',array('width'=>400,'height'=>600)); ?></span></pre>-->
            <pre><span>Number of Organisations: <?php echo count($organisation); ?></span></pre>
            <table class="table table-striped">
                <tr><td>S/No</td><td>Name</td><td>Phone</td><td>Email</td><td></td><td></td></tr>
             <?php
             $sno=0;
             foreach($organisation as $row){ $sno++; ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['orgName']; ?></td><td><?php echo $row['orgPhone']; ?></td><td><?php echo $row['orgEmail']; ?></td><td><?php echo anchor_popup('welcome/viewOrg/'.$row['orgID'],'View',array('width'=>400,'height'=>600)); ?></td><!--<td><?php echo anchor_popup('welcome/editOrg/'.$row['orgID'],'Edit',array('width'=>400,'height'=>600)); ?></td>--><td><?php echo anchor_popup('welcome/sendEmailOrg/'.$row['orgID'],'Send Email',array('width'=>400,'height'=>600)); ?></td><td><?php echo anchor('welcome/viewOrgStudents/'.$row['orgID'],'View IT Students'); ?></td></tr>
             <?php } ?>
    </table>   
        </div>
    </div>
    
</div>