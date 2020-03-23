<?php require 'inc/header.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Anggota</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Anggota</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Data Siswa
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=anggota&amp;a=addSiswa'" class="btn btn-primary">Upload Data Siswa</button>
          </div>
      </section>
     </div>
    </div>
	
	<div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Anggota Baru
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=anggota&amp;a=add'" class="btn btn-primary">Tambah Anggota Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tabel Anggota
          </header>

          <?php if (empty($this->oAnggota)): ?>
            <?php else: ?>
            

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota</th>
                <th>Kelas</th>
				<th>Email</th>
				<th>No Telp</th>
				<th>Alamat</th>
				<th>Foto</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oAnggota as $oAnggota): ?>
              <tr>
                <td><?=htmlspecialchars($oAnggota->no_anggota)?></td>
                <td><?=$oAnggota->nama?></td>
                <td><?=$oAnggota->kelas?></td>
				<td><?=$oAnggota->email?></td>
				<td><?=$oAnggota->no_telpon?></td>
				<td><?=$oAnggota->alamat?></td>
				<td><div class="activity-body act-in"><?php echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oAnggota->foto))."' width='75' height='75'/>";?></div></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-primary" onclick="window.location='<?=ROOT_URL?>?p=anggota&amp;a=edit&amp;id=<?=$oAnggota->no_anggota?>'">Edit</button> &nbsp;
                    <form action="<?=ROOT_URL?>?p=anggota&amp;a=delete&amp;id=<?=$oAnggota->no_anggota?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="delete" value="1" onclick="return confirm('Anda yakin ingin mennghapus data ingin?');">Hapus</button>
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

