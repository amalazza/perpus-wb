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
            

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota *nanti</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oBuku as $oBuku): ?>
              <tr>
                <td><?=htmlspecialchars($oBuku->no_katalog)?></td>
                <td><?=$oBuku->judul?></td>
                <td><a href="<?=ROOT_URL?>?p=detail&amp;a=view&amp;id=<?=$oBuku->no_katalog?>">Want to see more?</a> 
                
              </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>

    </div>
  </section>


    
<?php endif ?>
<?php require 'inc/footer.php' ?>

