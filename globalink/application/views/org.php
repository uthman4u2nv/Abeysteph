<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">Registered Companies</div>
        <div class="panel panel-body">
            <pre><span><?php echo anchor_popup('welcome/addOrg','Add Organisation',array('width'=>400,'height'=>600)); ?></pre></span>
			<?php
			if(!empty($org)){
				?>
				<table class="table table-striped">
				<tr><td>S/No</td><td>Org. Name</td><td>Org. Address</td><td>Org. Email</td><td>Org.Phone</td><td></td></tr>
				<?php
				$sno=0;
				foreach($org as $row){
					$sno++;
					?>
					<tr><td><?php echo $sno; ?></td><td><?php echo $row['orgName']; ?></td><td><?php echo $row['orgAddress']; ?></td><td><?php echo $row['orgEmail']; ?></td><td><?php echo $row['orgPhone']; ?></td><td><?php echo anchor('welcome/viewForm/'.$row['orgID'],'View Form SPE1'); ?></td></tr>
				<?php } ?>
				</table>
				<?php
				
			}else{ echo "No Organisation found";} ?>
        
            
          
           
        </div>
        
    </div>
</div>