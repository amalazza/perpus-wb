<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Katalog</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Buku</li>
          <li><i class="fa fa-square-o"></i>Katalog</li>
        </ol>
      </div>
    </div>
	
	<div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Buku Baru
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=katalog&amp;a=add'" class="btn btn-primary">Tambah Buku Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading" style="font-size: 20px;">
            Tabel Buku
          </header>
		  <br>
		  <div class="col-lg-12">
		  <input class=" form-control" id="search" name="search" type="text" autocomplete="off" placeholder="search katalog"/>
		  </div>
		  <br>
          <?php if (empty($this->oKatalog)): ?>
            <?php else: ?> 
  
  		<div  style="position: relative; height: 500px; overflow: auto; display: block;">
  			<table class="table table-striped table-advance table-hover" id="katalog">
            <tbody>
              <tr>
                <th>No Katalog</th>
				<th>Judul</th>
				<th>Stok</th>
				<th>Cover</th>
				<th>Detail</th>
                <th>Action</th>
              </tr> 
			  
              <?php foreach ($this->oKatalog as $oKatalog): ?>
              <tr>
                <td><?=htmlspecialchars($oKatalog->no_katalog)?></td>
				<td><?=$oKatalog->judul?></td>
				<td><?=$oKatalog->stok ?></td>
				<td><div class="activity-body act-in"><?php echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oKatalog->cover))."' width='75' height='75'/>";?></div>
				</td>
				<td>
				<button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailAnggota" data-id="<?=$oKatalog->no_katalog?>">Detail</button>
				</td>
				<td>
                  <div class="btn-group">
				  <form action="<?=ROOT_URL?>?p=katalog&amp;a=edit&amp;id=<?=$oKatalog->no_katalog?>" method="post" style="display: inline">
                        <button class="btn btn-primary" type="submit" name="edit" value="1" >Edit</button>
                    </form>
                    <form action="<?=ROOT_URL?>?p=katalog&amp;a=delete&amp;id=<?=$oKatalog->no_katalog?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="delete" value="1" onclick="return confirm('Anda yakin ingin mennghapus data ingin?');">Hapus</button>
                    </form>
                  </div>
                </td>                
              </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>
  		</div>
        </section>
      </div>
    </div>
	<?php endif ?>
    <!-- page end-->
	
	<!-- Modal Detail Katalog-->
	<div id="detailAnggota" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Detail Katalog</h4>
		  </div>
		  <div class="modal-body">
		  <div id="foto"></div>
			<table class="table table-striped table-advance table-hover">
				<tbody>
					<tr>
						<th>No Katalog</th>
						<td><span id="no_katalog"></span></td>
					</tr>
					<tr>
						<th>Klasifikasi</th>
						<td><span id="no_klasifikasi"></span></td>
					</tr>
					<tr>
						<th>koleksi</th>
						<td><span id="no_koleksi"></span></td>
					</tr>
					<tr>
						<th>Jenis Buku</th>
						<td><span id="jenis_katalog"></span></td>
					</tr>
					<tr>
						<th>Judul</th>
						<td><span id="judul"></span></td>
					</tr>
					<tr>
						<th>stok</th>
						<td><span id="stok"></span></td>
					</tr>
					<tr>
						<th>Pengarang</th>
						<td><span id="pengarang"></span></td>
					</tr>
					<tr>
						<th>Penerbit</th>
						<td><span id="penerbit"></span></td>
					</tr>
					<tr>
						<th>Kota Terbit</th>
						<td><span id="kota_terbit"></span></td>
					</tr>
					<tr>
						<th>Tahun Terbit</th>
						<td><span id="tahun_terbit"></span></td>
					</tr>
					<tr>
						<th>ISBN</th>
						<td><span id="isbn"></span></td>
					</tr>
					<tr>
						<th>Lokasi</th>
						<td><span id="lokasi"></span></td>
					</tr>
					<tr>
						<th>Abstrak</th>
						<td><span id="abstrak"></span></td>
					</tr>
					<tr>
						<th>Tanggal Masuk</th>
						<td><span id="tanggal_masuk"></span></td>
					</tr>
					<tr class="ebook">
						<th>e-book</th>
						<td>
						<form class="form-validate form-horizontal " role="form" method="post" action="<?=ROOT_URL?>?p=katalog&amp;a=view">
						<input type="hidden" name="id" id="id"/> 
						<input type="submit" name="view" value="PDF" class="btn btn-primary"/> 
						</form>
						</td>
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
	
    <script type="text/javascript">
  //detailKatalog
  $(function(){
	  $(".detail").on("click", function(){
		  const id = $(this).data('id');
		  $.ajax({
			  url: 'http://localhost/perpus-wb/admin/?p=katalog&a=detailKatalog',
			  data: {id:id},
			  method:'post',
			  dataType: 'json'
		  }).done(function(Data){
			  //console.log(Data.nama);
			  $('#no_katalog').text(Data.no_katalog); 
			  $('#id').val(Data.no_katalog); 
			  $('#no_klasifikasi').text(Data.nama_klasifikasi);
			  $('#no_koleksi').text(Data.jenis_koleksi);
			  $('#jenis_katalog').text(Data.jenis_katalog);			  
			  $('#judul').text(Data.judul);
			  $('#stok').text(Data.stok);
			  $('#pengarang').text(Data.pengarang); 
			  $('#penerbit').text(Data.penerbit);
			  $('#kota_terbit').text(Data.kota_terbit);
			  $('#tahun_terbit').text(Data.tahun_terbit);
			  $('#isbn').text(Data.isbn);
			  $('#abstrak').text(Data.absktrak);
			  $('#lokasi').text(Data.lokasi);
			  $('#tanggal_masuk').text(Data.tanggal_masuk);
			  
			  var test = document.getElementById("jenis_katalog").innerText;
			  if(test == 'Buku Fisik'){
				  $('tr.ebook').hide();
			  }
			  else{
				  $('tr.ebook').show();				  
			  }
			  
		  });
	  });
  });
  
  //search table
  $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#katalog tr:not(:first-child)').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
						  $(this).show();  
                     }  
                     else  
                     {  
						  $(this).hide();  
                     }  
                });  
           }  
      }); 
  </script>

<?php require 'inc/footer.php' ?>

