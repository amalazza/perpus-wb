<?php

?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=\TestProject\Engine\Config::SITE_NAME?></title>

  <!-- Custom fonts for this theme -->
  <link href="<?=ROOT_URL?>static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="<?=ROOT_URL?>static/css/freelancer.min.css" rel="stylesheet">

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
}

.show {
  display: block;
}
.filterDiv {
  text-align: center;
  display: none;
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
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" style="margin: 0">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?=ROOT_URL?>?p=beranda&amp;a=index">Perpus WB</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=buku&amp;a=buku">Buku</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=buku&amp;a=ebook">E-book</a>
          </li>
          <li class="nav mx-0 mx-lg-1">
              <form action="http://localhost/perpus-wb/anggota/?p=Buku&a=search" method="post" class="form-inline mr-auto ">
                
                  <input class="form-control" type="text" name="search" id="search" placeholder="Search Judul ..." aria-label="Search">
                  <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" style="background-color: #2c3e50; color: white; border-color: white;" type="submit">Search</button>
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
                  <a  href="<?=ROOT_URL?>?p=anggota&amp;a=logout"  style="color: #fff; border-bottom: none !important; text-transform: uppercase; background-color: #2c3e50 !important;"><i class="icon_key_alt"></i> Keluar</a>
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
