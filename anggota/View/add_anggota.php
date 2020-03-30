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

 <!-- Form validations -->
   <!-- Contact Section -->
  <section class="page-section" id="contact" style="background-color: white">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Daftar</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " enctype="multipart/form-data" role="form" method="post" action="">
                  	<div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nomor Anggota <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="" id="no_anggota" name="no_anggota" type="text"/>
                      </div>
                    </div>
                    <!-- <div class="form-group ">
                      <label for="nis" class="control-label col-lg-2">NIS <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchNIS" name="nis">
						<option value="" selected="" disabled="">--nomor induk siswa--</option>
						<?php foreach ($this->oNIS as $oNIS): ?>
						<option value="<?=$oNIS->nis?>"><?=$oNIS->nis?></option>
						<?php endforeach ?>
						</select>
                      </div>
                    </div> -->
					<div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="" id="nama" name="nama" type="text"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="kelas" class="control-label col-lg-2">Kelas <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="kelas" name="kelas" type="text"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="alamat" class="control-label col-lg-2">Alamat <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="alamat" name="alamat" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="no_telpon" class="control-label col-lg-2">No. Telepon <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_telpon" name="no_telpon" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="password" />
                      </div>
                    </div>
                    <!-- <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                      </div>
                    </div> -->
					<div class="form-group ">
                      <label for="foto" class="control-label col-lg-2">Foto Profil <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="foto" name="foto" type="file" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="add_submit" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->

    </div>
  </section>

<?php require 'inc/footer.php' ?>