<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Page Info Denda</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Transaksi</li>
          <li><i class="fa fa-square-o"></i>Info Denda</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h2 style="font-size: 150%; padding-bottom: 1%">Info Denda</h2>
          </header>

          <?php if (empty($this->oDenda)): ?>
            <?php else: ?>
            
        <div  style="position: relative; height: 500px; overflow: auto; display: block;">
        	<table class="table table-striped table-advance table-hover" id="anggota">
            <tbody>
              <tr>
                <th>denda per hari (Rp)</th>
				<th>denda maksimal (Rp)</th>
                <th>Action</th>
              </tr>
              <?php foreach ($this->oDenda as $oDenda): ?>
              <tr>
				<td><?=$oDenda->denda_per_hari?></td>
				<td><?=$oDenda->denda_maks?></td>
                <td>
                  <div class="btn-group">
					<form action="<?=ROOT_URL?>?p=transaksi&amp;a=editDenda&amp;id=<?=$oDenda->id_denda?>" method="post" style="display: inline">
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
<?php endif ?>
<?php require 'inc/footer.php' ?>

