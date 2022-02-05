<!DOCTYPE html>
<html lang="en">

<head>
<?php include __DIR__ . "/layout_head.php"; ?>
</head>

<body>

  <div id="wrapper">


    <?php  include __DIR__ . "/layout_top.php"; ?>

    <!-- section featured -->
    <section id="featured">

      <!-- slideshow start here -->

      <div class="camera_wrap" id="camera-slide">

        <!-- slide 1 here -->
        <div data-src="img/slides/camera/slide1/fundo1.png">
          <div class="camera_caption fadeFromLeft">
            <div class="container">
              <div class="row">
                <div class="span6">
                  <h2 class="animated fadeInDown"><strong>Projetos, <span class="colored">de hackers para hackers</span></strong></h2>
                  <p class="animated fadeInUp">
                    Cyberframework é um HUB de projetos voltados para comunidade Hacker. 
                      Sem restrições, sem lado, e principalmente FREE. Between light and darkness!!!!</p>
                  <a href="#" class="btn btn-success btn-large animated fadeInUp">
											<i class="icon-link"></i> Saiba mais
										</a>
                  <a href="#" class="btn btn-theme btn-large animated fadeInUp">
											<i class="icon-download"></i> Projetos
										</a>
                </div>
                <div class="span6">
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- slide 2 here -->
        <div data-src="img/slides/camera/slide2/fundo2.png">
          <div class="camera_caption fadeFromLeft">
            <div class="container">
              <div class="row">
                <div class="span6">
                  
                </div>
                <div class="span6">
                  <h2 class="animated fadeInDown"><strong>Busca <span class="colored">notícias, conhecimento, projetos, etc.</span></strong></h2>
                  <p class="animated fadeInUp">Busca <strong>-></strong></p>
                  <form>
                    <div class="input-append">
                      <input class="span3 input-large" type="text">
                      <button class="btn btn-theme btn-large" type="submit">Buscar</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- slide 3 here -->
        <div data-src="img/slides/camera/slide3/fundo3.png">
          <div class="camera_caption fadeFromLeft">
            <div class="container">
              <div class="row">
                <div class="span12 aligncenter">
                  <h2 class="animated fadeInDown"><strong>Procure um <span class="colored"></span>Hacker na Comunidade</span></strong></h2>
                  <p class="animated fadeInUp">Um ponto de encontro para grupos, sem restrições.</p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- slideshow end here -->

    </section>
    <!-- /section featured -->

    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="cta-box">
              <div class="row">
                <div class="span8">
                  <div class="cta-text">
                    <h2>
                      Contribuir para <span>projetos</span></h2>
                  </div>
                </div>
                <div class="span4">
                  <div class="cta-btn">
                    <a href="#" class="btn btn-theme">Saiba mais <i class="icon-angle-right"></i></a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span4">
                <div class="box flyLeft">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdark icon-star icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Blog</strong> e  <strong>notícias</strong> </h4>
                    <p>Notícias sobre o que está acontecendo, hora a hora.
                    </p>
                    <a href="/cyber/news.php">Leia mais</a>
                  </div>
                </div>
              </div>


              <div class="span4">
                <div class="box flyIn">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgprimary icon-code icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Projetos</strong> por Hackers</h4>
                    <p>
                      Cyberframework é um HUB de projetos para hackers, tanto para ataque como para defesa.
                    </p>
                    <a href="/cyber/projects.php">Leia mais</a>
                  </div>
                </div>
              </div>

              <div class="span4">
                <div class="box flyRight">
                  <div class="icon">
                    <i class="ico icon-circled icon-bgdanger icon-user icon-3x"></i>
                  </div>
                  <div class="text">
                    <h4><strong>Point</strong> para Hackers</h4>
                    <p>
                      Um local para se encontrar hackers.
                    </p>
                    <a href="/cyber/hackers.php">Leia mais</a>
                  </div>
                </div>
              </div>
              

            </div>
          </div>
        </div>

        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>



        <div class="row">
          <div class="span12 aligncenter">
            
            <div class="blankline30"></div>

            <ul class="bxslider">
              <li>
                <blockquote>
                  Este portal nasce com o objetivo de oferecer um campo aberto para construção de conhecimento e artefatos para a comunidade Hacker, sem nenhum tipo de restrição. Utilize este ambiente, desenvolva este ambiente e contribua.
                </blockquote>
                <div class="testimonial-autor">
                  <img src="img/dummies/testimonial/wellington.jpg" alt="" />
                  <h4>Wellington</h4>
                  <a href="#">www.cyberframework.online</a>
                </div>
              </li>
              
            </ul>

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
  <script src="js/jquery.bxslider.min.js?id=1"></script>
  <script src="js/camera/camera.js"></script>
  <script src="js/camera/setting.js"></script>

  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>

  <script src="js/jquery.flexslider.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/inview.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js?id=4"></script>
  <?php include __DIR__ . "/layout_import.php"; ?>


</body>

</html>
