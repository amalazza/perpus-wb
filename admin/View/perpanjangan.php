<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Info Perpanjangan</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Transaksi</li>
          <li><i class="fa fa-square-o"></i>Info Perpanjangan</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Info Perpanjangan</h2>
          </header>

          <?php if (empty($this->oPerpanjangan)): ?>
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
        	<table class="table table-striped table-advance table-hover" id="anggota">
            <tbody>
              <tr>
                <th>Lama Perpanjangan (hari)</th>
                <th>Batas Perpanjangan (kali)</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oPerpanjangan as $oPerpanjangan): ?>
              <tr>
				<td><?=$oPerpanjangan->hari?></td>
				<td><?=$oPerpanjangan->batas?></td>
                <td>
                  <div class="btn-group">
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=editPerpanjangan&amp;id=<?=$oPerpanjangan->id_perpanjangan?>" method="post" style="display: inline">
                        <button class="btn btn-danger" type="submit" name="edit" value="1">Edit</button>
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

