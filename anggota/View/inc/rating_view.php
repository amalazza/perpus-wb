<style type="text/css">
  .btn-grey{
    background-color:#D8D8D8;
  color:#FFF;
}
.rating-block{
  background-color:#FAFAFA;
  border:1px solid #EFEFEF;
  padding:15px 15px 20px 15px;
  border-radius:3px;
}
.bold{
  font-weight:700;
}
.padding-bottom-7{
  padding-bottom:7px;
}

.review-block{
  background-color:#FAFAFA;
  border:1px solid #EFEFEF;
  padding:15px;
  border-radius:3px;
  margin-bottom:15px;
}
.review-block-name{
  font-size:12px;
  margin:10px 0;
}
.review-block-date{
  font-size:12px;
}
.review-block-rate{
  font-size:13px;
  margin-bottom:15px;
}
.review-block-title{
  font-size:15px;
  font-weight:700;
  margin-bottom:10px;
}
.review-block-description{
  font-size:13px;
}
.average {
  background-color:#388e3c;
  line-height: normal;
    display: inline-block;
    color: #fff;
    padding: 2px 4px 2px 6px;
    border-radius: 3px;
    font-weight: 500;
    font-size: 12px;
    vertical-align: middle;
}
.rating-reviews {
      padding-left: 8px;
    font-weight: 500;
    color: #878787;
}



@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** LOGIN MODAL ******/
.loginmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
  font-family: roboto;
}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}
.hidden {
  display:none;
}
.logged-user {
  font-weight:bold;
}
.user-pic {
  width: 60px;
  height: 60px;
}
</style>

<?php
  include 'rating_model.php';
  $rating = new Rating();
  $itemDetails = $rating->getItem($_GET['id']);
  foreach($itemDetails as $item){
    $average = $rating->getRatingAverage($item["no_katalog"]);
    
    $settingClass = $rating->getSetting();
?> 

<?php } ?>  
    
  <?php 
  $itemRating = $rating->getItemRating($_GET['id']); 
  $ratingNumber = 0;
  $count = 0;
  $fiveStarRating = 0;
  $fourStarRating = 0;
  $threeStarRating = 0;
  $twoStarRating = 0;
  $oneStarRating = 0; 
  foreach($itemRating as $rate){
    $ratingNumber+= $rate['ratingNumber'];
    $count += 1;
    if($rate['ratingNumber'] == 5) {
      $fiveStarRating +=1;
    } else if($rate['ratingNumber'] == 4) {
      $fourStarRating +=1;
    } else if($rate['ratingNumber'] == 3) {
      $threeStarRating +=1;
    } else if($rate['ratingNumber'] == 2) {
      $twoStarRating +=1;
    } else if($rate['ratingNumber'] == 1) {
      $oneStarRating +=1;
    }
  }
  $average = 0;
  if($ratingNumber && $count) {
    $average = $ratingNumber/$count;
  }

  $counts = $rating->getRatingTotal($_GET['id']);  
  ?>    
<header class="panel-heading tab-bg-info birunavbarwb">
  <ul class="nav nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#recent-activity">
        <i class="icon-home"></i>
        RATING AND REVIEWS
      </a>
    </li>
  </ul>
</header>
<div class="panel-body bio-graph-info">
  <div class="col-lg-12" style="margin-top: 2%">    
    <h1>RATING AND REVIEWS</h1>
    <div id="ratingDetails">    
      <div class="row">     
        <div class="col-lg-6" style="margin-top: -2%;"> 
          <div class="bio-row"  style="width: 100%;"> 
            <h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>
            <h2 class="bold padding-bottom-7"><?php printf('%.1f', $counts); ?> <small> Reviews</small></h2>        
            <?php
            $averageRating = round($average, 0);
            for ($i = 1; $i <= 5; $i++) {
              $ratingClass = "btn-default btn-grey";
              if($i <= $averageRating) {
                $ratingClass = "btn-warning";
              }
            ?>
            <button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            </button> 
            <?php } ?>
          </div>        
        </div>
        <div class="col-lg-3">
          <div class="bio-row"  style="width: 100%;"> 
            <?php
            $fiveStarRatingPercent = round(($fiveStarRating/5)*100);
            $fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';  
            
            $fourStarRatingPercent = round(($fourStarRating/5)*100);
            $fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
            
            $threeStarRatingPercent = round(($threeStarRating/5)*100);
            $threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
            
            $twoStarRatingPercent = round(($twoStarRating/5)*100);
            $twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
            
            $oneStarRatingPercent = round(($oneStarRating/5)*100);
            $oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
            
            ?>
            <div class="pull-left">
              <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
              </div>
              <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
                  <span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
                  </div>
                </div>
              </div>
              <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
            </div>
            
            <div class="pull-left">
              <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
              </div>
              <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
                  <span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
                  </div>
                </div>
              </div>
              <div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
            </div>
            <div class="pull-left">
              <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
              </div>
              <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
                  <span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
                  </div>
                </div>
              </div>
              <div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
            </div>
            <div class="pull-left">
              <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
              </div>
              <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
                  <span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
                  </div>
                </div>
              </div>
              <div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
            </div>
            <div class="pull-left">
              <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
              </div>
              <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
                  <span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
                  </div>
                </div>
              </div>
              <div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
            </div>
          </div>
        </div>      
      </div>
      <div class="row">
        <div class="col-lg-12">
          <hr/>
          <center>
            <button type="button" id="rateProduct" class="btn btn-info <?php if(!empty($_SESSION['userid']) && $_SESSION['userid']){ echo 'login';} ?>">Rate this product</button>
          </center>

          <div class="review-block">    
          <?php
          $itemRating = $rating->getItemRating($_GET['id']);
          foreach($itemRating as $rating){        
            $date=date_create($rating['created']);
            $reviewDate = date_format($date,"M d, Y");            
            $profilePic = "profile.png";  
            if($rating['foto']) {
              $profilePic = $rating['foto'];  
            }
          ?>        
            <div class="row">
              <div class="col-sm-2">
                <!-- <img src= 'data:image/jpeg;base64,".base64_encode(stripslashes($item["cover"]))."' class="img-rounded user-pic"> -->
                <?php echo "<img class='follow-ava user-pic' src= 'data:image/jpeg;base64,".base64_encode(stripslashes($profilePic))."'/>";?>
                <div class="review-block-name">By <a href="#"><?php echo $rating['nama']; ?></a></div>
                <div class="review-block-date"><?php echo $reviewDate; ?></div>
              </div>
              <div class="col-sm-9">
                <div class="review-block-rate">
                  <?php
                  for ($i = 1; $i <= 5; $i++) {
                    $ratingClass = "btn-default btn-grey";
                    if($i <= $rating['ratingNumber']) {
                      $ratingClass = "btn-warning";
                    }
                  ?>
                  <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                  </button>               
                  <?php } ?>
                </div>
                <div class="review-block-title"><?php echo $rating['title']; ?></div>
                <div class="review-block-description"><?php echo $rating['comments']; ?></div>
              </div>
            </div>
            <hr/>         
          <?php } ?>
          </div>
        </div>
      </div>  
    </div>
    <div id="ratingSection" style="display:none;">
      <div class="row">
        <div class="col-sm-12">
          <form id="ratingForm" method="POST">          
            <div class="form-group">
              <h4>Rate this product</h4>
              <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </button>
              <input type="hidden" class="form-control" id="rating" name="rating" value="1">
              <input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $_GET['id']; ?>">
              <input type="hidden" name="action" value="saveRating">
            </div>    
            <div class="form-group">
              <label for="usr">Title*</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label for="comment">Comment*</label>
              <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
            </div>      
          </form>
        </div>
      </div>    
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Login to rate this product</h1><br>
          <div style="display:none;" id="loginError" class="alert alert-danger">Invalid username/Password</div>
          <form method="post" id="loginForm" name="loginForm">
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="hidden" name="action" value="userLogin">
            <input type="submit" name="login" class="login loginmodal-submit" value="Login">           
          </form>
          <div class="login-help">          
            <p><b>User</b> : adam, rose, smith, merry <b>Password</b>: 123</p>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>

<script type="text/javascript">
  $(function() {
  $('#loginForm').on('submit', function(e){
    $.ajax({
      type: 'POST',
      url : "View/inc/rating_action.php",
      dataType: "json",     
      data:$(this).serialize(),
      success: function (response) {
        if(response.success == 1) {
          $('#loginModal').modal('hide');
          $('#loggedPanel').removeClass('hidden');
          $('#loggedUser').text(response.username);
          $( "#rateProduct" ).addClass('login');
          // rating section
          $("#ratingDetails").hide();
          $("#ratingSection").show();   
        } else {
          $('#loginError').show();
        }       
      }
    });
    return false;
  });
  
  // rating form hide/show
  $( "#rateProduct" ).click(function() {
    if(!$(this).hasClass('login')) {
      $('#loginModal').modal('show');
    } else {    
      $("#ratingDetails").hide();
      $("#ratingSection").show();
    }
  }); 
  $( "#cancelReview" ).click(function() {
    $("#ratingSection").hide();
    $("#ratingDetails").show();   
  }); 
  // implement start rating select/deselect
  $( ".rateButton" ).click(function() {
    if($(this).hasClass('btn-grey')) {      
      $(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
      $(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
      $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');     
    } else {            
      $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
    }
    $("#rating").val($('.star-selected').length);   
  });
  // save review using Ajax
  $('#ratingForm').on('submit', function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type : 'POST',
      dataType: "json", 
      url : 'View/inc/rating_action.php',         
      data : formData,
      success:function(response){
        if(response.success == 1) {
          $("#ratingForm")[0].reset();
          window.location.reload();
        }
      }
    });   
  });
});
</script>