<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> My Profile </h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>My Profile</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Data Diri
          </header>

          <?php if (empty($this->oAdd_Admins)): ?>
            <?php else: ?>
            <?php $data = $this->oAdd_Admins;
            $potong = substr($data->alamat, 0, 350) . '...';
             ?>
          <div class="panel-body">
            <img src="data:image/jpeg;base64,<?=base64_encode($data->foto) ?>" width="200" style="float:left; margin-right: 20px;"/>
            <div style="">
            <h4>Nama : <?=$data->nama?></h4>
            <h4>Email : <?=$data->email?></h4>
            <h4>No Telephone : <?=$data->notlp?></h4>
            <div style="max-width: 800px;">
              <h4>Alamat : </h4>
              <h4><?php echo $potong; ?></h4>
            </div>
            </div>
          </div>
          <?php endif ?>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading" style="font-size: 35px;">
            My History 
          </header>

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>Aktifitas</th>
                <th>Tanggal</th>
              </tr>
            </tbody>
          </table>
        </section>
      </div>
    </div>

<?php require 'inc/footer.php' ?>