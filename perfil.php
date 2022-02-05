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
                <li class="active">Perfil</li>
              </ul>
              <h2 id='perfil_header'><?php echo $USER->name;    ?></h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">
          <div id='raiz' class="span12">
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
  <?php importar_js("perfil") ?>

</body>

</html>
