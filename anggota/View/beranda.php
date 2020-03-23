<?php require 'inc/header.php' ?>


    <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>

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
        <?php if (empty($this->oBeranda)): ?>
        <?php else: ?>
            

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota *nanti</th>
              </tr>
              <?php foreach ($this->oBeranda as $oBeranda): ?>
              <tr>
                <td><?=htmlspecialchars($oBeranda->no_anggota)?></td>
                <td><?=$oBeranda->nama?></td>               
              </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>

    </div>
  </section>


    
<?php endif ?>
<?php require 'inc/footer.php' ?>

