<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Page Tambah Koleksi</h3>
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
                  <form class="form-validate form-horizontal register_form" enctype="multipart/form-data" role="form" method="post" action="">
                    <div class="form-group ">
                      <label for="no_koleksi" class="control-label col-lg-2">No Koleksi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="no_koleksi" name="no_koleksi" type="text" required/>
                      </div>
                    </div>


					           <div class="form-group ">
                      <label for="jenis_koleksi" class="control-label col-lg-2">Jenis Koleksi <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="jenis_koleksi" name="jenis_koleksi" type="text" required/>
                      </div>
                    </div>
		
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="add_submit" value="Submit" class="btn btn-primary"/> 
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
    
<!--search dropdown-->
  <script type="text/javascript">
  $("#searchKoleksi").chosen();
  $("#searchKlasifikasi").chosen();
  $("#searchJenisKatalog").chosen();
  
  //stok hanya menerima angka
  function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	
	//menampilkan/hide input file ebook sesuai apa yang dipilih pada jenis buku
   function showEbook(select){
   if(select.value== 'E-Book'){
    document.getElementById('add_ebook').style.display = "block";
   }
   else if(select.value== 'Buku Fisik dan E-Book'){
    document.getElementById('add_ebook').style.display = "block";
   } 
   else{
    document.getElementById('add_ebook').style.display = "none";
	}}
  </script>
  
<?php require 'inc/footer.php' ?>
