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
        Input New Admin
      </header>
      <div class="panel-body">

		<form class="form-inline" role="form" action="" enctype='multipart/form-data' method="post">

        <p><label  >Nama :</label><br />
            <input class="form-control"  placeholder="Nama" type="text" name="nama" id="nama" required="required" />
        </p>

        <p><label  >Nomer Telephone :</label><br />
            <input class="form-control"  placeholder="Nomer Telephone" type="text" name="notlp" id="notlp" required="required" />
        </p>

        <p><label >Email :</label><br />
            <input class="form-control"  placeholder="Email" type="email" name="email" id="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
        </p>

        <p><label>Alamat :</label><br />
            <input class="form-control"  placeholder="Alamat" type="text" name="alamat" id="alamat" required="required" />
        </p>

        <p>
            <input class="form-control" type="hidden" value="admin" name="role" id="role" />
        </p>

		    <p><label  >Username :</label><br />
		        <input class="form-control"  placeholder="Username" type="text" name="username" id="username" required="required" />
		    </p>

        <p><label >Password :</label><br />
            <input class="form-control"  placeholder="Password" type="password" name="password" id="password" required="required" />
        </p>

        <div>
        <p><label  >Upload foto :</label><br />
              <input id="foto" name="foto" type="file" required /><br>
        </div>

		    <p><input type="submit" name="add_submitA" value="Submit" class="btn btn-primary"/></p>
		</form>

      </div>
    </section>

  </div>
</div>
<?php require 'inc/footer.php' ?>

