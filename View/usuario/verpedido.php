<!DOCTYPE html>
<html lang="en">
<?php include_once("layout/header.php")?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    include("View/usuario/layout/navbar.php");
    include("View/usuario/layout/sidebar.php");
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Informações do pedido <?php echo $pedido->id ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php url("admin") ?>">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Informações do pedido <?php echo $pedido->id ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
            <?php
              switch ($pedido->status) {
                case 'Pendente':
                  echo "<h2 class='h1 text-warning'>$pedido->status </h2>";
                break;

                case 'Aguardo':
                  echo "<h2 class='h1 text-warning'>$pedido->status </h2>";
                break;

                case 'Em Preparo':
                  echo "<h2 class='h1 text-primary'>$pedido->status </h2>";
                break;
                
                default:
                  echo "<h2 class='h1 text-success'>$pedido->status </h2>";
                break;
              }
            ?>
          </div>
          <div class="col-md-6 p-2">
            <div class="shadow p-2 rounded">
              <p class="text-bold m-0 text-uppercase">Valor total:
              R$ <?php echo $pedido->total ?>
              </p>
            </div>
          </div>
          <div class="col-md-12 p-2 shadow">
          <p class="text-bold m-0 text-uppercase p-2">Itens:</p>
            <div class="row">
              <?php foreach ($ingredientes as $key => $value):?>
              <div class="col-md-6">
                <div class="p-3 rounded shadow d-flex justify-content-between flex-column">
                  <div class="d-flex justify-content-between align-items-center w-100 mb-3">
                    <h3>
                      <?php echo $ingredientes[0]->nome ?>
                    </h3>
                    <h3>
                      R$ <?php echo $ingredientes[0]->preco ?>
                    </h3>
                  </div>
                  <div>
                    <p>
                      <?php echo $ingredientes[0]->obs ?>
                    </p>
                  </div>
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