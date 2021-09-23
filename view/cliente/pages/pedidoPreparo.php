<!DOCTYPE html>
<?php
  require_once '../classe/Delivery.php';
  $delivery = new Delivery();
  $lista = $delivery->listar();
  session_start();
  $logado = $_SESSION['usuario_logado'];
if ($logado == 1) {
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Todos os Pedidos Em Preparo</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
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
            <h1>Todos os pedidos em preparo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Todos os pedidos em preparo</li>
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
                <h3 class="card-title">Todos os pedidos em preparo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Preco</th>
                      <th>Pedido</th>
                      <th>Observação</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lista as $linha): if($linha['status'] == 'Em Preparo'){?>
                    <tr>
                      <td><?php echo $linha['id'] ?></td>
                      <td><?php echo $linha['nome'] ?></td>
                      <td><?php echo $linha['total'] ?></td>
                      <td><?php echo $linha['pedido'] ?></td>
                      <td><?php echo $linha['obs'] ?></td>
                        <td class="teste badge badge-pill bg-warning p-2"> <?php echo $linha['status'] ?> </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#atualizarDelivery<?php echo $linha['id'] ?>"><i class="taman far fa-sync atualizar text-light bg-success rounded-circle border border-dark p-1"></i></a>
                      </td>
                      </tr>
                    <?php };endforeach ?>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php } else { header('Location: ../usuario-nao-logado.php'); } ?>
