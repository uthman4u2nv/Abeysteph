<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
        <title>Nigerian Society of Engineers</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('css/navbar.css')?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>-->
    <script type="text/javascript" src="<?=base_url('js/jquery-1.11.js')?>" ></script>
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('js/gen_validatorv4.js')?>"></script>
      </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation" style="margin-bottom:0px !important; margin-top:0px !important;">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <div style="margin-top: 10px;"><?php echo anchor('welcome/index','HOME')?></div>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
            </ul>
              
                  
                        
                        
              <?php
                  $form=array('role'=>'form','autocomplete'=>"false", 'name'=>'login-form','id'=>'forg-form');
                  echo form_open('welcome/login',$form);
                  ?>
            <ul class="nav navbar-nav navbar-right">
                <li style="margin-top: 5px !important;"><!--<label for="login-email">Email address</label>-->
    <input data-toggle="tooltip" data-placement="right" title=" Enter Email" type="email" name="login-email" class="form-control" id="login-email" placeholder="Enter email" /></li>
              <li style="margin-top: 5px !important;"><!--<label for="login-pass">Password</label>-->
    <input data-toggle="tooltip" data-placement="right" title=" Enter Password" type="password" name="login-pass" class="form-control" id="login-pass" placeholder="Password" /></li>
            <li style="margin-top: 5px !important;"><button type="submit" class="btn btn-default">Login</button>
    </li>
    <?php echo form_close(); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
      <div style="margin-top:0px !important;">
      <?php
	  $img=array('src'=>'images/header.jpg','class'=>'img-responsive');
      echo img($img)?>
      </div>
      