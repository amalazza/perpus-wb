<?php require 'inc/msg.php' ?>
<?php require 'inc/header.php' ?>
<?php require 'inc/header_gambar.php' ?>
<div>
    
  <section class="page-section portfolio" id="portfolio" style="margin-top: -120px;">
    <div class="container">
      
      <h2 class="page-section-heading text-center text-secondary mb-0">Katalog E-book</h2>

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
          <button class="dropbtn active" id="idAll" value="all" onclick="getAll()"> Show all</button>

          <select class="dropbtn" id="cbtahun" name="cbtahun" onchange="getTahun()">
          <option value="all">- Tahun Terbit -</option>
          <?php if (empty($this->oBuku)): ?>
          <?php else: ?>
          <?php foreach ($this->oTahun as $oTahun): ?>
            <option class="opt1" value="<?=$oTahun->thn_terbit?>" ><?=$oTahun->thn_terbit?></option>
          <?php endforeach ?>
          <?php endif ?>
          </select>

          <select class="dropbtn" id="cbKlasi" name="cbKlasi" onchange="getKlasi()">
          <option value="all">- Klasifikasi -</option>
          <?php if (empty($this->oBuku)): ?>
          <?php else: ?>
          <?php foreach ($this->oJenis as $oJenis): ?>
            <option class="opt3" value="<?=$oJenis->nama_klasifikasi?>" ><?=$oJenis->nama_klasifikasi?></option>
          <?php endforeach ?>
          <?php endif ?>
          </select>

          <select class="dropbtn" id="cbKoleksi" name="cbKoleksi" onchange="getKoleksi()">
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

      <br>

      <!-- Portfolio Grid Items -->
      <div class="row ">
        <?php if (empty($this->oBuku)): ?>
        <?php else: ?>
        <?php foreach ($this->oBuku as $oBuku):
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


  <script>
    filterSelection("all")
    function getAll(){
      var x = document.getElementById("idAll").value;
      filterSelection(x);
      document.getElementById("cbtahun").options[0].selected = 'selected';
      document.getElementById("cbKlasi").options[0].selected = 'selected';
      document.getElementById("cbKoleksi").options[0].selected = 'selected';
    }
    function getTahun(){
      var x = document.getElementById("cbtahun").value;
      filterSelection(x);
      document.getElementById("cbKlasi").options[0].selected = 'selected';
      document.getElementById("cbKoleksi").options[0].selected = 'selected';
    }
    function getKlasi(){
      var x = document.getElementById("cbKlasi").value;
      filterSelection(x);
      document.getElementById("cbtahun").options[0].selected = 'selected';
      document.getElementById("cbKoleksi").options[0].selected = 'selected';
    }
    function getKoleksi(){
      var x = document.getElementById("cbKoleksi").value;
      filterSelection(x);
      document.getElementById("cbKlasi").options[0].selected = 'selected';
      document.getElementById("cbtahun").options[0].selected = 'selected';
    }

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