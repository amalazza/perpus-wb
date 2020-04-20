<?php require 'inc/header.php' ?>

<?php if (empty($this->oBuku)): ?>
    <p class="error">The post can't be be found!</p>
<?php else: ?>
<!-- profile -->
              <div id="profile">
                <section class="panel">
                  <div class="panel-body bio-graph-info">
                    <div class="col-sm-2" style="text-align: center;">
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
                        	<p><span>Tanggal Pinjam</span>: <?=$this->oBuku->tanggal_pinjam?></p>
                        </div>
                        <div>
                        	<p><span>Tanggal Kembali</span>: <?=$this->oBuku->batas_kembali?></p>
                        </div>
                        <div>
                        <p><span>Perpanjangan</span>: <input style="float: right;" type="text" disabled="true" value="<?php
                          $tgl1 = $this->oBuku->batas_kembali;
                          $hari = $this->oPerpjg->hari;
                          $tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1)));
                          echo $tgl2;
                          ?>"></p>
                        	<br>
                          <input style="display: none;" type="text" name="newTanggal" id="newTanggal" value="<?php echo $tgl2; ?>">
                          <input style="display: none;" type="text" name="ke" id="ke" value="<?=$this->oBuku->perpanjangan_ke?>">
                          <input  style="display: none;"  type="text" name="idnya" id="idnya" value="<?php echo $_GET['id']; ?>">
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

<?php require 'inc/footer.php' ?>