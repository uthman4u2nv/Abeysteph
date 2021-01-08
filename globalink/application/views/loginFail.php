


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	
<head>
	<title>Abeysteph Globalink Limited</title>
		<meta charset="utf-8">
		<link href="<?php echo base_url('css/login.css'); ?>" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
           <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>

                
</head>
<body>
	
				 <!-----start-main---->
				<div class="login-form">
					<div class="head">
                                            
						<?php
                                                echo img('images/logo33.jpg');
												
                                                ?>
						
					</div>
                                    <?php
									
                                    $form=array('id'=>'login_form','name'=>'login_form',"data-toggle"=>"validator","autocomplete"=>"off");
                                    echo form_open('welcome/login',$form);
                                    
  
  
                                    ?>
									
									
                                   <!-- <form action="login.php" id="login_form" name="login_form" data-toggle="validator" autocomplete="off" method="post">-->
                                    <!--<form action="login" method="post" id="login_form" name="login_form">-->
					<p>USERNAME</p>
					<li>
                                            <input type="text" id="username" class="text" onfocus="this.value=''" value="username" name="username" data-validation="required"  ><a href="#" class=" icon user"></a>
					</li>
					<p>PASSWORD</p>
					<li>
                                            <input type="password" id="password" name="password" onfocus="this.value=''" value="Password" data-validation="required" ><a href="#" class=" icon lock"></a>
					</li>
                                        
					<div class="p-container">
                                            <div id="result" style="color: #ff4444">
                                            <?php
                                            if(!empty($msg)){
  echo $msg;
  }
                                            ?>
                                            </div>
								
                                            <input type="submit" id="submit" name="submit" value="SIGN IN" >
							<div class="clear"> </div>
					</div>
				</form>
			</div>
			<!--//End-login-form-->
		  <!-----start-copyright---->
   					<div class="copy-right">
						<!--<p>Powered by NINFOTECH</p>-->
					</div>
				<!-----//end-copyright---->

</body>
</html>