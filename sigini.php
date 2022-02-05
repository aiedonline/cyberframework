<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . "/layout_head.php"; ?>
</head>
<body>
  <div id="wrapper">
    <?php  include __DIR__ . "/layout_top.php"; ?>
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="/cyber/index.php">Home</a> <i class="icon-angle-right"></i></li>
                <li class="active">Entrar</li>
              </ul>
              <h2>Entrar</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            

            <div class="form-horizontal">
            <fieldset id='field_set_login'>

              <!-- Form Name -->


              <!-- Text input-->
              

              
              <div class="control-group">
              
              <label class="control-label" for="txt_login">Login</label>
              <div class="controls">
                  <input id="txt_login" name="txt_login" type="text" placeholder="placeholder" class="input-xlarge" autocomplete="off">
                  <p class="help-block">Para entrar no sistema</p>
              </div>
              </div>
            </fieldset>
            
            <fieldset>
              <!-- Button -->
              <div id="div_captcha" class="control-group" style="visibility: hidden;">
                <div class="controls">
                  <img src="/cyber/api/captcha/new.php"><br/><br/>
                </div>
              </div>

            </fieldset>

            <fieldset>
              <!-- Button -->
              <div class="control-group">
              <div class="controls">
                  <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="btn_login_click()">Iniciar sessão</button>
              </div>
              </div>

            </fieldset>
          </div>






            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php  include __DIR__ . "/layout_footer.php"; ?>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.js"></script>

  <script src="js/modernizr.custom.js"></script>
  <script src="js/toucheffects.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>

  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>

  <script src="js/jquery.flexslider.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/inview.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>

  <?php include __DIR__ . "/layout_import.php"; ?>
  <?php importar_js("sigini") ?>

</body>

</html>
