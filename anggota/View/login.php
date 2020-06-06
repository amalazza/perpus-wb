<?php require 'inc/msg.php' ?>
<?php require 'inc/header.php' ?>
<?php require 'inc/header_gambar.php' ?>
<div>

  <section class="page-section portfolio" id="portfolio" style="margin-top: -9%;">

    <div class="container">
      <form class="login-form" action="" method="post" style="margin: auto;">
        <div class="login-wrap">
         <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
         <br>
          <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <input type="text" class="form-control" placeholder="No Anggota" autofocus name="no_anggota" id="no_anggota">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password">
          </div>
          <button name="btnLoginku" id="btnLoginku" class="tombolbirufooterrwb btn btn-primary btn-lg btn-block" type="submit">Login</button>
          <br><br>
                <p style="color: #2c3e50cf;">Belum Punya Akun? Daftar <a href="<?=ROOT_URL?>?p=anggota&a=daftar"><u>Disini</u></a>
        </div>
      </form>
    </div>
   
</section>
<?php require 'inc/footer.php' ?>

