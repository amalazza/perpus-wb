<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>


<?php 

          if (empty($this->oAnggota)): ?>
            <?php else: ?>
            <?php $data = $this->oAnggota;
             ?>
 <!--main content start-->
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info" style="background-color: #1abc9c;">
              <div class="panel-body">
                  
          <div class="col-lg-2 col-sm-2 follow-info" style="-webkit-border-radius: 0%;">   
                <?php 
                    echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($data->foto))."' style='height: 180px; width: 100%; -webkit-border-radius: 20%'/>";
                ?>
                </div>
                <div class="col-sm-4 follow-info" style="font-size: 20px; width: 100%;">
                  <p>Nama: <?=$data->nama?></p>
                  <p>NIS: <?=$data->no_anggota?></p>
                  <p>Kelas: <?=$data->kelas?></p>
                  <p>Email: <?=$data->email?></p>
                  <p>No. Telpon: <?=$data->no_telpon?></p>
                </div>
                <div class="col-sm-4 follow-info" style="font-size: 20px; float: left;">
                  <p>Alamat: <?=$data->alamat?></p>
                </div>
        <div style="float:right;">
                  <form action="<?=ROOT_URL?>?p=anggota&amp;a=edit&amp;id=<?=$data->no_anggota?>" method="post">
                <button class="btn btn-danger" type="submit" name="edit" value="1" style="width: 120px;">Edit Profile</button>
              </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php endif ?>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              <header class="panel-heading" style="background-color: #2c3e50;">
                <ul class="nav nav-tabs" >
                  <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                                          DATA PINJAMAN
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          AKTIVITAS
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="recent-activity" class="tab-pane active">
                    <div class="profile-activity">
                      <section class="page-section portfolio" id="portfolio" style="margin-top: -20px;">
    <div class="container">
    <div style=" width: 100%; margin-top: -20px; padding-bottom: 5px; text-align: center;">
      <div style=" display: inline;">
        <div id="myBtnContainer">
        <button class="dropbtn active" onclick="filterSelection('all')"> Show all</button>
        <select class="dropbtn" id="cbtahun" name="cbtahun">
        <option>- Tahun Terbit -</option>
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oTahun as $oTahun): ?>
          <option class="opt1" onclick="filterSelection('<?=$oTahun->thn_terbit?>')" ><?=$oTahun->thn_terbit?></option>
        <?php endforeach ?>
        <?php endif ?>

        </select>
        <select class="dropbtn" id="cbJenis" name="cbJenis">
          <option>- Jenis Katalog -</option>
          <option class="opt2" onclick="filterSelection('E-Book')" >E-Book</option>
          <option class="opt2" onclick="filterSelection('Buku Fisik')" >Buku Fisik</option>
          <option class="opt2" onclick="filterSelection('Buku Fisik dan E-Book')" >Buku Fisik dan E-Book</option>
        </select>

        </select>
        <select class="dropbtn" id="cbKlasi" name="cbKlasi">
        <option>- Klasifikasi -</option>
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oJenis as $oJenis): ?>
          <option class="opt3" onclick="filterSelection('<?=$oJenis->nama_klasifikasi?>')" ><?=$oJenis->nama_klasifikasi?></option>
        <?php endforeach ?>
        <?php endif ?>
        </select>

        </select>
        <select class="dropbtn" id="cbKoleksi" name="cbKoleksi">
        <option>- Koleksi -</option>
        <?php if (empty($this->oKoleksi)): ?>
        <?php else: ?>
        <?php foreach ($this->oKoleksi as $oKoleksi): ?>
          <option class="opt4" onclick="filterSelection('<?=$oKoleksi->jenis_koleksi?>')" ><?=$oKoleksi->jenis_koleksi?></option>
        <?php endforeach ?>
        <?php endif ?>
        </select>
        </div>
      </div>
  </div>

<!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-secondary mb-0">Katalog Buku</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row ">
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oBuku as $oBuku):
        $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
        $judul = substr($oBuku->judul, 0, 30) . '...';
        $pengarang = substr($oBuku->pengarang, 0, 30);

         ?>
         <div style="" class="kotak filterDiv <?=$oBuku->tahun_terbit?> <?=$oBuku->jenis_katalog?> <?=$oBuku->nama_klasifikasi?> <?=$oBuku->jenis_koleksi?>">
          <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
            <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                <div class="portfolio-item-caption-content text-center text-white" >
                  <h3><b><?=$oBuku->judul?></b></h3>
                  <p style="text-align: justify; text-justify: inter-word; padding: 3%"><?php echo $absktrak; ?></p>
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <div style="text-align: left; max-height: 100%; max-width: 100%; color: #2c3e50cf !important;">
                <div style="text-align: center;">
                  <?php echo "<img style='height:280px; width: 200px;' class='img-fluid' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
                  <p style="font-size: 16px; padding-top: 3%"><?php echo $judul; ?></p>
                  <p><i class="fa fa-user"></i> <?php echo $pengarang; ?> | <i class="fa fa-calendar"></i> <?=$oBuku->tahun_terbit?></p>
                </div>
              </div>
              <button class="btn btn-primary center" style="bottom: 0; width: 160px; background-color: #2c3e50; color: white; border-color: white;"><?=$oBuku->jenis_katalog?></button>
             </div>
          </a>
         </div>
          <?php endforeach ?>
          <?php endif ?>
        </div>

    </div>
  </section>
                    </div>
                  </div>
                  <!-- profile -->
                  <div id="profile" class="tab-pane">
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>


        <!-- javascripts -->
  <script src="<?=ROOT_URL?>static/other/js/jquery.js"></script>
  <script src="<?=ROOT_URL?>static/other/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?=ROOT_URL?>static/other/js/jquery.scrollTo.min.js"></script>
  <script src="<?=ROOT_URL?>static/other/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="<?=ROOT_URL?>static/other/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="<?=ROOT_URL?>static/other/js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>

<?php require 'inc/footer.php' ?>