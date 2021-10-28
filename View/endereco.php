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

  <style>
    input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }
  </style>
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
                <li class="active"><a href="<?= url("delivery") ?>">Delivery</a></li>
            </ul>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedido as $key => $lista): ?>
                            <tr>
                                <td><?php echo $lista->nome?></td>
                                <td><?php echo $lista->qtd?></td>
                                <td><?php echo $lista->obs?></td>
                                <td>R$<?php echo $lista->preco; $soma =$soma+$lista->preco?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total: R$<?php echo $soma ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="section-title">
                <h2>Endereço</h2>
                <p>Escolha seu endereço de entrega!</p>
            </div>
            <form class="row p-2" data-aos="fade-up" action="<?= url("checkout/pagamento") ?>" method="post">
                <?php foreach($enderecos as $key => $endereco):?>
                    <label class="col-md-6 p-2" for="endereco<?php echo $key?>" style="cursor: pointer;">
                        <div class="p-2 border border-primarycolor rounded d-flex">
                            <input type="radio" class="m-2" name="endereco" id="endereco<?php echo $key?>" value="<?php echo $endereco->id ?>" <?php if($key == 0){echo "checked";}?>>
                            <div class="ml-4">
                                <p>Logradouro:
                                    <span class="text-primarycolor">
                                        <?php echo $endereco->logradouro?>
                                    </span>
                                </p>
                                <p>Bairro:
                                    <span class="text-primarycolor">
                                        <?php echo $endereco->bairro?>
                                    </span>
                                </p>
                                <p>Número:
                                    <span class="text-primarycolor">
                                        <?php echo $endereco->numero?>
                                    </span>
                                </p>
                                <p>Referência:
                                    <span class="text-primarycolor">
                                        <?php echo $endereco->referencia?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </label>
                <?php endforeach ?>
                <div class="col-12 text-center mt-2">
                    <button type="subtmit" class="btn btn-primarycolor">Confirmar Endereço</button>
                </div>
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