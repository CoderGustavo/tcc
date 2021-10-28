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
                <li><a href="<?= url("cardapio") ?>">Cardápio</a></li>
                <?php if($usuario):?>
                    <li class="active"><a href="<?= url("delivery") ?>">Delivery</a></li>
                <?php endif; ?>
            </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <section id="delivery" class="book-a-table mt-5">
        
        <div class="container-xl" data-aos="fade-up">

            <div class="section-title">
                <h2>Delivery</h2>
                <p>Escolha seu pedido!</p>
            </div>
    
            <div class="menu" data-aos="fade-up" data-aos-delay="100">
                <div class="row mb-2">
                <?php foreach ($cardapio as $key => $lista): ?>
                    <form class="row col-md-6" action="<?= url("delivery/adicionar") ?>" method="post">
                        <div class="col-12 menu-item p-2">
                            <div class="border border-primarycolor p-2 rounded">
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
                                                <span class="nome_ingrediente">
                                                    <?php echo $a->nome?>
                                                </span>
                                                <div>
                                                    <?php if($a->retirar == "sim"){?>
                                                    <a href="" class="text-light retirar_ingrediente">
                                                        <i class="far fa-trash"></i>
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $lista->id ?>">
                                    <input type="hidden" name="nome" value="<?php echo $lista->nome ?>">
                                    <input type="hidden" name="obs" value=" ">
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-primarycolor subtrairqtd"><i class="fas fa-minus"></i></a>
                                        <input type="number" placeholder="Qtd.: " name="qtd" class="w-25 form-control ml-3 mr-3 border border-primarycolor text-center" value="1">
                                        <a href="" class="btn btn-primarycolor somarqtd"><i class="fas fa-plus"></i></a>
                                    </div>
                                    <button class="btn btn-primarycolor btn-block rounded mt-3">Adicionar ao pedido</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
            <div class="row">
                <?php foreach($pedido as $key => $linha): ?>
                <div class="col-12 border border-primarycolor p-3 rounded mb-2">
                    <div class="row">
                        <div class="col-12 text-center d-flex justify-content-between">
                            <p class="h3"><?php echo $linha->nome?></p>
                            <p>Qtd: <?php echo $linha->qtd?></p>
                            <h5>
                                <a href="<?= url("/delivery/excluir/$linha->id") ?>">
                                    <i class="far fa-trash"></i>
                                </a>
                            </h5>
                        </div>
                        <div class="col-12 text-center d-flex justify-content-between mt-2 align-items-end">
                            <p class="m-0">Obs.: <?php echo $linha->obs?></p>
                            <p class="m-0">R$<?php echo $linha->preco*$linha->qtd?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(count($pedido) > 0): ?>
                    <a href="<?= url("checkout/endereco") ?>" class="btn btn-block btn-primarycolor">Confirmar Pedido</a>
                <?php else: ?>
                    <div class="d-flex w-100 justify-content-center">
                        <h2>Nenhum item selecionado!</h2>
                    </div>
                <?php endif ?>
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