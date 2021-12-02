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
  <?php if(isset($_SESSION["naologado"]) && $_SESSION["naologado"] == "sim_delivery"): ?>
  <div class="modal fade" id="modal_naologado">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-body text-center">
          <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 25pt;">
            Não Logado
          </h4>
          <button type="button" class="close btn" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 1rem; top: 1rem;">
            <span aria-hidden="true" class="text-primarycolor">&times;</span>
          </button>
          <p>Para acessar está área, você precisa estar logado!</p>
          <div class="d-flex justify-content-around">
            <a href="<?= url("login") ?>" class="btn btn-primarycolor rounded-pill">Acessar Conta</a>
            <a href="<?= url("cadastro") ?>" class="btn btn-primarycolor rounded-pill">Criar Conta</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; unset($_SESSION["naologado"])?>
  <!-- ======= App Bar ======= -->
  <div class="baixar-app text-center">
      <div class="d-flex justify-content-end">
        <button class="btn text-primarycolor h3 btn-fechar-appbar"><i class="fas fa-times"></i></button>
      </div>
      <h3 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 18pt;">Instale nosso Aplicativo</h3>
      <a href="https://play.google.com/store/apps/details?id=io.kodular.gustavoornaghiantunes.DeliciousHamburgueria">
        <img src="<?= url("View/assets/img/play_store_br.png") ?>" alt="img-playstore" width="200px">
      </a>
  </div><!-- End App Bar -->

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> <a href="tel:1938630823" class="text-light">+55 19 3863-0823</a>
        <i class="ml-3 fab fa-whatsapp d-none d-md-inline-block"></i> <a href="https://api.whatsapp.com/send/?phone=551938630823"class="text-light d-none d-md-inline-block">+55 19 3863-0823</a>
        <?php if(isset($traduzir)): ?>
          <span class="ml-3 d-none d-md-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Friday-Sunday: 18:00 - 00:00</span>
        <?php else: ?>
            <span class="ml-3 d-none d-md-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Sexta-Domingo: 18:00 - 00:00</span>
        <?php endif; ?>
      </div>
      <div class="dropdown">
      <?php if(isset($traduzir)): ?>
        <a href="#" class="text-light p-1 pl-4 pr-4 rounded-pill d-flex justify-content-between align-items-center w-100 dropdown-toggle" data-toggle="dropdown">
          <div>
            <img src="<?= url("View/assets/img/eua_flag.jpg") ?>" alt="eng" height="25px" width="25px" class="rounded-circle">
          </div>
        </a>
      <?php else:?>
        <a href="#" class="text-light p-1 pl-4 pr-4 rounded-pill d-flex justify-content-between align-items-center w-100 dropdown-toggle" data-toggle="dropdown">
          <div>
            <img src="<?= url("View/assets/img/br_flag.jpg") ?>" alt="pt_br" height="25px" width="25px" class="rounded-circle">
          </div>
        </a>
      <?php endif; ?>

        <div class="dropdown-menu bg-dark">
          <a href="<?= url("pt") ?>" class="text-light bg-dark p-1 pl-4 pr-4 rounded-pill d-flex justify-content-between align-items-center w-100 dropdown-item">
            <div>
              <img src="<?= url("View/assets/img/br_flag.jpg") ?>" alt="pt_br" height="25px" width="25px" class="rounded-circle">
            </div>
            <div>
              <span>PT_BR</span>
            </div>
          </a>
          <a href="<?= url("eng") ?>" class="text-light bg-dark p-1 pl-4 pr-4 rounded-pill d-flex justify-content-between align-items-center w-100 dropdown-item">
            <div>
              <img src="<?= url("View/assets/img/eua_flag.jpg") ?>" alt="eng" height="25px" width="25px" class="rounded-circle">
            </div>
            <div>
              <span>ENG</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div><!-- End Top Bar -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    <?php if(isset($traduzir)): ?>
      <h1 class="logo mr-auto"><a href="<?= url("") ?>">Delicious Burger</a></h1>
    <?php else: ?>
        <h1 class="logo mr-auto"><a href="<?= url("") ?>">Delicious Hamburgueria</a></h1>
    <?php endif; ?>

      <nav class="nav-menu d-none d-lg-block">
        <?php if(isset($traduzir)): ?>
          <ul>
            <li class="active"><a href="#hero">Home</a></li>
            <li><a href="<?= url("cardapio") ?>">Menu</a></li>
            <li><a href="<?= url("delivery") ?>">Delivery</a></li>
            <?php if ($logado != 0) { ?>
            <li><a href="#book-a-table">Book a Table</a></li>
            <li><a href="#about">About Us</a></li>
            <li class="conta text-center">
              <a href="" class="btn-minhaconta">
                My Account <i class="fas fa-chevron-down"></i>
              </a>
              <ul class="menu-conta">
                <li><a href="<?= url("conta/minhaconta") ?>">My Account</a></li>
                <li><a href="<?= url("conta/meuspedidos") ?>">My Orders</a></li>
                <li><a href="<?= url("conta/minhasreservas") ?>">My Reservations</a></li>
                <?php if ($admin == 1){?>
                  <li><a href="<?= url("admin") ?>">Admin</a></li>
                <?php } ?>
                <li><a href="<?= url("sair") ?>">Log Out</a></li>
              </ul>
            </li>
            <?php } else { ?>
              <li class="conta text-center"><a href="<?= url("login") ?>" class="btn-entrar">Log In</a></li>
            <?php } ?>
          </ul>
        <?php else: ?>
          <ul>
            <li class="active"><a href="#hero">Início</a></li>
            <li><a href="<?= url("cardapio") ?>">Cardápio</a></li>
            <li><a href="<?= url("delivery") ?>">Delivery</a></li>
            <?php if ($logado != 0) { ?>
              <li><a href="#book-a-table">Reserve uma mesa</a></li>
              <li><a href="#about">Sobre nós</a></li>
              <li class="conta text-center">
                <a href="" class="btn-minhaconta">
                  Minha conta <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="menu-conta">
                  <li><a href="<?= url("conta/minhaconta") ?>">Minha conta</a></li>
                  <li><a href="<?= url("conta/meuspedidos") ?>">Meus Pedidos</a></li>
                  <li><a href="<?= url("conta/minhasreservas") ?>">Minhas Reservas</a></li>
                  <?php if ($admin == 1){?>
                    <li><a href="<?= url("admin") ?>">Admin</a></li>
                  <?php } ?>
                  <li><a href="<?= url("sair") ?>">Sair</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li><a href="#about">Sobre nós</a></li>
              <li class="conta text-center"><a href="<?= url("login") ?>" class="btn-entrar">Entrar</a></li>
            <?php } ?>
          </ul>
        <?php endif; ?>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center position-relative">
    <div class="container text-center text-lg-right" data-aos="zoom-in" data-aos-delay="100">
      <?php if(isset($traduzir)): ?>
        <div class="row">
            <div class="offset-lg-5 col-lg-7">
              <h1>Welcome to <span>Delicious Burger</span></h1>
              <h2>Burgers made to enjoy gourmet treats</h2>
  
              <div class="btns">
                <a href="<?= url("cardapio") ?>" class="btn-menu animated fadeInUp scrollto">Menu</a>
                <?php if ($logado != 0) { ?>
                    <a href="<?= url("delivery") ?>" class="btn-book animated fadeInUp scrollto mt-2">Order a Delivery</a>
                    <a href="#book-a-table" class="btn-book animated fadeInUp scrollto mt-2">Book a Table</a>
                <?php } ?>
              </div>
            </div>
            <div class="btn-abaixar-hero">
              <i class="fas fa-chevron-down"></i>
              <i class="fas fa-chevron-down"></i>
            </div>
          </div>
      <?php else: ?>
        <div class="row">
          <div class="offset-lg-5 col-lg-7">
            <h1>Bem vindo ao <span>Delicious Hamburgueria</span></h1>
            <h2>Lanches feitos para aproveitar a gostosura gourmet</h2>

            <div class="btns">
              <a href="<?= url("cardapio") ?>" class="btn-menu animated fadeInUp scrollto">Cardápio</a>
              <?php if ($logado != 0) { ?>
                  <a href="<?= url("delivery") ?>" class="btn-book animated fadeInUp scrollto mt-2">Pedir Delivery</a>
                  <a href="#book-a-table" class="btn-book animated fadeInUp scrollto mt-2">Reserve uma mesa</a>
              <?php } ?>
            </div>
          </div>
          <div class="btn-abaixar-hero">
            <i class="fas fa-chevron-down"></i>
            <i class="fas fa-chevron-down"></i>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Sessão cardápio ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container">

        <div class="section-title">
          <?php if(isset($traduzir)): ?>
            <h2>Menu</h2>
            <p>Those are the most popular burgers!</p>
          <?php else: ?>
            <h2>Cardápio</h2>
            <p>Estes são os lanches mais populares!</p>
          <?php endif; ?>
        </div>

        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <?php if($cardapio): foreach ($cardapio as $key => $value): ?>
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
            <?php endforeach; endif; ?>
        </div>
        <?php if(isset($traduzir)): ?>
          <div class="col-12 mt-3 w-100 d-flex justify-content-center align-items-center">
            <a href="<?= url("cardapio") ?>" class="btn btn-outline-primarycolor rounded-pill p-2 pr-4 pl-4  scrollto mr-3">See Menu</a>
            <a href="<?= url("delivery") ?>" class="btn btn-primarycolor rounded-pill p-2 pr-4 pl-4  scrollto">Order a Delivery</a>
          </div>
        <?php else: ?>
          <div class="col-12 mt-3 w-100 d-flex justify-content-center align-items-center">
            <a href="<?= url("cardapio") ?>" class="btn btn-outline-primarycolor rounded-pill p-2 pr-4 pl-4  scrollto mr-3">Ver Cardápio</a>
            <a href="<?= url("delivery") ?>" class="btn btn-primarycolor rounded-pill p-2 pr-4 pl-4  scrollto">Pedir Delivery</a>
          </div>
        <?php endif; ?>
      </div>

    </section><!-- Fim da  Sessão cardápio -->

    <!-- ======= Sessão sobre ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <?php if(isset($traduzir)): ?>
        <?php else: ?>
        <?php endif; ?>
        <?php if(isset($traduzir)): ?>
          <div class="section-title">
            <h2>Choose Us!</h2>
            <p>Some of our qualities!</p>
          </div>
          <div class="row">
  
            <div class="col-md-4 col-sm-6">
              <div class="box p-3 p-sm-4" data-aos="zoom-in" data-aos-delay="100">
                <span>01</span>
                <h4>We offer trust</h4>
                <p>You can trust us in fast deliveries and the burgers were 8th wonder of the world.</p>
              </div>
            </div>
  
            <div class="col-md-4 col-sm-6 mt-4 mt-sm-0">
              <div class="box p-3 p-sm-4" data-aos="zoom-in" data-aos-delay="200">
                <span>02</span>
                <h4>We have a great place</h4>
                <p>We have a fit place and comfortable, it is where you can eat our burgers with your friends or on your own.</p>
              </div>
            </div>
  
            <div class="col-md-4 col-sm-6 mt-4 mt-md-0">
              <div class="box p-3 p-sm-4" data-aos="zoom-in" data-aos-delay="300">
                <span>03</span>
                <h4>Ending with our burgers</h4>
                <p>We have a best burgers around here, offering quality, taste and a great price.</p>
              </div>
            </div>
  
          </div>
        <?php else: ?>
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
        <?php endif; ?>


      </div>
    </section>
    <!-- Fim da sessão sobre -->

    <!-- ======= Sessão de reserva ======= -->
    <?php if ($logado != 0): ?>
    <section id="book-a-table" class="book-a-table section-bg">
      <div class="container" data-aos="fade-up">
        <?php if(isset($traduzir)): ?>
          <div class="section-title">
            <h2>Reservation</h2>
            <p>Book a Table</p>
          </div>

          <form action="<?= url("salvar/reserva") ?>" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            <div class="form-row">
              <div class="col-lg-3 col-md-3 form-group">
                <input type="text" name="data" class="form-control" id="data" placeholder="dd/mm/yyyy" data-rule="minlen:8"  data-msg="Please, Use the correct way on the date (dd/mm/yyyy)">
                <div class="validate"></div>
              </div>
              <div class="col-lg-3 col-md-3 form-group">
                <input type="text" name="hora" class="form-control" id="hora" placeholder="hh:mm" data-rule="minlen:4"  data-msg="Please, Use the correct way on the hour (hour:minute)">
                <div class="validate"></div>
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <input type="text" class="form-control" name="numeropessoas" id="numeropessoas" placeholder="Quantity of People" maxlength="2" data-rule="minlen:1" data-msg="Please, minimun quantity of people is 1">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="obs" name="obs" rows="5" placeholder="Observation, example: Second floor"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-primarycolor rounded-pill p-2 pr-4 pl-4 ">Reserve</button></div>
          </form>
        <?php else: ?>
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
              <div class="loading">Carregando</div>
              <div class="error-message"></div>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-primarycolor rounded-pill p-2 pr-4 pl-4 ">Reservar</button></div>
          </form>
        <?php endif; ?>

      </div>
    </section>
    <?php endif; ?>
    <!-- Fim da sessão de reserva -->

    <!-- ======= Sessão avaliação ======= -->
    <?php if ($logado != 0):?>
    <section id="avaliacao" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
              <?php if(isset($traduzir)): ?>
                <div class="row book-a-table" data-aos="fade-up">
                  <div class="section-title text-left">
                    <h2>Feedback</h2>
  
                    <p>Send a feedback to us!</p>
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
                      <textarea class="form-control" id="avaliacao" name="avaliacao" rows="5" placeholder="Type your feedback here!"></textarea>
                      <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                    </div>
  
                    <div class="text-center"><button type="submit" class="btn btn-primarycolor rounded-pill p-2 pr-4 pl-4 ">Comentar</button></div>
  
                  </form>
                </div>
              <?php else: ?>
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
  
                    <div class="text-center"><button type="submit" class="btn btn-primarycolor rounded-pill p-2 pr-4 pl-4 ">Comentar</button></div>
  
                  </form>
                </div>
              <?php endif; ?>
            </div>
            
        </div>
    </section>
    <?php endif; ?>
    <!-- Fim da sessão avaliação -->

    <!-- ======= Sessão Lista de Avaliações ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
      <?php if(isset($traduzir)): ?>
        <div class="section-title">
          <h2>Feedbacks</h2>
          <p>Those are some feedbacks about us!</p>
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
                <img src="<?= url("View/assets/img/perfil.png") ?>" class="testimonial-img" alt="">
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
        <?php else: ?>
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
                  <img src="<?= url("View/assets/img/perfil.png") ?>" class="testimonial-img" alt="">
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
      <?php endif;?>
      </div>
    </section>
    <!-- Fim da sessão avaliaçãos  -->

    <!-- ======= Sessão Fotos ======= -->
    <section id="gallery" class="gallery">

      <?php if(isset($traduzir)): ?>
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Gallery</h2> 
            <p>Some photos of our snack bar!</p>
          </div>
        </div>
      <?php else: ?>
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Galeria</h2> 
            <p>Algumas fotos da nossa hamburgueria!</p>
          </div>
        </div>
      <?php endif; ?>
        
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
          <?php if(isset($traduzir)): ?>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>A Little About Us</h3>
              <p class="font-italic">
                We are Delicious Burger!
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Our snack bar there is since 10 years ago, consider us veterans in this here :)</li>
                <li><i class="icofont-check-circled"></i> We have the best Chefs around here, always offer quality and compromise to our clients.</li>
                <li><i class="icofont-check-circled"></i> In this moment of pandemic, we offer confort and securance to you and your family, and you don't need to leave your home. you like it, aren't you?</li>
                <li><i class="icofont-check-circled"></i> We offer suport in our office hours, so, if you need, just tell us!</li>
              </ul>
              <p>
                Since you now a little more about us, fell free to book a table and enjoy to see our <a href="" class="text-primarycolor">menu</a>. We wish you a good snack!
              </p>
            </div>
          <?php else: ?>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>Um pouco sobre nós.</h3>
              <p class="font-italic">
                Somos a Delicious Hamburgueria!
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Nossa lanchonete existe a quase 10 anos, nos consideramos veteranos nisso aqui :)</li>
                <li><i class="icofont-check-circled"></i> Possuímos os melhores Chefs da região, sempre oferecendo qualidade e compromisso à nossos clientes.</li>
                <li><i class="icofont-check-circled"></i> Nesse momento de pandemia, oferecemos conforto e segurança pra você e sua família, e você nem precisa sair de casa. Curtiu, né?</li>
                <li><i class="icofont-check-circled"></i> Oferecemos suporte durante todo o horário de atendimento, então, se precisar, é só nos chamar!</li>
              </ul>
              <p>
                Agora que sabe um pouco mais sobre nós, fique à vontade para reservar sua mesa e aproveite para conferir nosso <a href="" class="text-primarycolor">cardápio</a>. Desejamos à você uma boa refeição!
              </p>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </section>   
    <!-- Fim da sessão sobre-->  


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container-xl">
      <?php if(isset($traduzir)): ?>
        <div class="row">

          <div class="col-md-4 text-center">
              <h3>Delicious Burger</h3>
              <img src="<?= url("View/assets/img/favicon1.png") ?>" alt="logo" title="logo Delicious Hamburgueria" class="img-fluid w-25">
          </div>
          <div class="col-md-4 text-center">
            <p>
              A108 Adam Street <br>
              NY 535022, USA<br><br>
              <strong>tellphone number:</strong> +1 5589 55488 55<br>
              <strong>e-mail:</strong> suporte@deliciousburguer.com.br<br>
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
      <?php else: ?>
        <div class="row">

          <div class="col-md-4 text-center">
              <h3>Delicious Hamburgueria</h3>
              <img src="<?= url("View/assets/img/favicon1.png") ?>" alt="logo" title="logo Delicious Hamburgueria" class="img-fluid w-25">
          </div>
          <div class="col-md-4 text-center">
            <p>
              Rua Adam A108 <br>
              NY 535022, USA<br><br>
              <strong>Telefone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> suporte@deliciousburguer.com.br<br>
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
      <?php endif; ?>
      </div>
    </div>

    <div class="container">
    <?php if(isset($traduzir)): ?>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious Burger</span></strong>.     All rights reserved
      </div>
      <div class="credits">
        developed by <a href="" class="text-primarycolor">Delicious Team</a>
      </div>
    <?php else: ?>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious Hamburgueria</span></strong>. Todos direitos reservados
      </div>
      <div class="credits">
        Desenvolvido por <a href="" class="text-primarycolor">Time Delicious</a>
      </div>
    <?php endif;?>
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
  <script src="<?= url("View/assets/js/mask.js") ?>"></script>

  <script>
    $("#modal_naologado").modal("show");
  </script>


</body>

</html>