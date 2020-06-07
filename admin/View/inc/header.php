<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title><?=\TestProject\Engine\Config::SITE_NAME?></title>

  <link rel="shortcut icon" type="image/x-icon" href="<?=ROOT_URL?>static/img/favicon.ico">
  
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

  <style type="text/css">
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
  </style>

  <script>
   $(function(){
    $("#searchAnggota").change(function(){
      var dis =$("#searchAnggota option:selected").text();
      var convert = dis.split("- ");
      $("#nAng").val(convert[1]);
    })
   }) 
  </script>

  </head>
  <body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <header class="birufooterrwb header dark-bg">
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
              
              <li class="eborder-top" id="my" name="my">
                <a href="<?=ROOT_URL?>?p=Admincrud&amp;a=my_profile"><i class="icon_profile"></i> PROFILE SAYA</a>
              </li>
              <li>
              	<?php if (!empty($_SESSION['is_logged'])): ?>
                <a href="<?=ROOT_URL?>?p=admin&amp;a=logout" style="color: #fff; border-bottom: none !important; text-transform: uppercase; background-color: #15305b !important;"><i class="icon_key_alt"></i> Keluar</a>
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
      <div id="sidebar" class="nav-collapse" style="background-color: #294a70;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" >
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
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=Admincrud&amp;a=p_admin">Admin</a></li>
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=anggota&amp;a=anggota">Anggota</a></li>
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=kunjungan&amp;a=kunjungan">Kunjungan</a></li>
            </ul>
          </li>
          <li class="sub-menu ">
            <a href="javascript:;" class="">
              <i class="icon_documents_alt"></i>
              <span>Buku</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=koleksi&amp;a=koleksi">Koleksi</a></li>
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=klasifikasi&amp;a=klasifikasi"><span>Klasifikasi</span></a></li>
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=katalog&amp;a=katalog"><span>Katalog</span></a></li>
            </ul>
          </li>
          <li class="sub-menu ">
            <a href="javascript:;" class="">
              <i class="icon_documents_alt"></i>
              <span>Transaksi</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
  		        <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=pemesanan">Pemesanan</a></li>
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=peminjaman">Peminjaman</a></li>
              <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=tblPengembalian"><span>Pengembalian</span></a></li>
        		  <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=infoPerpanjangan"><span>Info Perpanjangan</span></a></li>
        		  <li style="background-color: #294a70;"><a class="" href="<?=ROOT_URL?>?p=transaksi&amp;a=infoDenda"><span>Info Denda</span></a></li>
            </ul>
          </li>
          <li class="">
            <a class="" href="<?=ROOT_URL?>?p=dashboard&amp;a=about">
              <i class="icon_house_alt"></i>
              <span>About</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

