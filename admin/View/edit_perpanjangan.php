<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Edit Info Perpanjangan</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Transaksi</li>
              <li><i class="fa fa-files-o"></i>Perpanjangan</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Perpanjangan
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
				  <?php if (empty($this->oPerpanjangan)): ?>
					
				  <?php else: ?>
					<div class="form-group ">
                      <label for="id_perpanjangan" class="control-label col-lg-2">Id Perpanjangan<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="id_perpanjangan" name="id_perpanjangan" type="text" value="<?=$this->oPerpanjangan->id_perpanjangan?>" readonly="true"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="hari" class="control-label col-lg-2">Lama Perpanjangan (Hari)<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="hari" name="hari" type="text" value="<?=$this->oPerpanjangan->hari?>"/>
                      </div>
                    </div>
					<div class="form-group ">
                      <label for="batas" class="control-label col-lg-2">Batas Perpanjangan (Kali)<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="batas" name="batas" type="text" value="<?=$this->oPerpanjangan->batas?>"/>
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
