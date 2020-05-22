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
          <li><i class="fa fa-square-o"></i>Peminjaman</li>
        </ol>
      </div>
    </div>
	
	<div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
            Transaksi Buku
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=transaksi&amp;a=pinjamBaru'" class="btn btn-primary">Peminjaman Buku</button>
          </div>
      </section>
     </div>
    </div>
	
	<div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
            Laporan Peminjaman
          </header>
          <div class="panel-body">
            <button type="button" data-toggle="modal" data-target="#cetakLaporan" class="btn btn-primary"><i class="icon fa fa-print"></i> Cetak Laporan</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Peminjaman Buku</h2>
            <div class="form-group panel" style="margin-bottom: 1%; border: 1px solid #c7c7cc;">
              <label for="search" class="control-label" style="margin-bottom: 0px; padding-bottom: 0px; padding-left: 1%;">Cari Data Peminjaman : </label>
              <input name="search" id="search" class="form-control search" placeholder="Search Anggota" style="margin: 1%; width: 90%; color: #8e8e93; border: 1px solid #c7c7cc; margin-top: 0px; padding-top: 0px;" />
            </div>
          </header>

          <?php if (empty($this->oPinjam)): ?>
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
        	<table class="table table-striped table-advance table-hover" id="anggota">
            <tbody>
              <tr>
			    <th>No Peminjaman</th>
                <th>Anggota</th>
                <th>Katalog</th>
				<th>Tanggal Pinjam</th>
				<th>Batas Kembali</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oPinjam as $oPinjam): ?>
              <tr>
			    <td><?=htmlspecialchars($oPinjam->no_peminjaman)?></td>
                <td><?=htmlspecialchars($oPinjam->no_anggota)?> - <?=$oPinjam->nama?></td>
				<td><?=htmlspecialchars($oPinjam->no_katalog)?> - <?=$oPinjam->judul?></td>
				<td><?=$oPinjam->tanggal_pinjam?></td>
				<td><?=$oPinjam->batas_kembali?></td>
                <td>
				<?php if(strtotime($oPinjam->batas_kembali) > time()):?>
				<div class="btn-group">
				
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=perpanjangan&amp;id=<?=$oPinjam->no_peminjaman?>" method="post" style="display: inline">
                        <button class="btn btn-primary" type="submit" name="edit" value="1" disabled>Perpanjangan</button>
                    </form>
                  </div>
				<?php else: ?>
				<?php if (empty($this->dataPerpanjang)): ?>
				<?php else: ?>
					<?php if ($oPinjam->perpanjangan_ke < $this->dataPerpanjang->batas): ?>
					<div class="btn-group">
				
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=perpanjangan&amp;id=<?=$oPinjam->no_peminjaman?>" method="post" style="display: inline">
                        <button class="btn btn-primary" type="submit" name="edit" value="1" >Perpanjangan</button>
                    </form>
                  </div>
				  <?php else:?>
				  <div class="btn-group">
				
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=perpanjangan&amp;id=<?=$oPinjam->no_peminjaman?>" method="post" style="display: inline">
                        <button class="btn btn-primary" type="submit" name="edit" value="1" disabled>Perpanjangan</button>
                    </form>
                  </div>
					<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>
                  <div class="btn-group">
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=pengembalian&amp;id=<?=$oPinjam->no_peminjaman?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="edit" value="1">Pengembalian</button>
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
	<!-- modal atur tanggal untuk cetak laporan-->
	<form method="POST" action="<?=ROOT_URL?>?p=transaksi&amp;a=cetakLaporan" target="_blank" >
  <div class="modal fade" id="cetakLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><small>PRINT FILTER DATE</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label class="control-label">Star Date</label>
        <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label">End Date</label>
        <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
    </div>                
    <div class="form-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" name="submit" value="proses" onclick="return valid();">Print</button>
    </div>
</div>
</div>  
</div>
</div>
</form>
	
	
	

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

