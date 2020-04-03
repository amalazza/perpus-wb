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
          <?php if (empty($this->oDashboardAnggota)): ?>
            <?php else: ?>
            <?php $oDashboardAnggota = $this->oDashboardAnggota; ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
             <!--  <div class="count"><?=$oDashboardAnggota->total?></div> -->
              <div class="title">Jumlah Anggota</div>
            </div>
            <!--/.info-box-->
            <?php endif ?>
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <?php  if (empty($this->oDashboardAnggota)): 
              echo $this->oDashboardAnggota->total;?>
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
            <?php else: 
            echo $this->oDashboardAnggota->total;?>
            <?php endif ?>
              <div class="count">7.538</div>
              <div class="title">Jumlah Kunjungan</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count">4.362</div>
              <div class="title">Jumlah Katalog</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->
      </section>
    </section>
<?php require 'inc/footer.php' ?>