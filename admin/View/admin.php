<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Admin</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>Admin</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tambah Admin
          </header>
          <div class="panel-body">
            <button type="button" onclick="window.location='<?=ROOT_URL?>?p=Admincrud&amp;a=add'" class="btn btn-primary">Tambah Admin Baru</button>
          </div>
      </section>
     </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Tabel Admin</h2>
            <div class="form-group panel" style="margin-bottom: 1%; border: 1px solid #c7c7cc;">
              <label for="search" class="control-label" style="margin-bottom: 0px; padding-bottom: 0px; padding-left: 1%;">Cari Data Admin : </label>
              <input name="search" id="search" class="form-control search" placeholder="Search Admin" style="margin: 1%; width: 90%; color: #8e8e93; border: 1px solid #c7c7cc; margin-top: 0px; padding-top: 0px;" />
            </div>
          </header>


          <?php if (empty($this->oAdd_Admin)): ?>
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
          <table id="tableMaster" class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Foto</th>
                <th>Detail</th>
                <th id="thAct">Action</th>
              </tr>
              <?php foreach ($this->oAdd_Admin as $oAdd_Admin): 
              ?>
              <tr>
                <td><?=$oAdd_Admin->nama?></td>
                <td><?=$oAdd_Admin->email?></td>
                <td><?=$oAdd_Admin->notlp?></td>
                <td><img src="data:<?=$oAdd_Admin->mime?>;base64,<?=base64_encode($oAdd_Admin->foto); ?>" width="100" height="100"/></td>
                <td>
                  <form style="display: inline">
                      <button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailAdmin" data-id="<?=$oAdd_Admin->id_admin?>" >Detail</button>
                    </form>
                </td>
                <td >
                  <div class="btn-group">
                    <form action="<?=ROOT_URL?>?p=Admincrud&amp;a=edit&amp;id=<?=$oAdd_Admin->id_admin?>" method="post" style="display: inline">
                        <button class="btn btn-primary detail" type="submit" name="edit" value="1" >Edit</button>
                    </form>
                    <form action="<?=ROOT_URL?>?p=Admincrud&amp;a=delete&amp;id=<?=$oAdd_Admin->id_admin?>" method="post" style="display: inline">
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

    <!-- Modal Detail Anggota-->
  <div id="detailAdmin" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Detail Admin</h4>
      </div>
      <div class="modal-body">
      <table class="table table-striped table-advance table-hover">
        <tbody>
            <th>Nama</th>
            <td><span id="nama"></span></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><span id="username"></span></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><span id="email"></span></td>
          </tr>
          <tr>
            <th>No Tlp</th>
            <td><span id="notlp"></span></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td><span id="alamat"></span></td>
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
        url: 'http://localhost/perpus-wb/admin/?p=Admincrud&a=detailAdmin',
        data: {id:id},
        method:'post',
        dataType: 'json'
      }).done(function(Data){
        //console.log(Data.nama);
        $('#nama').text(Data.nama); 
        $('#username').text(Data.username);
        $('#email').text(Data.email); 
        $('#notlp').text(Data.notlp);
        $('#alamat').text(Data.alamat);
      });
    });
  });
  
  //search table
  $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#tableMaster tr:not(:first-child)').each(function(){  
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