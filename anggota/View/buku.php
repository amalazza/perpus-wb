<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>
<div>
    <header class="masthead text-white text-center" style="opacity: 100%; background-image: url(<?=ROOT_URL?>static/1.jpg); position: relative; margin-top: -55px;">
    <div class="container align-items-center">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar" style=" height: 120px; width:200px;" src="<?=ROOT_URL?>static/bukup.png" alt="">
      <br>
      <!-- Masthead Heading -->
      <h1 class="masthead-heading mb-0"><b>Perpustakaan Online Wira Buana</b></h1>
      <h3 style="margin-top: 7px;"><b><i>SMK WIRA BUANA 1 | SMK WIRA BUANA 2</i></b></h3>

    </div>
  </header>

  <section class="page-section portfolio" id="portfolio" style="margin-top: -20px;">
    <div class="container">
    <div style=" width: 100%; margin-top: -20px; padding-bottom: 5px; text-align: center;">
      <div style=" display: inline;">
        <div id="myBtnContainer">
        <button class="btn dropbtn active" onclick="filterSelection('all')"> Show all</button>
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
        <select class="dropbtn" id="cbJenis" name="cbJenis">
        <option>- Jenis Buku -</option>
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oJenis as $oJenis): ?>
          <option class="opt2" onclick="filterSelection('<?=$oJenis->no_klasifikasi?>')" ><?=$oJenis->nama_klasifikasi?></option>
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
      <div class="row">
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oBuku as $oBuku):
        $potong = substr($oBuku->absktrak, 0, 250) . '...';
         ?>
         <div class="filterDiv <?=$oBuku->tahun_terbit?> <?=$oBuku->jenis_katalog?>">
          <a href="<?=ROOT_URL?>?p=buku&amp;a=detail&amp;id=<?=$oBuku->no_katalog?>">
            <div class="portfolio-item mx-auto  shadow p-3 mb-5 rounded" data-toggle="modal" data-target="#portfolioModal1" style="width: 90%; height: 95%">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" >
                <div class="portfolio-item-caption-content text-center text-white" >
                  <h3><b><?=$oBuku->judul?></b></h3>
                  <h4><?php echo $potong; ?></h4>
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <div style="max-height: 100%; max-width: 100%">
              <?php echo "<img style='height:300px;' class='img-fluid' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($oBuku->cover))."'/>";?>
              <p style="font-size: 20px;"><?=$oBuku->judul?></p>
              <p><?=$oBuku->tahun_terbit?></p>
            </div>
<!-- <<<<<<< HEAD -->
              <button class="btn btn-primary center" style="background-color: #2c3e50; color: white; border-color: white; float:"><?=$oBuku->jenis_katalog?></button>
<!-- =======
              <br>
              <input type="submit" class="btn btn-primary center" style="background-color: #2c3e50; color: white; border-color: white;" value="<?=$oBuku->jenis_katalog?>" id="jenis_katalog"/>
>>>>>>> 23522e5fb86d88a1c7498b288d8a03e928a34a38 -->
            </div>
          </a>
          </div>
          <?php endforeach ?>
          <?php endif ?>
          </div>
          

    </div>
  </section>

    <script>
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

</script>

<?php require 'inc/footer.php' ?>