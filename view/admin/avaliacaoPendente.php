<?php require_once '../../model/Avaliacao.php';
$avaliacao = new Avaliacao();
$lista = $avaliacao->listarPendentes();
session_start();
$logado = $_SESSION['usuario_logado'];
if ($logado == 1) {
?>

<head>
  <meta charset="utf-8">
  <title>Todas reservas</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
  <link href="../../assets/img/favicon1.png" rel="icon">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <?php include("layout/modalAprovarTotal.php"); ?>
    <?php include("layout/modalExcluirTotal.php"); ?>
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
            <h1>Todos as avaliações pendentes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Administração</a></li>
              <li class="breadcrumb-item active">Todos as avaliações pendentes</li>
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
                <h3 class="card-title">Todos as avaliações pendentes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nome</th>
                      <th>Comentário</th>
                      <th>Data Hora</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lista as $linha): ?>
                    <tr>
                      <td> <?php echo $linha['id'] ?> </td>
                      <td> <?php echo $linha['nome'] ?> </td>
                      <td> <?php echo $linha['comentario'] ?> </td>
                      <td> <?php echo $linha['data'] ?> </td>
                      <td> 
                        <span class="teste badge badge-pill bg-warning p-2">
                          <?php echo $linha['status'] ?>
                        </span>
                      </td>
                      <td>
                      <a href="#"  data-toggle="modal" data-target="#aprovarAvaliacao<?php echo $linha['id'] ?>"><i class="taman far fa-check text-light bg-success rounded-circle border border-dark p-1"></i></a>
                        <a href="#"  data-toggle="modal" data-target="#excluirAvaliacao<?php echo $linha['id'] ?>"><i class="taman fas fa-times text-light text-center bg-danger rounded-circle border border-dark p-1"></i></a>
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
