<?php require 'inc/msg.php' ?>
<?php require 'inc/header.php' ?>
<?php require 'inc/header_gambar.php' ?>

<div>

  <section class="page-section portfolio" id="portfolio" style="margin-top: -90px;">
    <div class="container" style=" margin-top: -38px;">
<!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-secondary mb-0"><b>Judul Terbaru</b></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oBuku as $oBuku):
        $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
        $judul = substr($oBuku->judul, 0, 30) . '...';
        $pengarang = substr($oBuku->pengarang, 0, 30);

         ?>
         <div style="text-align: center;" class="kotak">
          <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
            <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%; background: #F8F8F8;">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                <div class="portfolio-item-caption-content text-center text-white" >
                  <h3><b><?=$oBuku->judul?></b></h3>
                  <p style="text-align: justify; text-justify: inter-word; padding: 3%"><?php echo $absktrak; ?></p>
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <div style="text-align: left; max-height: 100%; max-width: 100%; color: #2c3e50cf !important;">
                <div style="text-align: center;">
                  <?php echo "<img style='height:280px; width: 200px; border-radius: 3%;' class='img-fluid shadow' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
                  <p style="font-size: 16px; padding-top: 3%"><?php echo $judul; ?></p>
                  <p><i class="fa fa-user"></i> <?php echo $pengarang; ?> | <i class="fa fa-calendar"></i> <?=$oBuku->tahun_terbit?></p>
                </div>
              </div>
              <button class="btn btn-primary center tombolbirufooterrwb" style="bottom: 0; width: 160px; color: white; border-color: white;"><?=$oBuku->jenis_katalog?></button>
             </div>
          </a>
         </div>
          <?php endforeach ?>
          <?php endif ?>
          <div class="text-center">
            <center>
            <button class="tombolbirufooterrwb btn btn-primary btn-lg btn-block text-center " onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=buku'" style="padding: 10px;">Lihat Koleksi</button></center>
          </div>
        </div>

    </div>
  </section>

  <section class="page-section portfolio" id="portfolio" style="margin-top: -90px;">
    <div class="container">
<!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-secondary mb-0"><b>Judul Favorite</b></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

    </div>
  </section>

<?php require 'inc/footer.php' ?>

