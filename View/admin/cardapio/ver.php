<!DOCTYPE html>
<html lang="en">
<?php include_once("View/admin/layout/header.php")?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    include("View/admin/layout/navbar.php");
    include("View/admin/layout/sidebar.php");
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Informações <?php echo $cardapio->nome ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php url("admin") ?>">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Informações <?php echo $cardapio->nome ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 p-2">
            <div class="shadow p-2 rounded">
              <p class="text-bold m-0 text-uppercase">Nome:</p>
              <?php echo $cardapio->nome ?>
            </div>
          </div>
          <div class="col-md-6 p-2">
            <div class="shadow p-2 rounded">
              <p class="text-bold m-0 text-uppercase">Preço:</p>
              R$ <?php echo $cardapio->preco ?>
            </div>
          </div>
          <div class="col-md-12 p-2 shadow">
          <p class="text-bold m-0 text-uppercase p-2">Ingredientes:</p>
            <div class="row">
              <?php foreach ($ingredientes as $key => $value):?>
              <div class="col-md-6">
                <div class="p-2 rounded">
                  <?php echo $value->nome ?>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control mb-3-sidebar control mb-3-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control mb-3-sidebar -->
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