<!DOCTYPE html>
<html lang="en">

<head>
   <?php include __DIR__ . "/layout_head.php"; ?>
</head>

<body>

  <div id="wrapper">

    <!-- start header -->
    <?php  include __DIR__ . "/layout_top.php"; ?>
    <!-- end header -->

    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a> <i class="icon-angle-right"></i></li>
                <li class="active">Contato</li>
              </ul>
              <h2>Entrar em contato</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.686732823896!2d-46.626968984483014!3d-23.507790484709513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5882623ba5cb%3A0x7e48ba550aa391ed!2sAv.%20Cruzeiro%20do%20Sul%2C%202600%20-%20Santana%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1637613044817!5m2!1spt-BR!2sbr" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

      <div class="container">
        <div class="row">
          <div class="span8">
            <h4>Entre em contato conosco preenchendo o formulário de contato abaixo</h4>

            <div id="sendmessage">Sua mensagem foi enviada. Obrigado!</div>
            <div id="errormessage"></div>
            <div  role="form" class="contactForm">
              <div class="row">
                <div class="span4 form-group field">
                  <input type="text" name="name" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>

                <div class="span4 form-group">
                  <input type="email" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="span8 form-group">
                  <input type="text" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="span8 form-group">
                  <textarea name="message" rows="5" data-rule="required" data-msg="Please write something for us"
                    placeholder="Message"></textarea>
                  <div class="validation"></div>
                  <div class="text-center">
                    <button onclick="btn_send_message_click()" class="btn btn-theme btn-medium margintop10" type="submit">Send a message</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="span4">
            <div class="clearfix"></div>
            <aside class="right-sidebar">

              <div class="widget">
                <h5 class="widgetheading">Informações para contato<span></span></h5>

                <ul class="contact-info">
                  <li><label>Address :</label> Av. Cruzeiro do Sul, 2418 - Canindé<br/> São Paulo - SP</li>
                  <li><label>Phone :</label>+55 (11) 99927-9682</li>
                  <li><label>Email : </label> wellington@cyberframework.online</li>
                </ul>

              </div>
            </aside>
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

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>
  <?php include __DIR__ . "/layout_import.php"; ?>
  <?php 

      importar_js("contact");
  ?>

</body>

</html>
