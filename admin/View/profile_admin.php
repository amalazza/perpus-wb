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

          <?php 

          if (empty($this->oAdd_Admins) && empty($this->oAlog)): ?>
            <?php else: ?>
            <?php $data = $this->oAdd_Admins;
             ?>
          <div class="panel-body">
            <img src="data:<?=$data->mime?>;base64,<?=base64_encode($data->foto); ?>" width="200" style="float:left; margin-right: 20px;"/>
            <div style="">
            <h4>Nama : <?=$data->nama?></h4>
            <h4>Email : <?=$data->email?></h4>
            <h4>No Telephone : <?=$data->notlp?></h4>
            <div style="max-width: 800px;">
              <h4>Alamat : </h4>
              <h4><?=$data->alamat?></h4>
            </div>
            </div>
            <div style="float:right;"">
              <form action="<?=ROOT_URL?>?p=Admincrud&amp;a=edit&amp;id=<?=$data->id_admin?>?>" method="post">
                <button class="btn btn-danger" type="submit" name="edit" value="1" style="width: 120px;">Edit Profile</button>
              </form>
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
          <div  style="position: relative; height: 300px; overflow: auto; display: block;">
            <table class="table table-striped table-advance table-hover">
            <thead>
              <tr>
                <th>Aktifitas</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>              
              <?php foreach ($this->oAlog as $oAlog): 
             ?>
              <tr>
                <td><?=$oAlog->activity?></td>
                <td><?=$oAlog->tanggal?></td>
              </tr>
             <?php endforeach ?>
            </tbody>
          </table>
          </div>
          
        </section>
      </div>
    </div>

<?php require 'inc/footer.php' ?>