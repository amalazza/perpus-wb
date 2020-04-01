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


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" style="margin: 0">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?=ROOT_URL?>">Perpus WB</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=buku&amp;a=index">Buku</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?=ROOT_URL?>?p=buku&amp;a=ebook">E-book</a>
          </li>
        </ul>

        <div class="top-nav notification-row collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto navbar-right pull-right top-menu">
            <li class="nav-item mx-0 mx-lg-1">
              <form class="form-inline ml-auto">
                <div class="md-form my-0">
                  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
                <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit"></button>
              </form>
            </li>
            <li class="nav-item mx-0 mx-lg-1 dropdown">
              <?php if (!empty($_SESSION['is_logged'])): ?>
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                    <img alt="" src="<?=ROOT_URL?>static/img/avatar1_small.jpg">
                </span>
                <span class="username">
                  Jenifer Smith
                </span>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a  href="<?=ROOT_URL?>?p=anggota&amp;a=profile"><i class="icon_profile"></i> Profile Saya</a>
                </li>
                <li>
                  <a  href="<?=ROOT_URL?>?p=anggota&amp;a=logout"><i class="icon_key_alt"></i> Keluar</a>
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
