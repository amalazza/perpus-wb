<?php require 'inc/msg.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  <title><?=\TestProject\Engine\Config::SITE_NAME?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=ROOT_URL?>static/img/favicon.ico">

  <!-- Bootstrap CSS -->
  <link href="<?=ROOT_URL?>static/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=ROOT_URL?>static/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=ROOT_URL?>static/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=ROOT_URL?>static/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?=ROOT_URL?>static/css/style.css" rel="stylesheet">
  <link href="<?=ROOT_URL?>static/css/style-responsive.css" rel="stylesheet" />

  <style type="text/css">
    .tombolbirufooterrwb { 
      background-color: #15305b;
      color: white; 
      border-color: white;
    }
    .birufooterrwb { 
      color: #15305b;
    }
  </style>

</head>

<body class="login-img3-body" style="background: url('<?=ROOT_URL?>static//img/bg-4.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

  <div class="container">
    <form class="login-form" action="" method="post">
      <div class="login-wrap">
        <h1><center>Login Admin</h1>
        <p class="login-img" style="color: #15305b;"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="username" id="username">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
        </div>
        <button id="btnLogin" name="btnLogin" class="tombolbirufooterrwb btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
    <br>
    <section class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright © IT Development SMP-SMK Wira Buana - Proudly powered by WB-Technopark</small>
      </div>
    </section>
  </div>


</body>

</html>

