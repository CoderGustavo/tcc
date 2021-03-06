<!DOCTYPE html>
<?php
  require_once '../../model/Reserva.php';
  $reserva = new Reserva();
  $lista = $reserva->listarPendentes();
  session_start();
$logado = $_SESSION['usuario'];
if (isset($logado["niveis_acesso"])) {
?>
<html lang="en">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reservas pendentes</title>

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
    include("layout/modalAprovarReserva.php");
  ?>

  <?php
    include("layout/modalExcluirReserva.php");
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
            <h1>Reservas pendentes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Administração</a></li>
              <li class="breadcrumb-item active">Reservas pendentes</li>
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
                <h3 class="card-title">Reserva Pendente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nome</th>
                      <th>Telefone</th>
                      <th>Data-Hora</th>
                      <th>Nº Pessoas</th>
                      <th>Obs.</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lista as $linha): ?>
                    <tr>
                      <td><?php echo $linha['id'] ?></td>
                      <td><?php echo $linha['nome'] ?></td>
                      <td><?php echo $linha['telefone'] ?></td>
                      <td><?php echo $linha['datahora'] ?></td>
                      <td><?php echo $linha['numero_pessoas'] ?></td>
                      <td><?php echo $linha['observacao'] ?></td>
                      <td>
                        <span class="badge badge-pill badge-warning p-2">
                          <?php echo $linha['status'] ?> 
                        </span>
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#aprovarReserva<?php echo $linha['id'] ?>"><i class="far fa-check text-light bg-success rounded-circle border border-dark p-1"></i></a>
                        <a href="#" data-toggle="modal" data-target="#excluirReserva<?php echo $linha['id'] ?>"><i class="fas fa-times text-light text-center bg-danger rounded-circle border border-dark p-1"></i></a>
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
<?php } else { $_SESSION["acesso_restrito"] = "Não logado";header('Location: /tcc'); } ?>