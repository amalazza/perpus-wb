<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<style>
* {
  box-sizing: border-box;
}
.checked {
  color: orange;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}

.rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
/*.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}*/
.rating:not(:checked) > input {
        position: absolute;
        /* top: -9999px; */
        clip: rect(0, 0, 0, 0);
        height: 0;
        width: 0;
        overflow: hidden;
        opacity: 0;
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}
</style>

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
                    <h1>RATE THIS BOOK</h1>
                  </div>
                  <div class="panel-body bio-graph-info">
                    <div class="col-lg-3">
                      <center>
                      <div class="follow-ava" style="-webkit-border-radius: 5%;">
                        <?php 
                            echo "<img class='avatar' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($this->oBuku->cover))."' style='height: 200px; width: 200px; border-radius: 4%;'/>";
                        ?>
                      </div>
                      </center>
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
                        </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="text-align: center;">
                    <div class="col-lg-12">
                      <h1>RATING FORM</h1>
                      <hr style="border-color: #ccc!important">
                      <input type="hidden" name="jdl" id="jdl" value="<?=$this->oBuku->judul?>">
                      <div class="form-group" style="display: inline-block;">
                        <label><b>Rating*</b></label>
                        <br>
                        <fieldset class="rating" style="">
                          <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                          <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                          <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                          <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                          <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                        </fieldset>
                      </div> 
                      <div class="form-group">
                        <label for="usr"><b>Title*</b></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                      </div>
                      <div class="form-group">
                        <label for="comment"><b>Comment*</b></label>
                        <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                      </div>
                      <div class="form-group">
                      </div> 
                    </div>
                    <input class="tombolbirufooterrwb btn btn-primary btn-lg" type="submit" name="btn_rating" value="SUBMIT"/>
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