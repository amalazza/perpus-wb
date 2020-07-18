<?php

?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=\TestProject\Engine\Config::SITE_NAME?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?=ROOT_URL?>static/img/favicon.ico">

  <!-- slider -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Custom fonts for this theme -->
  <link href="<?=ROOT_URL?>static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="<?=ROOT_URL?>static/css/freelancer.min.css" rel="stylesheet">
    <link href="<?=ROOT_URL?>static/css/styleku.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
  <link href="<?=ROOT_URL?>static/other/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=ROOT_URL?>static/other/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=ROOT_URL?>static/other/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=ROOT_URL?>static/other/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?=ROOT_URL?>static/other/css/style.css" rel="stylesheet">
  <link href="<?=ROOT_URL?>static/other/css/style-responsive.css" rel="stylesheet" />
  <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--jquery UI-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>  
  <!--bootstrap js-->
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- filter -->

  <!-- chosen jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script>
     $(function(){
      $("#searchAnggota").change(function(){
        var dis =$("#searchAnggota option:selected").text();
        var convert = dis.split("- ");
        $("#nAng").val(convert[1]);
      })
     }) 
    </script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
<style>
.dropbtn {
  background-color: #12876f;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 15px;
  height: 50px;
  text-align: center;
  -webkit-border-radius: 20%;
  padding-bottom: 5px;
  text-align-last:center;
}

.show {
  display: block;
}
.filterDiv {
  text-align: center;
  display: none;
}

.birunavbarwb { 
  background-color: #294a70;
}

.birutopheadwb { 
  background-color: #49688e;
}

.birufooterrwb { 
  background-color: #15305b;
}

.orangewb { 
  background-color: #f4a024;
}

.tombolbirunavbarwb { 
  background-color: #294a70;
  color: white; 
  border-color: white;
}

.tombolbirutopheadwb { 
  background-color: #49688e;
  color: white; 
  border-color: white;
}

.tombolbirufooterrwb { 
  background-color: #15305b;
  color: white; 
  border-color: white;
}

.tombolorangewb { 
  background-color: #f4a024;
  color: white; 
  border-color: white;
}

.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}

select{
  appearance:none;
  -webkit-appearance:none;
  -moz-appearance:none;
}

@media (min-width: 360px) {
  .container {
    max-width: 350px;
  }
  .kotak{
    width: 100%;
  }
  .profile-ava{
    font-size: 12px;
  }
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
  .kotak{
    width: 50%;
  }
  .dropbtn{
      width: 25%;
  }
  .profile-ava{
    font-size: 10px;
  }
  .profile-ava{
    font-size: 15px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
  .kotak{
    width: 33%;
  }
  .dropbtn{
      width: 18%;
  }
  .profile-ava{
    font-size: 15px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
  .kotak{
    width: 25%;
  }
  .dropbtn{
      width: 12%;
  }
  .profile-ava{
    font-size: 15px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
  .kotak{
    width: 25%;
  }
  .dropbtn{
      width: 10%;
  }
  .profile-ava{
    font-size: 17px;
  }
}


</style>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg text-uppercase fixed-top birufooterrwb" id="mainNav" style="margin: 0">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?=ROOT_URL?>?p=beranda&amp;a=index">Perpus WB</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=beranda&amp;a=about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=buku&amp;a=buku">Buku</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=buku&amp;a=ebook">E-book</a>
          </li>
          
          <li class="nav mx-0 mx-lg-1">
              <form action="http://localhost/perpus-wb/anggota/?p=Buku&a=search" method="post" class="form-inline mr-auto ">
                
                  <input class="form-control" type="text" name="search" id="search" placeholder="Search Judul ..." aria-label="Search">
                  <button href="#!" class="tombolbirufooterrwb btn btn-primary btn-md my-0 ml-sm-2" style="color: white;" type="submit">Search</button>
              </form>
          </li>
          
        </ul>
        <div class="top-nav notification-row collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto navbar-right pull-right top-menu">
            <li class="nav-item mx-0 mx-lg-1 dropdown">
              <?php if (!empty($_SESSION['is_logged'])): ?>
              <a data-toggle="dropdown" class="dropdown-toggle nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#">
                <span class="username" style="color: #ffffff">
                    <?php echo $_SESSION['nama']." || ".$_SESSION['kelas'];?>
                </span>
              </a>
              <ul class="dropdown-menu extended logout" >
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a  href="<?=ROOT_URL?>?p=anggota&amp;a=profile"><i class="icon_profile"></i> Profile Saya</a>
                </li>
                <li>
                  <a  href="<?=ROOT_URL?>?p=anggota&amp;a=logout"  style="color: #fff; border-bottom: none !important; text-transform: uppercase; background-color: #15305b !important;"><i class="icon_key_alt"></i> Keluar</a>
                </li>
              </ul>
            </li>
              <?php else: ?>
                <a href="<?=ROOT_URL?>?p=anggota&amp;a=login" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Login</a>
              <?php endif ?>
          </ul>
        </div>

      </div>
    </div>
  </nav>
