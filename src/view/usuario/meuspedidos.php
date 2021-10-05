<?php
  require_once'../../model/Usuario.php';
  require_once'../../model/Pedido.php';
  session_start();
  $usuario = 0;
  $usuario = $_SESSION['usuario'];
  if ($usuario != 0) {
    $pedidos = new Pedido();
    $pedidos = $pedidos->show($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meus Pedidos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link href="../../assets/img/favicon1.png" rel="icon">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
    include("layout/navbarCliente.php");
  ?>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
    include("layout/sidebarCliente.php");
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
        <div class="row p-3">
            <?php foreach($pedidos as $pedido):?>
                    <?php if($pedido["status"] == "Pendente"){?>
                        <div class="col-12 p-4 rounded align-items-center mb-3 border border-right-0 border-top-0 border-bottom-0 border-warning" style="background-color: #222; border-width: 8px !important;">
                    <?php }else if($pedido["status"] == "Em Preparo"){?>
                        <div class="col-12 p-4 rounded align-items-center mb-3 border border-right-0 border-top-0 border-bottom-0 border-primary" style="background-color: #222; border-width: 8px !important;">
                    <?php } else if($pedido["status"] == "Entregue"){?>
                        <div class="col-12 p-4 rounded align-items-center mb-3 border border-right-0 border-top-0 border-bottom-0 border-success" style="background-color: #222; border-width: 8px !important;">
                    <?php } ?>
                <div class="d-flex justify-content-between">
                    <h2 class="text-light">Pedido #<?php echo $pedido["id"]?></h2>
                    <?php if($pedido["status"] == "Pendente"){?>
                        <p class="h4 text-warning"><?php echo $pedido["status"]?></p>
                    <?php }else if($pedido["status"] == "Em Preparo"){?>
                        <p class="h4 text-pimary"><?php echo $pedido["status"]?></p>
                    <?php } else if($pedido["status"] == "Entregue"){?>
                        <p class="h4 text-success"><?php echo $pedido["status"]?></p>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-between pt-5 mt-5 align-items-center">
                    <a href="" class="btn btn-outline-info btn-lg text-uppercase">Ver Detalhes</a>
                    <p class="h4 text-light">Total: <strong>R$<?php echo $pedido["total"]?></strong></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control mb-3-sidebar control mb-3-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control mb-3-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
</body>
</html>
<?php } else { $_SESSION["acesso_restrito"] = "Não logado";header('Location: /tcc'); } ?>
