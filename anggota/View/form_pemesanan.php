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
              <form class="form-validate form-horizontal" role="form" method="post" action="" onsubmit="return confirm('harap ambil buku <?=$this->oBuku->judul?> sebelum <?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d H:i:s', strtotime('+1 day'));?>')">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; ">
                    <h1>PEMESANAN</h1>
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
                      <h1>INFORMASI PEMESANAN</h1>
                      <div class="bio-row"  style="width: 100%;">
                      <input type="hidden" name="jdl" id="jdl" value="<?=$this->oBuku->judul?>">
                      <input type="hidden" name="tgla" id="tgla" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d H:i:s', strtotime('+1 day'));?>">
                        <div>
                          <p>Tanggal Pemesanan: <input class="tanggal_pesan" id="tanggal_pesan" name="tanggal_pesan" style="background: 0; border: 0; width: auto; overflow: visible; outline: 0; height: auto; color: #666666;" type="text" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("Y-m-d H:i:s"); ?>" readonly="readonly"/></p>
                        </div>
                        <div>
                          <p>Batas Waktu Pengambilan Buku: <input class="batas_pengambilan_buku" id="batas_pengambilan_buku" name="batas_pengambilan_buku" style="background: 0; border: 0; width: auto; overflow: visible; outline: 0; height: auto; color: #666666;" type="text" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d H:i:s', strtotime('+1 day'));?>" readonly="readonly"/></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <input class="tombolbirufooterrwb btn btn-primary btn-lg" type="submit" name="btn_update" value="pemesanan"/>
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