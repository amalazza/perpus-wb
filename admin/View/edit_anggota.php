<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Tambah Anggota</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Pengguna</li>
              <li><i class="fa fa-files-o"></i>Anggota</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Anggota
              </header>
              <div class="panel-body">
                <div class="form">
				<?php if (empty($this->oAnggota)): ?>
					<p class="error">Post Data Not Found!</p>
				<?php else: ?>
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
                    <div class="form-group ">
                      <label for="no_anggota" class="control-label col-lg-2">No Anggota <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_anggota" name="no_anggota" type="text" value="<?=$this->oAnggota->no_anggota?>" readonly="true"  />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nama" name="nama" type="text" readonly="true" value="<?=$this->oAnggota->nama?>" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="kelas" class="control-label col-lg-2">Kelas <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="kelas" name="kelas" type="text" readonly="true"  value="<?=$this->oAnggota->kelas?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="alamat" class="control-label col-lg-2">Alamat <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="alamat" name="alamat" type="text" value="<?=$this->oAnggota->alamat?>" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="no_telpon" class="control-label col-lg-2">No. Telepon <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_telpon" name="no_telpon" type="text" onkeypress="return isNumber(event)" value="<?=$this->oAnggota->no_telpon?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email" value="<?=$this->oAnggota->email?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="password" />
						<input class="form-control " placeholder="Password" id="Opassword" name="Opassword" type="hidden" value="<?=$this->oAnggota->password?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="foto" class="control-label col-lg-2">Foto Profil <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="foto" name="foto" type="file" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="edit_submit" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
				  <?php endif; ?>
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
			  url: 'http://localhost/perpus-wb/admin/?p=anggota&a=dropdown',
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

<?php require 'inc/footer.php' ?>
