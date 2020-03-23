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

		<form class="form-inline" role="form" action="" method="post">

		    <p><label  class="sr-only" for="username">Username :</label><br />
		        <input class="form-control"  placeholder="Username" type="text" name="username" id="username" required="required" />
		    </p>

        <p><label  class="sr-only" for="password">Password :</label><br />
            <input class="form-control"  placeholder="Password" type="password" name="password" id="password" required="required" />
        </p>

		    <p><input type="submit" name="add_submitA" value="Submit" class="btn btn-primary"/></p>
		</form>

      </div>
    </section>

  </div>
</div>
<?php require 'inc/footer.php' ?>
