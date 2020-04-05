<?php require 'inc/msg.php' ?>
<?php require 'inc/header.php' ?>
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

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>No Anggota</label>
                <input class="form-control" type="text" placeholder="No Anggota" required="required" name="no_anggota" id="no_anggota">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Password" required="required" name="password" id="password">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div class="form-group">
              <center>
                <button type="submit" class="btn btn-primary btn-xl" name="btnLoginku" id="btnLoginku">Login</button>
                <br><br>
                <p>Belum Punya Akun? Daftar <a href="<?=ROOT_URL?>?p=anggota&a=daftar">Disini</a>
              </center>
            </div>
          </form>
        </div>
      </div>
</div>
</section>
<?php require 'inc/footer.php' ?>

