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
            Tabel Admin
          </header>
		  <br>
		  <div class="col-lg-12">
		  <input class=" form-control" id="search" name="search" type="text" autocomplete="off" placeholder="search admin"/>
		  </div>
		  <br>
          <?php if (empty($this->oAdd_Admin)): ?>
            <?php else: ?>
            

          <table id="tableMaster" class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>Profile</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Tlp</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oAdd_Admin as $oAdd_Admin): 

              $potong = substr($oAdd_Admin->alamat, 0, 25) . '...';
              ?>
              <tr>
                <td><img src="data:<?=$oAdd_Admin->mime?>;base64,<?=base64_encode($oAdd_Admin->foto); ?>" width="100" height="100"/></td>
                <td><?=$oAdd_Admin->nama?></td>
                <td><?=htmlspecialchars($oAdd_Admin->username)?></td>
                <td><?=$oAdd_Admin->email?></td>
                <td><?=$oAdd_Admin->notlp?></td>
                <td><?php echo $potong; ?></td>
                <td>
                  <button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailAdmin" data-id="<?=$oAdd_Admin->id_admin?>">Detail</button>
                </td>
                <td>             
              </tr>
              <?php endforeach ?>
             
            </tbody>
          </table>
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
      <div id="foto"></div>
      <table class="table table-striped table-advance table-hover">
        <tbody>
          <tr>
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