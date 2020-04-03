<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Page Tambah Admin</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-bars"></i>Admin</li>
          <li><i class="fa fa-square-o"></i>Tambah Admin Baru</li>
        </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Input New Admin
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
                    <div class="form-group ">
                      <label for="alamat" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" placeholder="Nama" type="text" name="nama" id="nama" />
                      </div>
                    </div>
          <div class="form-group ">
                      <label for="no_telpon" class="control-label col-lg-2">No. Telepon <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" placeholder="Nomer Telephone" type="text" name="notlp" id="notlp" onkeypress="return isNumber(event)"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " placeholder="Email" type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="alamat" class="control-label col-lg-2">Alamat <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" placeholder="Alamat" type="text" name="alamat" id="alamat" />
                      </div>
                    </div>
                    <div class="form-group " style="display: none;">
                      <div class="col-lg-10">
                        <input class=" form-control" type="hidden" value="admin" name="role" id="role"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="alamat" class="control-label col-lg-2">Username <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" placeholder="Username" type="text" name="username" id="username" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " placeholder="Password" id="password" name="password" type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " placeholder="Confirm Password" id="confirm_password" name="confirm_password" type="password" />
                      </div>
                    </div>
          <div class="form-group ">
                      <label for="foto" class="control-label col-lg-2">Foto Profil <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="foto" name="foto" type="file" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="add_submitA" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
  <script type="text/javascript">  
  //nomor telepon hanya menerima angka
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
  </script>

<?php require 'inc/footer.php' ?>
