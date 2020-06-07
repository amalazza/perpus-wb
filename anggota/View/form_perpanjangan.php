<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<?php if (empty($this->oBuku)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>
<div class="row">
    <div class="col-lg-12">
      <section class="panel" >
        <div class="panel-body">
          <div class="tab-content">
            
            <!-- profile -->
            <div id="profile">
              <form class="form-validate form-horizontal" role="form" method="post" action="">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; ">
                    <h1>PERPANJANGAN</h1>
                  </div>
                  <div class="panel-body bio-graph-info">
                    <div class="col-lg-3">
                      <div class="follow-ava" style="-webkit-border-radius: 5%;">
                        <?php 
                            echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oBuku->cover))."' style='height: 200px; width: 200px; border-radius: 4%;'/>";
                        ?>
                      </div>
                    </div>
                    <br>
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                      <h1>INFO PERPANJANGAN</h1>
                      <div class="bio-row"  style="width: 100%;">
                        <div>
                        <?php $newke = $this->oBuku->perpanjangan_ke+1; ?>
                          <p><span>Perpanjangan</span>:<input class="ke" id="ke" name="ke" style="background: 0; border: 0; width: 80px; overflow: visible; outline: 0; height: auto; color: #666666;" type="text" value="<?php echo $newke; ?>" readonly="readonly"/> </p>
                        </div>
                        <div>
                          <p><span>Tanggal Pinjam</span>: <?=$this->oBuku->tanggal_pinjam?></p>
                        </div>
                        <div>
                          <p><span>Tanggal Kembali</span>: <?=$this->oBuku->batas_kembali?></p>
                        </div>
                        <div>
                          <?php
                              $tanggalSekarang = $this->oBuku->batas_kembali;
                              $newTanggalSekarang=strtotime($tanggalSekarang);

                              $jumlahHari=$this->oPerpjg->hari;
                              $NewjumlahHari=86400*$jumlahHari;

                              $hasilJumlah = $newTanggalSekarang + $NewjumlahHari;
                              $tampilHasil=date("Y-m-d",$hasilJumlah);
                          ?>
                          <p><span>Diperpanjang</span>: <input class="perpjg" id="perpjg" name="perpjg" style="background: 0; border: 0; width: 80px; overflow: visible; outline: 0; height: auto; color: #666666;" type="text" value="<?php echo $tampilHasil; ?>" readonly="readonly"/></p>                  
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <input class="tombolbirufooterrwb btn btn-primary btn-lg" type="submit" name="btn_update" value="Perpanjang"/>
                  </div>
                </section>
              </form>
            </div>
          </div>
      </div>
    </section>
  </div>
</div>
<?php endif ?>
<?php require 'inc/footer.php' ?>
</div>