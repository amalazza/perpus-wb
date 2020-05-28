<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
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
                   <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
                  	<div class="form-group ">
                      <label for="nis" class="control-label col-lg-2">NIS <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchNIS" name="nis">
            <option value="" selected="" disabled="">--nomor induk siswa--</option>
            <?php foreach ($this->oNIS as $oNIS): ?>
            <option value="<?=$oNIS->nis?>"><?=$oNIS->nis?></option>
            <?php endforeach ?>
            </select>
                      </div>
                    </div>
                    <input type="hidden" name="nAnggota" id="nAnggota" value="<?=$oNIS->nis?>">
          <div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" value="" id="nama" name="nama" type="text" readonly="true" />
                      </div>
                    </div>
          <div class="form-group ">
                      <label for="kelas" class="control-label col-lg-2">Kelas <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="kelas" name="kelas" type="text" readonly="true"  />
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
                      <center>
                        <input type="submit" name="add_submit" value="Submit" class="btn btn-primary"/> 
                        <br><br>
                        <p>Sudah Punya Akun? Masuk <a href="<?=ROOT_URL?>?p=anggota&a=login">Disini</a>
                      </center>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
<script type="text/javascript">
  //search dropdown
  $("#searchNIS").chosen();
  //autofill input
  
  $("#searchNIS").on('change', function(){
    var nis = $("#searchNIS").val();
      $.ajax({
        url: 'http://localhost/perpus-wb/anggota/?p=anggota&a=dropdown',
        data: {nis:nis},
        method:'post',
        dataType: 'json'
      }).done(function(Data){
        //console.log(Data);
        $('#nama').val(Data.nama);
        $('#kelas').val(Data.kelas);
      });
  });
  
  //nomor telepon hanya menerima angka
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
  </script>
    <!-- </div>
  </section> -->

<?php require 'inc/footer.php' ?>