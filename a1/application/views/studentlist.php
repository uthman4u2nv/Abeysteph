<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading"><strong>IT Students List</strong></div>
        <div class="panel panel-body">
            <pre><span>School Name:<?php echo $schoolName; ?></span></pre>
            <?php
            if(!empty($students)){ ?>
            
            <pre><span>Number of Students on IT: <?php echo count($students); ?></span></pre>
            <table class="table table-striped">
                <tr><td>S/No</td><td>Name</td><td>Email</td><td>Phone</td><td>Matric No</td><td>Faculty</td><td>Dept</td><td>Course</td><td>Level</td></tr>
             <?php
             $sno=0;
             foreach($students as $row){ $sno++; ?>
                <tr><td><?php echo $sno; ?></td><td><?php echo $row['surname']." ".$row['othernames']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['phone']; ?></td><td><?php echo $row['matric']; ?></td><td><?php echo $row['faculty'];  ?></td><td><?php echo $row['dept']; ?></td><td><?php echo $row['course']; ?></td><td><?php echo $row['level']; ?></td><!--<td><?php echo anchor_popup('welcome/editStudent/'.$row['id'],'Edit',array('width'=>1200,'height'=>600)); ?></td>--></tr>
             <?php } ?>
    </table>  
            <?php } else{ echo "<pre><span>No Student Found</span></pre>"; } ?>
        </div>
    </div>
    
</div>