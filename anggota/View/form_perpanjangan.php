<?php require 'inc/header.php' ?>

<?php if (empty($this->oBuku)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>
<!-- profile -->
              <div id="profile" >
                <section class="panel" >
                  <div class="panel-body bio-graph-info" style="height: 700px;">
                    <div class="col-sm-2" style="text-align: center; ">
                        <h4 style="font-size: 20px;">INFORMASI BUKU</h4>
                        <div class="bio-row" style="width: 100%;">
                          <div style="height: 200px; width: 180px;">
                          <?php 
                    echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oBuku->cover))."' style='height: 100%; width: 100%; -webkit-border-radius: 0%'/>"; ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3" style="margin-top: 45px;">
                        <div class="bio-row"  style="width: 100%;">
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
                          <div>
                            <p><span>Stok </span>: <?=$this->oBuku->stok?></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="width: 330px; margin-top: 45px;">
                    <form class="form-validate form-horizontal" role="form" method="post" action="">
                        <div class="bio-row"  style="width: 100%;">
                        <div>
                          <p>INFO PERPANJANGAN</p>
                        </div>
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
                          <input class="btn btn-primary" style="background-color: #2c3e50; color: white; border-color: white; text-align: center; font-size: 15px;" type="submit" name="btn_update" value="Perpanjang">
                        </div>
                    </form>
                    </div>
                  </div>
                </section>
              </div>
            </div>
        </div>

<?php endif ?>
<div style="position: absolute; bottom: 0; width: 100%;">
<?php require 'inc/footer.php' ?>
</div>