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
                <li class="active">Registrar</li>
              </ul>
              <h2>Registrar</h2>
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
            <fieldset>

            <!-- Form Name -->


            <!-- Text input-->
            <div class="control-group">
            <label class="control-label" for="txt_login">Login</label>
            <div class="controls">
                <input id="txt_login" name="txt_login" type="text" placeholder="placeholder" class="input-xlarge" autocomplete="off">
                <p class="help-block">Um login único para entrar, não use e-mail</p>
            </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
            <label class="control-label" for="txt_name">Nome</label>
            <div class="controls">
                <input id="txt_name" name="txt_name" type="text" placeholder="placeholder" class="input-xlarge" autocomplete="off">
                <p class="help-block">Como quer ser chamado, não precisa ser seu nome verdadeiro.</p>
            </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
            <label class="control-label" for="txt_password">Password</label>
            <div class="controls">
                <input id="txt_password" name="txt_password" type="password" placeholder="placeholder" class="input-xlarge" autocomplete="off">
                
                <span class="help-block">

                <br/>Recomendações:<font color='red'>
                <br/>  - <b>Não existe mecanismo de recuperação de senha este site!!!</b>;
                <br/>  - Usar no mínimo 8 a 12 caracteres;
                <br/>  - Nunca use um password que já usa em outro site;
                <br/>  - Não usar palavras;
                <br/>  - Não use: &, <, >, " e ' como senha;
                <br/>  - Sua senha, sua responsabilidade.</font>
                </span>
            </div>
            </div>
            

            <!-- Password input-->
            <div class="control-group">
            <label class="control-label" for="txt_password_2">Password</label>
            <div class="controls">
                <input id="txt_password_2" name="txt_password_2" type="password" placeholder="placeholder" class="input-xlarge" autocomplete="off">
                <p class="help-block">Verify password</p>
            </div>
            </div>


            <div class="control-group">
            <label class="control-label" for="txt_captcha">Captcha</label>
            <div class="controls">
                <input id="txt_captcha" name="txt_captcha" type="text" placeholder="placeholder" class="input-xlarge" autocomplete="off">
            </div>
            </div>

            <fieldset>
              <!-- Button -->
              <div id="div_captcha" class="control-group">
                <div class="controls">
                  <img src="/cyber/api/captcha/new.php"><br/><br/>
                </div>
              </div>

            </fieldset>


            <!-- Button -->
            <div class="control-group">
            <div class="controls">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="btn_register_click()">Registrar</button>
            </div>
            </div>

            </fieldset>
          </div>

            </div>
          </div>
        </div>
      </div>
    </section>

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
  <?php importar_js("sigup") ?>

</body>

</html>
