<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php
    if(!empty($org)){ 
        foreach($org as $row){}
        
        ?>
    <li class="list-group-item">Name: <?php echo $row['orgName']; ?></li>
    <li class="list-group-item">Address: <?php echo $row['orgAddress']; ?></li>
    <li class="list-group-item">Email: <?php echo $row['orgEmail']; ?></li>
    <li class="list-group-item">Phone: <?php echo $row['orgPhone']; ?></li>
    <?php } ?>
</div>