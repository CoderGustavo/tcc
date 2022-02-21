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
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top headerDelivery" style="background-color: #55360069;">
        <div class="container d-flex align-items-center">

        <a href="<?= url("") ?>" class="logo mr-auto"><img src="<?= url("View/assets/img/favicon1.png") ?>" alt="" class="img-fluid"></a>
        <nav class="nav-menu d-none d-lg-block">
            <?php if(isset($traduzir)): ?>
                <ul>
                    <li><a href="<?= url("") ?>">Home</a></li>
                    <li class="active"><a href="<?= url("cardapio") ?>">Menu</a></li>
                    <li><a href="<?= url("delivery") ?>">Delivery</a></li>
                    <?php if ($logado != 0): ?>
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
                    <?php else: ?>
                        <li class="conta text-center"><a href="<?= url("login") ?>" class="btn-entrar">LOG IN</a></li>
                    <?php endif; ?>
                </ul>
            <?php else: ?>
                <ul>
                    <li><a href="<?= url("") ?>">Início</a></li>
                    <li class="active"><a href="<?= url("cardapio") ?>">Cardápio</a></li>
                    <li><a href="<?= url("delivery") ?>">Delivery</a></li>
                    <?php if ($logado != 0): ?>
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
                    <?php else: ?>
                        <li class="conta text-center"><a href="<?= url("login") ?>" class="btn-entrar">ENTRAR</a></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <section id="delivery" class="book-a-table mt-5">
        
        <div class="container-xl" data-aos="fade-up">
        <?php if(isset($traduzir)): ?>
            <div class="section-title pb-0 pb-md-3">
                <h2>Menu</h2>
                <p class="d-none d-md-block">All of our menu you find here!</p>
            </div>
        <?php else: ?>
            <div class="section-title pb-0 pb-md-3">
                <h2>Cardápio</h2>
                <p class="d-none d-md-block">Todo nosso cardápio você encontra aqui!</p>
            </div>
        <?php endif; ?>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li filtro="todos" class="filter-active">Todos</li>
                        <?php if($categorias): foreach ($categorias as $key => $categoria): ?>
                            <li filtro="filtro-<?php echo strtolower(str_replace(' ', '', $categoria->id)) ?>"><?php echo $categoria->nome ?></li>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="row mb-2 accordion menu" id="accordionCardapio" data-aos="fade-up" data-aos-delay="200">
                <?php if($cardapio): foreach ($cardapio as $key => $lista): ?>
                    <div class="col-md-6 col-12 menu-item p-2" filtrar="filtro-<?php echo $lista->id_categoria?>">
                        <div class="border border-primarycolor p-2 rounded" >
                            <div class="row item-delivery" data-toggle="collapse" data-target="#ingredientes<?php echo $key?>">
                            <div class="col-sm-2 col-3">
                                <img src="<?= url("View/assets/img/cardapio/".$lista->imagem) ?>" class="menu-img" alt="">
                            </div>
                            <div class="col-sm-10 col-9 row">
                                <span class="col-10 item-nome text-uppercase font-weight-bold" style="font-size: 14pt;">
                                <?php echo $lista->nome?>
                                </span>
                                <div class="col-2 text-right">
                                <span class="item-preco">
                                    <?php echo 'R$' .$lista->preco?>
                                </span>
                                </div>
                                <div class="col-12">
                                <p class="item-ingrediente">
                                <?php if(isset($traduzir)): ?>
                                    Select to see the ingredients
                                <?php else: ?>
                                    Selecione para ver os ingredientes
                                <?php endif; ?>
                                </p>
                                </div>
                            </div>
                            </div>
                            <div class="container accordion-collapse collapse" id="ingredientes<?php echo $key ?>" data-parent="#accordionCardapio">
                                <div class="row">
                                    <?php foreach($lista->ingredientes() as $a){?>
                                    <div class="col-lg-6 p-2 text-center">
                                        <div class="w-100 rounded d-flex justify-content-between p-2 text-light border border-primarycolor">
                                            <span class="text-center w-100">
                                                <?php echo $a->nome?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
            <?php if($usuario): ?>
                <div class="text-center"><a href="<?= url("delivery") ?>" class="btn btn-primarycolor rounded p-2 pr-4 pl-4 btn-lg">Pedir Delivery</a></div>
            <?php endif; ?>

        </div>
    </section>

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