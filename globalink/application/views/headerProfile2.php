<?php
if(empty($_SESSION['surname'])|| empty($_SESSION['othernames'])){
    echo "You are not logged in or session has expired, redirecting to login page<br />";
    echo img('images/preload.gif');
    header("refresh: 3; url=../../../");
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
    <meta name="author" content="">
    

    <title>Executive Housing Cooperative Society </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/dashboard.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="<?php echo base_url('js/jquery-min.js'); ?>"></script>
    <script src="<?php echo base_url('js/docs.min.js'); ?>"></script>
    <script type="text/javascript" src="<?=base_url('js/jquery-1.11.js')?>" ></script>
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('js/gen_validatorv4.js')?>"></script>
    <script src="<?=base_url('js/10.js')?>"></script>
  <script src="<?=base_url('js/ui.js')?>"></script>
    <script>
  $(function() {
    $( "#dob" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#idIssue" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#idExpiry" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Executive Housing Cooperative Society</a>
        </div>
          
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('welcome/profile','Profile'); ?></li>
            <li><?php echo anchor('welcome/logout','Log Out'); ?></li>
          </ul>
          
        </div>
      </div>
    </div>