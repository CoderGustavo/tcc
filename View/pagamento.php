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

  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script src="<?= url("View/assets/vendor/jquery/jquery.min.js") ?>"></script>
</head>

<body>
    <?php include_once("modais_pagamento.php") ?>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top headerDelivery" style="background-color: #55360069;">
        <div class="container d-flex align-items-center">

        <a href="<?= url("") ?>" class="logo mr-auto"><img src="<?= url("View/assets/img/favicon1.png") ?>" alt="" class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block">
            <?php if(isset($traduzir)): ?>
                <ul>
                    <li><a href="<?= url("") ?>">Home</a></li>
                    <li><a href="<?= url("cardapio") ?>">Menu</a></li>
                    <li class="active"><a href="<?= url("delivery") ?>">Delivery</a></li>
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
                </ul>
            <?php else: ?>
                <ul>
                    <li><a href="<?= url("") ?>">Início</a></li>
                    <li><a href="<?= url("cardapio") ?>">Cardápio</a></li>
                    <li class="active"><a href="<?= url("delivery") ?>">Delivery</a></li>
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
                </ul>
            <?php endif; ?>
        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->


    <section id="delivery" class="book-a-table mt-5">
        
        <div class="container-xl" data-aos="fade-up">

            <div class="section-title">
                <h2 class="mb-2">Seu Pedido</h2>
                <div class="table-responsive" data-aos="fade-up" data-aos-delay="100">
                    <table class="table table-striped table-borderless table-sm text-light border">
                        <thead class="bg-primarycolor">
                            <tr>
                                <th>Nome</th>
                                <th>Qtd</th>
                                <th>Obs</th>
                                <th>Preço uni.</th>
                                <th>Preço Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedido as $key => $lista): ?>
                            <tr>
                                <td><?php echo $lista->nome?></td>
                                <td><?php echo $lista->qtd?></td>
                                <td><?php echo $lista->obs?></td>
                                <td>R$<?php echo $lista->preco;?></td>
                                <td>R$<?php echo $lista->preco*$lista->qtd;?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total: R$<?php echo $soma ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div class="section-title mt-0 mb-3">
                <h2 class="mb-0">Endereço Selecionado</h2>
                <p data-aos="fade-up" style="font-size: 15pt; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:200;" class="text-light">Logradouro: <span class="text-primarycolor"><?php echo $endereco->logradouro ?></span>,<br>
                Bairro: <span class="text-primarycolor"><?php echo $endereco->bairro ?></span>,<br>
                Número: <span class="text-primarycolor"><?php echo $endereco->numero ?></span>,<br>
                Referência: <span class="text-primarycolor"><?php echo $endereco->referencia ?></span></p>
            </div>

            <div class="section-title">
                <h2>Forma de pagamento</h2>
                <p>Selecione sua forma de pagamento</p>
            </div>
            <div class="row" data-aos="fade-up">
                <form action="<?= url("checkout/pagamento/pix") ?>" method="POST" class="col-lg-6">
                    <a href="#modal_cpf_pix" data-toggle="modal" class="text-light m-2 p-2 border border-primarycolor d-flex justify-content-center align-items-center btn-formapagamento div-pix rounded position-relative" style="height: 10rem;">   
                        <div class="text-center">
                            <img src="<?= url("View/assets/img/pix.png")?>" alt="pix" width="60%">
                        </div> 
                    </a>
                </form>
                <div class="col-lg-6">
                    <a href="#modal_credito" data-toggle="modal" class="m-2 p-5 border border-primarycolor d-flex justify-content-center align-items-center btn-formapagamento flex-column rounded position-relative" style="height: 10rem;">
                        <div style="margin-bottom: -1rem; margin-top:3rem;">
                            <h4 class="text-primarycolor" style="font-family: Arial, Helvetica, sans-serif; margin-bottom: -5rem;">Cartão de Crédito</h4>
                        </div>
                        <div>
                            <img src="<?= url("View/assets/img/credit-card.png")?>" alt="cartao de credito" width="100%">
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="#modal_balcao" data-toggle="modal" class="m-2 p-5 border border-primarycolor d-flex justify-content-center align-items-center btn-formapagamento flex-column rounded position-relative" style="height: 10rem;">
                        <div>
                            <h4 class="text-primarycolor" style="font-family: Arial, Helvetica, sans-serif;">Retirar no Balcão</h4>
                        </div>
                        <div>
                            <img src="<?= url("View/assets/img/table.png")?>" alt="cartao de credito" width="100%">
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="#modal_entrega" data-toggle="modal" class="m-2 p-5 border border-primarycolor d-flex justify-content-center align-items-center btn-formapagamento flex-column rounded position-relative" style="height: 10rem;">
                        <div>
                            <h4 class="text-primarycolor" style="font-family: Arial, Helvetica, sans-serif;">Dinheiro na entrega</h4>
                        </div>
                        <div>
                            <i class="fas fa-money-bill-alt text-light" style="font-size: 40pt;"></i>
                        </div>
                    </a>
                </div>
            </div>
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

    <?php 
    if(isset($response)){
        echo "<script>$('#modal_pix').modal('show');</script>";
    }
    ?>
</body>
</html>