<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar" src="<?=ROOT_URL?>static/img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Perpustakaan Online Wira Buana</h1>


    </div>
  </header>



    <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">BUKU/ KATALOG</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oBuku as $oBuku): ?>
          <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
            <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                <div class="portfolio-item-caption-content text-center text-white" >
                  <h3><?=$oBuku->judul?></h3>
                  <h4><?=$oBuku->pengarang?></h4>
                  <!-- <h4><?=$oBuku->klasifikasi?></h4> -->
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <!-- <img class="img-fluid" src="<?=ROOT_URL?>static/img/cover_buku.png" alt=""> -->
              <div style="max-height: 100%; max-width: 100%">
              <?php echo "<img class='img-fluid' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
              
            </div>
              <br>
              <input type="submit" class="btn btn-primary center" style="background-color: #2c3e50; color: white; border-color: white;" value="<?=$oBuku->jenis_katalog?>" id="jenis_katalog"/>
            </div>
          </a>
          <?php endforeach ?>
          <?php endif ?>

    </div>
  </section>

<?php require 'inc/footer.php' ?>