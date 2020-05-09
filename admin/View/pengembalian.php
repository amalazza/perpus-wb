<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Pengembalian</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Transaksi</li>
          <li><i class="fa fa-square-o"></i>Pengembalian</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Pengembalian Buku</h2>
            <div class="form-group panel" style="margin-bottom: 1%; border: 1px solid #c7c7cc;">
              <label for="search" class="control-label" style="margin-bottom: 0px; padding-bottom: 0px; padding-left: 1%;">Cari Data Pengembalian : </label>
              <input name="search" id="search" class="form-control search" placeholder="Search Anggota" style="margin: 1%; width: 90%; color: #8e8e93; border: 1px solid #c7c7cc; margin-top: 0px; padding-top: 0px;" />
            </div>
          </header>

          <?php if (empty($this->oKembali)): ?>
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
        	<table class="table table-striped table-advance table-hover" id="anggota">
            <tbody>
              <tr>
			    <th>No Peminjaman</th>
                <th>Anggota</th>
                <th>Katalog</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Keterlambatan</th>
				<th>Denda</th>
              </tr>
              <?php foreach ($this->oKembali as $oKembali): ?>
              <tr>
			    <td><?=htmlspecialchars($oKembali->no_peminjaman)?></td>
                <td><?=htmlspecialchars($oKembali->no_anggota)?> - <?=$oKembali->nama?></td>
				<td><?=htmlspecialchars($oKembali->no_katalog)?> - <?=$oKembali->judul?></td>
				<td><?=$oKembali->tanggal_pinjam?></td>
				<td><?=$oKembali->tanggal_kembali?></td>
				<td><?=$oKembali->keterlambatan?></td>
				<td><?=$oKembali->denda?></td> 
				<td><?=$oKembali->tanggal_kembali?></td> 
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

