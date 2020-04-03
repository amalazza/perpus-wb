<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>   
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <?php if (empty($this->oData)): ?>
            <?php else: ?>
            <?php $dataku = $this->oData; ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
             <div class="count"><?=$dataku?></div>
              <div class="title">Jumlah Anggota</div>
            </div>
            <!--/.info-box-->
          </div>
          <?php endif ?>
          <!--/.col-->

          <?php if (empty($this->oDataKun)): ?>
            <?php else: ?>
            <?php $dataku2 = $this->oDataKun; ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count"><?=$dataku2?></div>
              <div class="title">Jumlah Kunjungan</div>
            </div>
            <!--/.info-box-->
          </div>
          <?php endif ?>
          <!--/.col-->

          <?php if (empty($this->oDataKat)): ?>
            <?php else: ?>
            <?php $dataku3 = $this->oDataKat; ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count"><?=$dataku3?></div>
              <div class="title">Jumlah Katalog</div>
            </div>
            <!--/.info-box-->
          </div>
          <?php endif ?>
          <!--/.col-->

        </div>
        <!--/.row-->
      </section>
    </section>
<?php require 'inc/footer.php' ?>