<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=\TestProject\Engine\Config::SITE_NAME?></title>

	  <link rel="shortcut icon" href="img/favicon.png">

	  <title>Blank | Creative - Bootstrap 3 Responsive Admin Template</title>
	  
	  <!-- Bootstrap CSS -->
	  <link href="<?=ROOT_URL?>static/css/bootstrap.min.css" rel="stylesheet">
	  <!-- bootstrap theme -->
	  <link href="<?=ROOT_URL?>static/css/bootstrap-theme.css" rel="stylesheet">
	  <!--external css-->
	  <!-- font icon -->
	  <link href="<?=ROOT_URL?>static/css/elegant-icons-style.css" rel="stylesheet" />
	  <link href="<?=ROOT_URL?>static/css/font-awesome.min.css" rel="stylesheet" />
	  <!-- Custom styles -->
	  <link href="<?=ROOT_URL?>static/css/style.css" rel="stylesheet">
	  <link href="<?=ROOT_URL?>static/css/style-responsive.css" rel="stylesheet" />
	  <!--jquery-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <!--jquery UI-->
	  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
	  
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
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
	  <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	      <script src="js/respond.min.js"></script>
	      <script src="js/lte-ie7.js"></script>
	    <![endif]-->

	    <!-- =======================================================
	      Theme Name: NiceAdmin
	      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
	      Author: BootstrapMade
	      Author URL: https://bootstrapmade.com
	    ======================================================= -->
    </head>
<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a  class="logo">Perpus <span class="lite">WB</span></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            </span>
                            <span class="username">|| <?php echo $_SESSION['nama'].' ('.$_SESSION['role'].')'; ?> ||</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top" id="my" name="my">
                <a href="<?=ROOT_URL?>?p=Admincrud&amp;a=my_profile"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
              	<?php if (!empty($_SESSION['is_logged'])): ?>
                <a href="<?=ROOT_URL?>?p=admin&amp;a=logout"><i class="icon_key_alt"></i> Log Out</a>
                <?php endif ?>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="<?=ROOT_URL?>?p=dashboard&amp;a=all">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_genius"></i>
              <span>Pengguna</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="<?=ROOT_URL?>?p=Admincrud&amp;a=p_admin">Admin</a></li>
              <li><a class="" href="<?=ROOT_URL?>?p=anggota&amp;a=anggota">Anggota</a></li>
              <li><a class="" href="<?=ROOT_URL?>?p=kunjungan&amp;a=kunjungan">Kunjungan</a></li>
            </ul>
          </li>
          <li class="sub-menu ">
            <a href="javascript:;" class="">
              <i class="icon_documents_alt"></i>
              <span>Buku</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="<?=ROOT_URL?>?p=koleksi&amp;a=koleksi">Koleksi</a></li>
              <li><a class="" href="<?=ROOT_URL?>?p=klasifikasi&amp;a=klasifikasi"><span>Klasifikasi</span></a></li>
              <li><a class="" href="<?=ROOT_URL?>?p=katalog&amp;a=katalog"><span>Katalog</span></a></li>
            </ul>
          </li>
          <li class="sub-menu ">
            <a href="javascript:;" class="">
              <i class="icon_documents_alt"></i>
              <span>Transaksi</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
			  <li><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=pemesanan">Pemesanan</a></li>
              <li><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=peminjaman">Peminjaman</a></li>
              <li><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=tblPengembalian"><span>Pengembalian</span></a></li>
            </ul>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

