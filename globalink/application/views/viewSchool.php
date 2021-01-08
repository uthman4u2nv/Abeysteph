<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">School Details</div>
        <div class="panel panel-body">
    <?php
    foreach($school as $row){} 
    ?>
    <li class="list-group-item">Name: <?php echo $row['name']; ?></li>
    <li class="list-group-item">Address: <?php echo $row['address']; ?></li>
    <li class="list-group-item">Email: <?php echo $row['email']; ?></li>
    <li class="list-group-item">Phone: <?php echo $row['phone']; ?></li>
        </div>
</div>
</div>