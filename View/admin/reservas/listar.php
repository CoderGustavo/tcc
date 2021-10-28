<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Todas as reservas <?php echo $status ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= url("View/assets/css/adminlte.min.css")?>">
  <link href="<?= url("View/assets/img/favicon1.png")?>" rel="icon">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
    include("modalReservar.php");
    include("modalMesaOcupada.php");
    include("modalMesaLivre.php");
    include("modalQrCode.php");
    include("View/admin/layout/navbar.php");
    include("View/admin/layout/sidebar.php");
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todas as reservas <?php echo $status ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Administração</a></li>
              <li class="breadcrumb-item active">Todas as reservas <?php echo $status ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Todas as reservas <?php echo $status ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nome</th>
                      <th>Telefone</th>
                      <th>Data-Hora</th>
                      <th>Nº de Pessoas</th>
                      <th>Observação</th>
                      <th>Status</th>
                      <th>Ações</th>
                      <th>Pagamento</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($reservas): foreach ($reservas as $linha): ?>
                    <tr>
                      <td><?php echo $linha->id ?></td>
                      <td><?php if(isset($linha->usuario()->nome)){echo $linha->usuario()->nome;}elseif(isset($linha->nome)){ echo $linha->nome; } ?></td>
                      <td><?php if(isset($linha->usuario()->telefohe)){echo $linha->usuario()->telefohe;} ?></td>
                      <td><?php echo $linha->datahora ?></td>
                      <td><?php echo $linha->numero_pessoas ?></td>
                      <td><?php echo $linha->observacao ?></td>
                  
                      <?php if ($linha->status == "Utilizada"): ?>
                        <td> 
                          <span class="badge badge-pill bg-danger p-2 text-capitalize">
                            Sendo <?php echo $linha->status ?>
                          </span>
                        </td>
                        <td>
                          <i class="far fa-check text-light rounded-circle p-2"></i>
                          <i class="far fa-users text-light rounded-pill p-2"></i>
                          <i class="far fa-sign-out text-light rounded-pill p-2"></i>
                          <a href="#"  data-toggle="modal" data-target="#mesa<?php echo $linha->id ?>"><i class="fas fa-qrcode text-dark rounded-pill p-2"></i></a>
                          <a href="<?= url("mesa/$linha->id") ?>"><i class="fas fa-link text-maroon"></i></a>
                        </td>
                        <td>
                          <a href="#"  data-toggle="modal" data-target="#mesapagar<?php echo $linha->id ?>" class="btn btn-light bg-purple text-light rounded-pill shadow border">Realizar Pagamento</a>
                        </td>
                      <?php elseif($linha->status == "Livre"): ?>
                        <td>
                          <span class="badge badge-pill bg-success p-2 text-capitalize">
                            <?php echo $linha->status ?>
                          </span>
                        </td>
                        <td>
                          <a href="#"  data-toggle="modal" data-target="#reservarmesa<?php echo $linha->id ?>"><i class="far fa-check text-primary rounded-circle p-2"></i></a>
                          <a href="#"  data-toggle="modal" data-target="#mesaocupada<?php echo $linha->id ?>"><i class="far fa-users text-warning rounded-pill p-2"></i></a>
                          <i class="far fa-sign-out text-light rounded-pill p-2"></i>
                          <a href="#"  data-toggle="modal" data-target="#mesa<?php echo $linha->id ?>"><i class="fas fa-qrcode text-dark rounded-pill p-2"></i></a>
                          <a href="<?= url("mesa/$linha->id") ?>"><i class="fas fa-link text-maroon"></i></a>
                        </td>
                        <td>

                        </td>
                      <?php else: ?>
                        <td>
                          <span class="badge badge-pill bg-primary p-2 text-capitalize">
                            <?php echo $linha->status ?>
                          </span>
                        </td>
                        <td>
                          <i class="far fa-check text-light rounded-circle p-2"></i>
                          <a href="#"  data-toggle="modal" data-target="#mesaocupada<?php echo $linha->id ?>"><i class="far fa-users text-warning rounded-pill p-2"></i></a>
                          <a href="#"  data-toggle="modal" data-target="#mesalivre<?php echo $linha->id ?>"><i class="far fa-sign-out text-success rounded-pill p-2"></i></a>
                          <a href="#"  data-toggle="modal" data-target="#mesa<?php echo $linha->id ?>"><i class="fas fa-qrcode text-dark rounded-pill p-2"></i></a>
                          <a href="<?= url("mesa/$linha->id") ?>"><i class="fas fa-link text-maroon"></i></a>
                        </td>
                        <td>

                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach; endif; ?>
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
<script src="<?= url("View/assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= url("View/assets/js/adminlte.js")?>"></script>
<script src="<?= url("View/assets/js/mainAdmin.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
