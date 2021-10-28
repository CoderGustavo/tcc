<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset=utf-8 />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Delicious Hamburgueria</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= url("View/assets/img/favicon1.png") ?>" rel="icon">
  <link href="<?= url("View/assets/img/apple-touch-icon.png") ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= url("View/assets/vendor/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">
  <link href="<?= url("View/assets/vendor/icofont/icofont.min.css")?>" rel="stylesheet">
  <link href="<?= url("View/assets/vendor/boxicons/css/boxicons.min.css")?>" rel="stylesheet">
  <link href="<?= url("View/assets/vendor/animate.css/animate.min.css")?>" rel="stylesheet">
  <link href="<?= url("View/assets/vendor/owl.carousel/assets/owl.carousel.min.css")?>" rel="stylesheet">
  <link href="<?= url("View/assets/vendor/venobox/venobox.css")?>" rel="stylesheet">
  <link href="<?= url("View/assets/vendor/aos/aos.css")?>" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
  
  <!-- Template Main CSS File -->
  <link href="<?= url("View/assets/css/style.css") ?>" rel="stylesheet">
  <link href="<?= url("View/assets/css/stylePersonalizado.css") ?>" rel="stylesheet">


</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> +55 19 3863-0823
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Qua-Dom: 18:00 - 00:00</span>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Delicious Hamburgueria</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Inicio</a></li>
          <li><a href="<?= url("cardapio") ?>">Cardápio</a></li>
          <?php if ($logado != 0) { ?>
          <li><a href="#book-a-table">Reserva de Mesa</a></li>
            <li><a href="<?= url("delivery") ?>">Delivery</a></li>
          <li><a href="#about">Sobre</a></li>
          <li class="conta text-center">
            <a href="" class="btn-minhaconta">
              Minha conta <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="menu-conta">
              <li><a href="<?= url("conta/minhaconta") ?>">Minha conta</a></li>
              <li><a href="<?= url("conta/meuspedidos") ?>">Meus Pedidos</a></li>
              <?php if ($admin == 1){?>
                <li><a href="<?= url("admin") ?>">Admin</a></li>
              <?php } ?>
              <li><a href="<?= url("sair") ?>">Sair</a></li>
            </ul>
          </li>
          <?php } else { ?>
            <li class="conta text-center"><a href="<?= url("login") ?>" class="btn-entrar">Entrar</a></li>
          <?php } ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-right" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="offset-lg-6 col-lg-6">
          <h1>Bem vindo ao <span>Delicious Hamburgueria</span></h1>
          <h2>Lanches feitos para aproveitar a gostosura gourmet</h2>

          <div class="btns">
            <a href="<?= url("cardapio") ?>" class="btn-menu animated fadeInUp scrollto">Cardápio</a>
            <?php if ($logado != 0) { ?>
                <a href="<?= url("delivery") ?>" class="btn-book animated fadeInUp scrollto pd">Pedir Delivery</a>
                <a href="#book-a-table" class="btn-book animated fadeInUp scrollto mt-2">Reserve uma mesa</a>
            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Sessão cardápio ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cardápio</h2>
          <p>Dê uma olhada nos lanches mais pedidos!</p>
        </div>


        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($cardapio as $key => $value): ?>
            <div class="col-lg-6 menu-item mt-2">
              <div class="row">
                <div class="col-sm-2 col-3">
                  <img src="<?= url("View/assets/img/cardapio/$value->imagem") ?>" class="menu-img" alt="">
                </div>
                <div class="col-sm-10 col-9 row">
                  <a href="" class="col-10 item-nome">
                    <?php echo $value->nome?>
                  </a>
                  <div class="col-2 text-right">
                    <span class="item-preco">
                      <?php echo 'R$' .$value->preco?>
                    </span>
                  </div>
                  <div class="col-12">
                    <p class="item-ingrediente text-truncate">
                    <?php foreach ($value->ingredientes() as $key => $a) {
                        echo $a->nome.", ";
                    }?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <div class="col-12 mt-3 w-100 d-flex justify-content-center align-items-center">
              <a href="<?= url("cardapio") ?>" class="btn btn-outline-primarycolor rounded p-2 pr-4 pl-4 btn-lg scrollto mr-3">Ver Cardápio</a>
              <?php if($logado != 0):?>
              <a href="<?= url("delivery") ?>" class="btn btn-primarycolor rounded p-2 pr-4 pl-4 btn-lg scrollto">Pedir Delivery</a>
              <?php endif; ?>
            </div>
        </div>
      </div>

    </section><!-- Fim da  Sessão cardápio -->

    <!-- ======= Sessão sobre ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Nos escolha!</h2>
          <p>Algumas de nossas qualidades</p>
        </div>

        <div class="row">

          <div class="col-md-4 col-sm-6">
            <div class="box p-3 p-sm-4" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Oferecemos confiança</h4>
              <p>Pode confiar na gente em questão das entregas serem rápidas e os lanches serem a 8ª maravilha do mundo.</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 mt-4 mt-sm-0">
            <div class="box p-3 p-sm-4" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Temos um ótimo lugar</h4>
              <p>Temos um lugar confortável e aconchegante, onde você pode comer seu lanche com amigos ou até mesmo sozinho.</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 mt-4 mt-md-0">
            <div class="box p-3 p-sm-4" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> E, por fim, os lanches</h4>
              <p>Possuímos os melhores lanches da região, oferecendo qualidade, sabor e um ótimo custo.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- Fim da sessão sobre -->

    <!-- ======= Sessão de reserva ======= -->
    <?php if ($logado != 0) {?>
    <section id="book-a-table" class="book-a-table section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reserva</h2>
          <p>Reserve sua mesa</p>
        </div>

        <form action="<?= url("salvar/reserva") ?>" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="form-row">
            <div class="col-lg-3 col-md-3 form-group">
              <input type="text" name="data" class="form-control" id="data" placeholder="dd/mm/aaaa" data-rule="minlen:8"  data-msg="Por favor, coloque a data corretamente (dd/mm/aaaa)">
              <div class="validate"></div>
            </div>
            <div class="col-lg-3 col-md-3 form-group">
              <input type="text" name="hora" class="form-control" id="hora" placeholder="hh:mm" data-rule="minlen:4"  data-msg="Por favor, coloque o horario corretamente (hora e minuto)">
              <div class="validate"></div>
            </div>
            <div class="col-lg-6 col-md-6 form-group">
              <input type="text" class="form-control" name="numeropessoas" id="numeropessoas" placeholder="Número de Pessoas (Máx. 10)" maxlength="2" data-rule="minlen:1" data-msg="Por favor, coloque pelo menos 1 pessoa">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="obs" name="obs" rows="5" placeholder="Observações, por exemplo: mesa próximo a uma janela"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Aguarde, entraremos em contato assim que possível!</div>
          </div>
          <div class="text-center"><button type="submit" class="btn btn-primarycolor rounded p-2 pr-4 pl-4 btn-lg">Reservar</button></div>
        </form>

      </div>
    </section>
    <?php } else { } ?>
    <!-- Fim da sessão de reserva -->

    <!-- ======= Sessão avaliação ======= -->
    <?php if ($logado != 0) {?>
      <section id="avaliacao" class="contact section-bg">
          <div class="container" data-aos="fade-up">
              <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
                <div class="row book-a-table" data-aos="fade-up">
                  <div class="section-title text-left">
                    <h2>Avaliar</h2>

                    <p>Dê sua avaliação sobre nossa lanchonete!</p>
                  </div>
               
                
                  <form action="<?= url("salvar/avaliacao") ?>" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                    <div class="form-row">
                      <div class="col-12">
                        <div class="mb-5 h3">
                              <i class="far fa-star stars text-warning" id="star-1"></i>
                              <i class="far fa-star stars text-warning" id="star-2"></i>
                              <i class="far fa-star stars text-warning" id="star-3"></i>
                              <i class="far fa-star stars text-warning" id="star-4"></i>
                              <i class="far fa-star stars text-warning" id="star-5"></i>
                        </div>
                        <input type="hidden" value="0" name="estrela" id="estrela">
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" id="avaliacao" name="avaliacao" rows="5" placeholder="Digite seu avaliação aqui!"></textarea>
                      <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                    </div>

                    <div class="text-center"><button type="submit" class="btn btn-primarycolor rounded p-2 pr-4 pl-4 btn-lg">Comentar</button></div>

                  </form>
                </div>
              </div>
          </div>
      </section>
    <?php } else { } ?>
    <!-- Fim da sessão avaliação -->

    <!-- ======= Sessão Lista de Avaliações ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Avaliações</h2>
          <p>Dê uma olhadinha em nossas avaliações</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

          <?php foreach($avaliacoes as $key => $linha){ ?>
            <div class="testimonial-item">
              <p class="text-center">
                <span class="h4 text-uppercase"><?php echo explode(" ", $linha->nome)[0];?></span>
                <br>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php echo $linha->avaliacao ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>                
              </p>
              <div class="img-data">
                <img src="<?= url("View/assets/img/testimonials/testimonials-2.png") ?>" class="testimonial-img" alt="">
                <span class="testimonial-data-estrela">
                  <?php echo $linha->datahora  ?>
                  <br>
                  <?php if ($linha->estrela == 1) {  ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                  <?php } else if ($linha->estrela == 2) {  ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                  <?php   } else if ($linha->estrela == 3) {  ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                  <?php } else if ($linha->estrela == 4 ){ ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-alt text-warning"></i>
                  <?php } else { ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                  <?php } ?>
                </span>
              </div>
            </div>
          <?php } ?>

      </div>
    </section>
    <!-- Fim da sessão avaliaçãos  -->

    <!-- ======= Sessão Fotos ======= -->
    <section id="gallery" class="gallery section-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeria</h2> 
          <p>Algumas fotos da nossa hamburgueria</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row no-gutters">

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-9.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-9.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-2.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-2.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-3.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-3.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-4.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-4.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-5.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-5.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-6.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-6.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-7.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-7.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4 col-6">
            <div class="gallery-item">
              <a href="<?= url("View/assets/img/gallery/gallery-8.jpg") ?>" class="venobox" data-gall="gallery-item">
                <img src="<?= url("View/assets/img/gallery/gallery-8.jpg") ?>" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- Fim da sessão fotos -->

    <!--- Sessão sobre --->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="<?= url("View/assets/img/fundo.jpg") ?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Um pouco sobre nós.</h3>
            <p class="font-italic">
              Somos a Delicious Hamburgueria!
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Nossa lanchonete existe a quase 10 anos, nos considere veteranos nisso aqui :)</li>
              <li><i class="icofont-check-circled"></i> Possuímos os melhores Chefs da região, sempre oferecendo qualidade e compromisso à nossos clientes.</li>
              <li><i class="icofont-check-circled"></i> Nesse momento de pandemia, oferecemos conforto e segurança pra você e sua família, e você nem precisa sair de casa. Curtiu, né?</li>
              <li><i class="icofont-check-circled"></i> Oferecemos suporte durante todo o horário de atendimento, então, se precisar, é só nos chamar!</li>
            </ul>
            <p>
              Agora que sabe um pouco mais sobre nós, fique à vontade para reservar sua mesa e aproveite para conferir nosso cardápio com os principais pratos logo abaixo. Desejamos uma boa refeição!
            </p>
          </div>
        </div>

      </div>
    </section>   
    <!-- Fim da sessão sobre-->  


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container-xl">
        <div class="row">

          <div class="col-md-4 text-center">
              <h3>Delicious Hamburgueria</h3>
              <img src="<?= url("View/assets/img/favicon1.png") ?>" alt="logo" title="logo Delicious Hamburgueria" class="img-fluid w-25">
          </div>
          <div class="col-md-4 text-center">
            <p>
              A108 Adam Street <br>
              NY 535022, USA<br><br>
              <strong>Telefone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> delicioushamb@gmail.com<br>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious Hamburgueria</span></strong>. Todos direitos reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Desenvolvido por <a href="">Time Delicious</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader">
    <div class="loading">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= url("View/assets/vendor/jquery/jquery.min.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/jquery.easing/jquery.easing.min.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/php-email-form/validate.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/owl.carousel/owl.carousel.min.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/isotope-layout/isotope.pkgd.min.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/venobox/venobox.min.js") ?>"></script>
  <script src="<?= url("View/assets/vendor/aos/aos.js") ?>"></script>
  <script src="<?= url("View/assets/js/jquery.mask.min.js") ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= url("View/assets/js/main.js") ?>"></script>

</body>

</html>