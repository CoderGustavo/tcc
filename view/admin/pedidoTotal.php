<!DOCTYPE html>
<?php
  require_once '../../model/Pedido.php';
  $pedido = new Pedido();
  $lista = $pedido->listar();
  session_start();
$logado = $_SESSION['usuario'];
if (isset($logado["niveis_acesso"])) {
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Todos os Pedidos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="../../assets/img/favicon1.png" rel="icon">
</head>
<body class="hold-transition sidebar-mini">

  <?php
    include("layout/modalAtualizarPedido.php");
  ?>

<div class="wrapper">
  <!-- Navbar -->
  <?php
    include("layout/navbar.php");
   ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include("layout/sidebar.php");
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todos os pedidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Todos os pedidos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Todos os pedidos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Forma de Pagamento</th>
                      <th>Total</th>
                      <th>Entrega?</th>
                      <th>Status</th>
                      <th>A????es</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lista as $linha): ?>
                    <tr>
                      <td><?php echo $linha['id'] ?></td>
                      <td><?php echo $linha['nome'] ?></td>
                      <td><?php echo $linha['forma_pagamento'] ?></td>
                      <td>R$<?php echo $linha['total'] ?></td>
                      <td><?php echo $linha['entrega'] ?></td>
                      <?php if($linha['status'] == 'Pendente'){?>
                        <td class="teste badge badge-pill bg-dark p-2"> <?php echo $linha['status'] ?> </td>
                      <?php }else if($linha['status'] == 'Em Preparo'){?>
                        <td class="teste badge badge-pill bg-warning p-2"> <?php echo $linha['status'] ?> </td>
                      <?php }else if($linha['status'] == 'Entregue'){?>
                        <td class="teste badge badge-pill bg-success p-2"> <?php echo $linha['status'] ?> </td>
                      <?php }?>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#atualizarDelivery<?php echo $linha['id'] ?>"><i class="taman far fa-sync atualizar text-light bg-success rounded-circle border border-dark p-1"></i></a>
                      </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } else { $_SESSION["acesso_restrito"] = "N??o logado";header('Location: /tcc'); } ?>
