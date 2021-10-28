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
    <section id="delivery" class="book-a-table">
        
        <div class="container-xl" data-aos="fade-up">

            <div class="section-title">
                <h1 class="text-primarycolor" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Mesa <?php echo $numeromesa?></h1>
                <span>Escolha seu pedido!</span>
            </div>
    
            <div class="menu" data-aos="fade-up" data-aos-delay="100">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($cardapio as $key => $lista): ?>
                    <div class="col-md-6 col-12 menu-item p-2">
                    <div class="border border-primarycolor p-2 rounded">
                        <div class="row item-delivery" data-toggle="collapse" data-target="#ingredientes<?php echo $key?>">
                        <div class="col-lg-2">
                            <img src="<?= url("View/assets/img/menu/lanche1.jpg") ?>" class="menu-img" alt="">
                        </div>
                        <div class="col-lg-10 row">
                            <span class="col-lg-6 item-nome text-uppercase font-weight-bold" style="font-size: 14pt;">
                            <?php echo $lista->nome?>
                            </span>
                            <div class="col-lg-6 text-right">
                            <span class="item-preco">
                                <?php echo 'R$' .$lista->preco?>
                            </span>
                            </div>
                            <div class="col-lg-12">
                            <p class="item-ingrediente">
                                Selecione para ver os ingredientes
                            </p>
                            </div>
                        </div>
                        </div>
                        <div class="container collapse" id="ingredientes<?php echo $key ?>">
                        <div class="row">
                            <?php foreach($lista->ingredientes() as $a){?>
                            <div class="col-lg-6 p-2 text-center">
                                <div class="w-100 rounded d-flex justify-content-between p-2 border border-primarycolor">
                                <div>
                                    <?php echo $a->nome?>
                                </div>
                                <div>
                                    <?php if($a->retirar == "sim"){?>
                                    <a href="" class="text-light">
                                    <i class="far fa-trash"></i>
                                    </a>
                                    <?php } ?>
                                </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-primarycolor"><i class="fas fa-minus"></i></a>
                            <input type="number" placeholder="Qtd.: " class="w-25 form-control ml-3 mr-3 border border-primarycolor">
                            <a href="" class="btn btn-primarycolor"><i class="fas fa-plus"></i></a>
                        </div>
                        <button class="btn btn-primarycolor btn-block rounded mt-3">Adicionar ao pedido</button>
                        </div>
                    </div>
                    </div>
                <?php endforeach; ?>
                </div>

        
        
            </div>
        </div>
    </section>

    <div class="pedido-sacola">
        <div class="div-texto">
            <button class="texto btn btn-primarycolor">
            <p>
                Ver Pedido
            </p>
            </button>
        </div>
        <div class="pedidos-sacola">
            <h3>Pedido</h3>
            <div class="row p-2">
                <div class="col-12 border border-primarycolor p-4 rounded">
                    <div class="row">
                        <div class="col-6 text-left d-flex justify-content-between flex-column">
                            <p class="h3">X-Tudo</p>
                            <p>Qtd: 5</p>
                            <p class="m-0">Obs.: Sem Tomate</p>
                        </div>
                        <div class="col-6 text-right d-flex justify-content-between flex-column">
                            <h5>
                                <a href="">
                                    <i class="far fa-trash"></i>
                                </a>
                            </h5>
                            <h4>R$50.00</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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