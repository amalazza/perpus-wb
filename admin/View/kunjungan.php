<?php require 'inc/header.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Kunjungan</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Kunjungan</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Input Kunjungan
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=add'" class="btn btn-primary">Input Kunjungan Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tabel Kunjungan
          </header>

          <?php if (empty($this->oKunjungan)): ?>
            <?php else: ?>
            

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota</th>
                <th>Waktu Kunjungan</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oKunjungan as $oKunjungan): ?>
              <tr>
                <td><?=htmlspecialchars($oKunjungan->no_anggota)?></td>
                <td><?=$oKunjungan->nama?></td>
                <td><?=$oKunjungan->waktu_kunjungan?></td>
                <td>
                  <div class="btn-group">
                    <!-- <button class="btn btn-primary" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=edit&amp;id=<?=$oKunjungan->no_kunjungan?>'">Edit</button> &nbsp; -->
                    <form action="<?=ROOT_URL?>?p=kunjungan&amp;a=delete&amp;id=<?=$oKunjungan->no_kunjungan?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="delete" value="1" onclick="return confirm('Anda yakin ingin mennghapus data ini?');">Hapus</button>
                    </form>
                  </div>
                </td>                
              </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>
        </section>
      </div>
    </div>
    <!-- page end-->
    
<?php endif ?>
<?php require 'inc/footer.php' ?>

