  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white birufooterrwb">
    <div class="container">
      <small>Copyright © IT Development SMP-SMK Wira Buana - Proudly powered by WB-Technopark</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?=ROOT_URL?>static/vendor/jquery/jquery.min.js"></script>
  <script src="<?=ROOT_URL?>static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?=ROOT_URL?>static/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?=ROOT_URL?>static/js/jqBootstrapValidation.js"></script>
  <script src="<?=ROOT_URL?>static/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?=ROOT_URL?>static/js/freelancer.min.js"></script>
  
  <!-- custom form validation script for this page-->
  <script src="<?=ROOT_URL?>static/js/form-validation-script.js"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="<?=ROOT_URL?>static/js/jquery.validate.min.js"></script>
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
