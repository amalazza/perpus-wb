<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<?php if (empty($this->oAnggota)): ?>
  <?php else: ?>
<?php endif; ?>
 
<div class="row">
  <!-- profile-widget -->
  <div class="col-lg-12">
    <div class="profile-widget profile-widget-info" style="background-color: #1abc9c;">
      <div class="panel-body">

        <div class="col-lg-2 col-sm-2">
            <?php 
                echo "<img class='follow-ava' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oAnggota->foto))."' style=' transform: scale(2.5, 2.5); margin-top: 50px;'/>";
            ?>
        </div>

        <div class="col-lg-4 col-sm-4 follow-info">
          <h2>
            <?=$this->oAnggota->nama?>
          </h2>
          <h4>
            <i>NIS   : </i><?=$this->oAnggota->no_anggota?>
          </h4>
          <h4>
            <i>Kelas : </i><?=$this->oAnggota->kelas?>
          </h4>
          <h4> 
            <i>Email : </i><?=$this->oAnggota->email?>
          </h4>
        </div>
        
        <div class="col-lg">
          <div class="col-lg-2 col-sm-6 follow-info weather-category">
            <div class="follow-info">
                <h2 style="text-align: right; padding-right: 5%;">
                  LIHAT PROFILE LEBIH JAUH?
                </h2>
            </div>
          </div>
          <div class="col-lg-2 col-sm-6 follow-info weather-category">
            <ul style="background-color: #1abc9c;">
              <li class="active">
                <h3>
                  <i class="fa fa-user fa-2x"> </i><br> 
                  <button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailAnggota" onclick="tes()" style="background-color: #15305b; color: white; border-color: white;">DETAIL</button>
                </h3>
                Lihat Detail Profile
              </li>
            </ul>
          </div>
          <div class="col-lg-2 col-sm-6 follow-info weather-category">
            <ul style="background-color: #1abc9c;">
              <li class="active">
                <h3>
                  <i class="fa fa-user fa-2x"> </i><br> 
                  <form action="<?=ROOT_URL?>?p=anggota&amp;a=edit&amp;id=<?=$this->oAnggota->no_anggota?>" method="post">
                    <button class="btn btn-primary" type="submit" name="edit" value="1" style="background-color: #15305b; color: white; border-color: white;">EDIT</button>
                  </form>
                </h3>
                Edit Profile
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
      <header class="panel-heading birunavbarwb">
        <ul class="nav nav-tabs" >
          <li class="active">
            <a data-toggle="tab" href="#aktifitas" >
                AKTIVITAS
            </a>
          </li>
          <li>
            <a data-toggle="tab" href="#pemesanan">
                PEMESANAN
            </a>
          </li>
          <li>
            <a data-toggle="tab" href="#peminjaman">
                PEMINJAMAN
            </a>
          </li>
          <li>
            <a data-toggle="tab" href="#riwayat-pinjam">
                RIWAYAT PINJAM
            </a>
          </li>
          <li>
            <a data-toggle="tab" href="#belum-dinilai">
                BELUM DINILAI
            </a>
          </li>
          <li>
            <a data-toggle="tab" href="#sudah-dinilai">
                SUDAH DINILAI
            </a>
          </li>
        </ul>
      </header>

      <div class="panel-body">
        <div class="tab-content" >

          <!-- aktifitas -->
          <div id="aktifitas" class="tab-pane active">
            <section>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal;">
                      <!-- Portfolio Section Heading -->
                      <h2>Aktifitas</h2>
                      <!-- Icon Divider -->
                      <div class="divider-custom">
                        <div class="divider-custom-line" style="background-color: white"></div>
                        <div class="divider-custom-icon">
                          <i class="fas fa-book" style="color: white"></i>
                        </div>
                        <div class="divider-custom-line" style="background-color: white"></div>
                      </div>
                    </div>
                    <div class="panel-body bio-graph-info">
                      <table class="table table-striped table-advance table-hover">
                        <tbody>              
                          <?php foreach ($this->oAlog as $oAlog): 
                         ?>
                          <tr>
                            <td style="background-color: ;">
                              <?php echo "<img class='follow-ava user-pic' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oAnggota->foto))."' style='height: 75px; width: 75px; float: left; -webkit-border-radius: 50%'/>"; ?> 
                              <div style="margin-left: 90px;">
                                <h3 style="font-size: 20px; color: #666666; margin-bottom: 8px;">
                                  <?=$oAlog->activity?>  
                                </h3>
                                <div>
                                  <i class="fa fa-clock"><p style="float: right; margin-left: 6px;"><?=$oAlog->tanggal?></p></i>
                                </div>
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
            </section>
          </div>

          <!-- pemesanan -->
          <div id="pemesanan" class="tab-pane" >
            <div class="profile-activity">
              <section class="page-section portfolio" id="portfolio">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; margin-top: -5%">
                    <!-- Portfolio Section Heading -->
                    <h2>Peminjaman Buku</h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                      <div class="divider-custom-line" style="background-color: white"></div>
                      <div class="divider-custom-icon">
                        <i class="fas fa-book" style="color: white"></i>
                      </div>
                      <div class="divider-custom-line" style="background-color: white"></div>
                    </div>
                  </div>

                  <div class="panel-body bio-graph-info">
                    <div style=" width: 100%; text-align: center;">
                      <div style=" display: inline;">
                        <div id="myBtnContainer">
                        <button class="dropbtn active" id="idAll1" value="all" onclick="getAll1()"> Show all</button>

                        <select class="dropbtn" id="cbtahun1" name="cbtahun" onchange="getTahun1()">
                        <option value="all">- Tahun Terbit -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oTahun as $oTahun): ?>
                          <option class="opt1" value="<?=$oTahun->thn_terbit?>" ><?=$oTahun->thn_terbit?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKlasi1" name="cbKlasi" onchange="getKlasi1()">
                        <option value="all">- Klasifikasi -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenis as $oJenis): ?>
                          <option class="opt3" value="<?=$oJenis->nama_klasifikasi?>" ><?=$oJenis->nama_klasifikasi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKoleksi1" name="cbKoleksi1" onchange="getKoleksi1()">
                        <option value="all">- Koleksi -</option>
                        <?php if (empty($this->oKoleksi)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                          <option class="opt4" value="<?=$oKoleksi->jenis_koleksi?>" ><?=$oKoleksi->jenis_koleksi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <br>
                    <!-- Portfolio Grid Items -->
                    <div class="row">
                      <?php if (empty($this->oPesan)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oPesan as $oBuku):
                          $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
                          $judul = substr($oBuku->judul, 0, 30) . '...';
                          $pengarang = substr($oBuku->pengarang, 0, 30);
                           ?>
                          <?php require 'inc/card_buku.php' ?>
                        <?php endforeach ?>
                      <?php endif ?>
                    </div>
                  </div>
                </section>
              </section>
            </div>
          </div>

          <!-- peminjaman -->
          <div id="peminjaman" class="tab-pane" >
            <div class="profile-activity">
              <section class="page-section portfolio" id="portfolio">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; margin-top: -5%">
                    <!-- Portfolio Section Heading -->
                    <h2>Peminjaman Buku</h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                      <div class="divider-custom-line" style="background-color: white"></div>
                      <div class="divider-custom-icon">
                        <i class="fas fa-book" style="color: white"></i>
                      </div>
                      <div class="divider-custom-line" style="background-color: white"></div>
                    </div>
                  </div>

                  <div class="panel-body bio-graph-info">
                    <div style=" width: 100%; text-align: center;">
                      <div style=" display: inline;">
                        <div id="myBtnContainer">
                        <button class="dropbtn active" id="idAll2" value="all" onclick="getAll2()"> Show all</button>

                        <select class="dropbtn" id="cbtahun2" name="cbtahun" onchange="getTahun2()">
                        <option value="all">- Tahun Terbit -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oTahun as $oTahun): ?>
                          <option class="opt1" value="<?=$oTahun->thn_terbit?>" ><?=$oTahun->thn_terbit?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKlasi2" name="cbKlasi" onchange="getKlasi2()">
                        <option value="all">- Klasifikasi -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenis as $oJenis): ?>
                          <option class="opt3" value="<?=$oJenis->nama_klasifikasi?>" ><?=$oJenis->nama_klasifikasi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKoleksi2" name="cbKoleksi" onchange="getKoleksi2()">
                        <option value="all">- Koleksi -</option>
                        <?php if (empty($this->oKoleksi)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                          <option class="opt4" value="<?=$oKoleksi->jenis_koleksi?>" ><?=$oKoleksi->jenis_koleksi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <br>
                    <!-- Portfolio Grid Items -->
                    <div class="row">
                      <?php if (empty($this->oPinjam)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oPinjam as $oBuku):
                          $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
                          $judul = substr($oBuku->judul, 0, 30) . '...';
                          $pengarang = substr($oBuku->pengarang, 0, 30);
                           ?>
                          <?php require 'inc/card_buku.php' ?>
                        <?php endforeach ?>
                      <?php endif ?>
                    </div>
                  </div>
                </section>
              </section>
            </div>
          </div>
          
          <!-- riwayat pinjam -->
          <div id="riwayat-pinjam" class="tab-pane" >
            <div class="profile-activity">
              <section class="page-section portfolio" id="portfolio">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; margin-top: -5%">
                    <!-- Portfolio Section Heading -->
                    <h2>Riwayat Pinjam Buku</h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                      <div class="divider-custom-line" style="background-color: white"></div>
                      <div class="divider-custom-icon">
                        <i class="fas fa-book" style="color: white"></i>
                      </div>
                      <div class="divider-custom-line" style="background-color: white"></div>
                    </div>
                  </div>

                  <div class="panel-body bio-graph-info">
                    <div style=" width: 100%; text-align: center;">
                      <div style=" display: inline;">
                        <div id="myBtnContainer">
                        <button class="dropbtn active" id="idAll3" value="all" onclick="getAll3()"> Show all</button>

                        <select class="dropbtn" id="cbtahun3" name="cbtahun" onchange="getTahun3()">
                        <option value="all">- Tahun Terbit -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oTahun as $oTahun): ?>
                          <option class="opt1" value="<?=$oTahun->thn_terbit?>" ><?=$oTahun->thn_terbit?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKlasi3" name="cbKlasi" onchange="getKlasi3()">
                        <option value="all">- Klasifikasi -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenis as $oJenis): ?>
                          <option class="opt3" value="<?=$oJenis->nama_klasifikasi?>" ><?=$oJenis->nama_klasifikasi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKoleksi3" name="cbKoleksi" onchange="getKoleksi3()">
                        <option value="all">- Koleksi -</option>
                        <?php if (empty($this->oKoleksi)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                          <option class="opt4" value="<?=$oKoleksi->jenis_koleksi?>" ><?=$oKoleksi->jenis_koleksi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <br>
                    <!-- Portfolio Grid Items -->
                    <div class="row">
                      <?php if (empty($this->oRiwayat)): ?>
                      <?php else: ?>
                          <?php foreach ($this->oRiwayat as $oBuku):
                          $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
                          $judul = substr($oBuku->judul, 0, 30) . '...';
                          $pengarang = substr($oBuku->pengarang, 0, 30);
                           ?>
                          <?php require 'inc/card_buku.php' ?>
                        <?php endforeach ?>
                      <?php endif ?>
                    </div>
                  </div>
                </section>
              </section>
            </div>
          </div>

          <!-- Buku Belum Dinilai -->
          <div id="belum-dinilai" class="tab-pane" >
            <div class="profile-activity">
              <section class="page-section portfolio" id="portfolio">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; margin-top: -5%">
                    <!-- Portfolio Section Heading -->
                    <h2>Buku Belum Dinilai</h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                      <div class="divider-custom-line" style="background-color: white"></div>
                      <div class="divider-custom-icon">
                        <i class="fas fa-book" style="color: white"></i>
                      </div>
                      <div class="divider-custom-line" style="background-color: white"></div>
                    </div>
                  </div>

                  <div class="panel-body bio-graph-info">
                    <div style=" width: 100%; text-align: center;">
                      <div style=" display: inline;">
                        <div id="myBtnContainer">
                        <button class="dropbtn active" id="idAll4" value="all" onclick="getAll4()"> Show all</button>

                        <select class="dropbtn" id="cbtahun4" name="cbtahun" onchange="getTahun4()">
                        <option value="all">- Tahun Terbit -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oTahun as $oTahun): ?>
                          <option class="opt1" value="<?=$oTahun->thn_terbit?>" ><?=$oTahun->thn_terbit?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKlasi4" name="cbKlasi" onchange="getKlasi4()">
                        <option value="all">- Klasifikasi -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenis as $oJenis): ?>
                          <option class="opt3" value="<?=$oJenis->nama_klasifikasi?>" ><?=$oJenis->nama_klasifikasi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKoleksi4" name="cbKoleksi" onchange="getKoleksi4()">
                        <option value="all">- Koleksi -</option>
                        <?php if (empty($this->oKoleksi)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                          <option class="opt4" value="<?=$oKoleksi->jenis_koleksi?>" ><?=$oKoleksi->jenis_koleksi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <!-- <select class="dropbtn" id="cbJenisBuku4" name="cbJenisBuku" onchange="getJenisBuku4()">
                        <option value="all">- Jenis Buku -</option>
                        <ul class="nav nav-tabs" >
                          <li>
                            <option>
                            <a data-toggle="tab" href="#ebook">E-Book</a></option>
                            <a data-toggle="tab" href="#bukufisik">Buku Fisik</a>
                            <a data-toggle="tab" href="#bukufisikdanebook">Buku Fisik dan E-Book</a>
                            
                          </li>
                        </ul>
                        </select> -->


                        <select class="dropbtn" id="cbJenisBuku4" name="cbJenisBuku" onchange="getJenisBuku4()">
                        <option value="all">- Jenis Buku -</option>
                        <?php if (empty($this->oJenisBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenisBuku as $oJenisBuku): ?>
                          <option class="opt5" value="<?=$oJenisBuku->jenis_katalog?>" ><?=$oJenisBuku->jenis_katalog?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <br>
                    <!-- Portfolio Grid Items -->
                    <div class="row">
                      <?php if (empty($this->oBelumDinilai)): ?>
                      <?php else: ?>
                          <?php foreach ($this->oBelumDinilai as $oBuku):
                          $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
                          $judul = substr($oBuku->judul, 0, 30) . '...';
                          $pengarang = substr($oBuku->pengarang, 0, 30);
                           ?>
                          <?php require 'inc/card_buku.php' ?>
                        <?php endforeach ?>
                      <?php endif ?>
                    </div>
                  </div>
                </section>
              </section>
            </div>
          </div>

          <!-- Buku Sudah Dinilai -->
          <div id="sudah-dinilai" class="tab-pane" >
            <div class="profile-activity">
              <section class="page-section portfolio" id="portfolio">
                <section class="panel">
                  <div class="bio-graph-heading birutopheadwb" style="text-align: center; font-style: normal; margin-top: -5%">
                    <!-- Portfolio Section Heading -->
                    <h2>Buku Sudah Dinilai</h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                      <div class="divider-custom-line" style="background-color: white"></div>
                      <div class="divider-custom-icon">
                        <i class="fas fa-book" style="color: white"></i>
                      </div>
                      <div class="divider-custom-line" style="background-color: white"></div>
                    </div>
                  </div>
                  
                  <div class="panel-body bio-graph-info">
                    <div style=" width: 100%; text-align: center;">
                      <div style=" display: inline;">
                        <div id="myBtnContainer">
                        <button class="dropbtn active" id="idAll5" value="all" onclick="getAll5()"> Show all</button>

                        <select class="dropbtn" id="cbtahun5" name="cbtahun" onchange="getTahun5()">
                        <option value="all">- Tahun Terbit -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oTahun as $oTahun): ?>
                          <option class="opt1" value="<?=$oTahun->thn_terbit?>" ><?=$oTahun->thn_terbit?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKlasi5" name="cbKlasi" onchange="getKlasi5()">
                        <option value="all">- Klasifikasi -</option>
                        <?php if (empty($this->oBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenis as $oJenis): ?>
                          <option class="opt3" value="<?=$oJenis->nama_klasifikasi?>" ><?=$oJenis->nama_klasifikasi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbKoleksi5" name="cbKoleksi" onchange="getKoleksi5()">
                        <option value="all">- Koleksi -</option>
                        <?php if (empty($this->oKoleksi)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                          <option class="opt4" value="<?=$oKoleksi->jenis_koleksi?>" ><?=$oKoleksi->jenis_koleksi?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        <select class="dropbtn" id="cbJenisBuku5" name="cbJenisBuku" onchange="getJenisBuku5()">
                        <option value="all">- Jenis Buku -</option>
                        <?php if (empty($this->oJenisBuku)): ?>
                        <?php else: ?>
                        <?php foreach ($this->oJenisBuku as $oJenisBuku): ?>
                          <option class="opt5" value="<?=$oJenisBuku->jenis_katalog?>" ><?=$oJenisBuku->jenis_katalog?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                        </select>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel-footer" style="text-align: center;">
                    <br>
                    <!-- Portfolio Grid Items -->
                    <div class="row">
                      <?php if (empty($this->oSudahDinilai)): ?>
                      <?php else: ?>
                          <?php foreach ($this->oSudahDinilai as $oBuku):
                          $absktrak = substr($oBuku->absktrak, 0, 250) . '...';
                          $judul = substr($oBuku->judul, 0, 30) . '...';
                          $pengarang = substr($oBuku->pengarang, 0, 30);
                           ?>
                          <?php require 'inc/card_buku.php' ?>
                        <?php endforeach ?>
                      <?php endif ?>
                    </div>
                  </div>
                </section>
              </section>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
</div>

<!--MODAL BOX DETAIL PROFILE-->
<div id="detailAnggota" class="modal fade" role="dialog">
  <div class="modal-dialog" style="left:auto;">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title-centered" >Detail Anggota</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
    </div>
    <div class="modal-body">
    <div id="foto"></div>
    <table class="table table-striped table-advance table-hover">
      <tbody>
        <tr>
          <th>NIS</th>
          <td><span id="nis"></span></td>
        </tr>
        <tr>
          <th>Nama</th>
          <td><span id="nama"></span></td>
        </tr>
        <tr>
          <th>Kelas</th>
          <td><span id="kelas"></span></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><span id="alamat"></span></td>
        </tr>
        <tr>
          <th>No telepon</th>
          <td><span id="no_telpon"></span></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><span id="email"></span></td>
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
  
<script>
  filterSelection("all")
  function getAll1(){
    var x = document.getElementById("idAll1").value;

    filterSelection(x);
    document.getElementById("cbtahun1").options[0].selected = 'selected';
    document.getElementById("cbKlasi1").options[0].selected = 'selected';
    document.getElementById("cbKoleksi1").options[0].selected = 'selected';
  }
  function getTahun1(){
    var x = document.getElementById("cbtahun1").value;
    filterSelection(x);
    document.getElementById("cbKlasi1").options[0].selected = 'selected';
    document.getElementById("cbKoleksi1").options[0].selected = 'selected';
  }
  function getKlasi1(){
    var x = document.getElementById("cbKlasi1").value;
    filterSelection(x);
    document.getElementById("cbtahun1").options[0].selected = 'selected';
    document.getElementById("cbKoleksi1").options[0].selected = 'selected';
  }
  function getKoleksi1(){
    var x = document.getElementById("cbKoleksi1").value;
    filterSelection(x);
    document.getElementById("cbKlasi1").options[0].selected = 'selected';
    document.getElementById("cbtahun1").options[0].selected = 'selected';
  }
  //=========================================================================
  function getAll2(){
    var x = document.getElementById("idAll2").value;

    filterSelection(x);
    document.getElementById("cbtahun2").options[0].selected = 'selected';
    document.getElementById("cbKlasi2").options[0].selected = 'selected';
    document.getElementById("cbKoleksi2").options[0].selected = 'selected';
  }
  function getTahun2(){
    var x = document.getElementById("cbtahun2").value;
    filterSelection(x);
    document.getElementById("cbKlasi2").options[0].selected = 'selected';
    document.getElementById("cbKoleksi2").options[0].selected = 'selected';
  }
  function getKlasi2(){
    var x = document.getElementById("cbKlasi2").value;
    filterSelection(x);
    document.getElementById("cbtahun2").options[0].selected = 'selected';
    document.getElementById("cbKoleksi2").options[0].selected = 'selected';
  }
  function getKoleksi2(){
    var x = document.getElementById("cbKoleksi2").value;
    filterSelection(x);
    document.getElementById("cbKlasi2").options[0].selected = 'selected';
    document.getElementById("cbtahunw2").options[0].selected = 'selected';
  }//=========================================================================
  function getAll3(){
    var x = document.getElementById("idAll3").value;

    filterSelection(x);
    document.getElementById("cbtahun3").options[0].selected = 'selected';
    document.getElementById("cbKlasi3").options[0].selected = 'selected';
    document.getElementById("cbKoleksi3").options[0].selected = 'selected';
  }
  function getTahun3(){
    var x = document.getElementById("cbtahun3").value;
    filterSelection(x);
    document.getElementById("cbKlasi3").options[0].selected = 'selected';
    document.getElementById("cbKoleksi3").options[0].selected = 'selected';
  }
  function getKlasi3(){
    var x = document.getElementById("cbKlasi3").value;
    filterSelection(x);
    document.getElementById("cbtahun3").options[0].selected = 'selected';
    document.getElementById("cbKoleksi3").options[0].selected = 'selected';
  }
  function getKoleksi3(){
    var x = document.getElementById("cbKoleksi3").value;
    filterSelection(x);
    document.getElementById("cbKlasi3").options[0].selected = 'selected';
    document.getElementById("cbtahun3").options[0].selected = 'selected';
  }//=========================================================================
  function getAll4(){
    var x = document.getElementById("idAll4").value;

    filterSelection(x);
    document.getElementById("cbtahun4").options[0].selected = 'selected';
    document.getElementById("cbKlasi4").options[0].selected = 'selected';
    document.getElementById("cbKoleksi4").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku4").options[0].selected = 'selected';
  }
  function getTahun4(){
    var x = document.getElementById("cbtahun4").value;
    filterSelection(x);
    document.getElementById("cbKlasi4").options[0].selected = 'selected';
    document.getElementById("cbKoleksi4").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku4").options[0].selected = 'selected';
  }
  function getKlasi4(){
    var x = document.getElementById("cbKlasi4").value;
    filterSelection(x);
    document.getElementById("cbtahun4").options[0].selected = 'selected';
    document.getElementById("cbKoleksi4").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku4").options[0].selected = 'selected';
  }
  function getKoleksi4(){
    var x = document.getElementById("cbKoleksi4").value;
    filterSelection(x);
    document.getElementById("cbKlasi4").options[0].selected = 'selected';
    document.getElementById("cbtahun4").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku4").options[0].selected = 'selected';
  }
  function getJenisBuku4(){
    var x = document.getElementById("cbJenisBuku4").value;
    filterSelection(x);
    document.getElementById("cbtahun4").options[0].selected = 'selected';
    document.getElementById("cbKlasi4").options[0].selected = 'selected';
    document.getElementById("cbKoleksi4").options[0].selected = 'selected';
   }//=========================================================================
  function getAll5(){
    var x = document.getElementById("idAll5").value;

    filterSelection(x);
    document.getElementById("cbtahun5").options[0].selected = 'selected';
    document.getElementById("cbKlasi5").options[0].selected = 'selected';
    document.getElementById("cbKoleksi5").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku5").options[0].selected = 'selected';
  }
  function getTahun5(){
    var x = document.getElementById("cbtahun5").value;
    filterSelection(x);
    document.getElementById("cbKlasi5").options[0].selected = 'selected';
    document.getElementById("cbKoleksi5").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku5").options[0].selected = 'selected';
  }
  function getKlasi5(){
    var x = document.getElementById("cbKlasi5").value;
    filterSelection(x);
    document.getElementById("cbtahun5").options[0].selected = 'selected';
    document.getElementById("cbKoleksi5").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku5").options[0].selected = 'selected';
  }
  function getKoleksi5(){
    var x = document.getElementById("cbKoleksi5").value;
    filterSelection(x);
    document.getElementById("cbKlasi5").options[0].selected = 'selected';
    document.getElementById("cbtahun5").options[0].selected = 'selected';
    document.getElementById("cbJenisBuku5").options[0].selected = 'selected';
  }
  function getJenisBuku5(){
    var x = document.getElementById("cbJenisBuku5").value;
    filterSelection(x);
    document.getElementById("cbtahun5").options[0].selected = 'selected';
    document.getElementById("cbKlasi5").options[0].selected = 'selected';
    document.getElementById("cbKoleksi5").options[0].selected = 'selected';
    }//=========================================================================

  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1)
        w3AddClass(x[i], "show");
    }
  }

  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }

  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }

  // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("myBtnContainer");
  var cbs = btnContainer.getElementsByClassName("dropbtn");
  var opts = dropbtn.getElementsByClassName("opt1");
  for (var i = 0; i < btns.length; i++) {
    opts[i].addEventListener("click", function(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }

//DETAIL PROFILE
function tes(){
const id = <?php echo $_SESSION['id']?>;
$.ajax({
      url: 'http://localhost/perpus-wb/anggota/?p=anggota&a=detailProfile',
      data: {id:id},
      method:'post',
      dataType: 'json'
    }).done(function(Data){
      //console.log(Data.nama);
      $('#nis').text(Data.no_anggota); 
      $('#nama').text(Data.nama);
      $('#kelas').text(Data.kelas); 
      $('#alamat').text(Data.alamat);
      $('#no_telpon').text(Data.no_telpon); 
      $('#email').text(Data.email);
       
      
    });
};
</script>

<?php require 'inc/footer.php' ?>