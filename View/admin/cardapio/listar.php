<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listar Cardápio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">

  <link href="<?= url("View/assets/img/favicon1.png")?>" rel="icon">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= url("View/assets/css/adminlte.min.css")?>">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
    include("View/admin/layout/navbar.php");
    include("View/admin/layout/sidebar.php");
    include("modalExcluir.php");
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listar Cardápio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php url("admin") ?>">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Listar Cardápio</li>
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
                <h3 class="card-title">Listar Cardápio</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Imagem</th>
                      <th>Nome</th>
                      <th>Preço</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($cardapio): foreach ($cardapio as $linha): ?>
                    <tr>
                      <td class="align-middle"><?php echo $linha->id ?></td>
                      <td class="align-middle"><img src="<?= url("View/assets/img/cardapio/".$linha->imagem) ?>" width="80px"></td>
                      <td class="align-middle"><?php echo $linha->nome ?></td>
                      <td class="align-middle">R$<?php echo $linha->preco ?></td>
                      <td class="align-middle">
                        <p>
                          <a href="<?= url("admin/ver/cardapio/$linha->id") ?>"><i class="far fa-info text-info rounded-pill p-2"></i></a>
                          <a href="<?= url("admin/edit/cardapio/$linha->id") ?>"><i class="far fa-edit text-warning rounded-pill p-2"></i></a>
                          <a href="#" data-toggle="modal" data-target="#deleteCardapio<?php echo $linha->id ?>"><i class="far fa-trash text-danger rounded-pill p-2"></i></a>
                        </p>
                      </td>
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
<script src="<?= url("View/assets/js/adminlte.js")?>"></script><script src="<?= url("View/assets/js/mainAdmin.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
