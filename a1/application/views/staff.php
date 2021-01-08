<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="panel panel-primary">
<div class="panel panel-heading">Staff</div>
<div class="panel panel-body">
<?php
echo anchor_popup('welcome/addNewStaff','Add New Staff',array('width'=>400,'height'=>400,'class'=>'btn btn-success')); 
?>
<hr />
<table class="table table-striped">
<tr><td>#</td><td>Name</td><td>Dept</td><td>Role</td><td>Action</td></tr>
<?php
$sno=0;
foreach($staff as $row){
	$sno++;
	?>
	<tr>
	<td><?php echo $sno; ?></td>
	<td><?php echo $row['surname']." ".$row['othernames']; ?></td>
	<td><?php echo returnDeptName($depts,$row['dept']); ?></td>
	<td><?php echo returnRoleName($usertype,$row['user_type']); ?></td>
	<td><?php echo anchor_popup('welcome/editStaff/'.$row['id'],'Edit',array('width'=>400,'height'=>400)); ?></td>
	</tr>
	<?php
}
?>
</table>
</div>
</div>
</div>
<?php
		function returnDeptName($depts,$id){
			$name="";
			foreach($depts as $row){
				if($row['id']==$id){
					$name=$row['name'];
				}
			}
			return $name;
		}
		function returnRoleName($usertype,$id){
			$name="";
			foreach($usertype as $row){
				if($row['id']==$id){
					$name=$row['name'];
				}
			}
			return $name;
		}
		?>