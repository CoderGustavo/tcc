<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meus Pedidos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= url("View/assets/css/adminlte.min.css") ?>">
  <link href="<?= url("View/assets/img/favicon1.png")?>" rel="icon">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
    include("View/usuario/layout/navbar.php");
    include("View/usuario/layout/sidebar.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>Meus pedidos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="container">
          <?php if (isset($_SESSION["erro"])):?>
            <div class="alert alert-danger alert-dismissible fade show autohide" role="alert"><h5 class="m-0"><i class="fas fa-ban mr-3"></i>
              <?php echo $_SESSION["erro"]; unset($_SESSION["erro"]); ?></h5>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php elseif(isset($_SESSION["sucesso"])):?>
            <div class="alert alert-success alert-dismissible fade show autohide" role="alert"><h5 class="m-0"><i class="fas fa-check mr-3"></i>
              <?php echo $_SESSION["sucesso"]; unset($_SESSION["sucesso"]); ?></h5>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif?>
        </div>
        <div class="row p-3">
          <?php foreach($pedidos as $pedido):?>
            <div class="col-12 p-4 rounded align-items-center mb-3 border border-right-0 border-top-0 border-bottom-0
            <?php
            if($pedido->status == "Pendente"){
                echo "border-warning";
            }else if($pedido->status == "Em Preparo"){
              echo "border-primary";
            }else{
              echo "border-success";
            }
            
            ?>
            " style="background-color: #222; border-width: 8px !important;">
                  <div class="d-flex justify-content-between">
                      <h2 class="text-light">Pedido #<?php echo $pedido->id?></h2>
                      <?php if($pedido->status == "Pendente"){?>
                          <p class="h4 text-warning"><?php echo $pedido->status?></p>
                      <?php }else if($pedido->status == "Em Preparo"){?>
                          <p class="h4 text-primary"><?php echo $pedido->status?></p>
                      <?php } else if($pedido->status == "Entregue"){?>
                          <p class="h4 text-success"><?php echo $pedido->status?></p>
                      <?php } ?>
                  </div>
                  <div class="d-flex justify-content-between pt-5 mt-5 align-items-center">
                      <a href="<?= url("conta/meuspedidos/$pedido->id") ?>" class="btn btn-outline-info btn-lg text-uppercase">Ver Detalhes</a>
                      <p class="h4 text-light">Total: <strong>R$<?php echo $pedido->total?></strong></p>
                  </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= url("View/assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= url("View/assets/js/adminlte.js")?>"></script>

<script src="<?= url("View/assets/js/mainAdmin.js")?>"></script>

</body>
</html>
