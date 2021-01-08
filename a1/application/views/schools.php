<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading"><strong>Registered Schools</strong></div>
        <div class="panel panel-body">
            <pre><span><?php echo anchor_popup('welcome/addNewSchool','Add New School',array('width'=>400,'height'=>600)); ?></span></pre>
            <?php
            if(!empty($schools)){ ?>
            
            <pre><span>Number of Schools: <?php echo count($schools); ?></span></pre>
            <table class="table table-striped">
                <tr><td>S/No</td><td>Name</td><td></td><td></td></tr>
             <?php
             $sno=0;
             foreach($schools as $row){ $sno++; ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['name']; ?></td><td><?php echo anchor_popup('welcome/viewSchool/'.$row['id'],'View',array('width'=>400,'height'=>600)); ?></td><!--<td><?php echo anchor_popup('welcome/editSchool/'.$row['id'],'Edit',array('width'=>400,'height'=>600)); ?></td>--><td><?php echo anchor('welcome/viewStudents/'.$row['id'],'View IT Students'); ?></td></tr>
             <?php } ?>
    </table>  
            <?php } else{ echo "<pre><span>No School Found</span></pre>"; } ?>
        </div>
    </div>
    
</div>