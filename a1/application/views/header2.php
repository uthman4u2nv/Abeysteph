<?php
if(empty($_SESSION['id'])){
    echo "Your session has expired, redirecting to login";
    header("refresh: 2; url=index");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
        <title>The Nigerian Institution of Structural Engineers</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('css/navbar.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('css/ui.css')?>">
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
  <script src="<?=base_url('js/10.js')?>"></script>
  <script src="<?=base_url('js/ui.js')?>"></script>
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
            <a class="navbar-brand" href="#"></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?=anchor('welcome/home','Home')?></li>
                <li><?php echo anchor('welcome/contact','Contact Us');?></li>
              <li><?php echo anchor('welcome/logout','Logout');?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
      <div style="margin-top:0px !important;">
      <?php
	  $img=array('src'=>'images/header.jpg','class'=>'img-responsive');
      echo img($img)?>
      </div>
      <div style="background: #CCC; padding: 10px;" align='right' id='disp_amount'><div align="left"><strong>Welcome, <?php echo strtoupper($_SESSION['surname'])." ".$_SESSION['othernames'];?></strong></div></div>
      