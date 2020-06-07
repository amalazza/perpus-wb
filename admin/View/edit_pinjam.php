<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Perpanjangan Peminjaman</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Transaksi</li>
              <li><i class="fa fa-files-o"></i>Perpanjangan</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Perpanjangan
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
				  <?php if (empty($this->oPerpanjang)): ?>
					
				  <?php else: ?>
					<div class="form-group ">
                      <label for="no_peminjaman" class="control-label col-lg-2">No. Peminjaman<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_peminjaman" name="no_peminjaman" type="text" value="<?=$this->oPerpanjang->no_peminjaman?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="anggota" class="control-label col-lg-2">Anggota<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_anggota" name="no_anggota" type="text" value="<?=$this->oPerpanjang->no_anggota?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="katalog" class="control-label col-lg-2">Katalog<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_katalog" name="no_katalog" type="text" value="<?=$this->oPerpanjang->no_katalog?>" readonly="true"/>
                      </div>
                    </div>
				  <div class="form-group ">
                      <label for="katalog" class="control-label col-lg-2">Perpanjangan ke<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="perpjg" name="perpjg" type="text" value="<?=$this->oPerpanjang->perpanjangan_ke+1?>" readonly="true"/>
                      </div>
                    </div>
                    
					<div class="form-group ">
                      <label for="tgl_pinjam" class="control-label col-lg-2">Tanggal Peminjaman <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="tgl_pinjam" name="tgl_pinjam" type="text" value="<?=$this->oPerpanjang->tanggal_pinjam?>" readonly="true"/>
                      </div>
                    </div>
					<?php if (empty($this->dataPerpanjang)): ?>
					<?php else: ?>
					<?php if ($this->oPerpanjang->perpanjangan_ke < $this->dataPerpanjang->batas): ?>
					<div class="form-group ">
                      <label for="batas_kembali" class="control-label col-lg-2">Tanggal Pengembalian <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="batas_kembali" name="batas_kembali" type="text" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d', strtotime('+'.$this->dataPerpanjang->hari.' days', strtotime($this->oPerpanjang->batas_kembali)));?>" readonly="true"/>
                      </div>
                    </div>
					<?php else: ?>
					
					<?php endif; ?>
					<?php endif; ?>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="add_submit" value="Submit" class="btn btn-primary"/> 
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
  $("#searchKatalog").chosen();
  
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
