        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright © IT Development SMP-SMK Wira Buana - Proudly powered by WB-Technopark</small>
    </div>
  </section>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?=ROOT_URL?>static/js/jquery.js"></script>
  <script src="<?=ROOT_URL?>static/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?=ROOT_URL?>static/js/jquery.scrollTo.min.js"></script>
  <script src="<?=ROOT_URL?>static/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="<?=ROOT_URL?>static/js/jquery.validate.min.js"></script>
  <!-- custom form validation script for this page-->
  <script src="<?=ROOT_URL?>static/js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="<?=ROOT_URL?>static/js/scripts.js"></script>
  <script type="text/javascript">
function smooth1(){
      if($("#show1").is(":visible")){
        $("#show1").hide("1000");
      }
      else{
        $("#show1").show("1000");
        $("#show2").hide("1000");
        $("#show3").hide("1000");
      }
    }
function smooth2(){
      if($("#show2").is(":visible")){
        $("#show2").hide("1000");
      }
      else{
        $("#show2").show("1000");
        $("#show1").hide("1000");
        $("#show3").hide("1000");
      }
    }
function smooth3(){
      if($("#show3").is(":visible")){
        $("#show3").hide("1000");
      }
      else{
        $("#show3").show("1000");
        $("#show2").hide("1000");
        $("#show1").hide("1000");
      }
    }
</script>


</body>


</html>

<!-- <?php

?>
            <footer>
                <p class="italic"><strong><a href="<?=ROOT_URL?>" title="Homeage">Kunjungan</a></strong> created for a PHP Technical Test &nbsp; | &nbsp;
                <?php if (!empty($_SESSION['is_logged'])): ?>
                    You are connected as Admin - <a href="<?=ROOT_URL?>?p=admin&amp;a=logout">Logout</a> &nbsp; | &nbsp;
                    <a href="<?=ROOT_URL?>?p=kunjungan&amp;a=all">Kunjungan</a>
                <?php else: ?>
                    <a href="<?=ROOT_URL?>?p=admin&amp;a=login">Backend Login</a>
                <?php endif ?>
                </p>
            </footer>
        </div>
    </body>
</html> -->
