<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

 <!-- Form validations -->
   <!-- Contact Section -->
  <section class="page-section" id="contact" style="background-color: white">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit Profile</h2>

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
            <section class="main-content">
              <div class="panel-body bio-graph-info">
                <div class="form">
				<?php if (empty($this->oAnggota)): ?>
					<p class="error">Post Data Not Found!</p>
				<?php else: ?>
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
                  	<div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nomor Anggota <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_anggota" name="no_anggota" type="text" value="<?=$this->oAnggota->no_anggota?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="<?=$this->oAnggota->nama?>" id="nama" name="nama" type="text"readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="kelas" class="control-label col-lg-2">Kelas <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="<?=$this->oAnggota->kelas?>" id="kelas" name="kelas" type="text" readonly="true"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="alamat" class="control-label col-lg-2">Alamat <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="<?=$this->oAnggota->alamat?>" id="alamat" name="alamat" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="no_telpon" class="control-label col-lg-2">No. Telepon <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="<?=$this->oAnggota->no_telpon?>" id="no_telpon" name="no_telpon" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="<?=$this->oAnggota->email?>" id="email" name="email" type="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="password" value="<?=$this->oAnggota->password?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" value="<?=$this->oAnggota->password?>" />
                      </div>
                    </div>
					<input class="form-control " placeholder="Password" id="Opassword" name="Opassword" type="hidden" value="<?=$this->oAnggota->password?>"/>
					           <div class="form-group ">
                      <label for="foto" class="control-label col-lg-2">Foto Profil <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="foto" name="foto" type="file" />
                      </div>
                    </div>
					<div class="form-group">
                      <center>
                        <input type="submit" name="edit_submit" value="Edit" class="btn btn-primary"/>
                      </center>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
<?php endif; ?>
    </div>
  </section>

<?php require 'inc/footer.php' ?>