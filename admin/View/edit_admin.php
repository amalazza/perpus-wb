<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Tambah Admin BAru</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>New Admin</li>
        </ol>
      </div>
    </div>

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Input New Admin
      </header>
      <?php 
        $idA = $_GET['id'];
       ?>

       <?php if (empty($this->oEdit)): ?>
            <?php else: ?>
            <?php $data = $this->oEdit; ?>

      <div class="panel-body">

    <form class="form-inline" role="form" action="" enctype='multipart/form-data' method="post">

        <p><label  >Nama :</label><br />
            <input class="form-control"  placeholder="Nama" value="<?=$data->nama?>" type="text" name="nama" id="nama" required="required" />
        </p>

        <p><label  >Nomer Telephone :</label><br />
            <input class="form-control"  placeholder="Nomer Telephone" value="<?=$data->notlp?>" type="text" name="notlp" id="notlp" required="required" />
        </p>

        <p><label >Email :</label><br />
            <input class="form-control"  placeholder="Email" value="<?=$data->email?>" type="email" name="email" id="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
        </p>

        <p><label>Alamat :</label><br />
            <input class="form-control"  placeholder="Alamat" value="<?=$data->alamat?>" type="text" name="alamat" id="alamat" required="required" />
        </p>

        <p>
            <input class="form-control" type="hidden" value="admin" name="role" id="role" />
        </p>

        <p><label  >Username :</label><br />
            <input class="form-control"  placeholder="Username" value="<?=$data->username?>" type="text" name="username" id="username" required="required" />
        </p>

        <p><label >Password :</label><br />
            <input class="form-control"  placeholder="Password" value="<?=$data->password?>" type="password" name="password" id="password" required="required" />
        </p>

        <div>
        <p><label  >Upload foto :</label><br />
              <img src="data:<?=$data->mime?>;base64,<?=base64_encode($data->foto); ?>" width="100" height="100"/>
              <input id="foto" name="foto" type="file" /><br>
<!--               ini input old foto :<br>
              <input class="form-control" type="text"  name="oldFoto" value="<?=$data->foto?>">
              ini input old mime :<br>
              <input class="form-control" type="text" name="oldMime" value="<?=$data->mime?>"> -->
        </div>

        <p><input type="submit" name="edit_submit" value="Submit" class="btn btn-primary"/></p>
    </form>

      </div>
      <?php endif ?>
    </section>

  </div>
</div>
<?php require 'inc/footer.php' ?>

