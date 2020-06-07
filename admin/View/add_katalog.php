<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper" style="margin-top: 0px;">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Tambah Katalog</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Buku</li>
              <li><i class="fa fa-files-o"></i>Katalog</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Katalog
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
                    <div class="form-group ">
                      <label for="no_katalog" class="control-label col-lg-2">No Buku <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_katalog" name="no_katalog" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="no_koleksi" class="control-label col-lg-2">Jenis Koleksi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchKoleksi" name="koleksi" required style="width: 50%">
                          <option value="" selected="" disabled="">--Jenis Koleksi Buku--</option>
                          <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                          <option value="<?=$oKoleksi->no_koleksi?>"><?=$oKoleksi->no_koleksi?> - <?=$oKoleksi->jenis_koleksi?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
					         <div class="form-group ">
                      <label for="no_klasifikasi" class="control-label col-lg-2">Nama Klasifikasi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select id="searchKlasifikasi" class="form-control m-bot15" name="klasifikasi" style="width: 50%">
              						<option value="" selected="" disabled="">--Klasifikasi Buku--</option>
              						<?php foreach ($this->oKlasifikasi as $oKlasifikasi): ?>
              						  <option value="<?=$oKlasifikasi->no_klasifikasi?>"><?=$oKlasifikasi->no_klasifikasi?> - <?=$oKlasifikasi->nama_klasifikasi?>
              						<?php endforeach ?>
                          </option>
            						</select>
                      </div>
                    </div>
				          
					<div class="form-group ">
                      <label for="jenis_katalog" class="control-label col-lg-2">Jenis Buku <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchJenisKatalog" name="jenis_katalog" onchange="showEbook(this)" style="width: 50%">
						<option value="" selected="" disabled="">--Jenis Buku--</option>
						<option value="Buku Fisik">Buku Fisik</option>
						<option value="E-Book">E-book</option>
						<option value="Buku Fisik dan E-Book">Buku Fisik dan E-book</option>
						</select>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="judul" class="control-label col-lg-2">Judul <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="judul" name="judul" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="pengarang" class="control-label col-lg-2">Pengarang <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="pengarang" name="pengarang" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="penerbit" class="control-label col-lg-2">Penerbit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="penerbit" name="penerbit" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="kota_terbit" class="control-label col-lg-2">Kota Terbit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="kota_terbit" name="kota_terbit" type="text" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="tahun_terbit" class="control-label col-lg-2">Tahun Terbit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="tahun_terbit" name="tahun_terbit" type="text" onkeypress="return isNumber(event)"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="isbn" class="control-label col-lg-2">ISBN <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="isbn" name="isbn" type="text" />
                      </div>
                    </div>
					<div class="form-group " id="add_lokasi">
                      <label for="lokasi" class="control-label col-lg-2">Posisi Buku <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="lokasi" name="lokasi" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="abstrak" class="control-label col-lg-2">Abstrak <span class="required">*</span></label>
                      <div class="col-lg-10">
						<textarea class=" form-control" id="abstrak" name="abstrak"></textarea>
                      </div>
                    </div>
					<div class="form-group " id="add_stok">
                      <label for="stok" class="control-label col-lg-2">Stok <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="stok" name="stok" type="text" onkeypress="return isNumber(event)"/>
                      </div>
                    </div>
					<div class="form-group " id="add_ebook" style="display:none;">
                      <label for="e_book" class="control-label col-lg-2">E-book <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="e_book" name="e_book" type="file" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="cover" class="control-label col-lg-2">Cover <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="cover" name="cover" type="file" />
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
    
<!--search dropdown-->
  <script type="text/javascript">
  $("#searchKoleksi").chosen();
  $("#searchKlasifikasi").chosen();
  $("#searchJenisKatalog").chosen();
  
  //stok hanya menerima angka
  function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	
	//menampilkan/hide input file ebook sesuai apa yang dipilih pada jenis buku
   function showEbook(select){
   if(select.value== 'E-Book'){
    document.getElementById('add_ebook').style.display = "block";
	document.getElementById('add_lokasi').style.display = "none";
	document.getElementById('add_stok').style.display = "none";
   }
   else if(select.value== 'Buku Fisik dan E-Book'){
    document.getElementById('add_ebook').style.display = "block";
   } 
   else{
    document.getElementById('add_ebook').style.display = "none";
	}}
  </script>
  
<?php require 'inc/footer.php' ?>
