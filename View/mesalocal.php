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
    <?php if(isset($_SESSION["acesso_liberado$idmesa"]) && $_SESSION["acesso_liberado$idmesa"] == 1):?>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top headerDelivery" style="background-color: #55360069;">
        <div class="container d-flex align-items-center justify-content-center">

        <a href="<?= url("") ?>" class="logo"><img src="<?= url("View/assets/img/favicon1.png") ?>" alt="" class="img-fluid"></a>

        </div>
    </header><!-- End Header -->

    <section id="delivery" class="book-a-table mt-5">
        
        <div class="container-xl" data-aos="fade-up">

            <div class="section-title pb-0 pb-md-3">
                <h2>Escolha seu pedido!</h2>
                <p class="d-none d-md-block">Mesa <?php echo $idmesa ?></p>
            </div>
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
            <div class="menu" data-aos="fade-up" data-aos-delay="100">
                <div class="row mb-2">
                <?php if($cardapio): foreach ($cardapio as $key => $lista): ?>
                    <form class="col-md-6 menu-item p-2" filtrar="filtro-<?php echo $lista->id_categoria?>" action="<?= url("mesa/$idmesa/adicionar") ?>" method="post">
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
                    </form>
                <?php endforeach; endif; ?>
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
            <button class="btn text-primarycolor btn-fecharpedido d-lg-none"><i class="fas fa-times h2"></i></button>
            <h3>Pedido mesa <?php echo $idmesa?></h3>
            <h5>Em escolha</h5>
            <div class="row">
                <?php if($pedidoEscolha): foreach($pedidoEscolha as $key => $linha): ?>
                    <div class="col-12 border border-primarycolor p-3 rounded mb-2">
                        <div class="row">
                            <div class="col-12 text-center d-flex justify-content-between">
                                <p class="h3"><?php echo $linha->nome?></p>
                                <p>Qtd: <?php echo $linha->qtd?></p>
                                <h5>
                                    <a href="<?= url("mesa/$idmesa/excluir/$linha->id") ?>">
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
                <a href="<?= url("mesa/$idmesa/preparar") ?>" class="btn btn-block btn-primarycolor">Enviar para fazer</a>
                <?php else: ?>
                <?php endif; ?>
            </div>
            <hr>
            <h5>Em aguardo</h5>
            <div class="row">
                <?php if($pedidoAguardo): foreach($pedidoAguardo as $key => $linha): ?>
                    <div class="col-12 border border-primarycolor p-3 rounded mb-2">
                        <div class="row">
                            <div class="col-12 text-center d-flex justify-content-between">
                                <p class="h3"><?php echo $linha->nome?></p>
                                <p>Qtd: <?php echo $linha->qtd?></p>
                            </div>
                            <div class="col-12 text-center d-flex justify-content-between mt-2 align-items-end">
                                <p class="m-0">Obs.: <?php echo $linha->obs?></p>
                                <p class="m-0">R$<?php echo $linha->preco*$linha->qtd?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
            <hr>
            <h5>Em preparo</h5>
            <div class="row">
                <?php if($pedidoPreparo): foreach($pedidoPreparo as $key => $linha): ?>
                    <div class="col-12 border border-primarycolor p-3 rounded mb-2">
                        <div class="row">
                            <div class="col-12 text-center d-flex justify-content-between">
                                <p class="h3"><?php echo $linha->nome?></p>
                                <p>Qtd: <?php echo $linha->qtd?></p>
                            </div>
                            <div class="col-12 text-center d-flex justify-content-between mt-2 align-items-end">
                                <p class="m-0">Obs.: <?php echo $linha->obs?></p>
                                <p class="m-0">R$<?php echo $linha->preco*$linha->qtd?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
            <hr>
            <h5>Pronto</h5>
            <div class="row">
                <?php if($pedidoPreparo): foreach($pedidoPreparo as $key => $linha): ?>
                    <div class="col-12 border border-primarycolor p-3 rounded mb-2">
                        <div class="row">
                            <div class="col-12 text-center d-flex justify-content-between">
                                <p class="h3"><?php echo $linha->nome?></p>
                                <p>Qtd: <?php echo $linha->qtd?></p>
                            </div>
                            <div class="col-12 text-center d-flex justify-content-between mt-2 align-items-end">
                                <p class="m-0">Obs.: <?php echo $linha->obs?></p>
                                <p class="m-0">R$<?php echo $linha->preco*$linha->qtd?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>

    <?php else: ?>
        <div class="modal fade" id="modalsenha" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-body text-center">
                        <form action="<?= url("mesa/verificar") ?>" method="post">
                            <h5 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 15pt;">Insira a senha da mesa <?php echo $idmesa?>:</h5>
                            <input type="text" class="form-control" name="senha" placeholder="Insira a senha:" value="<?php if(isset($_SESSION["valor"])){echo $_SESSION["valor"];} ?>">
                            <input type="hidden" name="id" value="<?php echo $idmesa?>">
                            <?php if(isset($_SESSION["erro"])):?>
                                <p class="text-danger"><?php echo $_SESSION["erro"]?></p>
                            <?php endif; unset($_SESSION["erro"]);?>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primarycolor">Acessar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

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
        $('#modalsenha').modal('show')
    </script>
</body>
</html>