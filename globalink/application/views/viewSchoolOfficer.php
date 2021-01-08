<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="panel panel-default">
        <div class="panel panel-heading">School Officer Details</div>
        <div class="panel panel-body">
    <?php
    foreach($officer as $row){} 
    ?>
    <li class="list-group-item">Name: <?php echo $row['officerName']; ?></li>
    <li class="list-group-item">School: <?php echo $row['name']; ?></li>
    <li class="list-group-item">Email: <?php echo $row['officerEmail']; ?></li>
    <li class="list-group-item">Phone: <?php echo $row['officerPhone']; ?></li>
        </div>
</div>
</div>