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
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top headerDelivery" style="background-color: #55360069;">
        <div class="container d-flex align-items-center">

        <a href="<?= url("") ?>" class="logo mr-auto"><img src="<?= url("View/assets/img/favicon1.png") ?>" alt="" class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
            <li><a href="<?= url("") ?>">Início</a></li>
            <li><a href="<?= url("cardapio") ?>">Cardápio</a></li>
            <?php if ($logado != 0): ?>
                <li class="active"><a href="<?= url("delivery") ?>">Delivery</a></li>
                <li class="conta text-center">
                    <a href="" class="btn-minhaconta">
                    Minha conta <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="menu-conta">
                    <li><a href="<?= url("conta/minhaconta") ?>">Minha conta</a></li>
                    <li><a href="<?= url("conta/meuspedidos") ?>">Meus Pedidos</a></li><li><a href="<?= url("conta/minhasreservas") ?>">Minhas Reservas</a></li>
                    <?php if ($admin == 1){?>
                        <li><a href="<?= url("admin") ?>">Admin</a></li>
                    <?php } ?>
                    <li><a href="<?= url("sair") ?>">Sair</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="conta text-center"><a href="<?= url("login") ?>" class="btn-entrar">Entrar</a></li>
            <?php endif; ?>
            </ul>
        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <div class="bolha bg-success">
    </div>
    <div class="center-msg border border-success">
        <div>
            <h1>Pagamento <strong>APROVADO</strong></h1>
        </div>
        <div>
            <h3>Pedido nº <span class="text-success"><?php echo $idpedido?></span></h3>
            <p>Seu pedido teve o pagamento aprovado e foi enviado para ser feito, te enviaremos assim que possível!</p>
            <p>Para acompanhar seu pedido acesse a área <a href="<?= url("conta/meuspedidos") ?>" class="text-success">MEUS PEDIDOS</a></p>
            <a href="<?= url("conta/meuspedidos/$idpedido") ?>" class="btn btn-success rounded-pill">ACOMPANHAR PEDIDO</a>
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

    <?php 
    if(isset($response)){
        echo "<script>$('#modal_pix').modal('show');</script>";
    }
    ?>
</body>
</html>