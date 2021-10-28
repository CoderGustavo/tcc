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
    <header class="fixed-top" style="background-color: #55360069;">
        <div class="container-xl d-flex align-items-center p-3">

            <a href="<?= url("") ?>" class="logo mr-auto"><img src="<?= url("View/assets/img/favicon1.png")?>" alt="" width="50px"></a>

            <nav class="nav-menu">
            <ul>
                <li><a href="<?= url("") ?>">Inicio</a></li>
                <li class="active"><a href="<?= url("cardapio") ?>">Cardápio</a></li>
                <?php if($usuario):?>
                    <li><a href="<?= url("delivery") ?>">Delivery</a></li>
                <?php endif; ?>
            </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <section id="delivery" class="book-a-table mt-5">
        
        <div class="container-xl" data-aos="fade-up">

            <div class="section-title">
                <h2>Cardápio</h2>
                <p>Todo nosso cardápio você encontra aqui!</p>
            </div>
    
            <form action="../controller/pedido/pedido-salvar.php" method="post" class="php-email-form menu" data-aos="fade-up" data-aos-delay="100">
                <div class="row mb-2 accordion" id="accordionCardapio" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($cardapio as $key => $lista): ?>
                    <div class="col-md-6 col-12 menu-item p-2">
                    <div class="border border-primarycolor p-2 rounded" >
                        <div class="row item-delivery" data-toggle="collapse" data-target="#ingredientes<?php echo $key?>">
                        <div class="col-sm-2 col-3">
                            <img src="<?= url("View/assets/img/menu/lanche1.jpg") ?>" class="menu-img" alt="">
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
                                Selecione para ver os ingredientes
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
                <?php endforeach; ?>
                </div>
    
                <div class="mb-3">
                <div class="loading">Carregando</div>
                <div class="error-message"></div>
                <div class="sent-message">Aguarde, entregaremos assim que possivel</div>
                </div>
    
                <div class="text-center"><a href="<?= url("delivery") ?>" class="btn btn-primarycolor rounded p-2 pr-4 pl-4 btn-lg">Pedir Delivery</a></div>
                
            </form>

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