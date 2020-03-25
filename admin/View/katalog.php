<?php require 'inc/header.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Katalog</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Buku</li>
          <li><i class="fa fa-square-o"></i>Katalog</li>
        </ol>
      </div>
    </div>
	
	<div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Buku Baru
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=katalog&amp;a=add'" class="btn btn-primary">Tambah Buku Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tabel Buku
          </header>

          <?php if (empty($this->oKatalog)): ?>
            <?php else: ?> 
  
          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No Katalog</th>
                <th>Klasifikasi </th>
                <th>Koleksi</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Kota Terbit</th>
				<th>Tahun Terbit</th>
				<th>ISBN</th>
				<th>lokasi</th>
				<th>abstrak</th>
				<th>Tanggal Masuk</th>
				<th>e-book</th>
				<th>cover</th>
				<th>stok</th>
                <th>Action</th>
              </tr> 
			  
              <?php foreach ($this->oKatalog as $oKatalog): ?>
              <tr>
                <td><?=htmlspecialchars($oKatalog->no_katalog)?></td>
                <td><?=$oKatalog->no_klasifikasi?></td>
                <td><?=$oKatalog->no_koleksi?></td>
				<td><?=$oKatalog->judul?></td>
				<td><?=$oKatalog->pengarang?></td>
				<td><?=$oKatalog->penerbit?></td>
				<td><?=$oKatalog->kota_terbit?></td>
				<td><?=$oKatalog->tahun_terbit?></td>
				<td><?=$oKatalog->isbn?></td>
				<td><?=$oKatalog->lokasi?></td>
				<td><?=$oKatalog->absktrak?></td>
				<td><?=$oKatalog->tanggal_masuk?></td>
				<td><button class="btn btn-primary" onclick="window.location='<?=ROOT_URL?>?p=katalog&amp;a=view&amp;id=<?=$oKatalog->no_katalog?>'">PDF</button> &nbsp;</td>
				</td>
				<td><div class="activity-body act-in"><?php echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oKatalog->cover))."' width='75' height='75'/>";?></div></td>
                <td><?=$oKatalog->stok ?></td>
				<td>
                  <div class="btn-group">
                    <button class="btn btn-primary" onclick="window.location='<?=ROOT_URL?>?p=katalog&amp;a=edit&amp;id=<?=$oKatalog->no_katalog?>'">Edit</button> &nbsp;
                    <form action="<?=ROOT_URL?>?p=katalog&amp;a=delete&amp;id=<?=$oKatalog->no_katalog?>" method="post" style="display: inline">
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

