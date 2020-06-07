<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Tambah Peminjaman</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Transaksi</li>
              <li><i class="fa fa-files-o"></i>Peminjaman</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Peminjaman
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
				  <?php if (empty($this->oPesan)): ?>
				  
					<div class="form-group ">
                      <label for="no_anggota" class="control-label col-lg-2">Anggota <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchNIS" name="no_anggota">
						<option value="" selected="" disabled="">--Anggota--</option>
						<?php foreach ($this->oNIS as $oNIS): ?>
						<option value="<?=$oNIS->no_anggota?>"><?=$oNIS->no_anggota?> - <?=$oNIS->nama?></option>
						<?php endforeach ?>
						</select>
                      </div>
                      <input type="text" id="pesan" name="pesan" value="tidak" >
                    </div>
					<div class="form-group ">
                      <label for="katalog" class="control-label col-lg-2">Katalog <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchKatalog" name="no_katalog" onchange="getJudul()">
						<option value="" selected="" disabled="">--Katalog--</option>
						<?php foreach ($this->oKatalog as $oKatalog): ?>
						<option value="<?=$oKatalog->no_katalog?>"><?=$oKatalog->no_katalog?> - <?=$oKatalog->judul?></option>
						<?php endforeach ?>
						</select>
                      </div>
                    </div>
					
				  <?php else: ?>
					<div class="form-group ">
                      <label for="anggota" class="control-label col-lg-2">Anggota<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_anggota" name="no_anggota" type="text" value="<?=$this->oPesan->no_anggota?>" readonly="true"/>
                      </div>
                    </div>
                    <input type="text" id="pesan" name="pesan" value="pesan" >
					<div class="form-group ">
                      <label for="katalog" class="control-label col-lg-2">Katalog<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_katalog" name="no_katalog" type="text" value="<?=$this->oPesan->no_katalog?>" readonly="true"/>
                      </div>
                    </div>
				  <?php endif; ?>
				  
                    
					<div class="form-group ">
                      <label for="tgl_pinjam" class="control-label col-lg-2">Tanggal Peminjaman <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="tgl_pinjam" name="tgl_pinjam" type="text" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d');?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
          <input type="hidden" name="jdl" id="jdl" value="" style="width: 300px;">
                      <label for="batas_kembali" class="control-label col-lg-2">Batas Pengembalian <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <?php
                            $tanggalSekarang = date('Y-m-d');
                            $newTanggalSekarang=strtotime($tanggalSekarang);

                            $jumlahHari=$this->oPerpjg->hari;
                            $NewjumlahHari=86400*$jumlahHari;

                            $hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
                            $tampilHasil=date("Y-m-d",$hasilJumlah);
                        ?>
                        <input class=" form-control" id="batas_kembali" name="batas_kembali" type="text" value="<?php echo $tampilHasil; ?>" readonly="true"/>
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
        
  <script type="text/javascript">
  //search dropdown
  $("#searchNIS").chosen();
  $("#searchKatalog").chosen();
  
  //autofill input
  
  $("#searchKatalog").on('change', function(){
	  var nis = $("#searchNIS").val();
	  var katalog = $("#searchKatalog").val();
		  $.ajax({
			  url: 'http://localhost/perpus-wb/admin/?p=transaksi&a=dropdown',
			  data: {nis:nis, katalog:katalog},
			  method:'post',
			  dataType: 'json'
		  }).done(function(Data){
			  if (Data.no_peminjaman == null){
				 
			  }
			  else{
			  alert("Buku yang ingin dipinjam belum dikembalikan, harap kembalikan buku terlebih dahulu");
			  window.history.back();}
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

  <script type="text/javascript">
   function getJudul() {
  var tes = document.getElementById("searchKatalog").value;
        document.getElementById("jdl").value=tes;
  }
</script>

<?php require 'inc/footer.php' ?>
