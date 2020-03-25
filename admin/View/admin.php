<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Admin</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Admin</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tambah Admin
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=Admincrud&amp;a=add'" class="btn btn-primary">Tambah Admin Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tabel Admin
          </header>

          <?php if (empty($this->oAdd_Admin)): ?>
            <?php else: ?>
            

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>Profile</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Tlp</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oAdd_Admin as $oAdd_Admin): 

              $potong = substr($oAdd_Admin->alamat, 0, 25) . '...';
              ?>
              <tr>
                <td><img src="data:image/jpeg;base64,<?=base64_encode($oAdd_Admin->foto); ?>" width="100"/></td>
                <td><?=$oAdd_Admin->nama?></td>
                <td><?=htmlspecialchars($oAdd_Admin->username)?></td>
                <td><?=$oAdd_Admin->email?></td>
                <td><?=$oAdd_Admin->notlp?></td>
                <td><?php echo $potong; ?></td>
                <td>
                  <div class="btn-group">
                    <!-- <button class="btn btn-primary" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=edit&amp;id=<?=$oKunjungan->no_kunjungan?>'">Edit</button> &nbsp; -->
                    <form action="<?=ROOT_URL?>?p=Admincrud&amp;a=edit&amp;id=<?=$oAdd_Admin->id_admin?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="edit" value="1" >edit</button>
                    </form>
                    <form action="<?=ROOT_URL?>?p=Admincrud&amp;a=delete&amp;id=<?=$oAdd_Admin->id_admin?>" method="post" style="display: inline">
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
<?php endif ?>
<?php require 'inc/footer.php' ?>