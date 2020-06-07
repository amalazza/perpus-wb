<?php require 'inc/header.php' ?>

<?php if (empty($this->oBuku)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>

    <!--main content start d-->
    <div class="row">
      <!-- profile-widget -->
      <div class="col-lg-12">
        <div class="profile-widget profile-widget-info" style="background-color: #1abc9c;">
          <div class="panel-body">
            <div class="col-lg-2 col-sm-2">
              <div class="follow-ava" style="-webkit-border-radius: 5%;">
                <!-- <img src="data:<?=$oBuku->mime?>;base64,<?=base64_encode($oBuku->cover); ?>" style="height: 100%; width: 100%; -webkit-border-radius: 0%;"/> -->
                <!-- <img src="<?=ROOT_URL?>static/img/cover_buku.png" alt="" style="height: 100%; width: 100%; -webkit-border-radius: 0%;"> -->
                <?php 
                    echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oBuku->cover))."' style='height: 100%; width: 100%; border-radius: 4%;'/>";
                ?>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 follow-info">
              <h2>
                <?=$this->oBuku->judul?>
              </h2>
              <h3>
                <i class="fa fa-user"></i>  <?=$this->oBuku->pengarang?>
              </h3>
              <h4> 
                <i class="fa fa-eye"></i>  22 <span>Dibaca</span> *SPRINT3
              </h4>
              <h4> 
                <i class="icon_star"></i>  3,5 <span>/5 Penilaian</span> *SPRINT3
              </h4>
            </div>

            <div class="col-lg">
              <div class="col-lg-2 col-sm-6 follow-info weather-category">
                <div class="follow-info">
                    <h2 style="text-align: right; padding-right: 5%;">
                      INGIN MELIHAT LEBIH JAUH?
                    </h2>
                </div>
              </div>
              <?php if (!empty($_SESSION['is_logged'])): ?>
                <?php if (empty($this->oStatus)): ?>
				<?php if (empty($this->oPesan)): ?>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="fisik">
                <div class="card-box bg-orange" style="border: 1px solid white;">
                    <div class="inner">
                        <h3> PESAN </h3>
                        <p><small> Kini, pinjam buku di Wira Buana bisa pesan dulu </small></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    </div>
                    <button type="submit" name="pinjam" value="PINJAM" class="card-box-footer" style="border-color: transparent;" onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=pemesanan&amp;id=<?=$this->oBuku->no_katalog?>'">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
			  <?php else: ?>
			  <?php endif; ?>
              <?php else: ?>

              <?php if($this->oStatus->status == "dipinjam"): ?>
              <?php if (empty($this->dataPerpanjang)): ?>
              <?php else: ?>
              <?php if ($this->oStatus->perpanjangan_ke < $this->dataPerpanjang->batas): ?>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="perpanjang">
                <div  class="card-box bg-orange" style="border: 1px solid white">
                    <div class="inner">
                        <h3> PERPANJANG </h3>
                        <p> <small>Perpanjang waktu peminjaman agar tidak denda</small></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    </div>
                    <button class="card-box-footer" style="border-color: transparent;" type="submit" name="perpanjangan" value="PERPANJANGAN" onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=perpanjangan&amp;id=<?=$this->oBuku->no_katalog?>'">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
              <?php else: ?>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="perpanjang">
                <div  class="card-box bg-orange" style="border: 1px solid white">
                    <div class="inner">
                        <h3> PERPANJANG </h3>
                        <p><small> Kamu sudah melakukan perpanjangan ke <?= $this->dataPerpanjang->batas?> </small></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    </div>
                    <button class="card-box-footer" style="border-color: transparent;" type="submit" name="edit" value="1" disabled>Tidak bisa melakukannya lagi</button>
                </div>
              </div>
              <?php endif ?>
              <?php endif ?>
              <?php else: ?>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="fisik">
                <div class="card-box bg-orange" style="border: 1px solid white;">
                    <div class="inner">
                        <h3> PESAN </h3>
                        <p><small> Kini, pinjam buku di Wira Buana bisa pesan dulu </small></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    </div>
                    <button type="submit" name="pinjam" value="PINJAM" class="card-box-footer" style="border-color: transparent;" onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=pemesanan&amp;id=<?=$this->oBuku->no_katalog?>'">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
              <?php endif; ?>
              <?php endif; ?>
              <?php else: ?>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="fisik">
                <div class="card-box bg-orange" style="border: 1px solid white;">
                    <div class="inner">
                        <h3> PESAN </h3>
                        <p><small> Kini, pinjam buku di Wira Buana bisa pesan dulu </small></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    </div>
                    <button type="submit" name="pinjam" value="PINJAM" class="card-box-footer" style="border-color: transparent;" onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=pemesanan&amp;id=<?=$this->oBuku->no_katalog?>'">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
              <?php endif ?>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" >
                <div  class="card-box bg-red" style="border: 1px solid white">
                    <div class="inner">
                        <h3> BACA </h3>
                        <p><small> E-book yang bisa dibaca dimana dan kapan saja </small></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    </div>
                    <button class="card-box-footer" style="border-color: transparent;" type="submit" name="pinjam" value="BACA"  onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=view&amp;id=<?=$this->oBuku->no_katalog?>'">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel" >
          <header class="panel-heading tab-bg-info birunavbarwb" style="">
            <ul class="nav nav-tabs">
              <li class="active">
                <a data-toggle="tab" href="#recent-activity">
                  <i class="icon-home"></i>
                  DETAIL BUKU
                </a>
              </li>
            </ul>
          </header>
          <div class="panel-body">
            <div class="tab-content">
              
              <!-- profile -->
              <div id="profile">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: left; ">
                    <?=$this->oBuku->absktrak?>
                  </div>
                  <div class="panel-body bio-graph-info">
                    <div class="col-lg-6">
                        <h1>INFORMASI BUKU</h1>
                        <div class="bio-row" style="width: 100%;">
                          <div>
                            <p ><span>Judul </span>: <?=$this->oBuku->judul?> </p>
                          </div>
                          <div>
                            <p><span>Penulis </span>: <?=$this->oBuku->pengarang?></p>
                          </div>
                          <div>
                            <p><span>Penerbit</span>: <?=$this->oBuku->penerbit?></p>
                          </div>
                          <div>
                            <p><span>Kota Terbit </span>: <?=$this->oBuku->kota_terbit?></p>
                          </div>
                          <div>
                            <p><span>Tahun Terbit </span>: <?=$this->oBuku->tahun_terbit?></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1>INFORMASI DI PERPUSTAKAAN</h1>
                        <div class="bio-row"  style="width: 100%;">
                          <div>
                            <p><span>Lokasi Rak </span>: <?=$this->oBuku->lokasi?> </p>
                          </div>
                          <div>
                            <p><span>Stok </span>: <?=$this->oBuku->stok?></p>
                          </div>
                          <div>
                            <p><span>Bentuk Buku</span>: <span id="jenis_katalog" style="display: inline;"><?=$this->oBuku->jenis_katalog?></span></p>
                          </div>
                          <!-- <div onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=perpanjangan&amp;id=<?=$this->oBuku->no_katalog?>'" class="btn btn-primary" style="background-color: #2c3e50; color: white; border-color: white;">Perpanjangan
                          </div> -->
                        </div>
                    </div>
                  </div>
                  <?php require 'inc/rating_view.php' ?>
                </section>
              </div>
            </div>
        </div>
      </section>
    </div>
    </div>

<script type="text/javascript">
var jenis = document.getElementById("jenis_katalog").innerText
    
    //alert(jenis);
    
    if( jenis == "Buku Fisik"){
      document.getElementById('ebookButton').style.display = "none";
	  document.getElementById('fisik').style.display = "block";
     //alert(jenis);
    }
  if(jenis == "E-Book"){
    document.getElementById('ebookButton').style.display = "block";
	document.getElementById('fisik').style.display = "none";
    //alert(jenis);
  }
  else{
	  
  }
</script>

<?php endif ?>

<?php require 'inc/footer.php' ?>