<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Edit Info Denda</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Transaksi</li>
              <li><i class="fa fa-files-o"></i>Denda</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Denda
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
				  <?php if (empty($this->oDenda)): ?>
					
				  <?php else: ?>
					<div class="form-group ">
                      <label for="id_denda" class="control-label col-lg-2">Id Denda<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="id_denda" name="id_denda" type="text" value="<?=$this->oDenda->id_denda?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="denda_per_hari" class="control-label col-lg-2">Denda per Hari (Rp)<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="denda_per_hari" name="denda_per_hari" type="text" value="<?=$this->oDenda->denda_per_hari?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="denda_maks" class="control-label col-lg-2">Denda Maksimal (Rp)<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="denda_maks" name="denda_maks" type="text" value="<?=$this->oDenda->denda_maks?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="add_submit" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
				  <?php endif; ?>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->

<?php require 'inc/footer.php' ?>
