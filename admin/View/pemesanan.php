<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Pemesanan</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Transaksi</li>
          <li><i class="fa fa-square-o"></i>Pemesanan</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Tabel Pemesanan Buku</h2>
            <div class="form-group panel" style="margin-bottom: 1%; border: 1px solid #c7c7cc;">
              <label for="search" class="control-label" style="margin-bottom: 0px; padding-bottom: 0px; padding-left: 1%;">Cari Data Pemesanan : </label>
              <input name="search" id="search" class="form-control search" placeholder="Search Anggota" style="margin: 1%; width: 90%; color: #8e8e93; border: 1px solid #c7c7cc; margin-top: 0px; padding-top: 0px;" />
            </div>
          </header>

          <?php if (empty($this->oPesan)): ?>
		  Tidak Ada Pemesanan Buku
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
        	<table class="table table-striped table-advance table-hover" id="anggota">
            <tbody>
              <tr>
			    <th>No Pemesanan</th>
                <th>Anggota</th>
                <th>Katalog</th>
				<th>Posisi</th>
				<th>Waktu Pemesanan</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oPesan as $oPesan): ?>
              <tr>
			    <td><?=htmlspecialchars($oPesan->no_pemesanan)?></td>
                <td><?=htmlspecialchars($oPesan->no_anggota)?> - <?=$oPesan->nama?></td>
				<td><?=htmlspecialchars($oPesan->no_katalog)?> - <?=$oPesan->judul?></td>
				<td><?=$oPesan->lokasi?></td>
				<td><?=$oPesan->tanggal_pesan?></td>
                <td>
                  <div class="btn-group">
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=pinjamBaru&amp;id=<?=$oPesan->no_pemesanan?>" method="post" style="display: inline">
                        <button class="btn btn-primary" type="submit" name="edit" value="1" >Pinjam</button>
                    </form>
                    <form action="<?=ROOT_URL?>?p=Transaksi&amp;a=deletePesanan&amp;id=<?=$oPesan->no_pemesanan?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="delete" value="1" onclick="return confirm('Anda yakin ingin mennghapus data ini?');">Hapus</button>
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
    <!-- page end-->
	
	
	

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
  
  //search table
  $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#anggota tr:not(:first-child)').each(function(){  
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
<?php endif ?>
<?php require 'inc/footer.php' ?>

