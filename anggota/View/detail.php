<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>


<?php if (empty($this->oBuku)): ?>
    <p class="error">Buku tidak dapat ditemukan!</p>
    <?php foreach ($this->oBuku as $oBuku): ?>
    <h2>
                    <?=htmlspecialchars($this->oBuku->judul)?>
                    <?=$this->oBuku->judul?>
                  </h2>
                  <?php endforeach ?>
<?php else: ?>
 <!--main content start-->
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info" style="background-color: #1abc9c;">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <div class="follow-ava" style="-webkit-border-radius: 0%;">
                    <img src="<?=ROOT_URL?>static/img/cover_buku.png" alt="" style="height: 100%; width: 100%; -webkit-border-radius: 0%;">
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <h2>
                    <?=htmlspecialchars($this->oBuku->judul)?>
                    <?=$this->oBuku->judul?>
                  </h2>
                  <h3>
                    <i class="fa fa-user"></i>  <?=$this->oBuku->pengarang?>
                  </h3>
                  <h4> 
                    <i class="fa fa-eye"></i>  22 <span>Dibaca</span> *BELOM DITAMBAHIN DIKATALOG
                  </h4>
                  <h4> 
                    <i class="icon_star"></i>  3,5 <span>/5 Penilaian</span> BELOM DITAMBAHIN DIKATALOG
                  </h4>
                </div>
                
                <div class="col-lg">
                  <div class="col-lg-2 col-sm-6 follow-info weather-category">
                    <h2>
                      INGIN MELIHAT LEBIH JAUH?
                    </h2>
                  </div>
                  <div class="col-lg-2 col-sm-6 follow-info weather-category">
                    <ul style="background-color: #1abc9c;">
                      <li class="active">
                        <h3>
                          <i class="fa fa-bell fa-2x"> </i><br> 
                          <button style="background-color: #2c3e50!important; color: white; border-color: white; border-width: thin;">PINJAM</button>
                        </h3>
                        Kini, pinjam buku di Wira Buana bisa order dulu
                      </li>

                    </ul>
                  </div>
                  <div class="col-lg-2 col-sm-6 follow-info weather-category">
                    <ul style="background-color: #1abc9c;">
                      <li class="active">
                        <h3>
                          <i class="fa fa-bell fa-2x"> </i><br> 
                          <button style="background-color: #2c3e50!important; color: white; border-color: white; border-width: thin;">BACA</button>
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
                  <li class="active" style="background-color: #1abc9c;">
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Daily Activity
                                      </a>
                  </li>
                  <li style="background-color: #1abc9c;">
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                  </li>
                  <li class="" style="background-color: #1abc9c;">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="recent-activity" class="tab-pane active">
                    <div class="profile-activity">
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Jonatanh Doe</a> at 4:25pm, 30th Octmber 2014</p>
                            <p>It is a long established fact that a reader will be distracted layout</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Jhon Loves </a> at 5:25am, 30th Octmber 2014</p>
                            <p>Knowledge speaks, but wisdom listens.</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Rose Crack</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Jimy Smith</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                              ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Maria Willyam</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                              ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
                              condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros
                              eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Sarah saw</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Knowledge speaks, but wisdom listens.</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Layla night</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Andriana lee</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                              ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                          </div>
                        </div>
                      </div>
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                            <p class="attribution"><a href="#">Maria Willyam</a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                              ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
                              condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros
                              eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- profile -->
                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      <div class="bio-graph-heading">
                        Hello I’m Jenifer Smith, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication.
                      </div>
                      <div class="panel-body bio-graph-info">
                        <h1>Bio Graph</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>First Name </span>: Jenifer </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Last Name </span>: Smith</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Birthday</span>: 27 August 1987</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Country </span>: United</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Occupation </span>: UI Designer</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>:jenifer@mailname.com</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Mobile </span>: (+6283) 456 789</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Phone </span>: (+021) 956 789123</p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">First Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Last Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">About Me</label>
                            <div class="col-lg-10">
                              <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Birthday</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="b-day" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Occupation</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="occupation" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="email" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Mobile</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="mobile" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Website URL</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

  <?php endif ?>


        <!-- javascripts -->
  <script src="<?=ROOT_URL?>static/other/js/jquery.js"></script>
  <script src="<?=ROOT_URL?>static/other/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?=ROOT_URL?>static/other/js/jquery.scrollTo.min.js"></script>
  <script src="<?=ROOT_URL?>static/other/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="<?=ROOT_URL?>static/other/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="<?=ROOT_URL?>static/other/js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>

<?php require 'inc/footer.php' ?>