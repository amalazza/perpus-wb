<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
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
				<?php if (empty($this->oKatalog)): ?>
					<p class="error">Post Data Not Found!</p>
				<?php else: ?>
                  <form class="form-validate form-horizontal " enctype="multipart/form-data" role="form" method="post" action="">
                    <div class="form-group ">
                      <label for="no_katalog" class="control-label col-lg-2">No Katalog <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_katalog" name="no_katalog" type="text" value="<?=$this->oKatalog->no_katalog?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="no_klasifikasi" class="control-label col-lg-2">Nama Klasifikasi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select id="searchKlasifikasi" class="form-control m-bot15" name="klasifikasi">
						<option value="" selected="" disabled="">--Klasifikasi Buku--</option>
						<?php foreach ($this->oKlasifikasi as $oKlasifikasi): ?>
						<option value="<?=$oKlasifikasi->no_klasifikasi?>" <?php if($this->oKatalog->no_klasifikasi == $oKlasifikasi->no_klasifikasi) echo 'selected="selected"'?>><?=$oKlasifikasi->no_klasifikasi?> - <?=$oKlasifikasi->nama_klasifikasi?></option>
						<?php endforeach ?>
						</select>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="no_koleksi" class="control-label col-lg-2">Jenis Koleksi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchKoleksi" name="koleksi">
						<option value="" selected="" disabled="">--Jenis Koleksi Buku--</option>
						<?php foreach ($this->oKoleksi as $oKoleksi): ?>
						<option value="<?=$oKoleksi->no_koleksi?>" <?php if($this->oKatalog->no_koleksi == $oKoleksi->no_koleksi) echo 'selected="selected"'?>><?=$oKoleksi->no_koleksi?> - <?=$oKoleksi->jenis_koleksi?></option>
						<?php endforeach ?>
						</select>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="jenis_katalog" class="control-label col-lg-2">Jenis Buku <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" id="searchJenisKatalog" name="jenis_katalog" onchange="showEbook(this)">
						<option value="" selected="" disabled="">--Jenis Buku--</option>
						<option value="Buku Fisik" <?php if($this->oKatalog->jenis_katalog == "Buku Fisik") echo 'selected="selected"'?>>Buku Fisik</option>
						<option value="E-Book" <?php if($this->oKatalog->jenis_katalog == "E-Book") echo 'selected="selected"'?>>E-book</option>
						<option value="Buku Fisik dan E-Book" <?php if($this->oKatalog->jenis_katalog == "Buku Fisik dan E-Book") echo 'selected="selected"'?>>Buku Fisik dan E-book</option>
						</select>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="judul" class="control-label col-lg-2">Judul <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="judul" name="judul" type="text" value="<?=$this->oKatalog->judul?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="pengarang" class="control-label col-lg-2">Pengarang <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="pengarang" name="pengarang" type="text" value="<?=$this->oKatalog->pengarang?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="penerbit" class="control-label col-lg-2">Penerbit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="penerbit" name="penerbit" type="text" value="<?=$this->oKatalog->penerbit?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="kota_terbit" class="control-label col-lg-2">Kota Terbit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="kota_terbit" name="kota_terbit" type="text" value="<?=$this->oKatalog->kota_terbit?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="tahun_terbit" class="control-label col-lg-2">Tahun Terbit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="tahun_terbit" name="tahun_terbit" type="text" value="<?=$this->oKatalog->tahun_terbit?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="isbn" class="control-label col-lg-2">ISBN <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="isbn" name="isbn" type="text" value="<?=$this->oKatalog->isbn?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="lokasi" class="control-label col-lg-2">Lokasi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="lokasi" name="lokasi" type="text" value="<?=$this->oKatalog->lokasi?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="abstrak" class="control-label col-lg-2">Abstrak <span class="required">*</span></label>
                      <div class="col-lg-10">
						<textarea class=" form-control" name="abstrak"><?=$this->oKatalog->absktrak?></textarea>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="e_book" class="control-label col-lg-2">E-book <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="e_book" name="e_book" type="file" />
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="cover" class="control-label col-lg-2">Cover <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="cover" name="cover" type="file" onchange='readURL(this);'/>
						<br>
						<?php
                                    if (empty($_FILES)){
                                        echo "<img id='blah' class='card-img-top' style='height: 100px; width: 100px;' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oKatalog->cover))."'/>";
                                    }
                                    else if (! empty($_FILES)){
                                    echo "<img id='blah'/>";}
						?>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="stok" class="control-label col-lg-2">Stok <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="stok" name="stok" type="text" value="<?=$this->oKatalog->stok?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="edit_submit" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
		<?php endif; ?>
        <!-- page end-->
    
<!--search dropdown-->
  <script type="text/javascript">
  $("#searchKoleksi").chosen();
  $("#searchKlasifikasi").chosen();
  $("#searchJenisKatalog").chosen();
  
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(500)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
  
<?php require 'inc/footer.php' ?>