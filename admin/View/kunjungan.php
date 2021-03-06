<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Kunjungan</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a>Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Kunjungan</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Input Kunjungan
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=add'" class="btn btn-primary">Input Kunjungan</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Tabel Kunjungan</h2>
            <div class="form-group panel" style="margin-bottom: 1%; border: 1px solid #c7c7cc;">
              <label for="search" class="control-label" style="margin-bottom: 0px; padding-bottom: 0px; padding-left: 1%;">Cari Data Kunjungan : </label>
              <input name="search" id="search" class="form-control search" placeholder="Search Kunjungan" style="margin: 1%; width: 90%; color: #8e8e93; border: 1px solid #c7c7cc; margin-top: 0px; padding-top: 0px;" />
            </div>
          </header>

          <?php if (empty($this->oKunjungan)): ?>
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
          <table class="table table-striped table-advance table-hover" id="kunjungan">
            <tbody>
              <tr>
                <th>No Anggota</th>
                <th>Nama Anggota</th>
                <th>Waktu Kunjungan</th>
                <th>Waktu Kepulangan</th>
                <th>Detail</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oKunjungan as $oKunjungan): ?>
              <tr>
                <td><?=htmlspecialchars($oKunjungan->no_anggota)?></td>
                <td><?=$oKunjungan->nama?></td>
                <td><?=$oKunjungan->waktu_kunjungan?></td>
                <td><?=$oKunjungan->waktu_kepulangan?></td>
                <td>
                  <button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailKunjungan" data-id="<?=$oKunjungan->no_anggota?>">Detail</button>
                </td>
                <td>
                  <div class="btn-group">
                    <!-- <button class="btn btn-primary" onclick="window.location='<?=ROOT_URL?>?p=kunjungan&amp;a=edit&amp;id=<?=$oKunjungan->no_kunjungan?>'">Edit</button> &nbsp; -->
                    <form action="<?=ROOT_URL?>?p=kunjungan&amp;a=deleteAfterKonfirmasi&amp;id=<?=$oKunjungan->no_kunjungan?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="delete" value="1" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</button>
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

      <!-- Modal Detail Anggota-->
  <div id="detailKunjungan" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Detail Kunjungan</h4>
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
          <tr>
            <th>Loker</th>
            <td><span id="loker"></span></td>
          </tr>
          <tr>
            <th>Waktu Kunjungan</th>
            <td><span id="waktu_kunjungan"></span></td>
          </tr>
          <tr>
            <th>Waktu Kepulangan</th>
            <td><span id="waktu_kepulangan"></span></td>
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
  //detailAnggota
  $(function(){
    $(".detail").on("click", function(){
      const id = $(this).data('id');
      $.ajax({
        url: 'http://localhost/perpus-wb/admin/?p=kunjungan&a=detailKunjungan',
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
        $('#loker').text(Data.loker);
        $('#waktu_kunjungan').text(Data.waktu_kunjungan);
        $('#waktu_kepulangan').text(Data.waktu_kepulangan);
         
        
      });
    });
  });
  
    //search table
  $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#kunjungan tr:not(:first-child)').each(function(){  
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

