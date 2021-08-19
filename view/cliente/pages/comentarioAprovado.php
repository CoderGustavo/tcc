<?php require_once '../classe/Avaliacao.php';
$avaliacao = new Avaliacao();
$lista = $avaliacao->listarAprovados();
session_start();
$logado = $_SESSION['usuario_logado'];
if ($logado == 1) {
?>

<head>
  <title>Todas reservas</title>
  <style>
    .taman{
      width:27px;
      height: 27px;
    }

    .teste{
      margin-top: 10px;
      margin-left: 3px;
    }


  
  </style>
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
<?php include("layout/modalExcluirAprovado.php") ?>
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
            <h1>Todos os avaliaçãos aprovados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Avaliações aprovados</li>
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
                <h3 class="card-title">Todos os avaliaçãos aprovados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nome</th>
                      <th>Avaliação</th>
                      <th style="width: 40px">Data/Hora</th>
                      <th style="width: 100px">Status</th>
                      <th style="width: 40px">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lista as $linha): ?>
                    <tr>
                      <td> <?php echo $linha['id'] ?> </td>
                      <td> <?php echo $linha['nome'] ?> </td>
                      <td> <?php echo $linha['avaliacao'] ?> </td>
                      <td> <?php echo $linha['datahora'] ?> </td>
                      <td class="teste badge badge-pill bg-success p-2"> <?php echo $linha['status'] ?> </td>
                      <td>
                        <i class="taman far fa-check text-light bg-secondary rounded-circle border border-dark p-1"></i>
                        <a href="#" data-toggle="modal" data-target="#excluirAvaliacao<?php echo $linha['id']?>"><i class="taman fas fa-times text-light text-center bg-danger rounded-circle border border-dark p-1"></i></a>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
<?php } else { header('Location: ../usuario-nao-logado.php'); } ?>