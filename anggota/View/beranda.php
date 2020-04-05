<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>


<div>
    <header class="masthead text-white text-center" style="opacity: 100%; background-image: url(<?=ROOT_URL?>static/1.jpg); position: relative; margin-top: -55px;">
    <div class="container align-items-center">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar" style=" height: 120px; width:200px;" src="<?=ROOT_URL?>static/bukup.png" alt="">
      <br>
      <!-- Masthead Heading -->
      <h1 class="masthead-heading mb-0"><b>Perpustakaan Online Wira Buana</b></h1>
      <h3 style="margin-top: 7px;"><b><i>SMK WIRA BUANA 1 | SMK WIRA BUANA 2</i></b></h3>

    </div>
  </header>

    <section class="page-section portfolio" id="portfolio" style="margin-top: -20px;">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-secondary mb-0"><b>About</b></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row text-center ">
          <h4  style="font-size: 23px;">SMP Wirabuana Adalah Sekolah yang menjadikan kedisiplinan dan pengembangan karakter yang bernuansa agamis untuk menyiapkan para generasi muda indonesia yang mandiri, kreatif, santun dan agamis. Didukung sarana dan prasarana yang lengkap dan mumpui serta tenaga pendidik yang propesonal agar menjadikan SMP Wirabuana mendapatkan Akreditasi A semenjak tahun 2010 sampai sekarang.</h4>
      </div>
      </div>
  </section>

  <section class="page-section portfolio" id="portfolio" style="margin-top: -20px;">
    <div class="container">
<!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-secondary mb-0">Buku Baru</h2>

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
        $potong = substr($oBuku->absktrak, 0, 250) . '...';
         ?>
          <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
            <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                <div class="portfolio-item-caption-content text-center text-white" >
                  <h3><b><?=$oBuku->judul?></b></h3>
                  <h4><?php echo $potong; ?></h4>
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <div style="max-height: 100%; max-width: 100%">
              <?php echo "<img style='height:300px;' class='img-fluid' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
              <p style="font-size: 20px;"><?=$oBuku->judul?></p>
              <p><?=$oBuku->tahun_terbit?></p>
            </div>
              <button class="btn btn-primary center" style="background-color: #2c3e50; color: white; border-color: white; float:"><?=$oBuku->jenis_katalog?></button>
            </div>
          </a>
          <?php endforeach ?>
          <?php endif ?>
          </div>

    </div>
  </section>

<?php require 'inc/footer.php' ?>

