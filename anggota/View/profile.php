<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>


<?php 

if (empty($this->oAnggota)): ?>
  <?php else: ?>
    <?php endif ?>
 
<!--main sscontent start-->
  <div class="row">
    <!-- profile-widget -->
    <div class="col-lg-12">
      <div class="profile-widget profile-widget-info" style="background-color: #1abc9c;">
        <div class="panel-body">
          <div class="col-lg-2 col-sm-2">
            <div class="follow-ava" style="-webkit-border-radius: 0%;">
              <?php 
                  echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oAnggota->foto))."' style='height: 100%; width: 100%; -webkit-border-radius: 0%'/>";
              ?>
            </div>
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
          <button class="btn btn-primary detail" id="detail" type="button" data-toggle="modal" data-target="#detailAnggota" onclick="tes()" style="background-color: #2c3e50; color: white; border-color: white;">DETAIL</button>
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
                    <form action="<?=ROOT_URL?>?p=anggota&amp;a=edit&amp;id=<?=$data->no_anggota?>" method="post">
                      <button class="btn btn-danger" type="submit" name="edit" value="1" style="background-color: #2c3e50; color: white; border-color: white;">EDIT</button>
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
              <header class="panel-heading" style="background-color: #2c3e50;">
                <ul class="nav nav-tabs" >
                  <li>
                    <a data-toggle="tab" href="#aktifitas">
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
                  
                </ul>
              </header>
              <div class="panel-body" style="background-color: #eeeeee">
                <div class="tab-content" >

                  <!-- aktifitas -->
                  <div id="aktifitas" class="tab-pane">
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>

                  <!-- pemesanan -->
                  <div id="pemesanan" class="tab-pane">
                    <div class="profile-activity">
                      <section class="page-section portfolio" id="portfolio">
                        <div class="container">

                        <!-- Portfolio Section Heading -->
                        <h2 class="page-section-heading text-center text-secondary mb-0" style="margin-top: -4%">Pemesanan Buku</h2>

                        <!-- Icon Divider -->
                        <div class="divider-custom">
                          <div class="divider-custom-line"></div>
                          <div class="divider-custom-icon">
                            <i class="fas fa-book"></i>
                          </div>
                          <div class="divider-custom-line"></div>
                        </div>

                        <br>

                        <div style=" width: 100%; margin-top: -20px; padding-bottom: 5px; text-align: center;">
                            <div style=" display: inline;">
                              <div id="myBtnContainer">
                              <button class="dropbtn active" onclick="filterSelection('all')"> Show all</button>
                              <select class="dropbtn" id="cbtahun" name="cbtahun">
                                <option>- Tahun Terbit -</option>
                                <?php if (empty($this->oPesan)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oTahun as $oTahun): ?>
                                  <option class="opt1" onclick="filterSelection('<?=$oTahun->thn_terbit?>')" ><?=$oTahun->thn_terbit?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              <select class="dropbtn" id="cbKlasi" name="cbKlasi">
                                <option>- Klasifikasi -</option>
                                <?php if (empty($this->oPesan)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oJenis as $oJenis): ?>
                                  <option class="opt3" onclick="filterSelection('<?=$oJenis->nama_klasifikasi?>')" ><?=$oJenis->nama_klasifikasi?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              <select class="dropbtn" id="cbKoleksi" name="cbKoleksi">
                                <option>- Koleksi -</option>
                                <?php if (empty($this->oPesan)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                                  <option class="opt4" onclick="filterSelection('<?=$oKoleksi->jenis_koleksi?>')" ><?=$oKoleksi->jenis_koleksi?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              </div>
                            </div>
                        </div>

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
                             <div style="" class="kotak filterDiv <?=$oBuku->tahun_terbit?> <?=$oBuku->nama_klasifikasi?> <?=$oBuku->jenis_koleksi?>">
                              <div>
                                <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
                                  <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%; background: #F8F8F8;">
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                                      <div class="portfolio-item-caption-content text-center text-white" >
                                        <h3><b><?=$oBuku->judul?></b></h3>
                                        <p style="text-align: justify; text-justify: inter-word; padding: 3%"><?php echo $absktrak; ?></p>
                                        <i class="fas fa-plus fa-3x"></i>
                                      </div>
                                    </div>
                                    <div style="text-align: left; max-height: 100%; max-width: 100%; color: #2c3e50cf !important;">
                                      <div style="text-align: center;">
                                        <?php echo "<img style='height:280px; width: 200px; border-radius: 3%' class='img-fluid shadow' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
                                        <p style="font-size: 16px; padding-top: 3%"><?php echo $judul; ?></p>
                                        <p><i class="fa fa-user"></i> <?php echo $pengarang; ?> | <i class="fa fa-calendar"></i> <?=$oBuku->tahun_terbit?></p>
                                      </div>
                                    </div>
                                    <button class="btn btn-primary center" style="bottom: 0; width: 160px; background-color: #2c3e50; color: white; border-color: white;"><?=$oBuku->jenis_katalog?></button>
                                   </div>
                                </a>
                             </div>
                            </div>
                          <?php endforeach ?>
                          <?php endif ?>
                        </div>
                      </section>
                    </div>
                  </div>

                  <!-- peminjaman -->
                  <div id="peminjaman" class="tab-pane">
                    <div class="profile-activity">
                      <section class="page-section portfolio" id="portfolio">
                        <div class="container">

                        <!-- Portfolio Section Heading -->
                        <h2 class="page-section-heading text-center text-secondary mb-0" style="margin-top: -4%">Peminjaman Buku</h2>

                        <!-- Icon Divider -->
                        <div class="divider-custom">
                          <div class="divider-custom-line"></div>
                          <div class="divider-custom-icon">
                            <i class="fas fa-book"></i>
                          </div>
                          <div class="divider-custom-line"></div>
                        </div>

                        <br>

                        <div style=" width: 100%; margin-top: -20px; padding-bottom: 5px; text-align: center;">
                            <div style=" display: inline;">
                              <div id="myBtnContainer">
                              <button class="dropbtn active" onclick="filterSelection('all')"> Show all</button>
                              <select class="dropbtn" id="cbtahun" name="cbtahun">
                                <option>- Tahun Terbit -</option>
                                <?php if (empty($this->oPinjam)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oTahun as $oTahun): ?>
                                  <option class="opt1" onclick="filterSelection('<?=$oTahun->thn_terbit?>')" ><?=$oTahun->thn_terbit?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              <select class="dropbtn" id="cbKlasi" name="cbKlasi">
                                <option>- Klasifikasi -</option>
                                <?php if (empty($this->oPinjam)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oJenis as $oJenis): ?>
                                  <option class="opt3" onclick="filterSelection('<?=$oJenis->nama_klasifikasi?>')" ><?=$oJenis->nama_klasifikasi?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              <select class="dropbtn" id="cbKoleksi" name="cbKoleksi">
                                <option>- Koleksi -</option>
                                <?php if (empty($this->oPinjam)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                                  <option class="opt4" onclick="filterSelection('<?=$oKoleksi->jenis_koleksi?>')" ><?=$oKoleksi->jenis_koleksi?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              </div>
                            </div>
                        </div>

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
                             <div style="" class="kotak filterDiv <?=$oBuku->tahun_terbit?> <?=$oBuku->nama_klasifikasi?> <?=$oBuku->jenis_koleksi?>">
                              <div>
                                <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
                                  <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%; background: #F8F8F8;">
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                                      <div class="portfolio-item-caption-content text-center text-white" >
                                        <h3><b><?=$oBuku->judul?></b></h3>
                                        <p style="text-align: justify; text-justify: inter-word; padding: 3%"><?php echo $absktrak; ?></p>
                                        <i class="fas fa-plus fa-3x"></i>
                                      </div>
                                    </div>
                                    <div style="text-align: left; max-height: 100%; max-width: 100%; color: #2c3e50cf !important;">
                                      <div style="text-align: center;">
                                        <?php echo "<img style='height:280px; width: 200px; border-radius: 3%' class='img-fluid shadow' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
                                        <p style="font-size: 16px; padding-top: 3%"><?php echo $judul; ?></p>
                                        <p><i class="fa fa-user"></i> <?php echo $pengarang; ?> | <i class="fa fa-calendar"></i> <?=$oBuku->tahun_terbit?></p>
                                      </div>
                                    </div>
                                    <button class="btn btn-primary center" style="bottom: 0; width: 160px; background-color: #2c3e50; color: white; border-color: white;"><?=$oBuku->jenis_katalog?></button>
                                   </div>
                                </a>
                             </div>
                            </div>
                          <?php endforeach ?>
                          <?php endif ?>
                        </div>
                      </section>
                    </div>
                  </div>
                  
                  <!-- riwayat pinjam -->
                  <div id="riwayat-pinjam" class="tab-pane" >
                    <div class="profile-activity">
                      <section class="page-section portfolio" id="portfolio">
                        <div class="container">

                        <!-- Portfolio Section Heading -->
                        <h2 class="page-section-heading text-center text-secondary mb-0" style="margin-top: -4%">Riwayat Pinjam Buku</h2>

                        <!-- Icon Divider -->
                        <div class="divider-custom">
                          <div class="divider-custom-line"></div>
                          <div class="divider-custom-icon">
                            <i class="fas fa-book"></i>
                          </div>
                          <div class="divider-custom-line"></div>
                        </div>

                        <br>

                        <div style=" width: 100%; margin-top: -20px; padding-bottom: 5px; text-align: center;">
                            <div style=" display: inline;">
                              <div id="myBtnContainer">
                              <button class="dropbtn active" onclick="filterSelection('all')"> Show all</button>
                              <select class="dropbtn" id="cbtahun" name="cbtahun">
                                <option>- Tahun Terbit -</option>
                                <?php if (empty($this->oRiwayat)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oTahun as $oTahun): ?>
                                  <option class="opt1" onclick="filterSelection('<?=$oTahun->thn_terbit?>')" ><?=$oTahun->thn_terbit?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              <select class="dropbtn" id="cbKlasi" name="cbKlasi">
                                <option>- Klasifikasi -</option>
                                <?php if (empty($this->oRiwayat)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oJenis as $oJenis): ?>
                                  <option class="opt3" onclick="filterSelection('<?=$oJenis->nama_klasifikasi?>')" ><?=$oJenis->nama_klasifikasi?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              <select class="dropbtn" id="cbKoleksi" name="cbKoleksi">
                                <option>- Koleksi -</option>
                                <?php if (empty($this->oRiwayat)): ?>
                                <?php else: ?>
                                <?php foreach ($this->oKoleksi as $oKoleksi): ?>
                                  <option class="opt4" onclick="filterSelection('<?=$oKoleksi->jenis_koleksi?>')" ><?=$oKoleksi->jenis_koleksi?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                              </select>
                              </div>
                            </div>
                        </div>

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
                             <div style="" class="kotak filterDiv <?=$oBuku->tahun_terbit?> <?=$oBuku->nama_klasifikasi?> <?=$oBuku->jenis_koleksi?>">
                              <div>
                                <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
                                  <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%; background: #F8F8F8;">
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                                      <div class="portfolio-item-caption-content text-center text-white" >
                                        <h3><b><?=$oBuku->judul?></b></h3>
                                        <p style="text-align: justify; text-justify: inter-word; padding: 3%"><?php echo $absktrak; ?></p>
                                        <i class="fas fa-plus fa-3x"></i>
                                      </div>
                                    </div>
                                    <div style="text-align: left; max-height: 100%; max-width: 100%; color: #2c3e50cf !important;">
                                      <div style="text-align: center;">
                                        <?php echo "<img style='height:280px; width: 200px; border-radius: 3%' class='img-fluid shadow' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
                                        <p style="font-size: 16px; padding-top: 3%"><?php echo $judul; ?></p>
                                        <p><i class="fa fa-user"></i> <?php echo $pengarang; ?> | <i class="fa fa-calendar"></i> <?=$oBuku->tahun_terbit?></p>
                                      </div>
                                    </div>
                                    <button class="btn btn-primary center" style="bottom: 0; width: 160px; background-color: #2c3e50; color: white; border-color: white;"><?=$oBuku->jenis_katalog?></button>
                                   </div>
                                </a>
                             </div>
                            </div>
                          <?php endforeach ?>
                          <?php endif ?>
                        </div>
                      </section>
                    </div>
                  </div>

                </div>
              </div>
            </section>
          </div>
        </div>
		</div>
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
	
	
  <script type="text/javascript">
  filterSelection("all")
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