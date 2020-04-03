<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Tambah Kunjungan</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Input Kunjungan</li>
        </ol>
      </div>
    </div>

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Input Data Kunjungan
      </header>
      <div class="panel-body">

		<form class="form-inline" role="form" action="" method="post">

      <div class="form-group ">
          <label for="no_anggota" class="control-label col-lg-8">Nomor-Nama Anggota <span class="required">*</span></label>
            <div class="col-lg-10">
                <select id="searchAnggota" class="form-control m-bot15" name="anggota">
                  <?php foreach ($this->oAnggota as $oAnggota): ?>
                  <option value="<?=$oAnggota->no_anggota?>"><?=$oAnggota->no_anggota?> - <?=$oAnggota->nama?></option>
                  <?php endforeach ?>
                </select>
            </div>
      </div>

		    <!-- <p><label  class="sr-only" for="no_anggota">No Anggota:</label><br />
		        <input class="form-control" type="text" name="no_anggota" id="no_anggota" required="required" />
		    </p>
 -->
		    <p><input type="submit" name="add_submit" value="Submit" class="btn btn-primary"/></p>
		</form>

      </div>
    </section>

  </div>
</div>

<?php require 'inc/footer.php' ?>
