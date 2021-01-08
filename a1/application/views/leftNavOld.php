<div class="container-fluid">
    
      <div class="row">
          
        <div class="col-sm-3 col-md-2 sidebar">
            
            <ul class="nav nav-sidebar">
                <li style="margin-left: 10px !important"><strong><?php echo anchor('welcome/profile',$_SESSION['surname']." ".$_SESSION['othernames']); ?></strong></li>
            </ul>
            <div id="accordion">
                <h4>Home</h4>
                <div>
          <ul class="nav nav-sidebar">
            <li><?php echo anchor('welcome/home','Home'); ?></li>
            <li><?php echo anchor('welcome/profile','Edit Profile'); ?></li>
            <li><?php echo anchor('welcome/notifications','View Notifications'); ?></li>
            
          </ul>
                </div>
                <h4>Contributions</h4>
                <div>
          <ul class="nav nav-sidebar">
            <li><?php echo anchor('welcome/contributions','Pay Contributions'); ?></li>
            <li><?php echo anchor('welcome/contributionReport','View Contribution History'); ?></li>
            
          </ul>
                </div>
                <h4>Mortgage</h4>
                <div>
          <ul class="nav nav-sidebar">
            <li><?php echo anchor('welcome/qualification','Mortgage Qualification'); ?></li>
            <li><?php echo anchor('welcome/applyMortgage','Apply for Mortgage'); ?></li>
            <li><?php echo anchor('welcome/checkStatus','Application Status'); ?></li>
          </ul>
                </div>
        </div>
        </div>
      </div>