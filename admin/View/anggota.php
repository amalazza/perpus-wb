<?php require 'inc/header.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Anggota</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Anggota</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Data Siswa
          </header>
          <div class="panel-body">
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#siswaBaru">Upload Data Siswa</button>
		  </div>
      </section>
     </div>
    </div>
	
	<div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Anggota Baru
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=anggota&amp;a=add'" class="btn btn-primary">Tambah Anggota Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tabel Anggota
          </header>

          <?php if (empty($this->oAnggota)): ?>
            <?php else: ?>
            

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota</th>
                <th>Kelas</th>
				<th>Detail</th>
				<th>Foto</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oAnggota as $oAnggota): ?>
              <tr>
                <td><?=htmlspecialchars($oAnggota->no_anggota)?></td>
                <td><?=$oAnggota->nama?></td>
                <td><?=$oAnggota->kelas?></td>
				<td>
				<button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailAnggota" data-id="<?=$oAnggota->no_anggota?>">detail</button>
				</td>
				<td><div class="activity-body act-in"><?php echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oAnggota->foto))."' width='75' height='75'/>";?></div></td>
                <td>
                  <div class="btn-group">
                    <form action="<?=ROOT_URL?>?p=anggota&amp;a=delete&amp;id=<?=$oAnggota->no_anggota?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="delete" value="1" onclick="return confirm('Anda yakin ingin mennghapus data ingin?');">Hapus</button>
                    </form>
                  </div>
                </td>                
              </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>
        </section>
      </div>
    </div>
    <!-- page end-->
	
	<!-- Modal Detail Anggota-->
	<div id="detailAnggota" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Detail Anggota</h4>
		  </div>
		  <div class="modal-body">
		  <div id="foto"></div>
			<table class="table table-striped table-advance table-hover">
				<tbody>
					<tr>
						<th>NIS</th>
						<td><span id="nis"></span></td>
					</tr>
					<tr>
						<th>Nama</th>
						<td><span id="nama"></span></td>
					</tr>
					<tr>
						<th>Kelas</th>
						<td><span id="kelas"></span></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td><span id="alamat"></span></td>
					</tr>
					<tr>
						<th>No telepon</th>
						<td><span id="no_telpon"></span></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><span id="email"></span></td>
					</tr>
				</tbody>
			</table>
                    
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div> 

	<!-- Modal Siswa Baru-->
	<div id="siswaBaru" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Input Siswa Baru</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-validate form-horizontal " enctype="multipart/form-data" role="form" method="post" action="<?=ROOT_URL?>?p=anggota&amp;a=addSiswa">
                    
					<div class="form-group ">
                      <label for="berkas_excel" class="control-label col-lg-2">Data Siswa </label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="berkas_excel" name="berkas_excel" type="file" />
                      </div>
                    </div>
                  
		  </div>
		  <div class="modal-footer">
			<button type="submit" name="add_file"  value="submit" class="btn btn-primary" >Tambah Data</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		  </form>
		</div>

	  </div>
	</div> 

<script type="text/javascript">
  //detailAnggota
  $(function(){
	  $(".detail").on("click", function(){
		  const id = $(this).data('id');
		  $.ajax({
			  url: 'http://localhost/perpus-wb/admin/?p=anggota&a=detailAnggota',
			  data: {id:id},
			  method:'post',
			  dataType: 'json'
		  }).done(function(Data){
			  //console.log(Data.nama);
			  $('#nis').text(Data.no_anggota); 
			  $('#nama').text(Data.nama);
			  $('#kelas').text(Data.kelas); 
			  $('#alamat').text(Data.alamat);
			  $('#no_telpon').text(Data.no_telpon); 
			  $('#email').text(Data.email);
			   
			  
		  });
	  });
  });
  </script>	
<?php endif ?>
<?php require 'inc/footer.php' ?>

