<?php require 'inc/header.php' ?>

<?php if (empty($this->oBuku)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>

    <!--main content start-->
    <div class="row">
      <!-- profile-widget -->
      <div class="col-lg-12">
        <div class="profile-widget profile-widget-info" style="background-color: #1abc9c;">
          <div class="panel-body">
            <div class="col-lg-2 col-sm-2">
              <div class="follow-ava" style="-webkit-border-radius: 0%;">
                <!-- <img src="data:<?=$oBuku->mime?>;base64,<?=base64_encode($oBuku->cover); ?>" style="height: 100%; width: 100%; -webkit-border-radius: 0%;"/> -->
                <!-- <img src="<?=ROOT_URL?>static/img/cover_buku.png" alt="" style="height: 100%; width: 100%; -webkit-border-radius: 0%;"> -->
                <?php 
                    echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oBuku->cover))."' style='height: 100%; width: 100%; -webkit-border-radius: 0%'/>";
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
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="fisik">
                <ul style="background-color: #1abc9c;">
                <?php 
                $str = $this->oStatus->status;
                $stat2 = strcmp("kembali", $str);  ?>
                <?php if (empty($str) || $stat2 == 0): ?>
                  <?php echo "<li class='active'>
                    <h3>
                      <i class='fa fa-bell fa-2x'> </i><br> 
                      <input type='submit' name='pinjam' value='PINJAM' class='btn btn-primary' style='background-color: #2c3e50; color: white; border-color: white;'x/> 
                    </h3>
                    Kini, pinjam buku di Wira Buana bisa order dulu *SPRINT3
                  </li>"; ?>
                <?php else: ?>
                  <li class="ctive" id="divpPanjang">
                    <h3>
                      <i class="fa fa-bell fa-2x"> </i><br> 
                      <input type="submit" name="pPanjang" value="PERPANJANG" class="btn btn-primary" style="background-color: #2c3e50; color: white; border-color: white;" onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=perpanjangan&amp;id=<?=$this->oBuku->no_katalog?>'"/> 
                    </h3>
                    Yuk, perpanjang waktu peminjamanmu, agar tidak terkena denda
                  </li>
                <?php endif ?>   

                </ul>
              </div>
              <div class="col-lg-2 col-sm-6 follow-info weather-category" id="ebookButton">
                <ul style="background-color: #1abc9c;">
                  <li class="active">
                    <h3>
                      <i class="fa fa-bell fa-2x"> </i><br> 
                      <input type="submit" name="pinjam" value="BACA" class="btn btn-primary" style="background-color: #2c3e50; color: white; border-color: white;" onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=view&amp;id=<?=$this->oBuku->no_katalog?>'"/> 
                    </h3>
                    Buku-buku elektronik yang bisa dibaca dimana dan kapan saja
                  </li>
                </ul>
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
          <header class="panel-heading tab-bg-info">
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
                  <div class="bio-graph-heading" style="text-align: left; ">
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
                            <p><span>Bentuk Buku</span>: <span id="jenis_katalog"><?=$this->oBuku->jenis_katalog?></span></p>
                          </div>
                          <div onclick="window.location='<?=ROOT_URL?>?p=buku&amp;a=perpanjangan&amp;id=<?=$this->oBuku->no_katalog?>'" class="btn btn-primary" style="background-color: #2c3e50; color: white; border-color: white;">Perpanjangan
                          </div>
                        </div>
                    </div>
                  </div>
                  <?php require 'inc/rating.php' ?>
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
     //alert(jenis);
    }
  else{
    document.getElementById('ebook').style.display = "block";
    //alert(jenis);
  }
</script>

<?php endif ?>

<?php require 'inc/footer.php' ?>