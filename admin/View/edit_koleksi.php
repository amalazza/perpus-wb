<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Buku</li>
              <li><i class="fa fa-files-o"></i>Koleksi</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Koleksi
              </header>
              <div class="panel-body">
                <div class="form">
        <?php if (empty($this->oKoleksi)): ?>
          <p class="error">Post Data Not Found!</p>
        <?php else: ?>
                  <form class="form-validate form-horizontal " enctype="multipart/form-data" role="form" method="post" action="">
                    <div class="form-group ">
                      <label for="no_koleksi" class="control-label col-lg-2">No Koleksi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_koleksi" name="no_koleksi" type="text" value="<?=$this->oKoleksi->no_koleksi?>" readonly="true" required/>
                      </div>
                    </div>

          

          <div class="form-group ">
                      <label for="judul" class="control-label col-lg-2">Jenis Koleksi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="jenis_koleksi" name="jenis_koleksi" type="text" value="<?=$this->oKoleksi->jenis_koleksi?>" required/>
                      </div>
                    </div>
                    
          
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="edit_submit" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
    <?php endif; ?>
        <!-- page end-->
    
  
<?php require 'inc/footer.php' ?>